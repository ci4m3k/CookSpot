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
        <link rel="stylesheet" type="text/css" href="public/css/add-post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>MAIN</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <nav>
            <img src="/img/logo2.png" alt="LOGO ALT">
            <ul>
                <li>
                    <a href="#" class="button">Home</a>
                </li>
                <li>
                    <a href="#" class="button">Explore</a>
                </li>
                <li>
                    <a href="#" class="button">Bookmarks</a>
                </li>
                <li>
                    <a href="#" class="button">My Profile</a>
                </li>
            </ul>

        </nav>

        <main> 
           

            <div class="header">               
                <div class="background-border">
                    <div class="search-bar button">
                        <form>
                            <input placeholder=" Search ">
                        </form>
                    </div>
                </div>

            </div>
            <section>
                <form action="addpost" method="POST" enctype="multipart/form-data">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>

                <input type="text" class="input-text" placeholder="Title"  name="title">
                <textarea name="description" rows="5" placeholder="Description"></textarea>
                <textarea name="ingredients" rows="10" placeholder="ingredients"></textarea>
                <textarea name="recipe" rows="10"  placeholder="recipe"></textarea>
                <input type="file" name="image" class="input-text" >
                <button type="submit" class="input-text"> Submit </button>


                </form>
                

            </section>
        </main  >
    </div>
    


</body>

</html>