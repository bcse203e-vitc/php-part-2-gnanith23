<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$daysLeft = null;
$currentDateTime = date("d-m-Y H:i:s");

if (isset($_POST['dob'])) {
    $dob = $_POST['dob']; 
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $nextBirthday = DateTime::createFromFormat('Y-m-d', $today->format('Y') . '-' . $dobDate->format('m-d'));
    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    $daysLeft = $interval->days;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Birthday Calculator</title>
</head>
<body>
    <h2>Current Date & Time: <?= $currentDateTime ?></h2>

    <form method="post">
        <label for="dob">Enter your Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        <input type="submit" value="Calculate Days Left">
    </form>

    <?php if ($daysLeft !== null): ?>
        <h3>Days left until your next birthday: <?= $daysLeft ?></h3>
    <?php endif; ?>
</body>
</html>
