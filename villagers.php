<?php

class Vilagers {
	/*
		* function for get year of death
	*/
	function getYearOfDeath (int $totalNumber) {
		# array ini akan digunakan untuk menampung bilangan fibonacci
		$fibonacci = [];

		if ($totalNumber < 0) {
			# langsung hentikan fungsi jika $totalNumber kurang dari 0
			return $fibonacci; 
		}

		# mulai perulangan
		for ($i = 1; $i <= $totalNumber; $i++) {
			if ($i < 2) {
				$nunber = $i;
			} else {
				$nunber = @$fibonacci[$i - 2] + @$fibonacci[$i - 3];
			}

			# tambahkan $bilangan ke dalam array $fibonacci
			array_push($fibonacci, $nunber);
		}
		return $fibonacci;
	}

	/*
		* function for generate table of death in x years
	*/
	function getTable (int $totalYears) {
		$html = '<table border="1" width="90%">';
		$html .= '<tr>';
		$html .= '<td align="center" width="80">Year of-</td>';
		$html .= '<td colspan="'.$totalYears.'" align="center">Formula Of Death in '.$totalYears.' years</td>';
		$html .= '<td align="center" width="120">Total Death</td>';
		$html .= '</tr>';
		$html .= '<body>';
		# mulai perulangan <tr> 
		for($i=1; $i<=$totalYears; $i++){
			$html .= '<tr>';
			$html .= '<td align="center" style="background-color:blue;">'.$i.'</td>';

			$getYear = $this->getYearOfDeath($i);
			$count_getYear = count($getYear);
			for($x=0; $x < $count_getYear; $x++){
				$html .= '<td>'.$getYear[$x].'</td>';
				if((($x + 1) == $count_getYear) && $count_getYear < $totalYears){
					$html .= '<td style="background-color:green;" colspan="'.($totalYears - $count_getYear).'">&nbsp;</td>';
				}
				if(($x + 1) == $count_getYear){
					$html .= '<td align="right">'.array_sum($getYear).'</td>';
				}
			}
			$html .= '</tr>';
		}
		$html .= '</body>';
		$html .= '</table>';
		$html .= '<br><br>';

		return $html;
	}

	/*
		* function for process average  
	*/
	function processAverage () {
		$age_of_death_a  = @$_POST['age_of_death_a'];
		$year_of_death_a = @$_POST['year_of_death_a'];
		$age_of_death_b  = @$_POST['age_of_death_b'];
		$year_of_death_b = @$_POST['year_of_death_b'];

		# count average
		# Answer: 
		# Person A born on Year = 12 - 10 = 2, number of people killed on year 2 is 2.
		# Person B born on Year = 17 - 13 = 4, number of people killed on year 4 is 7.
		# So the average is (7 + 2) / 2 = 4,5 <br>';

		$person_a = $year_of_death_a - $age_of_death_a;
		$person_b = $year_of_death_b - $age_of_death_b;

		# condition if the count of formula is less than 0
		if(($year_of_death_a < 0 || $age_of_death_a < 0) || ($year_of_death_b < 0 || $age_of_death_b < 0)) {
			echo 'invalid data, the result is -1';
		}else{
			$killed_on_year_a = array_sum($this->getYearOfDeath($person_a));
			$killed_on_year_b = array_sum($this->getYearOfDeath($person_b));

			echo '<b>Answer :</b><br/><br/>';
			echo 'Person A born on Year = '.$year_of_death_a.' - '.$age_of_death_a.' = '.$person_a.', number of people killed on year '.$person_a.' is '.$killed_on_year_a.'.<br/>';

			echo 'Person B born on Year = '.$year_of_death_b.' - '.$age_of_death_b.' = '.$person_b.', number of people killed on year '.$person_b.' is '.$killed_on_year_b.'.<br/><br/>';

			$average = ($killed_on_year_b + $killed_on_year_a) / 2;

			echo 'So the average is ('.$killed_on_year_b.' + '.$killed_on_year_a.') / 2 = '.$average.' <br>';
		}
	}

}

?>