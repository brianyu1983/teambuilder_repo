<html>
	<head>
		<title>People Management</title>
	</head>
	<body>
	<?php
		require_once 'db_connect.php';
		
		if ($mode == 'add') 
		{
			Print '<h2>Add a person</h2>
					<p> 
					<form action=';
			echo $PHP_SELF; 
			Print 'method=post> 
					<table>
						<tr><td>Name:</td><td><input type="text" name="name" /></td></tr>
						<tr><td>Email:</td><td><input type="text" name="email" /></td></tr> 
						<tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
						<input type=hidden name=mode value=added/>
					</table> 
					</form> <p>';
		} 
		 
		if ( $mode == 'added') 
		{
			mysql_query("INSERT INTO people (name, email) VALUES ('$name', '$email')");
		}
		
		//Retrive all records from people table
		$data = mysql_query("SELECT * FROM people") or die(mysql_error());
		Print '<h2>People</h2><p>' .
				'<table border cellpadding=3>' . 
					'<tr>' .
						'<th width=20>ID</th>' .
						'<th width=100>Name</th>' .
						'<th width=200>Email</th>' .
					'</tr>' .
					'<td colspan=3 align=right>' .
						'<a href=' . $_SERVER['PHP_SELF'] . '?mode=add>Add a person</a>' .
					'</td>';
		while ($person = mysql_fetch_array($data))
		{
			Print '<tr>' .
					'<td>' . $person['id'] . '</td>' .
					'<td>' . $person['name'] . '</td>' .
					'<td><a href=mailto:' . $person['email'] . '>' . $person['email'] . '</a></td>' .
				  '</tr>' .
				  '</table>';
		}
	?>
	</body>
</html>