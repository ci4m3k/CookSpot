
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <script type="text/javascript" src="./public/js/nav.js" defer></script>

<nav>
            <img src="/img/logo3.png" alt="LOGO ALT">
            <ul>
                <li>
                    <a href="/mainpage" class="button">Home</a>
                </li>
                <li>
                    <a href="/explore" class="button">Explore</a>
                </li>
                <li>
                    <a href="bookmarks" class="button">Bookmarks</a>
                </li>
                <li>
                    <a href="/myprofile" class="button">My Profile</a>
                </li>
                <li>
                    <a href="/addpost" class="button">Add Post</a>
                </li>
                <?

                if(isAdmin()){
                    echo '
                        <li>
                            <a href="/dislikedposts" class="button">Disliked Posts</a>
                        </li>
                    ';
                }
                
                ?>
                <li class="end">
                    <a href="/logout" class="button">Logout</a>
                </li>
            </ul>

        </nav>

        <button id="toggleNavButton">MENU</button>
