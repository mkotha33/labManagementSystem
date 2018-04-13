<?php
    require_once('functions/Function_1.php');
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
                $res2 = $new_fun->view_student();
                $ids = array();
                if($res2->num_rows > 0)
                {
                    while($data = $res2->fetch_assoc())
                    {
                        array_push($ids,$data);
                        //echo $data['name'];
                    }
                }
                //echo "ok1";
                foreach($ids as $id){
                    $res11 = $id['c_id'];
                    //echo $res11;
                    $res3 = $new_fun->get_equip_name($res11);
                    echo $res3,'-',$id['quantity'];
                    echo "<br>";
                //echo "ok";
                }
                //}
            ?>
        </p>
           
        </form>
    </center>
    </body>
</html>