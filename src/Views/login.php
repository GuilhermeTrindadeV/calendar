<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/login.css">
    <title>Calendar | Login</title>
</head>
<body>
    <div class="card" id="cardOne">
        <?php echo $this->insert("templates/message") ?>
        <div class="card-header text-center">
            <h4>Entrar no Schedule</h4>  
        </div>
        <div class="card-body" id="bodyForm">
            <form action="#" method="POST">
                <div class="form-outline mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control <?= $errors["login_email"] ? "is-invalid" : "" ?>"
                        name="login_email" value="<?= $login_email ?>">
                    <div class="invalid-feedback"><?= $errors["login_email"] ?></div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control <?= $errors["login_senha"] ? "is-invalid" : "" ?>"
                        name="login_senha">
                    <div class="invalid-feedback"><?= $errors["login_senha"] ?></div>
                </div>
        
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-block mb-4" value="Entrar">
                    <button type="button" class="btn btn-warning btn-block mb-4">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>