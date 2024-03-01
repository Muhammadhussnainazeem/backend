<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    </head>


<body> 


<?php

$link = mysqli_connect("localhost", "root", "", "School");

// Check connection
if ($link === false) {
    die("Connection failed: ");
}
?>

<h3>See all Students</h3>
	
		<table>
		
			<tr>
                <th width="150px">StudentID <br><hr></th>
				<th width="150px">StudentName <br><hr></th>
                <th width="250px">StudentAddress<br><hr></th>
                <th width="250px">StudentMedInfo<br><hr></th>
			</tr>
			</tr>
				
			<?php
			 $sql = mysqli_query($link, "SELECT StudentID,StudentName,StudentAddress,StudentMedInfo FROM students");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>

                <th>{$row['StudentID']}</th>
				<th>{$row['StudentName']}</th>
                <th>{$row['StudentAddress']}</th>
                <th>{$row['StudentMedInfo']}</th>






			</tr>";
			}
			?>
            </table>
        </body>
        </html>