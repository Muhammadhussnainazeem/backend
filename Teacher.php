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

<h3>See all Teachers</h3>
	
		<table>
		
			<tr>
			<th width="150px">TeacherID <br><hr></th>
				<th width="150px">TeacherPhonenumber <br><hr></th>
				<th width="250px">TeacherAnnualsalary<br><hr></th>
                <th width="250px">Teacherbackgroundcheck<br><hr></th>
                <th width="250px">TeacherEmail<br><hr></th>
			</tr>
			</tr>
				
			<?php
			 $sql = mysqli_query($link, "SELECT TeacherID,TeacherPhonenumber,TeacherAnnualsalary,Teacherbackgroundcheck,TeacherEmail FROM teachers");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
			    <th>{$row['TeacherID']}</th>
				<th>{$row['TeacherPhonenumber']}</th>
				<th>{$row['TeacherAnnualsalary']}</th>
                <th>{$row['Teacherbackgroundcheck']}</th>
                <th>{$row['TeacherEmail']}</th>






			</tr>";
			}
			?>
            </table>
        </body>
        </html>