<?php
    require_once('functions/functions.php');
    

    if(@$_POST["login_student"])
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $res = $functions->login_student($email,$password);
    }
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
<body background="https://www.planwallpaper.com/static/images/violet-vector-leaves-circles-backgrounds-for-powerpoint_PdfkI4q.jpg" id="c">
    <center>
        <form method = "POST" action="">

            <p class="a"> 

            email : <input type="email" name="email" id="email" required><br>
            password:<input type="password" name="password" id="password" required><br>
        </p>
            <input type="submit" name="login_student" value="Login Student">
        </form>
    </center>
    </body>
</html>