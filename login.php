<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            height: 100vh;
            margin-bottom: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #f4f4f4;
            border: 2px solid  #228B22;
            padding: 40px;
            width: 450px;
            height: 550px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.15);
            margin-top: 220px;
        }

        h2 {
            background-color: #228B22;
            color: #fff;
            padding: 18px;
            margin: -40px -40px 25px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            font-size: 26px;
        }

        form {
            padding-top: 60px;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 15px;
            font-size: 16px;
            color: #333;
        }

        input, .login-btn, .reset-btn, select {
            width: calc(100% - 10px);
            padding: 14px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 12px;
        }

        .button-container {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            gap: 150px;
        }

        .login-btn, .reset-btn {
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
        }

        .login-btn {
            background: linear-gradient(to right,  #228B22,  #228B22);
        }

        .reset-btn {
            background: linear-gradient(to right, #b22222, #8b0000);
        }

        .login-btn:hover {
            background: linear-gradient(to right, #228B22,  #228B22);
        }

        .reset-btn:hover {
            background: linear-gradient(to right, #8b0000, #b22222);
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
            }
            .button-container {
                flex-direction: column;
            }
            .login-btn, .reset-btn {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="left-section">
          <img height="40" src="i1.png" alt="">
          <h1 class="logo">Sansad adarsh <span>Gram yojana</span></h1>
          <img height="50" src="i2.png" alt="">
        </div>
        
        <div class="right-container">
          <div class="right-section">
              <button class="sign-in" onclick="window.location.href='login.php'">Sign-In</button>
              <button class="theme-toggle" onclick="toggleTheme()">☀</button>
              <div class="hamburger" onclick="toggleSidebar()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
              </div>
          </div>
        </div>
        
        <div id="sidebar" class="sidebar">
          <button class="close-btn" onclick="toggleSidebar()">×</button>
          <ul class="sidebar-links">
            <li><a href="home.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="about.html"><i class="fas fa-bullhorn"></i> About</a></li>
            <li><a href="faqnew.html"><i class="fas fa-info-circle"></i> FAQs</a></li>
            <li><a href="PROJECT/contact us/contact.html"><i class="fas fa-envelope"></i> Contact Us</a></li>
          </ul>
        </div>
    </div>

    <div class="login-container">
        <h2>Sign-In Page</h2>
        <form  method="POST">
            <label for="user-level">User Level:</label>
            <select name="user-level" required>
                <option value="">--Select--</option>
                <option value="ministry">Ministry</option>
                <option value="mp">Hon'ble MP</option>
                <option value="state">State</option>
                <option value="district">District</option>
            </select>

            <label for="user-id">User ID:</label>
            <input type="text" name="user-id" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <div class="button-container">
                <button type="submit" class="login-btn">Register</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_level = $_POST['user-level'];
    $user_id = $_POST['user-id'];
    $password = $_POST['password'];

    // Insert into database
    $sql = "INSERT INTO signin_users (user_level, user_id, password) VALUES ('$user_level', '$user_id', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User registered successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>
</body>
</html>