<?php
include 'db.php';

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = clean_input($_POST["name"]);
$course = clean_input($_POST["course"]);

if (!empty($name) && !empty($course)) {
    $stmt = $conn->prepare("INSERT INTO students (name, course) VALUES (?,?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $name , $course);
    $stmt->execute();
    $stmt->close();
    echo "Registered Successfully!! <br> <a href='view_students.php'>View Clients</a>";
} else {
    echo "All fields are required.";

}

$conn->close();
?>