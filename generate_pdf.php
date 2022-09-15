<?php
require('fpdf.php');

$query=$_POST['hidden2'];
$table=$_POST['hidden1'];
$colval=$_POST['hidden3'];

if(isset($_POST['result']))
{
$arr1=$_POST['result'];
class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Rect(5, 5, 200, 287, 'A');
    // Logo
    $this->Image('logo (1).png',10,15,38);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(40);
    // // Title
    // $this->Cell(30,15,'Title',1,0,'C');
    // $this->Ln();
    // $this->Cell(30, 15, 'Line 2', 1, 0, 'C');
    $this ->MultiCell(140,10,'CHRIST (Deemed to be University), Bangalore. Department: Computer Science, School of Sciences', 'LRTB', 'C', 0);
    $this->Cell(65);
    $this->SetFont('Times','BIU',15);
    $date_in = utf8_encode(strftime('%B %Y'));
    $this->Cell(90,10,'Activity Report of ' .$date_in,1,0,'C');
    // Line break
    $this->Ln(25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
Class dbObj
{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "testing";
    var $conn;
    function getConnstring() {
    $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    /* check connection */
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    } else {
    $this->conn = $con;
    }
    return $this->conn;
    }
}
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('organized'=>'Organized By', 'name'=> 'Name', 'start'=> 'Start','end'=> 'End','role'=> 'Role','institute'=> 'Institute','duration'=> 'Duration','url'=> 'URL','type'=> 'Type','level'=> 'Level');
$header = mysqli_query($connString, "SHOW columns FROM book1");
$pdf = new PDF();
$arr=array();
$count=0;
?>
<?php
$query=mysqli_query($connString, "SELECT * from book1");
while($row = mysqli_fetch_array($query))
{
    $check=0;
    $mem=$row['teacher'];
    if(count($arr)===0)
    {
        $counter=0;
        $member=$mem;
        $arr[$count]=$member;
        $count=$count+1;
        //echo $member."1";
        //$query1=mysqli_query($connString, "SELECT email,gender,country from members where first_name='$member'");
        $pdf->AddPage();
        //foter page
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial','BU',15);
        $pdf->Cell(60);
        $pdf->Cell(60,10,$member,1,0,'C');
        $pdf->Ln(15);
        $result = mysqli_query($connString, "SELECT $colval from book1 where teacher='$member'") or die("database error:". mysqli_error($connString));
        
        //header
        // $pdf->AddPage();
        // //foter page
        // $pdf->AliasNbPages();
        // $pdf->SetFont('Arial','B',12);
        $pdf->SetFont('Arial','B',12);
        foreach($arr1 as $heading) 
        {
            $pdf->Cell(38,12,$display_heading[$heading],1,0,'C');
        }
        $pdf->SetFont('Arial','I',10);
        foreach($result as $row2) 
        {
            $pdf->Ln();
            foreach($row2 as $column) 
                $pdf->Cell(38,12,$column,1,0,'C');
        }
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(18,'Analysis','http://www.fpdf.org');
        $pdf->SetFont('Arial','I',10);
        $pdf->Ln();
        $res=mysqli_query($connString,"SELECT count(*) as val,organized FROM $table where teacher='$member' group by organized");
        $st="1. Mr/Mrs ".$member." attended ";
        while($rows=mysqli_fetch_array($res))
        {
            if($rows['val']==1)
            {
                $st=$st.$rows['val']." event organized by ".$rows['organized'].", ";
            }
            else
            {
                $st=$st.$rows['val']." events organized by ".$rows['organized'].", ";
            }
        }
        $st=substr($st,0,strlen($st)-2).".";
        //$st= "1. Mr/Mrs ".$member." attended a total of ".$rows." events.";
        $pdf->MultiCell(190, 6,$st );
    }
    else
    {
        for($i=0;$i<$count;$i++)
        {
            if($arr[$i]==$mem)
            {
                $check=$check+1;
            }
        }
        if($check==0)
        {
            $member=$mem;
            $arr[$count]=$member;
            $count=$count+1;
            //echo $member."1";
            //$query1=mysqli_query($connString, "SELECT email,gender,country from members where first_name='$member'");
            $result = mysqli_query($connString, "SELECT $colval from book1 where teacher='$member'") or die("database error:". mysqli_error($connString));
            
            //header
            $pdf->AddPage();
            //foter page
            $pdf->SetFont('Arial','BU',15);
            $pdf->Cell(60);
            $pdf->Cell(60,10,$member,1,0,'C');
            $pdf->Ln(15);
            $pdf->AliasNbPages();
            $pdf->SetFont('Arial','B',12);
            foreach($arr1 as $heading) 
            {
                $pdf->Cell(38,12,$display_heading[$heading],1,0,'C');
            }
            $pdf->SetFont('Arial','I',10);
            foreach($result as $row2) 
            {
                $pdf->Ln();
                foreach($row2 as $column) 
                    $pdf->Cell(38,12,$column,1,0,'C');
            }
            $pdf->SetFont('Arial','B',14);
            $pdf->Write(18,'Analysis','http://www.fpdf.org');
            $pdf->SetFont('Arial','I',10);
            $pdf->Ln();
            $res=mysqli_query($connString,"SELECT count(*) as val,organized FROM $table where teacher='$member' group by organized");
        $st="1. Mr/Mrs ".$member." attended ";
        while($rows=mysqli_fetch_array($res))
        {
            if($rows['val']==1)
            {
                $st=$st.$rows['val']." event organized by ".$rows['organized'].", ";
            }
            else
            {
                $st=$st.$rows['val']." events organized by ".$rows['organized'].", ";
            }
        }
        $st=substr($st,0,strlen($st)-2).".";
        //$st= "1. Mr/Mrs ".$member." attended a total of ".$rows." events.";
        $pdf->MultiCell(190, 6,$st );
    }
        
    }

}
?>
<?php
$pdf->Output();
?>
<?php
}
else
{
class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Rect(5, 5, 200, 287, 'A');
    // Logo
     $this->Image('logo (1).png',10,15,38);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(40);
    // // Title
    // $this->Cell(30,15,'Title',1,0,'C');
    // $this->Ln();
    // $this->Cell(30, 15, 'Line 2', 1, 0, 'C');
    $this ->MultiCell(140,10,'CHRIST (Deemed to be University), Bangalore. Department: Computer Science, School of Sciences', 'LRTB', 'C', 0);
    $this->Cell(65);
    $this->SetFont('Times','BIU',15);
    $date_in = utf8_encode(strftime('%B %Y'));
    $this->Cell(90,10,'Activity Report of ' .$date_in,1,0,'C');
    // Line break
    $this->Ln(25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
Class dbObj{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "testing";
    var $conn;
    function getConnstring() {
    $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    /* check connection */
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    } else {
    $this->conn = $con;
    }
    return $this->conn;
    }
}
$db = new dbObj();
$connString =  $db->getConnstring();
$pdf = new PDF();
$arr=array();
$count=0;
?>
<?php
$query=mysqli_query($connString, "SELECT * from book1");
while($row = mysqli_fetch_array($query))
{
    $check=0;
    $mem=$row['teacher'];
    if(count($arr)===0)
    {
        $counter=0;
        $member=$mem;
        $arr[$count]=$member;
        $count=$count+1;
        //echo $member."1";
        //$query1=mysqli_query($connString, "SELECT email,gender,country from members where first_name='$member'");
        $pdf->AddPage();
        //foter page
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial','BU',15);
        $pdf->Cell(60);
        $pdf->Cell(60,10,$member,1,0,'C');
        $pdf->Ln(10);
        $result = mysqli_query($connString, "SELECT * from book1 where teacher='$member'") or die("database error:". mysqli_error($connString));
        
        //header
        // $pdf->AddPage();
        // //foter page
        // $pdf->AliasNbPages();
        // $pdf->SetFont('Arial','B',12);
        $pdf->SetFont('Arial','I',12);
        while($result1 = mysqli_fetch_array($result))
            {
                $counter=$counter+1;
                $pdf->Ln(8);
                $str=$counter.". Mr/Mrs ".$member." attended the event organized by ".$result1['organized']." from ".$result1['start']." to ".$result1['end']." for ".$result1['duration']." days. It was a ".$result1['type']." at ".$result1['level']." level and Mr/Mrs ".$member." was part of it as a ".$result1['role'].".";
                $pdf->MultiCell(190, 6, $str);
            }
    }
    else
    {
        for($i=0;$i<$count;$i++)
        {
            if($arr[$i]==$mem)
            {
                $check=$check+1;
            }
        }
        if($check==0)
        {
            $counter=0;
            $member=$mem;
            $arr[$count]=$member;
            $count=$count+1;
            //echo $member."1";
            //$query1=mysqli_query($connString, "SELECT email,gender,country from members where first_name='$member'");
            $result = mysqli_query($connString, "SELECT * from book1 where teacher='$member'") or die("database error:". mysqli_error($connString));
            
            //header
            $pdf->AddPage();
            //foter page
            $pdf->AliasNbPages();
            $pdf->SetFont('Arial','BU',15);
            $pdf->Cell(60);
            $pdf->Cell(60,10,$member,1,0,'C');
            $pdf->Ln(10);
            $pdf->SetFont('Arial','I',12);
            while($result1 = mysqli_fetch_array($result)) 
            {
                $counter=$counter+1;
                $pdf->Ln(8);
                $str=$counter.". Mr/Mrs ".$member." attended the event organized by ".$result1['organized']." from ".$result1['start']." to ".$result1['end']." for ".$result1['duration']." days. It was a ".$result1['type']." at ".$result1['level']." level and Mr/Mrs ".$member." was part of it as a ".$result1['role'].".";
                $pdf->MultiCell(190, 6, $str);
            }
        }
    }
}
$pdf->Output();
}
    ?>
