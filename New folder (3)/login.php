
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.html');
    } else {
        $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة.";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>تسجيل الدخول</h2>
    <form method="POST">
      <div class="form-group">
        <label for="email">البريد الإلكتروني</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="form-group mt-3">
        <label for="password">كلمة المرور</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary mt-3">تسجيل الدخول</button>
    </form>
    <?php if (isset($error)) echo "<div class='mt-3 text-danger'>$error</div>"; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
