
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link rel="stylesheet" type="text/css" href="public/css/post-page.css">

<script type="text/javascript" src="./public/js/statistics.js" defer></script>



<section class="posts rate">
    <div id="<?= $post->getIdPost() ?>">
        <div class="post-content">
            <img src="/public/uploads/<?= $post->getImage() ?>" alt="post image">
            <!-- <img src="/img/pizza.jpg" alt="post image"> -->

            <div class="post-icons">
                <div>
                    <i class="material-symbols-outlined">account_circle</i>
                    <span><?= $post->getUserOwner()?></span>
                </div>

                <div class="place-holder">xxx</div>
                <div class="place-holder">xxx</div>
                <div>
                    <i class="material-symbols-outlined">signal_cellular_alt</i>
                    <span><?= $post->getDifficulty() ?></span>
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

        <div class="post-icons-interactive">

            <div class="like " >
                <!-- <span class="like-count"><?= $post->getLike() ?></span> -->
                <i id="thumblike" class="material-symbols-outlined <?if($rate == 1){echo 'pressed';}?>">thumb_up</i> 
            </div>

            <div class="dislike">
                <i id="thumbdislike" class="material-symbols-outlined thumb <?if($rate == -1){echo 'pressed';}?>">thumb_down</i>
                <!-- <span class="dislike-count"><?=$post->getDislike() ?></span> -->
            </div>
            
            <div>
                <i class="material-symbols-outlined" id="bookmark">bookmark</i><span></span>
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