<?php
$result = "";
$tableHtml = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $courses = $_POST['course'] ?? [];
    $credits = $_POST['credits'] ?? [];
    $grades  = $_POST['grade'] ?? [];

    $totalPoints = 0;
    $totalCredits = 0;

    $tableHtml = "<table border='1' cellpadding='5'>
    <tr>
        <th>Course</th>
        <th>Credits</th>
        <th>Grade</th>
        <th>Grade Points</th>
    </tr>";

    for ($i = 0; $i < count($courses); $i++) {

        $course = htmlspecialchars($courses[$i]);
        $cr = floatval($credits[$i]);
        $g = floatval($grades[$i]);

        if ($cr <= 0) continue;

        $pts = $cr * $g;

        $totalPoints += $pts;
        $totalCredits += $cr;

        $tableHtml .= "<tr>
            <td>$course</td>
            <td>$cr</td>
            <td>$g</td>
            <td>$pts</td>
        </tr>";
    }

    $tableHtml .= "</table>";

    if ($totalCredits > 0) {
        $gpa = $totalPoints / $totalCredits;

        if ($gpa >= 3.5) {
            $interpretation = "Distinction";
        } elseif ($gpa >= 3.0) {
            $interpretation = "Very Good";
        } elseif ($gpa >= 2.0) {
            $interpretation = "Good";
        } else {
            $interpretation = "Pass";
        }

        $result = "Your GPA is " . number_format($gpa, 2) . " ($interpretation)";
    } else {
        $result = "No valid credits entered.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
</head>
<body>

<h2>GPA Calculator</h2>

<form method="post">
    <div id="courses">
        <input type="text" name="course[]" placeholder="Course Name">
        <input type="number" name="credits[]" placeholder="Credits">
        <input type="number" step="0.1" name="grade[]" placeholder="Grade">
    </div>

    <br>
    <button type="submit">Calculate GPA</button>
</form>

<br>

<?php
echo $tableHtml;
echo "<h3>$result</h3>";
?>

</body>
</html>
