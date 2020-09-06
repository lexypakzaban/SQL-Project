<!DOCTYPE html>
<html>
<head>
<title>Edit/Delete/Add</title>
<style type="text/css">

</style>
</head>
<body>
<?php
require("../db1_connector.php");
$command = $_REQUEST['command'];

if($command == "Delete")
{
	
	if (ISSET($_REQUEST['selection']))
	{
		$id = $_REQUEST['selection'];
		$query = "SELECT * FROM songs WHERE song_id = $id;";
		$query_result = mysqli_query($db_connection, $query);
		$row = mysqli_fetch_array($query_result);
		$title = $row['title'];
		$artist = $row['artist'];
		$album = $row['album'];
		$date = $row['release_date'];
		$color = $row['color'];
		
		echo("<form method = 'get' action = 'Songs.php'>\n");
		echo("<input type = 'hidden' name = 'song_id' value = '$id' />\n");
		echo("Are you sure you want to delete $title?\n");
		echo("<p><input type = 'submit' name = 'command' value = 'Cancel' />
					<input type = 'submit' name = 'command' value = 'Yes, Delete' /></p>\n");
		echo("</form>");
	}
	else 
	{ 
		echo("You need to select a song. <br /> <a href = 'Songs.php'>Return</a>");
	}
}

elseif($command == "Edit")
{
	if (ISSET($_REQUEST['selection']))
	{
		$id = $_REQUEST['selection'];
		$query = "SELECT * FROM songs WHERE song_id = $id;";
		$query_result = mysqli_query($db_connection, $query);
		$row = mysqli_fetch_array($query_result);
		$title = $row['title'];
		$artist = $row['artist'];
		$album = $row['album'];
		$date = $row['release_date'];
		$color = $row['color'];
			
		if($color == "pink")
		{
			$color = "HotPink";
		}
		
		elseif($color == "orange")
		{
			$color = "Tomato";
		}
		
		elseif($color == "yellow")
		{
			$color = "Gold";
		}
		
		elseif($color == "green")
		{
			$color = "LightGreen";
		}
		
		elseif($color == "blue")
		{
			$color = "LightSkyBlue";
		}
		
		elseif($color == "purple")
		{
			$color = "Plum";
		}
		
		echo('<form method="get" action="Songs.php">');
		echo("<input type = 'hidden' name = 'song_id' value = '$id' />\n");
		echo('<table class="center">');
		echo('<tr><td>Song</td><td><input type="text" name = "title" value="'.$title.'" /></td></tr>');
		echo('<tr><td>Artist</td><td><input type="text" name = "artist" value ="'.$artist.'" /></td></tr>');
		echo('<tr><td>Album</td><td><input type="text" name = "album" value ="'.$album.'" /></td></tr>');
		echo('<tr><td>Release Date</td><td><input type="number" min = 1 max = 2019 value ='.$date.' name = "release_date" />');
		echo('			</td></tr>');
		echo('<tr><td>Color</td><td>
		<input type="radio" name ="color" value="HotPink" />Pink<br />
		<input type="radio" name ="color" value="Tomato" />Orange<br />
		<input type="radio" name ="color" value="Gold" />Yellow<br />
		<input type="radio" name ="color" value="LightGreen" />Green<br />
		<input type="radio" name ="color" value="LightSkyBlue" />Blue<br />
		<input type="radio" name ="color" value="Plum" />Purple<br /></td></tr>');
		echo("<span style=\"background-color: ".$color."\">");
		echo('</table>');
		echo('<input type="submit" name="command" value="Cancel" />');
		echo('<input type="submit" name="command" value="Update" />');
		echo('</form>');
	}
	else 
	{ 
		echo("You need to select a song. <br /> <a href = 'Songs.php'>Return</a>");
	}
}

elseif($command == "Add")
{
	
	echo('<form method="get" action="Songs.php">');
	echo('<table class="center">');
	echo('<tr><td>Song</td><td><input type="text" name = "title" /></td></tr>');
	echo('<tr><td>Artist</td><td><input type="text" name = "artist" /></td></tr>');
	echo('<tr><td>Album</td><td><input type="text" name = "album" /></td></tr>');
	echo('<tr><td>Release Date</td><td><input type="number" min = 1 max = 2019 value = 1 name = "release_date" />');
	echo('			</td></tr>');
	echo('<tr><td>Color</td><td>
	<input type="radio" name ="color" value="HotPink" />Pink<br />
	<input type="radio" name ="color" value="Tomato" />Orange<br />
	<input type="radio" name ="color" value="Gold" />Yellow<br />
	<input type="radio" name ="color" value="LightGreen" />Green<br />
	<input type="radio" name ="color" value="LightSkyBlue" />Blue<br />
	<input type="radio" name ="color" value="Plum" />Purple<br /></td></tr>');
	echo('</table>');
	echo('<input type="submit" name="command" value="Cancel" />');
	echo('<input type="submit" name="command" value="Add" />');
	echo('</form>');
}	

?>
</body>
</html>