const sizeElements = document.querySelectorAll('.size');

function handleSizeClick(event) {
  // Loại bỏ lớp 'selected' khỏi tất cả các ô size
  sizeElements.forEach((sizeElement) => {
    sizeElement.classList.remove('selected');
  });

  // Thêm lớp 'selected' vào ô size được click
  event.target.classList.add('selected');
}

// Gán sự kiện click cho mỗi ô size
sizeElements.forEach((sizeElement) => {
  sizeElement.addEventListener('click', handleSizeClick);
});
function showSuccessMessage() {
var overlay = document.getElementById("overlay");
var successMessage = document.getElementById("successMessage");
overlay.style.opacity = "1";
overlay.style.pointerEvents = "auto";
successMessage.style.display = "block";
setTimeout(function() {
overlay.style.opacity = "0";
overlay.style.pointerEvents = "none";
successMessage.style.display = "none";
}, 2000);
}