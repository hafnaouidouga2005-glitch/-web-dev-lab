<?php

$courses = $_POST['course'];
$credits = $_POST['credits'];
$grades = $_POST['grade'];

$total_points = 0;
$total_credits = 0;

for($i = 0; $i < count($courses); $i++){

$points = $grades[$i] * $credits[$i];

$total_points += $points;

$total_credits += $credits[$i];

}

$gpa = $total_points / $total_credits;

?>

<!DOCTYPE html>
<html>
<head>

<title>Result</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>GPA Result</h1>

<table border="1">

<tr>

<th>Course</th>
<th>Credits</th>
<th>Grade</th>

</tr>

<?php

for($i = 0; $i < count($courses); $i++){

echo "<tr>";
echo "<td>".$courses[$i]."</td>";
echo "<td>".$credits[$i]."</td>";
echo "<td>".$grades[$i]."</td>";
echo "</tr>";

}

?>

</table>

<br>

<h2>Your GPA = <?php echo round($gpa,2); ?></h2>

</body>
</html>
