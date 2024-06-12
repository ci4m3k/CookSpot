<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>MAIN</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

        <main> 
           

            <div class="header"> 
                <div>
                    <h1 class="welcome-text">What would you like to cook today?</h1>
                </div>
                
                <?php include_once __DIR__ . '/shared/search-bar.php' ?>

            </div>

            <?php include_once __DIR__ . '/shared/display-posts.php' ?>
        </main  >
    </div>
    


</body>

</html>