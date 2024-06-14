document.addEventListener("DOMContentLoaded", function() {
    const nav = document.querySelector("nav");
    const main = document.querySelector("main");
    const toggleButton = document.querySelector("#toggleNavButton");

    toggleButton.addEventListener("click", function() {
        if (nav.style.display === "none" || nav.style.display === "") {
            nav.style.display = "block";
            main.classList.remove("mainToggle");
        } else {
            nav.style.display = "none";
            main.classList.add("mainToggle");
        }
    });
});