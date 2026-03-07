<?php 
if (isset($_POST ['course'1, $_POST [' credits'], $_POST['grade'])){ 
$courses         =$_POST ['course']; 
$credits         =$_POST['credits'l;
$grades          =$_POST ['grade];
$totalPoints  = 0;
$totalCredits = 0;

echo "<table>";
echo "<tr> 
<th>Course</th>
<th>Credits</th>
<th>Grade</th>
<th>Grade Points</th>
</tr>"; 
for  ($i=o; $i < count($courses); $i++) {
  $course= htmlspecialchars ($courses [$i]);
  $cr    =floatval($credits[sil);
  $g     =floatval($grades [$i]);
if ($cr <= o) continue;
$pts           = $cr *$g; 
stotalPoints  += $pts;
$totalCredits += $cr;
echo "<tr> 
       <td>$course</td>
       <td>$cr</td>
       <td>$g</td> 
       <td>$pts</td> 
       </tr>";
      }
echo "</table>"; 

if ($totalCredits >o){ 
$gpa= $totalPoints / $totalcredits;
 if ($gpa >= 3.7){ 
   $interpretation-"Distinction"; 
 }elseif ($gpa >= 3.0) { 
 $interpretation = "Merit";
 } elseif ($gpa >=2.0) { 
 $interpretation = "Pass"; 
 } else {  
 $interpretation ="Fail"; 
 }
echo "<p>Your GPA is <strong>"  .number_format ($gpa, 2)  
    .   "</strong> ($interpretation).</p>";  
    } else { 
echo "<p>No valid courses entered.</p>";
  }
  } else { 
  echo "Data not received."; 
  }  
?>
  
  
  
 
 
