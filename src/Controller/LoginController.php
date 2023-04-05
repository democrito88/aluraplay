<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Usuario;
use League\Plates\Engine;

class LoginController
{
    /**
     * @var League\Plates\Engine
     */
    private $templates;

    public const VIEW_PATH = __DIR__."/../../views/";
    public const BASE_URL = "http://localhost:8080/public/index.php/";

    public function __construct()
    {
        $this->templates = new Engine(self::VIEW_PATH);
    }
    
    public function login()
    {
        echo $this->templates->render('login', ['base_url' => self::BASE_URL]);
    }

    public function validate()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        $uC = new UsuarioController();
        $usuario = $uC->getRepository()->findBy(['email' => $email])[0];

        /*O algoritmo usado gera hashes diferentes a cada vez que é usado
        Portanto, ao invés de encriptar a string dada e compará-la com a informação no banco,
        compara-se o algoritomo usado, o custo computacional em gerá-la, etc*/
        if(password_verify($senha, $usuario->getSenha() ?? '')){
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $usuario;
            //$vC = new VideoController();
            //$vC->index();
            header("Location: ".self::BASE_URL."home/index");
        }else{
            header("Location: ".self::BASE_URL."login/login?sucesso=0");
        }
    }

    public function logout(){
        unset($_SESSION['usuario']);
        $_SESSION['logado'] = false;

        header("Location: ".self::BASE_URL."login/login");
    }
}