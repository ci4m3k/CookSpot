<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    
    <title>Login</title>

</head>

<body id="login">
    <div class="base-container-login">
        <div class="login-container">
            
            <img src="/img/logo3.png" alt="logo alt">

            <form action="login" method="POST">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>
                <input name="email" type="text" placeholder="email" class="input-text">
                <input name="password" type="password" placeholder="password" class="input-text">
                <button type="submit" class="input-text">Login</button>
                <a href="createaccount"> Don't have an account? <span>Create account</span></a>

            </form>

        </div>
    </div>
</body>

</html>