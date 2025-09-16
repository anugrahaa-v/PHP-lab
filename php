1. Personal Portfolio Website using HTML
<!DOCTYPE html>
<html>
<head>
    <title>Anu's Portfolio</title>
    <style>
        body {font-family: Arial, sans-serif; margin:0; background:#f5f5f5; scroll-behavior: smooth;}
        header, footer {background: purple; color:white; text-align:center; padding:15px;}
        nav {text-align:center; margin:10px 0;}
        nav a {margin:0 15px; text-decoration:none; color: white; font-weight:bold;}
        section {padding:20px; max-width:600px; margin:20px auto; background:white; border-radius:8px;}
        h1, h2 {margin:5px 0;}
    </style>
</head>
<body>

<header>
    <h1>Anu's Portfolio</h1>
    <p>Showcasing my skills</p>
</header>

<nav>
    <a href="#about">About Me</a>
    <a href="#contact">Contact</a>
</nav>

<section id="about">
    <h2>About Me</h2>
    <p style="color:green; font-weight:bold;">
        Hello! I'm Anu, a computer science student passionate about web development.
    </p>
</section>

<section id="contact">
    <h2>Contact</h2>
    <p style="color:blue; font-weight:bold;">Email: anu@example.com</p>
</section>

<footer>
    <p>&copy; 2025 Anu. All rights reserved.</p>
</footer>

</body>
</html>

3. Inventory Management using Control Structures and Loops in PHP

<?php
$items = ["Pen" => 20, "Notebook" => 15, "Eraser" => 10];
foreach ($items as $item => $qty) {
    if ($qty < 15) {
        echo "Restock needed for: $item<br>";
    } else {
        echo "$item is sufficiently stocked.<br>";
    }
}
?>

4. Text Formatting and Operations using String Functions in PHP

<?php
$text = "Hello World";
echo strtoupper($text) . "<br>";  // Outputs: HELLO WORLD
echo strtolower($text) . "<br>";  // Outputs: hello world
echo "Length: " . strlen($text);
?>

5. Student Grade Calculation using Arrays and Functions in PHP

<?php
function calculateGrade($marks) {
    if ($marks >= 90) return "A";
    elseif ($marks >= 75) return "B";
    elseif ($marks >= 50) return "C";
    else return "F";
}

$students = ["Alice" => 85, "Bob" => 65, "Charlie" => 45];

foreach ($students as $name => $marks) {
    echo "$name: " . calculateGrade($marks) . "<br>";
}
?>


6. Online Registration Form Handling using PHP

<form method="post" action="register.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Register">
</form>

// register.php
<?php
$name = $_POST['name'];
$email = $_POST['email'];
echo "Registered Name: $name<br>Email: $email";
?>

7. Employee Salary Details using Advanced Arrays in PHP

<?php
$employees = [
    ["name" => "John", "salary" => 5000],
    ["name" => "Jane", "salary" => 6000],
];

foreach ($employees as $emp) {
    echo "Employee: {$emp['name']}, Salary: \${$emp['salary']}<br>";
}
?>
8. Bank Transaction Handling using Exception Handling in PHP

<?php
$balance = 1000;

function withdraw($amount) {
    global $balance;
    if ($amount > $balance) {
        throw new Exception("Insufficient balance");
    }
    $balance -= $amount;
    return $balance;
}

try {
    echo "Remaining Balance: " . withdraw(1200);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

9. Server-Side Validation and Page Redirection for Login Form in PHP

<form method="post" action="dashboard.php">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>

// login.php
<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "pass") {
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid login";
}
?>

10. Shopping Cart Management using Cookies and Sessions in PHP

<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['item'])) {
    $_SESSION['cart'][] = $_GET['item'];
}

echo "Cart items:<br>";
foreach ($_SESSION['cart'] as $item) {
    echo "- $item<br>";
}
?>

11. Image Uploading Application using PHP

<form method="post" enctype="multipart/form-data" action="upload.php">
    Select Image: <input type="file" name="image"><br>
    <input type="submit" value="Upload">
</form>

// upload.php
<?php
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    // Create uploads folder if it doesn't exist
    if(!is_dir("uploads")){
        mkdir("uploads", 0777, true);
    }

    // Move uploaded file
    if(move_uploaded_file($file_tmp, "uploads/" . $file_name)){
        echo "Image uploaded successfully: <a href='uploads/$file_name'>View Image</a>";
    } else {
        echo "Failed to upload image.";
    }
} else {
    echo "No file selected.";
}
?>
12. Student Database Connectivity using PHP and MySQL

<?php
// Step 1: Connect to database
$conn = new mysqli("localhost", "root", "", "student_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission to add a new student
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (name, grade) VALUES ('$name', '$grade')";
    if($conn->query($sql) === TRUE){
        echo "<p style='color:green;'>Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>

<h2>Add New Student</h2>
<form method="post">
    Name: <input type="text" name="name" maxlength="25" required><br><br>
    Grade: <input type="text" name="grade" maxlength="10" required><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>

<h2>All Students</h2>
<?php
// Step 3: Fetch and display all students
$result = $conn->query("SELECT * FROM students");

if($result->num_rows > 0){
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Name</th><th>Grade</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['grade']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No students found.</p>";
}

// Step 4: Close connection
$conn->close();
?>

13. Library Management using MySQL Functions in PHP

<?php
$conn = mysqli_connect("localhost", "root", "", "library_db");

function getBooks($conn) {
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$books = getBooks($conn);
foreach ($books as $book) {
    echo $book['title'] . " by " . $book['author'] . "<br>";
}
?>

