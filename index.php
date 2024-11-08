<?php

//Conexión con la base de datos
$conn= mysqli_connect('localhost', 'root', '', 'sysadmin');

// Si la conexión con la BD falla
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Se crea la consulta
$query= "SELECT * FROM menu";
//EJECUTAR CONSULTA.
$menus =mysqli_query($conn,$query); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/styles.css">
    <title>SysAdmin</title>
</head>
<body>
    <main>
    <header>
        <img src="Imagenes/maps.png" alt="">
    </header>

    <h1>MÓDULO DE ADMINISTRACIÓN DEL SISTEMA</h1>

    <div id="menu">
    <?php foreach ($menus as $menu): ?>  <!-- Se recorren todos los menu en la tabla menu de la BD -->
        <form method="post" action="/TP_PISWD1/PHP/actualizar_estado.php"> <!-- Cuando se presiona el botón, se ejecuta el archivo actualizar_estado.php -->
            <input type="hidden" name="menu_nombre" value="<?= htmlspecialchars($menu['nombre']) ?>">  <!-- Se guardan los datos del menu con dos inputs ocultos --> 
            <input type="hidden" name="abierto" value="<?= $menu['abierto'] ? 0 : 1 ?>"> <!-- si es "true" se almacena 1 y si es "false" se almacena 0 (Operador ternario) -->
            <button type="submit" class="btn" id="btn<?= htmlspecialchars($menu['nombre']) ?>"><?= htmlspecialchars($menu['nombre']) ?></button>
        </form>
    <?php endforeach; ?>
    </div>

    <?php foreach($menus as $menu): ?> <!-- se vuelven a recorrer los menus para guardar los enlaces en un div aparte -->
        <div class="opciones" id="<?= htmlspecialchars($menu['nombre']) ?>Opciones"
             style="display: <?= $menu['abierto'] ? 'flex' : 'none' ?>;"> <!-- Se define el display del div en base al valor del atributo "abierto" del menu en la BD -->
            <h2>Páginas de <?= htmlspecialchars($menu['nombre']) ?></h2>
            <a class="btnLink" id="btnAlta<?= htmlspecialchars($menu['nombre']) ?>"     href="Alta<?= ucfirst(htmlspecialchars($menu['nombre'])) ?>.htm">Altas</a>
            <a class="btnLink" id="btnBaja<?= htmlspecialchars($menu['nombre']) ?>"     href="Baja<?= ucfirst(htmlspecialchars($menu['nombre'])) ?>.htm">Bajas</a>
            <a class="btnLink" id="btnModificar<?= htmlspecialchars($menu['nombre']) ?>" href="Modificar<?= ucfirst(htmlspecialchars($menu['nombre'])) ?>.htm">Modificaciones</a>
            <a class="btnLink" id="btnTodas<?= htmlspecialchars($menu['nombre']) ?>"    href="Todas<?= ucfirst(htmlspecialchars($menu['nombre'])) ?>.htm">Seleccionar Todo</a>
        </div>
    <?php endforeach; ?>
    </main>

    <footer>
        <hr>
        <br>
        <p><b>E.E.S.T Nº6 CHACABUCO - MORÓN</b> (7º 4º AÑO 2024)</p>
        <P>Proyecto de implementación de sitios web dinámicos</P>
        <p>Autores: Corbalán, Lucero, Luque, Scaramuzza.</p>
        <br>
    </footer> 
</body>
</html>

