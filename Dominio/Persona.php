<?php  

class Persona{

    Protected $id;
    Protected $identificacion;
    Protected $nombre;
    Protected $primerapellido;
    Protected $segundoapellido;
    Protected $fechanacimiento;
    Protected $email;
    Protected $direccion;
    Protected $telefono;

    Public function __construct($id,$identificacion,$nombre,$primerapellido,$segundoapellido,$fechanacimiento,$email,$direccion,$telefono){
        $this->id=$id;
        $this->identificacion=$identificacion;
        $this->nombre=$nombre;
        $this->primerapellido=$primerapellido;
        $this->segundoapellido=$segundoapellido;
        $this->fechanacimiento=$fechanacimiento;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->telefono=$telefono;
    }
    
    

    /**
     * Get the value of identificacion
     */ 
    Public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set the value of identificacion
     *
     * @return  self
     */ 
    Public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    Public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    Public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of primerapellido
     */ 
    Public function getPrimerapellido()
    {
        return $this->primerapellido;
    }

    /**
     * Set the value of primerapellido
     *
     * @return  self
     */ 
    Public function setPrimerapellido($primerapellido)
    {
        $this->primerapellido = $primerapellido;

        return $this;
    }

    /**
     * Get the value of segundoapellido
     */ 
    Public function getSegundoapellido()
    {
        return $this->segundoapellido;
    }

    /**
     * Set the value of segundoapellido
     *
     * @return  self
     */ 
    Public function setSegundoapellido($segundoapellido)
    {
        $this->segundoapellido = $segundoapellido;

        return $this;
    }

    /**
     * Get the value of fechanacimiento
     */ 
    Public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set the value of fechanacimiento
     *
     * @return  self
     */ 
    Public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    Public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    Public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    Public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    Public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    Public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    Public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    Public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    Public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

?>