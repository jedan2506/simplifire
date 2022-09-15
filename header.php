<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <div class="topnav">
    <img src="img/Christ_white.png" alt="Christ" height=70px width=200px align=right>
    <a href="index.php"><img src="img/logo.png" alt="Logo" height=40px width=40px valign=bottom style="margin-left:20px; margin-top:10px;"><label style="font-size:30px; font-family: Arial, Helvetica, sans-serif; color:white;">Simplifire</label></a>

            <form class="example" action="index.php" method="post" style="margin-left:190px; margin-bottom:10px; margin-top:-60px">
            <input type="text" placeholder="Search.." name="bar" id="bar">
            <button type="submit"><i class="fa-search"><img src="icons/search.svg" width="20" height="20" valign="middle"></i></button>
            </form>
              <!-- <form action='index.php' method='get'>
                <input type="submit" name="theme" id="theme" value="dark">
              </form> -->
    </div>
  <?php
      if(isset($_POST['bar']))
        {  
        $pagesearch=$_POST['bar'];
          if(strpos(' upload import insert data ',$pagesearch))
          echo "<script>window.open('upload.php','_self')</script>";
          else if(strpos(' show display view export csv report ',$pagesearch))
          echo "<script>window.open('show.php','_self')</script>";
          else if(strpos(' transport travel move go vehicle directions destination ',$pagesearch))
          echo "<script>window.open('transport.php','_self')</script>";
          else if(strpos(' covid corona test centre ',$pagesearch))
          echo "<script>window.open('covid19test.php','_self')</script>";
          else if(strpos(' book nurse assistance ',$pagesearch))
          echo "<script>window.open('bookanurse.php','_self')</script>";
          else if(strpos(' donation donate money ',$pagesearch))
          echo "<script>window.open('donation.php','_self')</script>";
          else if(strpos(' help desk remarks query problem review rating ',$pagesearch))
          echo "<script>window.open('helpdesk.php','_self')</script>";
          else if(strpos(' us euphoria about',$pagesearch))
          echo "<script>window.open('about.php','_self')</script>";
          else
          echo "<script>window.open('index.php','_self')</script>";
        }
  ?>
  
    <ul class="nav">
         
      <li class="nav"><a href="upload.php">Upload CSV</a></li>
        <li class="nav"><a href="show.php">Display</a></li>
        <li class="nav"><a href="indexpdf.php">Upload Proof</a></li>
        <li class="nav"><a href="showtable.php">View proofs</a></li>
        <li class="nav"><a href="index.php">Faculty</a></li>
        <li class="nav"><a href="conferenceshow.php">Conference</a></li>
        <li class="nav"><a href="index.php">Help Desk</a></li>
        <li class="nav"><a href="index.php">About Us</a></li>
    </ul>

    <br>
    <!-- <br><br> -->

</body>
<!-- </html> -->