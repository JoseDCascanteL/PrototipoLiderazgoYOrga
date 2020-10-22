<?php
error_reporting(E_ALL & ~E_DEPRECATED);
include '../Data/consultasUsuario.php';

class NegocioUsuario{

    private $consultasUsuario;

    public function __construct() {
        $this->consultasUsuario = new ConsultasUsuario();
    }

    public function insertarUsuario($usuario) {
        return $this->consultasUsuario->insertarUsuario($usuario);
    }

    public function getUsuarios() {
        return $this->consultasUsuario->getUsuarios();
    }

    public function getPersonas($idPersona) {
        return $this->consultasUsuario->getPersonas($idPersona);
    }

    public function getTodasPersonas() {
        return $this->consultasUsuario->getTodasPersonas();
    }

    public function getIdSiguienteUsuario() {
        return $this->consultasUsuario->getIdSiguienteUsuario();
    }
    
    public function getIdSiguientePersona() {
        return $this->consultasUsuario->getIdSiguientePersona();
    }

    
}