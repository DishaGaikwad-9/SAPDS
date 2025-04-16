<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'connect.php';

// Helper function to redirect with a message
function redirectWithMessage($message, $target) {
    echo "<script>alert('$message'); window.location='$target';</script>";
    exit();
}

// 🧑‍🌾 FARMER REGISTRATION
if (isset($_POST['farmer_register'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name && $email && $contact && $password) {
        $hashedPassword = md5($password); // Use password_hash() in production

        $stmt = $conn->prepare("INSERT INTO farmers (name, email, contact, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = "farmer";
            redirectWithMessage("Registration Successful!", "farmer_dashboard.php");
        } else {
            redirectWithMessage("Registration Failed! Email or Contact may already exist.", "farmer_form.php");
        }

        $stmt->close();
    } else {
        redirectWithMessage("Please fill all fields!", "farmer_form.php");
    }
}

// 👤 CUSTOMER REGISTRATION
if (isset($_POST['customer_register'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name && $email && $contact && $password) {
        $hashedPassword = md5($password);

        $stmt = $conn->prepare("INSERT INTO customers (name, email, contact, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = "customer";
            redirectWithMessage("Registration Successful!", "customer_dashboard.php");
        } else {
            redirectWithMessage("Registration Failed! Email or Contact may already exist.", "customer_form.php");
        }

        $stmt->close();
    } else {
        redirectWithMessage("Please fill all fields!", "customer_form.php");
    }
}

// 🧑‍🌾 FARMER LOGIN
if (isset($_POST['farmer_login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email && $password) {
        $hashedPassword = md5($password);

        $stmt = $conn->prepare("SELECT * FROM farmers WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $hashedPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = "farmer";
            redirectWithMessage("Login Successful!", "farmer_dashboard.php");
        } else {
            redirectWithMessage("Incorrect Email or Password!", "farmer_login.php");
        }

        $stmt->close();
    } else {
        redirectWithMessage("Please enter email and password!", "farmer_login.php");
    }
}

// 👤 CUSTOMER LOGIN
if (isset($_POST['customer_login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email && $password) {
        $hashedPassword = md5($password);

        $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $hashedPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = "customer";
            redirectWithMessage("Login Successful!", "customer_dashboard.php");
        } else {
            redirectWithMessage("Incorrect Email or Password!", "customer_login.php");
        }

        $stmt->close();
    } else {
        redirectWithMessage("Please enter email and password!", "customer_login.php");
    }
}

$conn->close();
?>
