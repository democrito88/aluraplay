<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base_url."../css/style.css" ?>">
    <script type="text/javascript" src="<?= $base_url."../js/script.js" ?>" ></script>
    <title>Aluraflix - Faça login</title>
</head>
<body class="h-100 w-100 bg-dark" style="height: 100vh;">
    <main class="container" style="height: 100vh;">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">faça login</h3>
                        </div>
                        <form action="<?= $base_url."login/validar" ?>" method="post">
                            <?php
                            if(isset($_GET['sucesso'])){
                                ?>
                                <div class="alert alert-warning">
                                    <p>Email ou senha incorretos</p>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control" require>
                            </div>
                            <div class="form-group">
                                <label for="senha" class="form-label">Senha</label>
                                <input id="senha" name="senha" type="password" class="form-control" require>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>