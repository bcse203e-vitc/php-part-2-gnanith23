<?php
$emails = [
    "john@example.com",
    "gnanith-email@",
    "lover@besite",
    "user123@gmail.com",
    "gnanith@gmail.com"
];
echo "<h3>Valid Email Addresses:</h3>";
foreach ($emails as $email) {
    if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $email)) {
        echo $email . "<br>";
    }
}
?>
