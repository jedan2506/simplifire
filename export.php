<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $test=$_POST['hidden1'];
      echo '<script>alert("Welcome to Geeks for Geeks")</script>';
      $connect = mysqli_connect("localhost", "root", "", "testing");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename='.$test.'.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('organized', 'name', 'start', 'end', 'role', 'institute', 'duration', 'URL', 'type', 'level', 'proof'));  
      $query = $_POST['hidden2'];  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  