<?php

require "modelo1.php";

//insert

/*$res = $_DB->insert("insert into users (nombre,Apellido_P,Apellido_M,Direccion,fechaNac,Telefono,Celular,lugarNac,pais,email,carrera) VALUES (?,?,?,?,?,?,?,?,?,?,?)",
        [$nombre,$Apellido_P,$Apellido_M,$Direccion,$fechaNac,$Telefono,$Celular,$lugarNac,$pais,$Correo,$carrera]
);
$id=56;
$name = "Luis Cacha";

$res1 = $_DB->insert("insert into users (id,name) values(?,?)",[$id,$name]);

// Busqueda de datos
//$_POST ["search"] = "Cachas";

$results = $_DB->select(
    "SELECT * FROM `users` WHERE `nombre` LIKE ?",
    ["%{$_POST["search"]}%"]
  );
  
  // Resultados
  echo json_encode(count($results)==0 ? null : $results);
*/
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["search"])) {
    // Procesar la búsqueda
    $results = $_DB->select(
        "SELECT * FROM `users` WHERE `nombre` LIKE ?",
        ["%{$_POST["search"]}%"]
    );

    // Resultados
    echo json_encode(count($results) == 0 ? null : $results);
} elseif (isset($_POST["nombre"])) {
    // Procesar la inserción
  // Recupera los datos del formulario
  $nombre = $_POST["nombre"];
  $ap_paterno = $_POST["ap_paterno"];
  $ap_materno = $_POST["ap_materno"];
  $direccion = $_POST["direccion"];
  $fecha_nacimiento = $_POST["fecha_nacimiento"];
  $telf_fijo = $_POST["telf_fijo"];
  $telf_movil = $_POST["telf_movil"];
  $lugar_nacimiento = $_POST["lugar_nacimiento"];
  $pais = $_POST["pais"];
  $correo_electronico = $_POST["correo_electronico"];
  $carrera = $_POST["carrera"];
  
  // Realiza la inserción en la base de datos
  $res = $_DB->insert(
      "INSERT INTO users (nombre, ap_paterno, ap_materno, direccion, fecha_nacimiento, telf_fijo, telf_movil, lugar_nacimiento, pais, correo_electronico, carrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
      [$nombre,  $ap_paterno, $ap_materno, $direccion, $fecha_nacimiento, $telf_fijo, $telf_movil, $lugar_nacimiento, $pais, $correo_electronico, $carrera]
  );
  
  // Verifica si la inserción fue exitosa
  if ($res) {
      echo "Inserción exitosa.";
  } else {
      echo "Error al insertar los datos.";
  }
}
// Busqueda de datos
//$_POST ["search"] = "Cachas";

}
?>