window.addEventListener("load", function() {
    const loader = document.getElementById("loading");
    loader.classList.add("fade-out");

    setTimeout(function() {
        loader.style.display = "none";
    }, 500);
});