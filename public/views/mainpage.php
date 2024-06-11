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
    <link rel="stylesheet" type="text/css" href="public/css/post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>MAIN</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <nav>
            <img src="/img/logo3.png" alt="LOGO ALT">
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
                <div>
                    <h1 class="welcome-text">What would you like to cook today?</h1>
                </div>
                
                <div class="background-border">
                    <div class="search-bar button">
                        <form>
                            <input placeholder=" Search ">
                        </form>
                    </div>
                </div>

            </div>

        

            <section class="posts">
                <?php foreach($posts as $post): ?>
                <div id="<?= $post->getIdPost() ?>" >
                    <img src="../public/uploads/<?= $post->getImage() ?>" alt="post image">
                    <div>
                        <div class="post-desc">
                            <h1> <?= $post->getTitle() ?> </h1>
                            <h1> <?
                             $rep = new UserRepository();
                             echo $rep->getUsernameFromId($post->getIdUserOwner());
                             ?> </h1>

                            <p> <?= $post->getDescription() ?></p>
                        </div>
                        
                        <div class=" post-icons">

                            <div>
                                <i class="material-symbols-outlined">signal_cellular_alt</i>
                                <span><?= $post->getDifficulty() ?></span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">star_half</i>
                                <span>4,5</span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">timer</i>
                                <span><?= $post->getPrepTime() ?></span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">Restaurant</i>
                                <span>for <?= $post->getNumberOfServings() ?></span>
                            </div>

                        </div>
                    </div>

                </div>


                <?php endforeach; ?>

                <div id="post-2" > 
                    <img src="/img/pizza.jpg" alt="post image">
                    <div>
                        <div class="post-desc">
                            <h1> Title TitleTitle Title Title Title </h1>
                            <h1> author </h1>

                            <p> 
                                Savory Tuscan Chicken Pasta is a comforting and flavorful  Italian-inspired dish featuring tender chicken breast, sun-dried  tomatoes, spinach, and garlic, all tossed in a creamy Parmesan sauce and  served over al dente pasta.
                            </p>
                        </div>
                        
                        <div class=" post-icons">

                            <div>
                                <i class="material-symbols-outlined">signal_cellular_alt</i>
                                <span>Hard</span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">star_half</i>
                                <span>4,5</span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">timer</i>
                                <span>2h</span>
                            </div>
                            <div>
                                <i class="material-symbols-outlined">Restaurant</i>
                                <span>for 3</span>
                            </div>

                        </div>
                    </div>
                </div>
                
            </section>
        </main  >
    </div>
    


</body>

</html>