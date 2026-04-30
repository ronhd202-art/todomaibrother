<?php
session_start();
include "conexiones.php";

$usuario  = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($fila = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $fila['password'])) {
        $_SESSION['usuario'] = $fila['usuario'];
        header("Location: Definitiva.php");
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
?>
