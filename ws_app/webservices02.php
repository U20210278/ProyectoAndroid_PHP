<?php
require("config.php");

$datos  = array();
$accion = "";

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];
}

if($accion == "registrar"){
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    if(agregarContacto($nombre,$telefono)== 1){
    $datos["estado"] = 1;
    $datos["resultado"] = "Datos Almacenados con exito.!!!";

    }else{
        $datos["estado"] = 0;
        $datos["resultado"] = "ERROR, NO SE PUDO ALMACENAR LOS DATOS.!!!";
    
    }  

}else if ($accion == "listar_contactos"){

    $filtro = "";
    if(isset($_POST["filtro"])){
        $filtro = $_POST["filtro"];
    }
    $datos["estado"] = 1;
    $datos["resultado"] = listarContactos($filtro);

}else if ($accion == "modificar"){

    $id_contacto = $_POST["id_contacto"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    if(modificarContacto($id_contacto,$nombre,$telefono)== 1){
    $datos["estado"] = 1;
    $datos["resultado"] = "Datos Modificacos con exito.!!!";

    }else{
        $datos["estado"] = 0;
        $datos["resultado"] = "ERROR, NO SE PUDO ALMACENAR LOS DATOS.!!!";
    
    }  
    
}else if ($accion == "eliminar"){

    $id_contacto = $_POST["id_contacto"];  

    if(eliminarContacto($id_contacto)== 1){
    $datos["estado"] = 1;
    $datos["resultado"] = "Datos Eliminados con exito.!!!";

    }else{
        $datos["estado"] = 0;
        $datos["resultado"] = "ERROR, NO SE PUDO ALMACENAR LOS DATOS.!!!";
    
    }  
    
}

echo json_encode($datos);





?>