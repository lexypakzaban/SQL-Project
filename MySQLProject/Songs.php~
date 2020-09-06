<!DOCTYPE html>
<html>
<head>
<title>Songs</title>
<style type="text/css">
	table { border-spacing: 0;
			text-align: center;}
	td { border: 1px solid black;
		padding: 8px;}
	table.center {
		margin-left:auto; 
		margin-right:auto;}
</style>
</head>
<body>
<?php
require("../db1_connector.php");
// DECIDE WHAT THE COMMAND IS...
if(ISSET($_REQUEST['command']))
{
	$command = $_REQUEST['command'];
}

else 
{
	$command = "None";
}

	
//IF COMMAND IS "ADD"...
if($command == "Add")
{
	$title_to_add = $_REQUEST['title'];
	$artist_to_add = $_REQUEST['artist'];
	$album_to_add = $_REQUEST['album'];
	$date_to_add = $_REQUEST['release_date'];
	$color_to_add = $_REQUEST['color'];
	
	$add_query = "INSERT INTO songs (title, artist, album, release_date, color) VALUES ('$title_to_add', '$artist_to_add', '$album_to_add', $date_to_add, '$color_to_add');";
	$add_succeeded = mysqli_query($db_connection, $add_query);
}

// IF COMMAND IS "YES, DELETE"...
if($command == "Yes, Delete")
{
	$id = $_REQUEST['song_id'];
	$delete_query = "DELETE FROM songs WHERE song_id = $id ;";
	
	$delete_succeeded = mysqli_query($db_connection, $delete_query);
	if ($delete_succeeded == true)
	{
		echo("<p>Deleted.</p>\n");
	}
	
}
// IF COMMAND IS "UPDATE" ...
if($command == "Update")
{
	$id = $_REQUEST['song_id'];
	$title_to_change = $_REQUEST['title'];
	$artist_to_change = $_REQUEST['artist'];
	$album_to_change = $_REQUEST['album'];
	$date_to_change = $_REQUEST['release_date'];
	$color_to_change = $_REQUEST['color'];
	
	$change_query ="UPDATE songs SET title='$title_to_change', artist = '$artist_to_change',
						album = '$album_to_change', release_date = $date_to_change , color = '$color_to_change' WHERE song_id = '$id' ;";
	
	$change_succeeded = mysqli_query($db_connection, $change_query);
	if ($change_succeeded == true)
	{
		echo("<p>Updated.</p>\n");
	}
}
//------------ DISPLAY THE SONGS
$query = "SELECT * FROM songs";
$query_result = mysqli_query($db_connection, $query);
echo("<form method='get' action = 'edit_delete_add.php'>\n");
echo("<table class='center'>\n");
echo("<tr><th>Select</th><th>Song</th><th>Artist</th><th>Album</th><th>Release Date</th></tr>\n");
while($row=mysqli_fetch_array($query_result))
{
	$id = $row['song_id'];
	$title = $row['title'];
	$artist = $row['artist'];
	$album = $row['album'];
	$date = $row['release_date'];
	$color = $row['color'];
	
	echo("<tr style =\"background-color: ".$color."\"><td><input type='radio' name='selection' value='$id'></td><td>$title</td><td>$artist</td><td>$album</td><td>$date</td></tr>\n");
}
echo ("</table>");
echo("<input type = 'submit' name='command' value = 'Delete' />
		<input type = 'submit' name='command' value = 'Edit' />
		<input type = 'submit' name='command' value = 'Add' />\n");
echo("</form>\n");








?>
</body>
</html>