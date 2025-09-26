<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new Exception("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}
$numbersList = [
    [10, 20, 30, 40, 50],
    [],
];
foreach ($numbersList as $numbers) {
    try {
        $avg = calculateAverage($numbers);
        echo "Array: [" . implode(", ", $numbers) . "]<br>";
        echo "Average: $avg<br><br>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br><br>";
    }
}
?>
