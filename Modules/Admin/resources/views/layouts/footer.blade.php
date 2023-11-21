<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p></p>
        </div>
        <div class="float-end">
            <p>Created by <a href="">Jaspreet Singh</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="{{asset('js/admin/assets/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/admin/assets/js/bootstrap.bundle.min.js')}}"></script>
   
     @section('addscript')
    @show
<!-- <script src="{{asset('js/admin/assets/js/main.js')}}"></script> -->
<script>
        // Get all elements with class "auto-close"
const autoCloseElements = document.querySelectorAll(".auto-close");

// Define a function to handle the fading and sliding animation
function fadeAndSlide(element) {
  const fadeDuration = 500;
  const slideDuration = 500;
  
  // Step 1: Fade out the element
  let opacity = 1;
  const fadeInterval = setInterval(function () {
    if (opacity > 0) {
      opacity -= 0.1;
      element.style.opacity = opacity;
    } else {
      clearInterval(fadeInterval);
      // Step 2: Slide up the element
      let height = element.offsetHeight;
      const slideInterval = setInterval(function () {
        if (height > 0) {
          height -= 10;
          element.style.height = height + "px";
        } else {
          clearInterval(slideInterval);
          // Step 3: Remove the element from the DOM
          element.parentNode.removeChild(element);
        }
      }, slideDuration / 10);
    }
  }, fadeDuration / 10);
}

// Set a timeout to execute the animation after 5000 milliseconds (5 seconds)
setTimeout(function () {
  autoCloseElements.forEach(function (element) {
    fadeAndSlide(element);
  });
}, 2000);
    </script>
</body>
</html>