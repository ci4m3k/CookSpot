
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link rel="stylesheet" type="text/css" href="public/css/post-page.css">


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
            </p>

            <h4>Ingredients</h4>
            <p>
            <?= $post->getIngredients() ?>
            </p>

            <h4>Recipe</h4>
            <p>
            <?= $post->getRecipe() ?>
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