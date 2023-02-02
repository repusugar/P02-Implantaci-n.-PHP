<?php

$servername = "localhost";
$username = "pvs";
$password = "abc123.";
$dbname = "dbphp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Conexion fallada: " . mysqli_connect_error());
}
echo "Conexion exitosa<br>";

// Create table
$sql = "CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL)";
if (mysqli_query($conn, $sql)) {
    echo "Tabla creada de manera exitosa<br>";
} else {
    echo "Tabla error: " . mysqli_error($conn) . "<br>";
}

// Insert data
$firstname = "Pablo";
$lastname = "Vazquez";
$sql = "INSERT INTO users (firstname, lastname) VALUES ('$firstname', '$lastname')";
if (mysqli_query($conn, $sql)) {
    echo "Datos introducidos correctamente<br>";
} else {
    echo "Error insertando datos: " . mysqli_error($conn) . "<br>";
}

// Update data
$new_firstname = "Pablo";
$sql = "UPDATE users SET firstname='$new_firstname' WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo "Datos actualizados correctamente<br>";
} else {
    echo "Error actualizando datos: " . mysqli_error($conn) . "<br>";
}

// Select data
$sql = "SELECT id, firstname, lastname FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Delete data
$sql = "DELETE FROM users WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo "Datos eliminados correctamente<br>";
} else {
    echo "Error eliminando datosd: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

?>
