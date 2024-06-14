const likeButtons = document.querySelectorAll("#like");
const dislikeButtons = document.querySelectorAll("#dislike");


document.querySelectorAll(".like").forEach(button => {
    button.addEventListener("click", function () {
        //const likes = this.querySelector(".like-count");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        fetch(`/like/${id}`)
            .then(function () {
                //likes.innerHTML = parseInt(likes.innerHTML) ;
                if(document.querySelector('#thumblike.pressed') == null){
                    document.querySelector('#thumblike').classList.add('pressed');
                } else {
                    document.querySelector('#thumblike').classList.remove('pressed');
                }
                document.querySelector('#thumbdislike').classList.remove('pressed');
            });
    });
});

document.querySelectorAll(".dislike").forEach(button => {
    button.addEventListener("click", function () {
        //const dislikes = this.querySelector(".dislike-count");
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        fetch(`/dislike/${id}`)
            .then(function () {
                //dislikes.innerHTML = parseInt(dislikes.innerHTML) ;
                if(document.querySelector('#thumbdislike.pressed') == null){
                    document.querySelector('#thumbdislike').classList.add('pressed');
                } else {
                    document.querySelector('#thumbdislike').classList.remove('pressed');
                }
                
                document.querySelector('#thumblike').classList.remove('pressed');
            });
    });
});

likeButtons.forEach(button => button.addEventListener("click", giveLike));
dislikeButtons.forEach(button => button.addEventListener("click", giveDislike));

// function toggleColor(){
//     const thumb = this.querySelectorAll("#thumb");
//     thumb.classList.toggle("pressed");
// }