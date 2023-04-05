<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Usuario;

class UsuarioController extends Controller
{
    public function __construct()
    {
        parent::__construct(Usuario::class);
    }
}