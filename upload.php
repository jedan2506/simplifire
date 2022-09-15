<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "testing";
try {
   
    $con = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplifire | Upload</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    *{
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    html{
        scroll-behavior: smooth;
    }

    .left-menu {
        margin-top:30px;
        margin-left:80px;
        display: flex;
        flex-wrap: nowrap;
        height: 580px;
        width:300px;
        background-color: rgba(0, 0, 0, 0.9);
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.077), 0 17px 50px 0 rgba(0, 0, 0, 0.071);
        border-radius: 10px;
        margin-bottom : 3px;
        }
    
        .center-menu {
        margin-top:30px;
        margin-left:30px;
        text-align: right;
        display: block;
        flex-wrap: nowrap;
        height: 460px;
        width:700px;
        border-radius: 10px;
        }

        .center-menu > .btn {
        text-align: center;
        height: 485px;
        width:700px;
        background-color: rgba(0, 0, 0, 0.9);
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.077), 0 17px 50px 0 rgba(0, 0, 0, 0.071);
        border-radius: 10px;
        border:0px;
        margin-bottom:20px; 
        }

        #btn1{
        margin-top: 15px;
        height: 45px;
        width:120px;
        margin-left: 20px;
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.9);
        }

        #import{
        margin-top: 15px;
        color:black;
        font-weight: bold;
        font-size:18px;
        height: 45px;
        width:120px;
        margin-left: 20px;
        display: inline-block;
        background-color:#90A2FF;
        }


        .right-menu {
        margin-top:30px;
        margin-left:30px;
        display: block;
        flex-wrap: nowrap;
        height: 480px;
        width:200px;
        border-radius: 10px;
        }

        .right-menu > .box {
        flex-wrap: nowrap;
        height: 170px;
        width:200px;
        background-color: rgba(145, 162, 255, 0.6);
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.077), 0 17px 50px 0 rgba(0, 0, 0, 0.071);
        border-radius: 10px;
        margin-bottom:30px;
        }

        #box2{
            background-color: rgba(91, 91, 91, 0.6);
        }

        #box3{
            background-color: rgba(0, 0, 0, 0.6);
        }
        .choose{
            background-color: rgba(91, 91, 91, 0.6);
        }

        #message{
            background-color:offwhite;
            color:black;
        }



    /* .flex-container > div {
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.096), 0 17px 50px 0 rgba(0, 0, 0, 0.063);
        width: 300px;
        margin: 15px;
        vertical-align: bottom;
        text-align: center;
        line-height: 75px;
        font-size: 16px;
        transition-duration: 0.4s;
    } */

    </style>
</head>
<body bgcolor=#262626>

    <?php include 'header.php' ?>

    
    <div style = "display: flex;">
    <br>
        <div class="left-menu">
        </div>

        <div class="center-menu">

            <div class="btn">
            <span id="message"></span>
            <form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <br>
            <p class="upload-text" style="font-size:24px;">Please Upload your data file here</p>

            <input type="file" name="file" id="file" accept=".csv" style="margin-left:80px"/>
            <input type="text" id="type">
                <div class="form-group" align="center">
                <input class="choose" type="hidden" name="hidden_field" value="1" />
                </div>
            
            </div>
                <input type="submit" class="button1" name="import" id="import" value="Import"/>
    
            </form>
        </div>

        <div class="right-menu">
            <div class="box">
            </div>
            <div class="box" id="box2">
            </div>
            <div class="box" id="box3">
            </div>
        </div>
    </div>
</body>
</html>

<script>

 $(document).ready(function()
 {
     
   $('#sample_form').on('submit', function(event)
   {
    var type = document.getElementById("type").value;
    if(type=="conference")
    {
        $('#message').html('');
        event.preventDefault();
        $.ajax({
        url:"conimport.php",
        method:"POST",
        data: new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        success:function(data)
        {
            $('#message').html('<div class="alert alert-success">'+data.success+'</div>');
            $('#sample_form')[0].reset();
        }
       })
    }
    else
    {
        $('#message').html('');
        event.preventDefault();
        $.ajax({
        url:"import.php",
        method:"POST",
        data: new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        success:function(data)
        {
            $('#message').html('<div class="alert alert-success">'+data.success+'</div>');
            $('#sample_form')[0].reset();
        }
       })
    }
  });
 });
</script>
