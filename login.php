

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php
  session_start();
  include 'connect.php';
  ?>

    <div class="login-user">
      <h2>Silahkan Login</h2>
      <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $username = $_POST['username'];
                $password = $_POST['password'];

                $result = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
                $user = mysqli_fetch_assoc($result);

            if ($user && $password == $user['password']) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo "<p>Login gagal! Username atau Password salah</p>";
            }
            }?>
      <form class="form-login" action="" method="post">
        <div class="input-grup">
          <input
            type="text"
            name="email"
            id="email-input"
            placeholder=" "
            required
          />
          <label for="email-input">Email</label>
        </div>
        <div class="input-grup">
          <input
            type="password"
            name="password"
            id="password-input"
            placeholder=" "
            required
          />
          <label for="password-input">Password</label>
        </div>
        <button type="submit" class="login" name="login">Login</button>
      </form>
      <p>Belum punya akun?</p>
      <a href="regist.html">Daftar Disini</a>
    </div>
  </body>
</html>
