const likeButtons = document.querySelectorAll("#like");
const dislikeButtons = document.querySelectorAll("#dislike");

document.querySelectorAll(".like").forEach(button => {
    button.addEventListener("click", function () {
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");
        console.log('like');

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
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        console.log('dislike');
        fetch(`/dislike/${id}`)
            .then(function () {
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

