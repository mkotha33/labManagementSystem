<?php
require_once('functions/functions.php');
$res = $functions->insert_equipment();

?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  
</style>
</head>
<header>
  <nav>
    <span class="movetext">Company Name</span>
    <img class="" src="flask2.png">
    <a href="#portion1" class="active">Portion1</a>
    <a href="#portion2">Portion2</a>
    <a href="#portion3">Portion3</a>
    <a href="#portion4">Account Settings</a>
  </nav>
</header>

<div class="portion">
  <center>
  <h2><br> CHEMISTRY LAB MANAGEMENT SYSTEM</h2>
</center>
</div>



<div id="portion1" class="info">
  <h3>Heading for Portion 1</h3>
  <p>In this lab management system,<br><br><br><br><br></p>
  <div class="button">
   <a href="student_record.php">Chemicals issued</a>
  </div>
</div>

<div class="portion two">
  <h2>Portion 2</h2>
</div>

<div id="portion2" class="info">
  <h3>Heading for Portion 2</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora pariatur voluptate laboriosam impedit praesentium sed, nihil, dignissimos et minima recusandae quaerat enim consectetur. Molestiae assumenda distinctio, rem nostrum dolores repellendus.</p>
  <div class="button">

    <a href="update_student.php">update or delete student</a>
  </div>
</div>

<div class="portion">
  <h2>Portion 3.</h2>
</div>

<div id="portion3" class="info">
  <h3>Heading for Portion 3.</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus in vitae saepe harum soluta reiciendis eaque repellat distinctio quos voluptate nemo error ratione numquam, nisi quibusdam veritatis repudiandae ea possimus rerum pariatur dolores? Optio inventore iusto, voluptatibus numquam aperiam, harum maxime beatae minima aliquam quas sapiente totam cumque unde..</p>
  <div class="button">
    <a href="student_record_equip.php">Equipments issued</a>
  </div>
</div>

<div class="portion two">
  <h2>Portion 4</h2>
</div>

<div id="portion4" class="info">
  <h3>Heading for Portion 4.</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni incidunt quos iste voluptates, tenetur ad repudiandae ea fuga eveniet quam, unde iure suscipit rem odit in, sint nulla itaque? Labore beatae, est voluptatibus saepe rerum illum repudiandae quasi perspiciatis, molestiae quidem fugiat voluptates voluptate neque totam earum enim mollitia iure quod tempora veritatis quam optio. Error odit laudantium eum voluptate.</p>
  <div class="button">
    <a href="delete_student.php">Delete Account</a><br><br>
    <a href="issue_of_chemicals.php">Issuing of Chemicals</a>
  </div>
</div>
<script>
// Smooth Scroll on clicking nav items
$('nav a').click(function () {
  var $href = $(this).attr('href');
  $('body').stop().animate({
    scrollTop: $($href).offset().top
  }, 1000);
  return false;
});

// back to top
$('#toTop a').click(function () {
  $('body').animate({
    scrollTop: 0
  }, 1000);
  return false;
});

// Parallaxing + add class active on scroll
$(document).scroll(function () {
  
  // parallaxing
  var $movebg = $(window).scrollTop() * -0.3;
  $('.portion').css('background-positionY', ($movebg) + 'px');

  // add class active to nav a on scroll
  var scrollPos = $(document).scrollTop() + 100;
  $('nav a').each(function () {
    var currLink = $(this);
    var refElement = $(currLink.attr("href"));
    if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
      $('nav a').removeClass("active");
      currLink.addClass("active");
    }
  });
  
  // changing padding of nav a on scroll
    if (scrollPos > 250) {
      $('nav a').addClass('small');
      $('nav img').addClass('move');
      $('nav span').removeClass('movetext');
    } else {
      $('nav a').removeClass('small');
      $('nav img').removeClass('move');
      $('nav span').addClass('movetext');
    }
  
});
</script>
</html>