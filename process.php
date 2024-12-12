<?php
session_start();
require "validator.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Function to sanitize input data
    function purgeData($data) {
        $data = trim($data); // Remove leading/trailing spaces
        $data = stripslashes($data); // Remove backslashes
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Escape special characters
        return $data;
    }

    // Process and sanitize input data
    $fullName = purgeData($_POST["fullName"] ?? "");
    $email = purgeData($_POST["email"] ?? "");
    $pwd = purgeData($_POST["pwd"] ?? "");
    $confirmPwd = purgeData($_POST["confirmPwd"] ?? "");

    // Debugging: Display sanitized inputs
    echo $fullName . "<br>";
    echo $email . "<br>";
    echo $pwd . "<br>";
    echo $confirmPwd . "<br>";

    // Create a Validator instance
    $validator = new Validator();

    // Validate inputs
    $validator->validateEmpty($fullName, "fullName");
    $validator->validateEmpty($email, "email");
    $validator->validateEmpty($pwd, "pwd");
    $validator->validateEmpty($confirmPwd, "confirmPwd");

    // Check for validation errors
    if ($validator->hasErrors()) {
        $_SESSION["errors"] = $validator->getErrors();
        header("Location: index.php");
        exit();
    } else {
        echo "REGISTRATION SUCCESSFUL";
        session_unset();
        session_destroy();
    }
}
?>
