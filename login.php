<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];


$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$a = password_verify($pass, $row['pass']);
/*this echo*/
echo "$pass ";
echo "<br>";
echo $row['pass'];
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($result->num_rows > 0) {

        if (password_verify($pass, $row['pass']) == true) {
            echo "Inicio de sesión exitoso.";
        } else {
            echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Usuario no encontrado. Por favor, regístrate si aún no tienes una cuenta.";
    }
} else {
    echo "bien";
}
