<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="design.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simplifire | Proofs</title>
	<link rel="stylesheet" href="style.css">
	<style>
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
        }
        tr:hover {
            background-color: rgb(145, 162, 255);
            color:black;
            .
        }
	</style>
</head>
<body>
	<?php include 'header.php'?>
	<div class="card-body">
	<div class="table-responsive">
		<center>
		<br><br>
		<table cellspacing="3px" cellpadding="12px">
			<thead>
				<th class="datalooks">ID</th>
				<th class="datalooks">UserName</th>
				<th class="datalooks">FileName</th>
			</thead>
			<tbody>
				<?php
					include 'connectpdf.php';
					$selectQuery = "select * from pdf_data";
					$squery = mysqli_query($con, $selectQuery);
					
					while (($result = mysqli_fetch_assoc($squery))) {
				?>
				<tr>
				<td><?php echo $result['id']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><a href="showpdf.php?state=<?php echo $result['filename']; ?>"><?php echo $result['filename']; ?></a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		</center>			
	</div>
</div>

</body>
</html>

