<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' LIMIT 1");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] === 'admin') {
            header('Location: users.php');
        } else {
            header('Location: index.php');
        }
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login StepIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Login StepIn</h2>
        <?php if ($error): ?>
            <div class="mb-4 text-red-600 text-center"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" autocomplete="off">
            <div class="mb-4">
                <label class="block mb-1 font-medium" for="username">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mb-6">
                <label class="block mb-1 font-medium" for="password">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Login</button>
        </form>
    </div>
</body>
</html>