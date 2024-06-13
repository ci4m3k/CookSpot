const search = document.querySelector('input[placeholder=" Search "]');
const postContainer = document.querySelector(".posts");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (posts) {
            postContainer.innerHTML = "";
            loadPosts(posts)
        });
    }
});

function loadPosts(posts) {
    posts.forEach(post => {
        console.log(post);
        createPost(post);
    });
}

function createPost(post) {

    const template = document.querySelector("#post-template");
    const clone = template.content.cloneNode(true);

    const title = clone.querySelector("#title-t");
    title.innerHTML = post.title;

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${post.image}`;

    //TODO replace that
    const username = clone.querySelector("#username-t");
    username.innerHTML = post.title;

    const desc = clone.querySelector("#desc-t");
    desc.innerHTML = post.description;

    const diff = clone.querySelector("#diff");
    diff.innerHTML = post.difficulty;

    const time = clone.querySelector("#time");
    time.innerHTML = post.prep_time;

    const ser_num = clone.querySelector("#ser_num");
    ser_num.innerHTML = post.number_of_servings;



    postContainer.appendChild(clone);

}
