<?php
    $msg = isset($msg) ? $msg : "";
    session_start();
    if (isset($_SESSION["status"]) == 'online_mkt_key'){  
        header("Location: home");   
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Sistema SSO</title>
	
    <link rel="stylesheet" href="./view/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link href="./view/src/css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="./view/src/img/supermarket-logo.svg" />
            <p id="profile-name" class="profile-name-card text-success">System Supermarket</p>
            <p>                    
            <form method="post" accept-charset="utf-8" action="login" name="loginform" autocomplete="off" role="form" class="form-signin">
                <input class="form-control" placeholder="Usuário" name="username" type="text" value="" autofocus="" required>
                <input class="form-control" placeholder="Senha" name="password" type="password" value="" autocomplete="off" required>
                
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sessão</button>
            </form>
            <?php echo $msg; ?>
            <i class="text-sm-right"><a href="#resetPasswd" class="text-secondary">Senha perdida</a></i>
            </p>
        </div>
    </div>
</body>
</html>

