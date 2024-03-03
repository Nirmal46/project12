<?php
include 'db.php';

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Full_Name = $_POST['name'];
    $Mobile_Number = $_POST['number'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $text = $_POST['text'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO udata (Full_Name, Mobile_Number, Email, Subject, text) VALUES (?, ?, ?, ?, ?)";


    // Initialize a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "sssss", $Full_Name, $Mobile_Number, $Email, $Subject, $text);

        // Execute the statement
        $RESULT = mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if ($RESULT) {
            // Redirect to the specified page
            header('location: index.html');
            exit(); // Terminate script after redirection
        } else {
            // Display an error message or handle the error accordingly
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Display an error message or handle the error accordingly
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>
