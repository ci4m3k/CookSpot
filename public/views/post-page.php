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
    <link rel="stylesheet" type="text/css" href="public/css/post-page.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>POST PAGE</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

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

        
            <section class="posts">
    <div id="post-1">
        <div class="post-content">
            <img src="/public/uploads/<?= $post->getImage() ?>" alt="post image">
            <!-- <img src="/img/pizza.jpg" alt="post image"> -->

            <div class="post-icons">
                <div>
                    <i class="material-symbols-outlined">account_circle</i>
                    <span><?
                    $rep = new UserRepository();
                    echo $rep->getUsernameFromId($post->getIdUserOwner());
                    ?></span>
                </div>

                <div class="place-holder">xxx</div>
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
        <div class="post-desc">
            <p class="date"> Posted on: <?= $post->getCreatedAt() ?>
            </p>
            <h1>
            <?= $post-> getTitle() ?>
                <!-- Title TitleTitle Title Title Title -->
            </h1>

            <h4><?
                $rep = new PostRepository;
                $categories = $rep->getPostCategoriesList($post->getIdPost());
                foreach($categories as $category): 
                    echo '#'.$category->getCategoryName().' ';
                endforeach;
            ?></h4>

            <p>
            <?= $post->getDescription() ?>
                <!-- Savory Tuscan Chicken Pasta is a comforting and flavorful Italian-inspired dish featuring tender chicken breast, sun-dried tomatoes, spinach, and garlic, all tossed in a creamy Parmesan sauce and served over al dente pasta. -->
            </p>

            <h4>Ingredients</h4>
            <p>
            <?= $post->getIngredients() ?>
            <!-- 8 oz (225g) pasta (such as penne or fettuccine)
            2 boneless, skinless chicken breasts, thinly sliced
            Salt and black pepper, to taste
            2 tablespoons olive oil
            3 cloves garlic, minced
            1/2 cup sun-dried tomatoes, sliced
            2 cups fresh spinach leaves
            1 cup heavy cream
            1/2 cup grated Parmesan cheese
            1 teaspoon Italian seasoning
            Red pepper flakes (optional, for heat)
            Fresh basil leaves, for garnish -->
            </p>

            <h4>Recipe</h4>
            <p>
            <?= $post->getRecipe() ?>
            <!-- Cook the pasta according to package instructions until al dente. Drain and set aside.
            Season the chicken breasts with salt and black pepper on both sides.
            Heat 1 tablespoon of olive oil in a large skillet over medium-high heat. Add the chicken breasts and cook for 4-5 minutes on each side, or until golden brown and cooked through. Remove the chicken from the skillet and set aside.
            In the same skillet, add the remaining tablespoon of olive oil. Add the minced garlic and sun-dried tomatoes, and sauté for 1-2 minutes until fragrant.
            Add the spinach leaves to the skillet and cook until wilted, about 1-2 minutes.
            Pour in the heavy cream and stir in the grated Parmesan cheese. Allow the sauce to simmer for 2-3 minutes until it thickens slightly.
            Stir in the cooked pasta and sliced chicken breast. Season with Italian seasoning and red pepper flakes, if using. Toss everything together until well coated in the sauce.
            Serve the Savory Tuscan Chicken Pasta hot, garnished with fresh basil leaves. Enjoy! -->
            </p>
            
        </div>
        <div class="stars">
        <i class="material-symbols-outlined">star</i>
        <i class="material-symbols-outlined">star</i>
        <i class="material-symbols-outlined">star</i>
        <i class="material-symbols-outlined">star</i>
        <i class="material-symbols-outlined">star</i>   
        </div>


    </div>
</section>


        </main  >
    </div>
    


</body>

</html>