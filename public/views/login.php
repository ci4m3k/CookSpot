<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a33eb12e73.js" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#"> Don't have an account? <span>Create account</span></a>

            </form>

        </div>
    </div>
</body>

</html>