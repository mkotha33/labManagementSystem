<?php
    require_once('functions/Function_1.php');
    global $g, $res, $mid, $quant ;
    $g = 0;
    if(@$_POST["get_chem_id_added_to_the_table"])
    {

        $s_id = $_POST["id"];
        $quant = $_POST["quan"];
        $mid = $s_id;
        $res = $new_fun->get_chem_id_added_to_the_table($s_id);
        //echo $res;
        $g = (int)$res;
        //echo "---",$g;
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
            Chemical_id : <input type="number" name="id" id="id" required><br>
            Quantity : <input type="number" name="quan" id="quan" required><br><br>
            <input type="submit" name="get_chem_id_added_to_the_table" value="get quantity">
            </form>
            
            <?php    
                //echo "out"; 
                //echo $g; 
                if($g != 0){
                    //echo $mid, "<br>";
                    $res2 = $new_fun->get_user_id();
                    if($quant < $g)
                    {
                        $res21 = $new_fun->check_if_exists($mid, $res2);
                        //echo "<br>", $res21, "<br>";
                        $res211 = (int)$res21; 
                        if($res211)
                        {
                            //echo "in if";
                            $res11 = $new_fun->update_chem($quant, $g, $mid, $res2);    //---------(req),(avail),(cid),(stu id)---------//   
                        }
                        else{
                            //echo "in else";
                            $res12 = $new_fun->add_chemical($mid, $res2, 0);
                            $res11 = $new_fun->update_chem($quant, $g, $mid, $res2);    //---------(req),(avail),(cid),(stu id)---------//
                        }
                        $res22 = $new_fun->display_chem($res2);
                    }
                    else
                    {
                        echo "Not available.Choose quantity below available<br>";
                    }
                }
            ?>
        </p>
           
        </form>
    </center>
    </body>
</html>