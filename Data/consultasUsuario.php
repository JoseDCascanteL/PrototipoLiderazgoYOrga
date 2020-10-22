<?php 

include_once 'conexion.php';
include '../Dominio/Usuario.php';



class ConsultasUsuario extends Conexion{
    
    public function insertarUsuario($usuario) {
        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');
        if(!$conn){
            printf('conexion fallida');
        }


        $consulta = "INSERT INTO tbusuario (tbusuarioid,tbusuarioidentificacion,tbusuarionombre,tbusuarioprimerapellido,tbusuariosegundoapellido,tbusuarioedad,tbusuarioemail,
        tbusuariodireccion,tbusuariotelefono,tbusuarionombreusuario,tbusuariocontrasenia,
        tbusuariotipousuario,tbusuarioestado) VALUES ('" . $usuario->getId() . "','" . 
        $usuario->getIdentificacion() . "','" . $usuario->getNombre() . "','" . $usuario->getPrimerapellido() ."','" . $usuario->getSegundoapellido() . "','" . $usuario->getFechanacimiento() . "','" . $usuario->getEmail() . "','" . $usuario->getDireccion() . "','" . $usuario->getTelefono() . "','" .
        $usuario->getNombreUsuario() . "','" .
        $usuario->getContrasena() . "','" .
        $usuario->getTipoUsuario() . "','1');";
   /*     
        $consulta = "INSERT INTO tbusuario (tbusuarioid,tbusuarioid,tbusuarionombreusuario,tbusuariocontrasena,
        tbusuariotipousuario,tbusuarioestado) VALUES ('" . $usuario->getId() . "','" . $usuario->getId() . "','" .
                $usuario->getNombreUsuario() . "','" .
                $usuario->getContrasena() . "','" .
                $usuario->getTipoUsuario() . "','1');";
 */
        $resultado = mysqli_query($conn, $consulta);
        //$resultado1 = mysqli_query($conn, $consulta);
        mysqli_close($conn);
        return $resultado;
    }

    public function getUsuarios() {        
        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbusuario;";
        $result = mysqli_query($conn, $querySelect);
        $usuarios = [];
        while ($row = mysqli_fetch_array($result)) {
            $usuarioActual = new Usuario($row['tbusuarioid'],$row['tbusuarioidentificacion'],$row['tbusuarionombre'],$row['tbusuarioprimerapellido'],$row['tbusuariosegundoapellido'],$row['tbusuarioedad'],$row['tbusuarioemail'],$row['tbusuariodireccion'],$row['tbusuariotelefono'],$row['tbusuarionombreusuario'], $row['tbusuariocontrasenia'], $row['tbusuariotipousuario']);
            array_push($usuarios, $usuarioActual);
        }
        mysqli_close($conn);
        return $usuarios;
    }
/*
    public function getusuarios($idusuario) {        
        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbusuario where tbusuarioid=". $idusuario . ";";
        $result = mysqli_query($conn, $querySelect);
        $usuarios = [];
        while ($row = mysqli_fetch_array($result)) {
            $usuarioActual = new usuario($row['tbusuarioid'],$row['tbusuarioidentificacion'], $row['tbusuarionombre'], $row['tbusuarioprimerapellido'], $row['tbusuariosegundoapellido'], $row['tbusuarioedad'], $row['tbusuarioemail'], $row['tbusuariodireccion'], $row['tbusuariotelefono']);
            array_push($usuarios, $usuarioActual);
        }
        mysqli_close($conn);
        return $usuarios;
    }

    public function getTodasusuarios() {        
        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbusuario";
        $result = mysqli_query($conn, $querySelect);
        $usuarios = [];
        while ($row = mysqli_fetch_array($result)) {
            $usuarioActual = new usuario($row['tbusuarioid'],$row['tbusuarioidentificacion'], $row['tbusuarionombre'], $row['tbusuarioprimerapellido'], $row['tbusuariosegundoapellido'], $row['tbusuarioedad'], $row['tbusuarioemail'], $row['tbusuariodireccion'], $row['tbusuariotelefono']);
            array_push($usuarios, $usuarioActual);
        }
        mysqli_close($conn);
        return $usuarios;
    }

    public function getIdSiguienteUsuario() {    

        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');
        if(!$conn){
            printf('conexion fallida');
        }

         //Obtiene el ultimoid+1 de tbusuario
         $queryGetLastId = "SELECT MAX(tbusuarioid) AS tbusuarioid  FROM tbusuario";
         $idCont = mysqli_query($conn, $queryGetLastId);
         $nextId = 1;
         if ($row = mysqli_fetch_row($idCont)) {
             $nextId = trim($row[0]) + 1;
         }
        return $nextId;
    }

    public function getIdSiguienteusuario() {   
        $conn = mysqli_init();
        mysqli_real_connect($conn, $this->server, $this->user, $this->password, $this->db, 11982);
        $conn->set_charset('utf8');
        if(!$conn){
            printf('conexion fallida');
        }
        $queryGetLastId = "SELECT MAX(tbusuarioid) AS tbusuarioid  FROM tbusuario";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;
        if ($row = mysqli_fetch_row($idCont)) {
             $nextId = trim($row[0]) + 1;
        }
        return $nextId;
    }*/
}