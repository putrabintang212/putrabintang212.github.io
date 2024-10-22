<?php
include 'koneksi.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username ada
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('Location: admin_dash.php');
            } else {
                header('Location: user_dash.php');
            }
        } else {
            $error = "Username atau Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
      transform: scale(0.95);
      transition: transform 0.3s ease;
    }

    .login-box:hover {
      transform: scale(1);
    }

    h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #666;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 50px;
      font-size: 16px;
      color: #333;
      transition: all 0.3s ease;
    }

    .input-group input:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .error-message {
      color: #ff4d4d;
      background-color: rgba(255, 77, 77, 0.2);
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      font-size: 14px;
      text-align: center;
    }

    .login-button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(45deg, #007bff, #00d4ff);
      border: none;
      border-radius: 50px;
      color: white;
      font-size: 18px;
      cursor: pointer;
      transition: background 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    .login-button:hover {
      background: linear-gradient(45deg, #0056b3, #009edc);
    }

    .signup-link {
      margin-top: 15px;
      color: #666;
    }

    .signup-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .signup-link a:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-box {
      animation: slideIn 0.5s ease;
    }

    @media (max-width: 768px) {
      ul {
        display: none;
        flex-direction: column;
      }

      ul.show {
        display: flex;
      }

      .hamburger-menu {
        display: block;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div class="error-message">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="login-button">Login</button>
        <p class="signup-link">Don't have an account? <a href="registrasi.php">Sign up</a></p>
      </form>
    </div>
  </div>
</body>
</html>
