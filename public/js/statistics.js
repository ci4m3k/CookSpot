const likeButtons = document.querySelectorAll("#like");
const dislikeButtons = document.querySelectorAll("#dislike");


document.querySelectorAll(".like").forEach(button => {
    button.addEventListener("click", function () {
        const likes = this.querySelector(".like-count");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        fetch(`/like/${id}`)
            .then(function () {
                likes.innerHTML = parseInt(likes.innerHTML) + 1;
            });
    });
});

document.querySelectorAll(".dislike").forEach(button => {
    button.addEventListener("click", function () {
        const dislikes = this.querySelector(".dislike-count");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        fetch(`/dislike/${id}`)
            .then(function () {
                dislikes.innerHTML = parseInt(dislikes.innerHTML) + 1;
            });
    });
});

likeButtons.forEach(button => button.addEventListener("click", giveLike));
dislikeButtons.forEach(button => button.addEventListener("click", giveDislike));