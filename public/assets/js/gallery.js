const galleryItems = document.querySelectorAll('.gallery-item');

// Loop through each gallery item and add a click event listener
galleryItems.forEach((item) => {
  item.addEventListener('click', () => {
    // Toggle a CSS class to make the image appear smaller
    item.classList.toggle('smaller');
  });
});