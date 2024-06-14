// Select all bookmark buttons
const bookmarkButtons = document.querySelectorAll("#bookmark");
console.log('bookmark0');
// Add click event listener to each bookmark button
    const button = document.querySelector(".bookmark");

    button.addEventListener("click", function () {
        const bookmarkText = this.closest('.bookmark-container').querySelector(".bookmark-text span");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        fetch(`/bookmarkpost/${id}`)
            .then(function () {
                
                if(document.querySelector('#bookmark.pressed') == null){
                    document.querySelector("#bookmark").classList.add('pressed');
                    bookmarkText.innerText = "Bookmarked";
                    bookmarkText.classList.add('pressed');
                } else {
                    document.querySelector("#bookmark").classList.remove('pressed');
                    bookmarkText.innerText = "Bookmark";
                    bookmarkText.classList.remove('pressed');
                }
            });
    });


// Assuming saveBookmark function is defined somewhere in your code, otherwise remove this line
//bookmarkButtons.forEach(button => button.addEventListener("click", saveBookmark));





