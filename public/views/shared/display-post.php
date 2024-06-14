
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link rel="stylesheet" type="text/css" href="public/css/post-page.css">

<script type="text/javascript" src="./public/js/statistics.js" defer></script>
<script type="text/javascript" src="./public/js/bookmarks.js" defer></script>



<section class="posts rate book">
    <div id="<?= $post->getIdPost() ?>">
        <div class="post-content">
            <img src="/public/uploads/<?= $post->getImage() ?>" alt="post image">
            <!-- <img src="/img/pizza.jpg" alt="post image"> -->

            <div class="post-icons">
                <div>
                    <i class="material-symbols-outlined">account_circle</i>
                    <!-- <span><?= $post->getUserOwner()?></span> -->
                </div>

                <span><?= $post->getUserOwner()?></span>
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
            <div class="likes-dislikes">
                <div class="like" >
                    <i id="thumblike" class="material-symbols-outlined hover <?if($rate == 1){echo 'pressed';}?>">thumb_up</i> 
                </div>

                <div class="dislike">
                    <i id="thumbdislike" class="material-symbols-outlined thumb hover <?if($rate == -1){echo 'pressed';}?>">thumb_down</i>
                </div>
            </div>
            
            <div class="bookmark-container">

                 <div class="bookmark-text">
                    <span id="bookmark-text" class="<?if($book){echo 'pressed';}?>"><?if($book){echo 'Bookmarked';}else{echo 'Bookmark';}?></span>
                </div>

                <div class="bookmark">
                    <i class="bookmark material-symbols-outlined hover <?if($book){echo 'pressed';}?>" id="bookmark">bookmark</i>
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