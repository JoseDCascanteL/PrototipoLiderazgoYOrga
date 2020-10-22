<?php

include './NegocioUsuario.php';
require_once("../Dominio/Usuario.php");

if (isset($_POST['registrar'])) {

    $idUsuario = 0;
    $identificacion = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $validacion=0;
    $negocioUsuario = new NegocioUsuario();
    $usuarios = $negocioUsuario->getUsuarios();                  
    foreach($usuarios as $usuario) {    
        if ($usuario->getIdentificacion()==$identificacion) {
            $validacion=1;
        }
    }
    

        if(!empty($identificacion)&&!empty($nombre)&&!empty($apellido1)&&!empty($apellido2)&&!empty($edad)&&!empty($direccion)&&!empty($telefono)&&
        !empty($email)&&!empty($nombreUsuario)&&!empty($contrasena)&&!empty($tipoUsuario)){
           // $persona = new Persona($idPersona,$identificacion,$nombre,$apellido1,$apellido2,$edad,$email,$direccion,$telefono);
            $usuario = new Usuario($idUsuario,$identificacion,$nombre,$apellido1,$apellido2,$edad,$email,$direccion,$telefono,$nombreUsuario,$contrasena,$tipoUsuario);
            $negocioUsuario = new NegocioUsuario();
            if($validacion==0){
                $result = $negocioUsuario->insertarUsuario($usuario);
            
                if ($result == 1) {
                    header("location: ../vistas/vistaUsuario.php?exito=inserto");
                }else {
                    header("location: ../vistas/vistaUsuario.php?error=dbError");
                } 
            }else{
                header("location: ../vistas/vistaUsuario.php?error=iguales");
            }
        }else{
            header("location: ../vistas/vistaUsuario.php?error=campos");
        }



} 