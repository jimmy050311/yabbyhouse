<!doctype html>
<html lang="en">

@include('base.header')

<body>
<div class="preloader">
  <div class="layer"></div>
  <!-- end layer -->
  <div class="inner">
    <figure> <img src="images/preloader.gif" alt="Image"> </figure>
    <span>Site Loading</span> </div>
  <!-- end inner --> 
</div>
<!-- end preloader -->
<div class="page-transition">
  <div class="layer"></div>
  <!-- end layer --> 
</div>
<!-- end page-transition -->
<nav class="site-navigation">
  <div class="layer"></div>
  <!-- end layer -->
  <div class="inner">
    <ul data-splitting>
      <li><a href="/">HOME</a>
        <!-- <i class="fas fa-caret-down"></i> <small>First page</small>
        <ul>
        	<li><a href="/">HOME</a></li>
        </ul> -->
      </li>
      <li><a href="/studio">STUDIO</a> <small>All About Us</small> </li>
      <li><a href="/showcase">SHOWCASES</a> <small>Our all projects</small> </li>
      <li><a href="/blog">BLOG</a> <small>Recent posts</small> </li>
      <li><a href="/contact">CONTACT</a> <small>Say hello</small> </li>
    </ul>
  </div>
  <!-- end inner --> 
</nav>
<!-- end site-navigation -->
<div class="social-media">
  <div class="layer"> </div>
  <!-- end layer -->
  <div class="inner">
    <h5>Social Share </h5>
    <ul>
      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
      <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </div>
</div>
<!-- end social-media -->
<div class="all-cases">
  <div class="layer"> </div>
  <!-- end layer -->
  <div class="inner">
    <ul>
      <li><a href="#">Darkness</a></li>
      <li><a href="#">Goddes</a></li>
      <li><a href="#">Employee</a></li>
      <li><a href="#">Berry</a></li>
      <li><a href="#">Roosters</a></li>
      <li><a href="#">Primero</a></li>
    </ul>
  </div>
  <!-- end inner --> 
</div>
<!-- end all-cases -->
<main>
  <aside class="left-side">
    <div class="logo"> <a href="/"><img src="images/logo.png" alt="Image"></a> </div>
    <!-- end logo -->
    <div class="hamburger" id="hamburger">
      <div class="hamburger__line hamburger__line--01">
        <div class="hamburger__line-in hamburger__line-in--01"></div>
      </div>
      <div class="hamburger__line hamburger__line--02">
        <div class="hamburger__line-in hamburger__line-in--02"></div>
      </div>
      <div class="hamburger__line hamburger__line--03">
        <div class="hamburger__line-in hamburger__line-in--03"></div>
      </div>
      <div class="hamburger__line hamburger__line--cross01">
        <div class="hamburger__line-in hamburger__line-in--cross01"></div>
      </div>
      <div class="hamburger__line hamburger__line--cross02">
        <div class="hamburger__line-in hamburger__line-in--cross02"></div>
      </div>
    </div>
    <!-- end hamburger -->
    <div class="follow-us"> FOLLOW US </div>
    <!-- end follow-us -->
    <div class="equalizer"> <span></span> <span></span> <span></span> <span></span> </div>
    <!-- end equalizer --> 
  </aside>
  <!-- end left-side -->

  @yield('main')

</main>
@include('base.footer')
</body>
</html>