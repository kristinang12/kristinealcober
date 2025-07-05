document.getElementById("joinBtn").addEventListener("click", function() {
    alert("Hello! You clicked Join Now.");
});

document.getElementById("form-contact").addEventListener("submit", function() {
    setTimeout(function() {
        window.location.href = "index.html";
    }, 1000); // wait 1 second
});
