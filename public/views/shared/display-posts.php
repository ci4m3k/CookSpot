
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link rel="stylesheet" type="text/css" href="public/css/post.css">



<section class="posts">
    <?php foreach($posts as $post): ?>
    <div id="<?= $post->getIdPost() ?>" >


        <img src="../public/uploads/<?= $post->getImage() ?>" alt="post image">
        <div>
            <div class="post-desc">
                <h1><a href="postpage?id=<?= $post->getIdPost() ?>"> <?= $post->getTitle() ?> </a></h1>
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

    
</section>