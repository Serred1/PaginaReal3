<?php
if(!empty($_POST["btningresar"])){
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["password"])) {
        echo '<div class="alerta">Llene todos los campos</div>';
    } else {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $clave=$_POST["password"];
        $sql=$conexion->query("select * from administrador where clave_ad='$clave'");
        if ($user=$sql->fetch_object()) {
            $sql=$conexion->query("select * from usuarios where nombre='$nombre' and apellido='$apellido'");
            if($datos=$sql->fetch_object()){
            header("location:inicio/index.php");
            }else{
            echo '<div class="alerta">Debe Registrarse Primero</div>';
            } 
        } else {
            $sql=$conexion->query("select * from estudiante where clave_es='$clave'");
            if ($datos=$sql->fetch_object()) {
                $sql=$conexion->query("select * from usuarios where nombre='$nombre' and apellido='$apellido'");
               if($user=$sql->fetch_object()){
                   header("location:inicio/index.php"); 
                   } else {
                      echo('<div class="error">Debe Registrarse Primero</div>');
                   }
            
            }
        
        }
    }
    
}
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["password"])) {
        echo '<div class="alerta">Llene todos los campos</div>';
    } else {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $clave=$_POST["password"];
        $sql=$conexion->query("select * from usuarios where nombre='$nombre' and apellido='$apellido'");
        if ($datos=$sql->fetch_object()) {
            echo('<div class="access">Ya existe este Usuarios Ingrese otro apellido</div>');
        } else {
            $sql=$conexion->query("insert into usuarios(nombre, apellido)values('$nombre','$apellido')");
            if ($sql==1) {
                echo('<div class="access">guardado exitosamente</div>');
            } else {
                echo('<div class="error">fallo al guardar</div>');
            }
        }
    }
    
}

?>