<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/19/2016 at 5:54 PM
 */


require '../../inc/parse_sql.php';
require '../../inc/config.php';


$db = new mysqli($conf['db']['host'],
    $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']);

if ($db->connect_errno) {
    echo "Oops, an error occurred
     while trying to connect to the signup servers and your request could not be processed!
     Please try again later!";

    exit(1);

}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup &lsaquo; InfiniaPress</title>
&#8203;
<style>
    html{
        font-family: "arial";
        color: white;
        text-align: center
    }
    body{
        background-color: #00ffec;
    }
    #heading{
        font-family: "Times New Roman";
        font-size: 90px;
    }
    #signup{
        border-radius: 50%;
        background-color: #00FF04;
        border-color: #00FF04;
        color: white;
        font-size: 40px;
        transition-duration: 0.4s;
        width: 25%;
        height: 80px;
    }
    #signup:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        background-color: red;
        border-color: red;
    }
    input, select {
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    label{
        font-size: 35px;
    }
</style>
</head>
<body>
<h1 id='heading'>SIGN UP FOR INFINIA PRESS</h1>
<div class="field">
<label for="name">Username: </label>
<input type="text" id="name" name="name" id="box" required>
</div>
<div class="field">
<label for="email">Email: </label>
<input type="text" id="email" name="email" id="box" required>
</div>
<div class="field">
<label for="password">Password: </label>
<input type="password" id="password" name="password" id="box" required></input>
</div>
<br>
<button id="signup">Sign up</button>
</body>
</html>

