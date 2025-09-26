<?php
$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun" => 78,
    "Sneha" => 88,
    "Vikas" => 95
];
arsort($students);
echo "<table border='1' style='border-collapse: collapse; width: 50%; text-align: left;'>";
echo "<tr><th>Name</th><th>Marks</th></tr>";
$counter = 0;
foreach ($students as $name => $marks) {
    if ($counter == 3) break;
    echo "<tr><td>$name</td><td>$marks</td></tr>";
    $counter++;
}
echo "</table>";
?>