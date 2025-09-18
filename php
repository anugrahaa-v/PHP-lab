final list programs

1,2 html and css

<html>
<head>
  <title>Hotel Management System</title>

  <style>
    header {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 20px;
    }
    nav {
      background: #34495e;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: white;
      margin: 15px;
      text-decoration: none;
      font-weight: bold;
    }
    section {
      margin: 20px;
      padding: 15px;
      background-color: #f4f4f4;
      border-radius: 8px;
    }
    #successMessage {
      color: green;
      font-weight: bold;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Welcome to DreamStay Hotel</h1>
    <p>Your comfort is our priority</p>
  </header>

  <nav>
    <a href="#">Home</a>
    <a href="#">Rooms</a>
    <a href="#">Services</a>
    <a href="#">Booking</a>
    <a href="#">Contact</a>
  </nav>

  <section>
    <h2 style="color:blue;">About Us</h2> 
    <p>DreamStay Hotel offers luxury rooms, fine dining, and the best hospitality experience for your stay.</p>
  </section>

  <section>
    <h2>Available Rooms</h2>
    <ul>
      <li>Deluxe Room - ₹5000/night</li>
      <li>Suite Room - ₹8000/night</li>
      <li>Presidential Suite - ₹15000/night</li>
    </ul>
  </section>

  <section>
    <h2>Booking Form</h2>
    <form id="bookingForm">
      <label>Name:</label><br>
      <input type="text" placeholder="Enter your name" required><br><br>

      <label>Email:</label><br>
      <input type="email" placeholder="Enter your email" required><br><br>

      <label>Room Type:</label><br>
      <select required>
        <option>Deluxe</option>
        <option>Suite</option>
        <option>Presidential Suite</option>
      </select><br><br>

      <button type="submit">Book Now</button>
    </form>
    <p id="successMessage"> Booking Successful! Thank you for choosing DreamStay Hotel.</p>
  </section>
  <footer>
    <p>2025 DreamStay Hotel | All Rights Reserved</p>
  </footer>

  <script>
    bookingForm.onsubmit = function(e) {
      e.preventDefault();
      successMessage.style.display = "block";
      this.reset();
    }
  </script>
  
</body>
</html>

3.inventory control structures and loops

<?php
$items = ["Pen" => 20, "Notebook" => 15, "Eraser" => 10];
$prices = ["Pen" => 5, "Notebook" => 20, "Eraser" => 3];
$totalInventoryValue = 0;
foreach ($items as $item => $qty) {
    $price = $prices[$item];
    $value = $qty * $price;
    $totalInventoryValue += $value;

    echo "Item: $item | Quantity: $qty | Price: $$price | Total Value: $$value<br>";

    if ($qty < 15) {
        echo "<strong>Restock needed for: $item</strong><br><br>";
    } else {
        echo "$item is sufficiently stocked.<br><br>";
    }
}
echo "<hr>";
echo "<strong>Total Inventory Value: $$totalInventoryValue</strong>";
?>

4.string functions

<?php
$text = "Hello World";
echo strtoupper($text) . "<br>";
echo strtolower($text) . "<br>";
echo "Length: " . strlen($text) . "<br>";
echo "Reversed: " . strrev($text) . "<br>";
echo "Word Count: " . str_word_count($text) . "<br>";
echo "Position of 'World': " . strpos($text, "World") . "<br>";
echo "Replace 'World' with 'PHP': " . str_replace("World", "PHP", $text) . "<br>";
echo "Substring (0, 5): " . substr($text, 0, 5) . "<br>";
echo "Trimmed: '" . trim("   Hello World   ") . "'<br>";
?>

5.array and functions in php

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

6.Form handling 

<form method="post" action="register.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Register">
</form>


register.php

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    echo "Registered Name: $name<br>Email: $email";
}
?>

7.advance array

<?php

$employees = [
    ["name" => "John", "salary" => 5000],
    ["name" => "Jane", "salary" => 6000],
    ["name" => "Alice", "salary" => 7000],
];

$totalPayroll = 0;

foreach ($employees as $emp) {
    $name = $emp['name'];
    $salary = $emp['salary'];
   
    $bonus = ($salary > 5500) ? $salary * 0.10 : $salary * 0.05;
    $netSalary = $salary + $bonus;
    $totalPayroll += $netSalary;

    echo "Employee: $name<br>";
    echo "Base Salary: $" . number_format($salary, 2) . "<br>";
    echo "Bonus: $" . number_format($bonus, 2) . "<br>";
    echo "<strong>Net Salary: $" . number_format($netSalary, 2) . "</strong><br><br>";
}

echo "<hr>";
echo "<strong>Total Payroll (including bonuses): $" . number_format($totalPayroll, 2) . "</strong>";

?>

8.exception handling

<?php 
function withdraw($balance, $amount) { 
if ($amount > $balance)  
throw new Exception("Insufficient Balance!"); 
if ($amount <= 0)  
throw new Exception("Invalid withdrawal amount!"); 
echo "Withdrawn: $amount</p>"; 
echo "Balance: " . ($balance - $amount) . "</p>"; 
return $balance - $amount; 
} 
try { 
$balance = 5000; 
echo "<h2>Bank Transaction</h2>"; 
echo "Initial Balance: $balance</p>"; 
$balance = withdraw($balance, 2000); 
$balance = withdraw($balance, 4000);  
} catch (Exception $e) { 
echo "Error: " . $e->getMessage() . "</p>"; 
} 
?> 

9.server side validation and page redirection 

index.php

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "pass") {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login";
    }
}
?>
<form method="post">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

dashboard.php

<?php
echo "<h1>Welcome to Dashboard!</h1>";
echo "<p>Login successful.</p>";
?>

10.sessions and cookies

<?php
// Start session (must be first line)
session_start();

// --- COOKIE PART ---
// If cookie not set, create one
if (!isset($_COOKIE['user'])) {
    setcookie("user", "Anu", time() + 3600, "/"); // 1 hour
}

// --- SESSION PART ---
// If session not set, create one
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "student";
}
?>
<html>
<head><title>Session & Cookie Demo</title></head>
<body>
<h2>PHP Session & Cookie Example</h2>

<p><b>Cookie value:</b> 
<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : "Cookie not set yet (refresh page)"; ?>
</p>

<p><b>Session value:</b> 
<?php echo $_SESSION['username']; ?>
</p>

<form method="post">
    <button name="logout">Clear Session & Cookie</button>
</form>

<?php
// Logout / clear both
if (isset($_POST['logout'])) {
    // Clear session
    $_SESSION = [];
    session_destroy();

    // Clear cookie
    setcookie("user", "", time() - 3600, "/");

    echo "<p style='color:red;'>Session and Cookie cleared. Refresh page!</p>";
}
?>
</body>
</html>

11.file or img  upload using php

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

12.db connectivity

<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "student_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add student if form submitted
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $conn->query("INSERT INTO students (name, grade) VALUES ('$name','$grade')");
    echo "Student added!<br>";
}
?>
<h2>Add Student</h2>
<form method="post">
    Name: <input type="text" name="name"><br>
    Grade: <input type="text" name="grade"><br>
    <input type="submit" name="submit" value="Add">
</form>
<h2>Students List</h2>
<?php
// Display all students
$result = $conn->query("SELECT * FROM students");
while($row = $result->fetch_assoc()){
    echo $row['id']." - ".$row['name']." - ".$row['grade']."<br>";
}

$conn->close();
?>


13.mysql functions 

<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "library_db");
if (!$conn) die("Connection failed: " . mysqli_connect_error());
// Add book if form submitted
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    mysqli_query($conn, "INSERT INTO books (title, author, year) VALUES ('$title','$author','$year')");
    echo "Book added!<br>";
}
?>
<h2>Add New Book</h2>
<form method="post">
    Title: <input type="text" name="title"><br>
    Author: <input type="text" name="author"><br>
    Year: <input type="number" name="year"><br>
    <input type="submit" name="submit" value="Add Book">
</form>

<h2>All Books</h2>
<?php
// Display all books
$result = mysqli_query($conn, "SELECT * FROM books");
while($row = mysqli_fetch_assoc($result)){
    echo $row['id'] . " - " . $row['title'] . " by " . $row['author'] . " (" . $row['year'] . ")<br>";
}
mysqli_close($conn);
?>





