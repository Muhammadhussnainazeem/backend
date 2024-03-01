<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    </head>


<body> 


<?php

$link = mysqli_connect("localhost", "root", "", "st_alphonsus");

// Check connection
if ($link === false) {
    die("Connection failed: ");
}
?>

<h3>See all Class</h3>
	
		<table>
		
			<tr>
				<th width="150px">ClassID<br><hr></th>
                <th width="250px">ClassCapacity<br><hr></th>
                <th width="250px">ClassName<br><hr></th>
                <th width="250px">ClassYear<br><hr></th>
			</tr>
			</tr>
				
			<?php
			 $sql = mysqli_query($link, "SELECT ClassID,ClassCapacity,ClassName,ClassYear FROM class");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
      
				<th>{$row['ClassID']}</th>
                <th>{$row['ClassCapacity']}</th>
                <th>{$row['ClassName']}</th>
                <th>{$row['ClassYear']}</th>






			</tr>";
			}
			?>
            </table>
        </body>
        </html>