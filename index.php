<?php
	include('villagers.php');
	$formula = new Vilagers();

	echo $formula->getTable(20);
?>
<form method="post" action="">
	<table border="1" width="90%">
		<tr>
			<td>Person A Age of death</td>
			<td>:</td>
			<td><input type="number" name="age_of_death_a" value="10" /></td>
			<td>Year of Death</td>
			<td>:</td>
			<td><input type="number" name="year_of_death_a" value="12" /></td>
		</tr>
		<tr>
			<td>Person B Age of death</td>
			<td>:</td>
			<td><input type="number" name="age_of_death_b" value="13" /></td>
			<td>Year of Death</td>
			<td>:</td>
			<td><input type="number" name="year_of_death_b" value="17" /></td>
		</tr>
		<tr>
			<td colspan="8" align="right"><button type="submit" name="submit">Generate</button></td>
		</tr>
	</table>
</form>

<?php
	if(isset($_POST['submit']) ){
	    $formData = $_POST; 
	    $formula->processAverage($formData);
	}
?>