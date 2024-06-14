<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>

    <link rel="stylesheet" type="text/css" href="public/css/my-profile.css">
    
    
    <title>MY PROFILE</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <?php include_once __DIR__ . '/shared/nav.php' ?>

        <main> 
           
            <div class="header"> 
                <div>
                    <h1 class="welcome-text">My Profile</h1>
                </div>
                
                

            </div>

            <section class="details">

                 <div class="user details">
                    <h3>your account </h3>
                    <p>username:    <?= $user->getUsername()?></p>
                    <p>email:       <?= $user->getEmail()?></p>
                    <a href="changeusername" class="button details">Change Username</a>
                    <a href="changeemail" class="button details">Change Email</a>
                    <a href="changepassword" class="button details">Change Password</a>


                </div>

                <div class="userdetails details">
                    
                    <?
                    if(!$userdetails){
                        echo "<p>Your account doen't have details</p>";
                        echo '<a href="adddetails" class="button details">Add Details</a>';
                    } else{
                        ?>

                    <h3>your details</h3>
                    <p>first name:  <?= $userdetails->getFirstName()?></p>
                    <p>last_name:   <?= $userdetails->getLastName()?></p>
                    <p>city:        <?= $userdetails->getCity()?></p>
                    <p>street:      <?= $userdetails->getStreetName()?></p>
                    <p>street num:  <?= $userdetails->getStreetAddress()?></p>
                    <p>postal code: <?= $userdetails->getPostalCode()?></p>
                    <p>state:       <?= $userdetails->getState()?></p>
                    <p>country:     <?= $userdetails->getCountry()?></p>
                    <a href="adddetails" class="button details">Add/Change Details</a>
                    <?
                    }
                    ?>

                    

                </div>

            </section>

       



            <?php include_once __DIR__ . '/shared/display-posts.php' ?>


        </main  >
    </div>
    


</body>

</html>