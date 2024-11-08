<?php
// Conexión a la base de datos
$conn = mysqli_connect('localhost', 'root', '', 'sysadmin');

// Si la conexión falla
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Verificar si se recibieron los datos necesarios
if (isset($_POST['menu_nombre']) && isset($_POST['abierto'])) {
    $menu_nombre = mysqli_real_escape_string($conn, $_POST['menu_nombre']);
    $abierto = (int)$_POST['abierto'];

    // Primero, actualizar el estado de todos los menús a cerrado (abierto = 0)
    $query = "UPDATE menu SET abierto = 0";
    if (mysqli_query($conn, $query)) {
        // Ahora, actualizar el estado "abierto" del menú seleccionado
        $query = "UPDATE menu SET abierto = $abierto WHERE nombre = '$menu_nombre'";
        if (mysqli_query($conn, $query)) {
            // Redirigir de vuelta a la página anterior
            header('Location: ../index.php');
            exit; // Asegura que no se ejecute más código después de la redirección
        } else {
            // Error al actualizar el estado del menú seleccionado
            echo "Error al actualizar el estado del menú seleccionado: " . mysqli_error($conn);
        }
    } else {
        // Error al actualizar el estado de los menús
        echo "Error al actualizar el estado de los menús: " . mysqli_error($conn);
    }
} else {
    // Si no se recibieron los datos necesarios se muestra en pantalla
    echo "Datos incompletos.";
}
// Cerrar la conexión con el servidor
mysqli_close($conn);
?>