<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="./public/js/validator.js" defer></script>

    
    <title>Login</title>

</head>

<body id="login">
    <div class="base-container-login">
        <div class="login-container">
            
            <img src="/img/logo3.png" alt="logo alt">

            <form action="createaccount" method="POST">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </span>

                <input name="username" type="text" placeholder="Username" class="input-text">
                <input name="email" type="email" placeholder="Email" class="input-text">
                <input name="password" type="password" placeholder="Password" class="input-text">
                <input name="conf_password" type="password" placeholder="Repete password" class="input-text">
                <button type="submit" class="input-text">Confirm</button>
                <a href="login">Have an account? <span>Login</span></a>

            </form>

        </div>
    </div>
</body>

</html>