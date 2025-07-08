document.getElementById("joinBtn").addEventListener("click", function() {
    alert("Hello! You clicked Join Now.");
});

const modal = document.getElementById("modal");
const modalImg = document.getElementById("modal-img");
const previewImg = document.getElementById("preview-img");
const closeBtn = document.getElementById("close");

previewImg.onclick = () => {
  modal.style.display = "block";
  modalImg.src = previewImg.src;
};

closeBtn.onclick = () => {
  modal.style.display = "none";
};
