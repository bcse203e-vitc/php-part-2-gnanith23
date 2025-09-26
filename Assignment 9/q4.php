<?php
class PasswordException extends Exception {}
function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long");
    }
    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter");
    }
    if (!preg_match("/\d/", $password)) {
        throw new PasswordException("Password must contain at least one digit");
    }
    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %)");
    }
    return true;
}
$passwords = ["pass123", "StrongPass1", "HelloWorld", "MyPass@123"];
foreach ($passwords as $pwd) {
    try {
        if (validatePassword($pwd)) {
            echo "<b>$pwd</b> is a valid password<br>";
        }
    } catch (PasswordException $e) {
        echo "<b>$pwd</b> " . $e->getMessage() . "<br>";
    }
}
?>
