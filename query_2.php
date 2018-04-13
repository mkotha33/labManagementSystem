<?php
    require_once('functions/functions.php');
?>



<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <style type="text/css">
        .a {
            color: black;
            font-family: 'Oleo Script', cursive;
            font-size: 25px;
        }
        #c{
            margin-top: 10%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        input[type=submit]{
    background-color: #8B008B;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
    color: white;
            font-family: 'Oleo Script', cursive;
            font-size: 18px;
}
    </style>
</head>
<body background="http://ak8.picdn.net/shutterstock/videos/19123138/thumb/1.jpg" id="c">
    <center>
        <form method = "POST" action="">

            <p class="a"> 
            <?php                
                $res2 = $functions->nested_query_3();
                //echo "<script type='text/javascript'>window.location.href = 'http://localhost/chemistry_lab/';</script>";
            ?>
        </p>
           
        </form>
    </center>
    </body>
</html>