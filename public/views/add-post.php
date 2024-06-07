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
        <link rel="stylesheet" type="text/css" href="public/css/add-post.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    
    <title>MAIN</title>
</head>

<body>
    <div class="base-container" id="bimg" >
        <nav>
            <img src="/img/logo2.png" alt="LOGO ALT">
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
                <div class="background-border">
                    <div class="search-bar button">
                        <form>
                            <input placeholder=" Search ">
                        </form>
                    </div>
                </div>

            </div>
            <section>
                <form action="addpost" method="POST" enctype="multipart/form-data">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>

                <input type="text" class="input-text" placeholder="Title"  name="title">
                <textarea name="description" rows="5" placeholder="Description"></textarea>
                <textarea name="ingredients" rows="10" placeholder="ingredients"></textarea>
                <textarea name="recipe" rows="10"  placeholder="recipe"></textarea>
                <input type="file" name="image" class="input-text" >

                <div class="lists">
                    <select name="difficulty" class="input-text">
                        <option value="empty">Dificulty level</option>
                        <option value="easy">easy</option>
                        <option value="medium">medium</option>
                        <option value="hard">hard</option>
                    </select>

                    <select name="prep_time" class="input-text">
                        <option value="empty">Preparation time</option>
                        <option value="5min">5 minutes</option>
                        <option value="10min">10 minutes</option>
                        <option value="15min">15 minutes</option>
                        <option value="20min">20 minutes</option>
                        <option value="30min">30 minutes</option>
                        <option value="45min">45 minutes</option>
                        <option value="1h">1 hour</option>
                        <option value="1,5h">1 hour 30 minutes</option>
                        <option value="2h">2 hours</option>
                        <option value="2,5h">2 hours 30 minutes</option>
                        <option value="3h">3 hours</option>
                        <option value="<3h">more than 3 hours</option>
                    </select>

                    <select name="number_of_servings"  class="input-text">
                        <option value="empty" >Number of servings </option>
                        <option value="1" >For 1 </option>
                        <option value="2" >For 2 </option>
                        <option value="3" >For 3 </option>
                        <option value="4" >For 4 </option>
                        <option value="5" >For 5 </option>
                        <option value="6" >For 6 </option>
                        <option value="7" >For 7 </option>
                        <option value="8" >For 8 </option>
                        <option value="9" >For 9 </option>
                        <option value="10" >For 10 </option>
                        <option value="11" >For 11 </option>
                        <option value="12" >For 12 </option>
                        <option value="13" >For 13 </option>
                        <option value="14" >For 14 </option>
                        <option value="15" >For 15 </option>
                        <option value="16" >For 16 </option>
                        <option value="17" >For 17 </option>
                        <option value="18" >For 18 </option>
                        <option value="19" >For 19 </option>
                        <option value="20" >For 20 </option>
                    </select>


                </div>
            
                <button type="submit" class="input-text"> Submit </button>


                </form>
                

            </section>
        </main  >
    </div>
    


</body>

</html>