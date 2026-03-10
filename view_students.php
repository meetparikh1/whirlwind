<html>
<head>
    <title>Registered clients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            padding: 40px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color:rgb(0, 0, 0);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .button {
            background-color:rgb(0, 0, 0); 
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            }
    </style>
</head>
<body>



<?php
include 'db.php';

$result = $conn->query("SELECT name, course, created_at FROM students ORDER BY created_at DESC");

echo "<h2>Registered clients</h2>";
echo " <button> <a href='index.html'>Back to Registration</a></button><br><br>";

if($result->num_rows > 0)
{
    echo "<table>";
echo "<tr><th>Name</th><th>Course</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["name"] ."</td>";
    echo "<td>". $row["course"] ."</td>";
    echo "</tr>";
}} else {
    echo "No clients registered yet.";

$conn->close();
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>
