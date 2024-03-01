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

<h3>See all Parents</h3>
	
		<table>
		
			<tr>
				<th width="150px">ParentsID<br><hr></th>
                <th width="250px">ParentsName<br><hr></th>
                <th width="250px">ParentsAddress<br><hr></th>
                <th width="250px">ParentsEmail<br><hr></th>
                <th width="250px">ParentsTel<br><hr></th>
			</tr>
			</tr>
				
			<?php
			 $sql = mysqli_query($link, "SELECT ParentsID,ParentsName,ParentsAddress,ParentsEmail,ParentsTel FROM parents");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
      
				<th>{$row['ParentsID']}</th>
                <th>{$row['ParentsName']}</th>
                <th>{$row['ParentsAddress']}</th>
                <th>{$row['ParentsEmail']}</th>
                <th>{$row['ParentsTel']}</th>






			</tr>";
			}
			?>
            </table>
        </body>
        </html>