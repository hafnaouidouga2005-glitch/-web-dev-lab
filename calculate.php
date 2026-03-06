<?php
$credits = $_POST['credits'];
$grades = $_POST['grade'];

$totalPoints = 0;
$totalCredits = 0;

for($i=0;$i<count($credits);$i++){

$totalPoints += $credits[$i] * $grades[$i];
$totalCredits += $credits[$i];

}

$gpa = $totalPoints / $totalCredits;

echo "Your GPA is: ".number_format($gpa,2);
?>
