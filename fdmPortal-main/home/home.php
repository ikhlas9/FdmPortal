<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<script src="https://kit.fontawesome.com/c04efcf51c.js" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar">
		<div class="logo">
			<img src="logo1.png" alt="Logo">
		</div>
		<div class="login">
			<a href="../login.php">LOGIN</a>
		</div>
	</nav>
  
  
  <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="image7.png" style="width:100%">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter"> Bringing people and technology together</h3>
    </div>
  </div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="image5.jpg" style="width:100%">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter"> Bringing people and technology together</h3>
    </div>
  </div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="image6.jpg" style="width:100%">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter"> Bringing people and technology together</h3>
    </div>
  </div>
  
</div>

</div> 
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<div class="teams-box">
  <h2>Welcome to the FDM Employee Portal.</h2>
  
  <a href="../login.php">LOGIN</a>
</div>




<div class="Info_container">
  <div class="Info_box">
  <i class="fa-regular fa-circle-check fa-beat-fade" style="color: #32aeec; font-size:60px;"></i>
    <p>Complete all your self-service tasks in one place.</p>
    
  </div>
  <div class="Info_box">
  <i class="fa-regular fa-message fa-beat-fade" style="color: #32aeec; font-size:60px;"></i>
    <p>Communicate with other FDM Employees.</p>
    
  </div>
  <div class="Info_box">
  <i class="fa-regular fa-lightbulb fa-beat-fade" style="color: #32aeec; font-size:60px; "></i>
    <p>Access all essential FDM documents in one place.</p>
    
  </div>
  <div class="Info_box">
  <i class="fa-regular fa-newspaper fa-beat-fade" style="color: #32aeec;  font-size:60px;  "></i>
    <p>View all FDM announcements & news.</p>
    
  </div>
</div>



<footer>
<div class="footer">
<div class="footer_row">
<a href="https://www.facebook.com/FDMGroup/?locale=en_GB"><i class="fa fa-facebook" style="font-size: 30px;"></i></a>
<a href="https://www.instagram.com/fdm_group/?hl=en"><i class="fa fa-instagram" style="font-size: 30px;"></i></a>
<a href="https://www.youtube.com/channel/UCjJwDrCQPUVW18LLS6vM-qg"><i class="fa fa-youtube" style="font-size: 30px;"></i></a>
<a href="https://twitter.com/FDMGroup?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa fa-twitter" style="font-size: 30px;"></i></a>
</div>

<div class="footer_row">
<ul>
<li><a href="https://www.fdmgroup.com/contact/">Contact us</a></li>
<li><a href="https://www.fdmgroup.com/services/">Our Services</a></li>
<li><a href="https://www.fdmgroup.com/privacy/">Privacy Policy</a></li>
<li><a href="https://www.fdmgroup.com/terms-conditions/">Terms & Conditions</a></li>
<li><a href="https://www.fdmgroup.com/careers/">Career</a></li>
</ul>
</div>

<div class="footer_row">
FDM Copyright © 2023 FDM - All rights reserved || Designed By: GROUP52
</div>
</div>
</footer>


<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>


</body>

</html>
