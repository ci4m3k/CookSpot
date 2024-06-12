<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add-post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>MAIN</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

        <main> 
           

            <div class="header">               
                <?php include_once __DIR__ . '/shared/search-bar.php' ?>
            </div>

            <section>
                <form action="adddetails" method="POST" enctype="multipart/form-data">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>
                
                <input type="text" class="input-text" placeholder="First name"  name="first_name">
                <input type="text" class="input-text" placeholder="Last name"  name="last_name">
                <h4></h4>
                <input type="text" class="input-text" placeholder="City"  name="city">
                <input type="text" class="input-text" placeholder="Street name"  name="street_name">
                <input type="text" class="input-text" placeholder="Street number"  name="street_address">
                <input type="text" class="input-text" placeholder="Postal code"  name="postal_code">
                <input type="text" class="input-text" placeholder="State"  name="state">
                <input type="text" class="input-text" placeholder="Country"  name="country">
                
            
                <button type="submit" class="input-text"> Submit </button>


                </form>
                

            </section>
        </main  >
    </div>
    


</body>

</html>