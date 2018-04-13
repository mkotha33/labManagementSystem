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
  .navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: right;
    margin-top: 18px;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<header>
  <nav>
    <span class="movetext">Company Name</span>
    <img src="laboratory.png" width="48px" height="48px">
    <a href="#portion1">Chem Issued</a>
    <a href="#portion2">Equip issued</a>
    <a href="#portion3">Issue Chemicals</a>
    <a href="#portion4">List of students who issued chemicals</a>
    <a href="#portion5">List of students who issued both chemicals and equipments</a>
    <a href="#portion6">list pf chemicals used</a>
    <a href="#portion7">Our view</a>
    <a href="#portion8">join_query 1</a>
    <a href="#portion9">join_query 2</a>
    <a href="#portion10">join_query 3q</a>
    <div class="dropdown">
    <button class="dropbtn">Account Settings 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <!--<a href="insert_student.php">Insert Student</a>-->
      <a href="update_student.php">Update Account</a>
      <a href="delete_account.php">Delete Account</a>
      <a href="http://localhost/chemistry_lab/">Log Out</a>
    </div>
  </div>
  </nav>
</header>

<div class="portion">
  <center>
  <h2><br> CHEMISTRY LAB MANAGEMENT SYSTEM</h2>
</center>
</div>



<div id="portion1" class="info">
  <h3>CHEMICALS ISSUED</h3>
  <p>We can find the chemicals issued by different students<br><br><br><br><br></p>
  <div class="button">
   <a href="student_record.php">Chemicals issued</a>
  </div>
</div>

<div class="portion two">
  <h2></h2>
</div>

<div id="portion2" class="info">
  <h3>EQUIPMENTS ISSUED</h3>
  <p>We can find the equipments issued by different students </p>
  <div class="button">

    <a href="student_record_equip.php">Equipments issued</a>
  </div>
</div>

<div class="portion">
  <h2></h2>
</div>

<div id="portion3" class="info">
  <h3>ISSUE CHEMICALS</h3>
  <p>We can issue the chemicals we desire here.</p>
  <div class="button">
    <a href="issue_of_chemicals.php">Issuing of Chemicals</a>
  </div>
</div>

<div class="portion two">
  <h2></h2>
</div>

<div id="portion4" class="info">
  <h3>LIST OF STUDENTS WHO ISSUED CHEMICALS</h3>
  <p>We can find the list of all the students who have issued various chemicals from the lab.</p>
  <div class="button">
    <!--<a href="delete_student.php">Delete Account</a><br><br>-->
    <a href="query_1.php">Students who have issued chemicals from the lab</a>
    <!--a href="query_1.php">Issuing of Chemicals</a-->
  </div>
</div>

<div class="portion two">
  <h2></h2>
</div>

<div id="portion5" class="info">
  <h3>LIST OF STUDENTS WHO ISSUED EQUIPMENTS and chemicals</h3>
  <p>We can find the list of all the students who have issued various equipments from the lab.</p>
  <div class="button">
    <!--<a href="delete_student.php">Delete Account</a><br><br>-->
    
<a href="query_2.php">List of students who have issued chemicals or equipments from the lab</a>
  </div>
</div>

<div class="portion two">
  <h2></h2>
</div>

<div id="portion6" class="info">
  <h3>LIST PF CHEMICALS ISSUED</h3>
  <p>We can find the list of the chemicals issued to all the students.</p>
  <div class="button">
    <!--<a href="delete_student.php">Delete Account</a><br><br>-->
    
   <a href="query_3.php">List of Chemicals issued</a>
  </div>
</div>
<div class="portion two">
  <h2></h2>
</div>

<div id="portion7" class="info">
  <h3>VIEW</h3>
  <p>The view we have used.</p>
  <div class="button">
    <a href="view_1.php">List of the Equipments issued to a student</a>
  </div>
</div>
<div class="portion two">
  <h2></h2>
</div>

<div id="portion8" class="info">
  <h3>JOIN QUERY 1</h3>
  <p><br><br><br><br><br></p>
  <div class="button">
    <center>
    <a href="join_query_1.php">join_query_1</a>
  </center>
  </div>
</div>

<div class="portion two">
  <h2></h2>
</div>

<div id="portion9" class="info">
  <h3>JOIN QUERY 2</h3>
  <p><br><br><br><br><br></p>
  <div class="button">
    <center>
    <a href="join_query_2.php">join_query_2</a>
  </center>
  </div>
</div>


<div class="portion two">
  <h2></h2>
</div>


<div id="portion10" class="info">
  <h3>JOIN QUERY 3</h3>
  <p><br><br><br><br><br></p>
  <div class="button">
    <center>
    <a href="join_query_3.php">join_query_3</a>
  </center>
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