// Select all bookmark buttons
const bookmarkButtons = document.querySelectorAll("#bookmark");
console.log('bookmark0');
// Add click event listener to each bookmark button
    const button = document.querySelector(".bookmark");

    button.addEventListener("click", function () {
        const bookmarkText = this.closest('.bookmark-container').querySelector(".bookmark-text span");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");
        console.log('bookmark3');
        fetch(`/bookmarkpost/${id}`)
            .then(function () {
                console.log('bookmark4');

                // Toggle the class on the clicked bookmark element
                document.querySelector("#bookmark").classList.add('pressed');
                // Change the text inside the span element
                console.log('bookmark5');
                if (bookmarkText.innerText === "Bookmark") {
                    bookmarkText.innerText = "Bookmarked";
                } else {
                    bookmarkText.innerText = "Bookmark";
                }
            });
    });


// Assuming saveBookmark function is defined somewhere in your code, otherwise remove this line
//bookmarkButtons.forEach(button => button.addEventListener("click", saveBookmark));





