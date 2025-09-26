<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$inputFile = 'students.txt';
$errorFile = 'errors.log';
if (!file_exists($inputFile)) {
    die("Input file 'students.txt' does not exist.");
}
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$validRecords = [];
$invalidRecords = [];
foreach ($lines as $line) {
    $fields = explode(',', $line);
    if (count($fields) !== 3) {
        $invalidRecords[] = $line;
        continue;
    }
    [$name, $email, $dob] = $fields;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalidRecords[] = $line;
        continue;
    }
    $dobDate = DateTime::createFromFormat('Y-m-d', $dob);
    if (!$dobDate || $dobDate->format('Y-m-d') !== $dob) {
        $invalidRecords[] = $line;
        continue;
    }
    $currentDate = new DateTime();
    $age = $currentDate->diff($dobDate)->y;
    $validRecords[] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
    ];
}
if (!empty($invalidRecords)) {
    file_put_contents($errorFile, implode(PHP_EOL, $invalidRecords));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>
    <h2 style="text-align:center;">Valid Student Records</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        <?php foreach ($validRecords as $record): ?>
        <tr>
            <td><?= htmlspecialchars($record['name']) ?></td>
            <td><?= htmlspecialchars($record['email']) ?></td>
            <td><?= htmlspecialchars($record['age']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>