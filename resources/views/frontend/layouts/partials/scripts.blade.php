 <!-- Vendor JS Files -->
 <script src="{{asset('frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
 <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
 <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
 <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>
 <script src="{{asset('assets/js/gallery.js') }}"></script>
<script>

if(window.innerWidth <= 768){
    document.getElementById('point').style.display = "none";
}else{
    document.addEventListener('mousemove', handleMouseMove);
}


function handleMouseMove(event) {
  const mouseX = event.clientX; // X position of the mouse cursor
  const mouseY = event.clientY; // Y position of the mouse cursor

  const point = document.getElementById('point'); // Replace with your actual element

  const offsetX = mouseX - 5 ; // X position relative to the element
  const offsetY = mouseY - 73; // Y position relative to the element

  applyTransform(point, offsetX, offsetY);
}

function applyTransform(element, offsetX, offsetY) {
  const transform = `translate(${offsetX}px, ${offsetY}px)`;
  element.style.transform = transform;
}



// Get elements
const playButton = document.getElementById('playButton');
const videoModal = document.getElementById('videoModal');
const closeButton = document.getElementById('closeButton');

// Show modal when play button is clicked
playButton.addEventListener('click', function() {
  videoModal.style.display = 'flex';
});

// Close modal when close button is clicked
closeButton.addEventListener('click', function() {
  videoModal.style.display = 'none';
});


</script>
 <!-- Template Main JS File -->
 <script src="{{asset('frontend/js/main.js')}}"></script>
