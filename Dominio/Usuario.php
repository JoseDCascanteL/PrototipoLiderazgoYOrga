<?php

require_once("Persona.php");

class Usuario extends Persona{
    
    private $nombreUsuario;
    private $contrasena;
    private $tipoUsuario;

    function __construct($id,$identificacion,$nombre,$primerapellido,$segundoapellido,$fechanacimiento,$email,$direccion,$telefono,$nombreUsuario,$contrasena,$tipoUsuario){
        
        $this->id=$id;
        $this->identificacion=$identificacion;
        $this->nombre=$nombre;
        $this->primerapellido=$primerapellido;
        $this->segundoapellido=$segundoapellido;
        $this->fechanacimiento=$fechanacimiento;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->telefono=$telefono;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasena = $contrasena;
        $this->tipoUsuario = $tipoUsuario;

    }

    function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    
    function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    function getContrasena()
    {
        return $this->contrasena;
    }

    
    function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    
    function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

}

?>