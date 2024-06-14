<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

        <main> 
           

            <div class="header"> 
                <div>
                    <h1 class="welcome-text">Explore our Categories</h1>
                </div>
                
                <?php include_once __DIR__ . '/shared/search-bar.php' ?>

            </div>

<section class="posts categories">

    <?php foreach($categories as $category): ?>
        <div id="<?= $category->getIdCategory() ?>" >
            <img src="/img/category/<?= $category->getIdCategory()?>.jpg" alt="category image">
            <div class="category-desc">
                <h1><a href="categorypage?id=<?= $category->getIdCategory()?>"> <?= $category->getCategoryName() ?> </a></h1>
                <p class="category"> <?= $category->getCategoryDesc() ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    
</section>


        </main  >

    


</body>

</html>