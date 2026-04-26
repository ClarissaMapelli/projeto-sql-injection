<?php
$conn = mysqli_connect("localhost", "root", "", "selenium_db");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Usuário">
    <input type="text" name="password" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VULNERÁVEL
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Acesso permitido";
    } else {
        echo "Acesso negado";
    }
}
?>

</body>
</html>