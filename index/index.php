<?php 
$result     = " ";
$tableHtml  = " ";

if ($_SERVER ['REQUEST_METHOD'] =='POST»){ 
$courses         = $_POST ['course'] ?? [ ]; 
$credits         =$_POST ['credits'] ?? [ ];
$grades          =$_POST ['grade']   ?? [ ];
$totalPoints  = 0;
$totalCredits = 0; 

$tableHtml = "<table>";
$tableHtml .=くtr> 
<th>Course</th><th>Credits</th>
<th>Grade</th><th>Grade Points</th> 
</tr>"; 
for ($i = o; $i < count($courses); $i++){
  $course   = htmlspecialchars ($courses [$i]);
  $cr       = floatval($credits [$i]); 
  $g        =floatval($grades [$i]); 
  if ($cr <= o) continue; 
  $pts = $cr * $g; 
  $totalPoints += $pts; 
  $totalCredits += $cr; 
  $tableHtml.= "<tr>  
  <td>$course</td><td>$cr</td>
  <td>$g</td><td>$pts</td> 
</tr>"; 
}
$tableHtml .="</table>"; 

if ($totalCredits >0){
  $gpa= $totalPoints / $totalCredits;
  if ($gpa >= 3.7){
    $interpretation="Distinction"; 
} elseif ($gpa >= 3.0){
$interpretation="Merit"; 
}elseif ($gpa >= 2.0){
 $interpretation = "Pass"; 
} else {
 $interpretation= "Fail"; 
$result ="Your GPA is ".number_format ($gpa, 2) 
         ."($interpretation)."; 
 }else {
$result="NO valid courses entered."; 
 }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>GPA Calculator</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>
</head>

<body>

<div class="container mt-4">

<h2 class="text-center">GPA Calculator</h2>
  
<h4 class="text-center">Course: Web Development</h4>
  
<form id="gpaForm">
  <table class="table mt-4">
<thead>
<tr>
<th>Course Name</th>
<th>Credits</th>
<th>Grade</th>
</tr>
</thead>

<tbody id="courseList">

<tr>
<td><input type="text" class="form-control"></td>
<td><input type="number" class="form-control"></td>
<td>
<select class="form-control">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>
</td>
</tr>

</tbody>
</table>

<table class="table table-bordered">
<thead class="table-dark">
<tr>
<th>Course</th>
<th>Credits</th>
<th>Grade</th>
<th>Action</th>
</tr>
</thead>

<tbody id="courses">

<tr class="course-row">
<td><input type="text" name="course[]" class="form-control"></td>
<td><input type="number" name="credits[]" class="form-control"></td>
<td><input type="text" name="grade[]" class="form-control"></td>
<td>
<button type="button" class="btn btn-danger remove-row">Remove</button>
</td>
</tr>

</tbody>
</table>

<button type="button" id="addRow" class="btn btn-primary">
Add Course
</button>

<button type="submit" class="btn btn-success">
Calculate GPA
</button>

</form>

<div id="result" class="mt-4"></div>

</div>

</body>
</html>
