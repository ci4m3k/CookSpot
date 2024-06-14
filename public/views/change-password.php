<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add-post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <script type="text/javascript" src="./public/js/password.js" defer></script>
    

</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

        <main> 
           

            <div class="header">               
               
            </div>

            <section>
                <form action="changepassword" method="POST" enctype="multipart/form-data">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>
                
                <input type="password" class="password" placeholder="Old Password"  name="password">              
                <input type="password" class="password" placeholder="New Password"  name="new_password">              
                <input type="password" class="password" placeholder="Confir New Password"  name="conf_password">              
            
                <button type="submit" class="input-text"> Submit </button>


                </form>
                

            </section>
        </main  >
    </div>
    


</body>

</html>