<?php
session_start();

require_once __DIR__ . "/../includes/bootstrap.php";

/**
 * DB CONNECTION
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

$error = "";

/**
 * إذا تم إرسال الفورم
 */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = "يرجى تعبئة جميع الحقول";
    } else {

        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && password_verify($password, $admin['password'])) {

            // تسجيل الدخول
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['full_name'];

            header("Location: dashboard.php");
            exit;

        } else {
            $error = "بيانات الدخول غير صحيحة";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>

<body>

<h2>تسجيل الدخول</h2>

<?php if ($error): ?>
    <p style="color:red;">
        <?= $error ?>
    </p>
<?php endif; ?>

<form method="POST">

    <label>Username</label><br>
    <input type="text" name="username"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>