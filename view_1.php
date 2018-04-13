<?php
    require_once('functions/functions.php');
    global $g, $res, $mid ;
    $g = 0;
    if(@$_POST["view_viewing"])
    {

        $s_id = $_POST["id"];
        //$mid = $s_id;
        //$res = $new_fun->view_viewing($s_id);
        $g = $s_id;
    }
    
?>



<html>
<head><link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <style type="text/css">
        .a {
            color: black;
            font-family: 'Oleo Script', cursive;
            font-size: 18px;
        }
        #c{
            margin-top: 10%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        input[type=submit]{
    background-color: #3F49A0;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
    color: white;
            font-family: 'Fira Sans', sans-serif;
            font-size: 18px;
}
    </style>
</head>
<body background="http://ak8.picdn.net/shutterstock/videos/19123138/thumb/1.jpg" id="c">
    <center>
        <form method = "POST" action="">
<p class="a"> 
            <form method = "POST" action="">
            Student id <input type="number" name="id" id="id" required><br>
            <input type="submit" name="view_viewing" value="get info about the equipments">
            </form>
            
            <?php      
                if($g != 0){
                    //echo $mid, "<br>";
                    $res1 = $functions->view_viewing($g); 
                }
                else
                {
                    echo " ";
                }
            ?>
        </p>
           
        </form>
    </center>
    </body>
</html>