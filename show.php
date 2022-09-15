<?php
    $arr=[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <link rel="icon" type="image/x-icon" href="icons/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <title>Simplifire | Display</title>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }
        .overlay:target {
            visibility: visible;
            opacity: 1;
        }
        .wrapper {
            margin: 70px auto;
            padding: 20px;
            background: #e7e7e7;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }
        .wrapper h2 {
            margin-top: 0;
            color: #333;
        }
        .wrapper .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        .wrapper .close:hover {
            color: #06D85F;
        }
        .wrapper .content {
            max-height: 30%;
            overflow: auto;
        }
        /*form*/

        .container {
            border-radius: 5px;
            background-color: #e7e7e7;
            padding: 20px 0;
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #413b3b;
            color: #fff;
            padding: 15px 50px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .inputfield{
            border-radius: 12px;
            border:none;
            font-size: 12px; 
            font-weight: bold;
            padding: 12px 20px; 
            transition: transform 80ms ease-in;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.077), 0 17px 50px 0 rgba(0, 0, 0, 0.071);
            width: 200px; 
            text-align: center;
            background-color:#000000;
            color:white;
        }
        #tables{
            width: 160px;
        }

        th{
            color:white;
            background-color:rgba(145, 162, 255, 0.6);
        }

        th, td{
            border-bottom: 1px solid #ddd;
            /* border-top: 1px solid #ddd; */
            /* border: 2px solid white; */
            border-radius:5px;
            /* border-collapse: collapse; */
        }
        td{
            text-align: center;
        }

        .selection{
            margin-right:10px;
            margin-left:50px;
            margin-bottom:30px;
            padding: 20px;
        }
        td:hover {
            background-color: rgb(145, 162, 255);
            color:black;
        }

         @charset "UTF-8";

        .toggler-wrapper {
          display: block;
          width: 45px;
          height: 25px;
          cursor: pointer;
          position: relative;
        }

        .toggler-wrapper input[type="checkbox"] {
          display: none;
        }

        .toggler-wrapper input[type="checkbox"]:checked+.toggler-slider {
          background-color: #91a2ff;
        }

        .toggler-wrapper .toggler-slider {
          background-color: #ccc;
          position: absolute;
          border-radius: 100px;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          -webkit-transition: all 300ms ease;
          transition: all 300ms ease;
        }

        .toggler-wrapper .toggler-knob {
          position: absolute;
          -webkit-transition: all 300ms ease;
          transition: all 300ms ease;
        }

        .toggler-wrapper.style-1 input[type="checkbox"]:checked+.toggler-slider .toggler-knob {
          left: calc(100% - 19px - 3px);
        }

        .toggler-wrapper.style-1 .toggler-knob {
          width: calc(25px - 6px);
          height: calc(25px - 6px);
          border-radius: 50%;
          left: 3px;
          top: 3px;
          background-color: #fff;
        }

        .vertical{
            display:inline-block;
            padding-left:24px;
            padding-right:24px;
            margin-bottom:20px;
        }

    </style>
</head>

<body>
<?php include 'header.php' ?>
    <br>
        <form action="show.php" method="post">  
            
            <center>

            <input list="valueToSearch" name="valueToSearch" placeholder="Organised By" class="inputfield" style="color:white;color-scheme: dark;">
            <datalist id="valueToSearch">
                <option value=""></option>
                <option value="Microsoft" >Microsoft</option>
                <option value="Google" >Google</option>
                <option value="Amazon" >Amazon</option>
                <option value="Meta" >Meta</option>
                <option value="Lenova" >Lenova</option>
                <option value="Accenture" >Accenture</option>
            </datalist>

            <input type="Date" name="start" placeholder="Start" class="inputfield" style="color-scheme: dark; width:120px;">
            <input type="Date" name="end" placeholder="End" class="inputfield" style="color-scheme: dark; width:120px;">

            <input list="valueToSearch2" name="valueToSearch2" placeholder="Type" class="inputfield" style="color:white;color-scheme: dark;">
            <datalist id="valueToSearch2">
                <option value=""></option>
                <option value="Articles in periodicals">Articles in periodicals</option>
                <option value="Articles in Journals">Articles in Journals</option>
                <option value="Conference/Seminar/Symposium">Conference/Seminar/Symposium</option>
                <option value="Workshop/FDP/Training Programme">Workshop/FDP/Training Programme</option>
                <option value="Awards/Achievments/others">Awards/Achievments/others</option>
            </datalist>

            <label for="tables">&emsp;&emsp;Choose the Document : </label>
            <select class="inputfield" id="tables" name="table">
                        <?php
                            include('connect.php');
                            $quer="show tables";
                            $result = mysqli_query($con,$quer);
                            while($table = mysqli_fetch_array($result))
                            {
                                if(($table[0]<>"test1")AND(($table[0]<>"test2")))
                                 {
                                    $quer1="show columns from ".$table[0];
                                    $result1 = mysqli_query($con,$quer1);
                                    while($field = mysqli_fetch_array($result1))
                                    {
                                        if($field[0]=="type")
                                        {
                                            $val=$table[0];
                                ?>
                                 <option value="<?php echo($val)??''; ?>"><?php echo($val)??''; ?></option>
                           <?php }}}
                       }

                        ?>
                    </select>
                  
                    <br>
                    <p class="see">What do you want to see in your report?</p><br>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="organized">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Organized by</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="name">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Name</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="start">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Start Date</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="end">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">End Date</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="role">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Role</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="institute">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Institution</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="duration">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Duration</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="url">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">URL</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="type">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Type</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="level">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Level</div>
                    </div>

                    <div class = "vertical">
                        <label class="toggler-wrapper style-1">
                        <input type="checkbox" class = "selection"  name="selection[]" value="proof">
                        <div class="toggler-slider">
                            <div class="toggler-knob"></div>
                        </div>
                        </label>
                        <div class="badge">Proof</div>
                    </div>


<!--                <input type="checkbox" class="selection" name="selection[]" value="organized"><label>Organized by</label>
                    <input type="checkbox" class="selection" name="selection[]" value="name"><label>Name</label>
                    <input type="checkbox" class="selection" name="selection[]" value="start"><label>Start Date</label>
                    <input type="checkbox" class="selection" name="selection[]" value="end"><label>End Date</label>
                    <input type="checkbox" class="selection" name="selection[]" value="role"><label>Role</label>
                    <input type="checkbox" class="selection" name="selection[]" value="institute"><label>Institution</label>
                    <input type="checkbox" class="selection" name="selection[]" value="duration"><label>Duration</label>
                    <input type="checkbox" class="selection" name="selection[]" value="url"><label>URL</label>
                    <input type="checkbox" class="selection" name="selection[]" value="type"><label>Type</label>
                    <input type="checkbox" class="selection" name="selection[]" value="level"><label>Level</label>
                    <input type="checkbox" class="selection" name="selection[]" value="proof"><label>Proof</label> -->
                    
                    <br><input type="submit" name="search" value="Search" class="button1"><br><br><br>

            <table cellspacing="3px" cellpadding="12px">
                
                <?php

                if(isset($_POST['search']))
                {
                    $arr=[];
                    $count=0;
                    $val="";
                    $valueToSearch = $_POST['valueToSearch'];
                    $valueToSearch1 = $_POST['start'];
                    $valueToSearch2 = $_POST['valueToSearch2'];
                    $valueToSearch3 = $_POST['end'];
                    $table = $_POST['table'];
                    if(!empty($_POST['selection']))
                    {
                        foreach($_POST['selection'] as $checked)
                        {
                         $val=$val.$checked.",";
                         $arr[$count]=$checked;
                         $count=$count+1;
                        }
                        $val=substr($val,0,strlen($val)-1);

                        if(($valueToSearch=="")AND($valueToSearch1=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT $val FROM $table";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch1=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT $val FROM $table WHERE type= '$valueToSearch2'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch1=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT $val FROM $table WHERE organized= '$valueToSearch'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT $val FROM $table WHERE start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch2==""))
                        {
                            $query = "SELECT $val FROM $table WHERE start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch3=="")AND($valueToSearch2==""))
                        {
                            $query = "SELECT $val FROM $table WHERE organized= '$valueToSearch' AND start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch2=="")
                        {
                            $query = "SELECT $val FROM $table WHERE organized= '$valueToSearch' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT $val FROM $table WHERE type= '$valueToSearch2' AND start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch=="")
                        {
                            $query = "SELECT $val FROM $table WHERE type= '$valueToSearch2' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch1=="")
                        {
                            $query = "SELECT $val FROM $table WHERE organized= '$valueToSearch' AND type= '$valueToSearch2'";
                            $search_result = filterTable($query);
                        }
                        else
                        {
                            $query = "SELECT $val FROM $table WHERE organized= '$valueToSearch' AND type= '$valueToSearch2' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                    }

                    else
                    {
                        if(($valueToSearch=="")AND($valueToSearch1=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT * FROM $table";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch1=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT * FROM $table WHERE type= '$valueToSearch2'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch1=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT * FROM $table WHERE organized= '$valueToSearch'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch2=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT * FROM $table WHERE start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch2==""))
                        {
                            $query = "SELECT * FROM $table WHERE start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch3=="")AND($valueToSearch2==""))
                        {
                            $query = "SELECT * FROM $table WHERE organized= '$valueToSearch' AND start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch2=="")
                        {
                            $query = "SELECT * FROM $table WHERE organized= '$valueToSearch' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif(($valueToSearch=="")AND($valueToSearch3==""))
                        {
                            $query = "SELECT * FROM $table WHERE type= '$valueToSearch2' AND start ='$valueToSearch1'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch=="")
                        {
                            $query = "SELECT * FROM $table WHERE type= '$valueToSearch2' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                        elseif($valueToSearch1=="")
                        {
                            $query = "SELECT * FROM $table WHERE organized= '$valueToSearch' AND type= '$valueToSearch2'";
                            $search_result = filterTable($query);
                        }
                        else
                        {
                            $query = "SELECT * FROM $table WHERE organized= '$valueToSearch' AND type= '$valueToSearch2' AND start >='$valueToSearch1' AND start <='$valueToSearch3'";
                            $search_result = filterTable($query);
                        }
                    }
                    
                }

                function filterTable($query)
                {
                    include('connect.php');
                    $filter_Result = mysqli_query($con, $query);
                    return $filter_Result;
                }
                ?>

                <tr>
                    <?php
                        
                        if(count($arr)==0)
                        {
                    ?>
                <tr>
                    <th  style="width: 300px;" class="datalooks">Organized By</th>
                    <th  style="width: 300px;" class="datalooks">Name</th>
                    <th  style="width: 220px;" class="datalooks">Start Date</th>
                    <th  style="width: 220px;" class="datalooks">End Date</th>
                    <th  style="width: 300px;" class="datalooks">Role</th>
                    <th  style="width: 320px;" class="datalooks">Institute</th>
                    <th  style="width: 180px;" class="datalooks">Duration</th>
                    <th  style="width: 160px;" class="datalooks">URL</th>
                    <th  style="width: 320px;" class="datalooks">Type</th>
                    <th  style="width: 320px;" class="datalooks">Level</th>
                    <th  style="width: 180px;" class="datalooks">Proof</th>
                    <th  style="width: 100px;" class="datalooks">Upload</th>

                </tr>
                    <?php
                        }
                        else
                        {
                            for($i=0;$i<count($arr);$i++)
                            {
                    ?>
                    <th  style="width: 200px;"class="datalooks"><?php echo $arr[$i]??''; ?></th>
                    
                    <?php

                        if($arr[$i]=="proof")
                        {?>
                            <th  style="width: 200px;"class="datalooks"><?php echo "Upload" ??''; ?></th>
                        <?php
                        }
                            }
                        }
                    ?>
                </tr>

      <!-- populate table from mysql database -->
                <?php 
                if(isset($_POST['search']))
                { 
                while($row = mysqli_fetch_array($search_result)):?>
                <tr class="datalooks">
                    
                    <?php
                    if(isset($row['organized']))
                        {?>
                    <td><?php echo $row['organized']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['name']))
                        {?>
                    <td><?php echo $row['name']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['start']))
                        {?>
                    <td><?php echo $row['start']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['end']))
                        {?>
                    <td><?php echo $row['end']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['role']))
                        {?>
                    <td><?php echo $row['role']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['institute']))
                        {?>
                    <td><?php echo $row['institute']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['duration']))
                        {?>
                    <td><?php echo $row['duration']??''; ?></td>
                    <?php
                }?>


                    <?php
                    if(isset($row['url']))
                        {?>
                    <td><?php echo $row['url']??''; ?></td>
                    <?php
                }
                else if(isset($row['URL']))
                {
                ?><td><?php echo $row['URL']??''; ?></td>
                <?php
                }
                ?>

                    <?php
                    if(isset($row['type']))
                        {?>
                    <td><?php echo $row['type']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['level']))
                        {?>
                    <td><?php echo $row['level']??''; ?></td>
                    <?php
                }?>

                    <?php
                    if(isset($row['proof']))
                        {?>
                    <td><a href="showpdf.php?state=<?php echo $row['proof']; ?>"><?php echo $row['proof']; ?></a></td>
                    <?php
                }?>

                <?php
                    if(isset($row['proof']))
                        {?>
                <td ><div class="box1" >
                        <button class="upload-button"><a href="#divOne" style="text-decoration: none;">UPLOAD</a></button>
                    </div></td>
                    <?php
                }?>
                </tr>
                <?php endwhile;}?>
            </table></center> 
        </form>

        <div class="overlay" id="divOne">
        <div class="wrapper">
            <h2>Please Upload a File as Proof</h2><a class="close" href="#" style="color:#000000;">&times;</a>
            <div class="content">
                <div class="container">
                    <form method="POST" enctype="multipart/form-data" action="pdf.php">  
                        <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter the URL" style="color:#000000;" required>
                        </div>                           
                        <div class="form-group">
                            <input type="file" name="pdf_file" class="form-control" accept=".pdf" title="Upload PDF"  style="color:#000000;"/>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <input type="submit" class="btnRegister" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay" id="divTwo">
        <div class="wrapper">
            <h2>Please Upload a File as Proof</h2><a class="close" href="#" style="color:#000000;">&times;</a>
            <div class="content">
                <div class="container">
                    <form method="POST" enctype="multipart/form-data" action="pdf.php">  
                        <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter the URL" style="color:#000000;" required>
                        </div>                           
                        <div class="form-group">
                            <input type="file" name="pdf_file" class="form-control" accept=".pdf" title="Upload PDF"  style="color:#000000;"/>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <input type="submit" class="btnRegister" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <br><br><input type="button" value="Back" id="back" onclick="history.back()" class="button2" style="margin-left:40px;">
        <form method="post" action="export.php" align="right" style="margin-right:280px; margin-top:-35px;">
            <input type="submit" name="export" value="CSV Export" class="button1" />
            <input type="hidden" name="hidden1" value="<?php echo $table??'';?>" /> 
            <input type="hidden" name="hidden2" value="<?php echo $query??'';?>" /> 
        </form> 
        <form method="post" action="generate_pdf.php" align="right" style="margin-right:40px; margin-top:-43px;">
            <input type="submit" name="export" value="Generate Report" class="button1"/>
            <input type="hidden" name="hidden1" value="<?php echo $table??'';?>" /> 
            <input type="hidden" name="hidden3" value="<?php echo $val??'';?>" />
            <?php
            foreach($arr as $value)
            {
                ?>
                <input type="hidden" name="result[]" value="<?php echo $value??'';?>">
                <?php
            }
            ?>
            <input type="hidden" name="hidden2" value="<?php echo $query??'';?>" /> 
        </form>
    </body>
    </html>

