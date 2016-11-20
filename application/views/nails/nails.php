<?php
    $resources = $this->config->item('resources');
?>




<article>

<h3 style="color: salmon">Nail Art</h3>

<p>
  
 Pictured here are some of my fav nail creations. I thoroughly enjoy relaxing with some varnishes and decals and putting together some designs. Plus, having nice nails makes me feel good about myself. I also don't mind theming my nails according to holidays, as you can see. Hopefully more pics to come!
 
</p>


<section style="width:600px; margin:0 auto;">

<div class="slideshow-container">
 

  <div class="mySlides fade">
    <div class="numbertext">1 / 10</div>
    <img src="<?php echo $resources;?>images/flowers.jpg">
    <div class="text">Pink Flowers</div>
  </div> 

  <div class="mySlides fade">
    <div class="numbertext">2 / 10</div>
    <img src="<?php echo $resources;?>images/beeflowers.jpg">
    <div class="text">Spring Bees and Flowers</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 10</div>
    <img src="<?php echo $resources;?>images/valentines.jpg">
    <div class="text">Valentines Day</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 10</div>
    <img src="<?php echo $resources;?>images/halloween.jpg">
    <div class="text">Halloween</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 10</div>
    <img src="<?php echo $resources;?>images/bees.jpg">
    <div class="text">Bees and Flowers</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">6 / 10</div>
    <img src="<?php echo $resources;?>images/leaves.jpg">
    <div class="text">Autumn Leaves</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">7 / 10</div>
    <img src="<?php echo $resources;?>images/mariokart.jpg">
    <div class="text">Mario Kart</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">8 / 10</div>
    <img src="<?php echo $resources;?>images/music.jpg">
    <div class="text">Music and Piano Keys</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">9 / 10</div>
    <img src="<?php echo $resources;?>images/christmas.jpg">
    <div class="text">Christmas</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">10 / 10</div>
    <img src="<?php echo $resources;?>images/greyflowers.jpg">
    <div class="text">Silver Flowers</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
  <span class="dot" onclick="currentSlide(7)"></span>
  <span class="dot" onclick="currentSlide(8)"></span>
  <span class="dot" onclick="currentSlide(9)"></span>
  <span class="dot" onclick="currentSlide(10)"></span>
</div>

<style>

/* Slideshow container */
.slideshow-container {
  position: relative;
}

/* Changes nav text colour */

nav a {
  color: #F1948A;
}
nav a:hover {
  color: #EC7063;
}

nav a:before {
  color: #F1948A;
}

nav a:after {
      border-color: transparent transparent transparent #F1948A !important;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  margin-left: 0px;
  padding: 8px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  }

/* Position the "next button" to the right */
.next {
  right: 0%;
  border-radius: -3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

</style>

<script type="text/javascript">
  
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

</script>

</section>

</article>
