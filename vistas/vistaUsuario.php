<?php
require_once "parte_superior.php"
?>
<div class="container">
  <h1>Registrar Usuario</h1>
<?php
include_once '../Negocio/negocioUsuario.php';

$negocioUsuario = new NegocioUsuario();
//$usuarioId = $negocioUsuario->getIdSiguienteUsuario();  
//$personaId = $negocioUsuario->getIdSiguientePersona();  


?>
<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCRUD">Nuevo Usuario</button>    
            </div>    
        </div>    
    </div>    
    <br> 

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="pacientes" class="table table-striped table-bordered " style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Primer apellido </th>
                                <th>Segundo apellido</th>
                                <th>Edad</th>
                                <th>E-mail</th>
                                <th>Direccion</th>
                                <th>Teléfono</th>
                                <th>Nombre Usuario</th>
                                <th>Tipo Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php      
                                $negocioUsuario = new NegocioUsuario();
                                $usuarios = $negocioUsuario->getUsuarios();                  
                                foreach($usuarios as $usuario) {    
                                    echo '<tr>';
                                    echo '<td>' . $usuario->getIdentificacion(). '</td>';
                                    echo '<td>' . $usuario->getNombre() . '</td>';
                                    echo '<td>' . $usuario->getPrimerapellido() . '</td>';
                                    echo '<td>' . $usuario->getSegundoapellido() . '</td>';
                                    echo '<td>' . $usuario->getFechanacimiento() . '</td>';
                                    echo '<td>' . $usuario->getEmail() . '</td>';
                                    echo '<td>' . $usuario->getDireccion() . '</td>';
                                    echo '<td>' . $usuario->getTelefono() . '</td>';
                                    echo '<td>' . $usuario->getNombreUsuario() . '</td>';
                                    echo '<td>' . $usuario->getTipoUsuario().'</td>';
                                    echo "<td></td>";
                                    echo '</tr>';                                                  
                                }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usurio</h5>  
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="../Negocio/accionUsuario.php" method="POST"> 
            <div class="modal-body">
                <div class="form-group">
                <label for="cedula" class="col-form-label">Identificación</label>
                <input type="text" class="form-control" name="cedula">
                </div> 
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                </div>                
                <div class="form-group">
                <label for="apellido1" class="col-form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="apellido1">
                </div>
                <div class="form-group">
                <label for="apellido2" class="col-form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="apellido2">
                </div>
                <div class="form-group">
                <label for="edad" class="col-form-label">Edad</label>
                <input type="number" class="form-control" name="edad" min="1">
                </div>
                <div class="form-group">
                <label for="email" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" name="email">
                </div> 
                <div class="form-group">
                <label for="direccion" class="col-form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion">
                </div> 
                <div class="form-group">
                <label for="telefono" class="col-form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono">
                </div> 
                <div class="form-group">
                <label for="nombreUsuario" class="col-form-label">Nombre usuario</label>
                <input type="text" class="form-control" name="nombreUsuario">
                </div> 
                <div class="form-group">
                <label for="contrasena" class="col-form-label">Contraseña</label>
                <input type="text" class="form-control" name="contrasena">
                </div>   
                <div class="form-group">
                <label for="tipoUsuario" class="col-form-label">Tipo Usuario</label><br>
                <input type="radio" id="doc" name="tipoUsuario" value="Doctor">
                <label for="doc">Doctor</label><br>
                <input type="radio" id="secretaria" name="tipoUsuario" value="Secretaria">
                <label for="secretaria">Secretaria</label><br>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <input  style="background: #008f39;" type="submit" value="Registrar" name="registrar" id="registrar" /> 
            </div>
        </form>    
        </div>
    </div>
</div> 
<?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "campos") {
            echo '<p style="color: red">Campo(s) vacio(s)</p>';
        }else if ($_GET['error'] == "dbError") {
            echo '<center><p style="color: red">Error en la consulta</p></center>';
        }else if($_GET['error'] == "formatoPos"){
            echo '<center><p style="color: red">Numero Abonado y/o Numero Orden deben ser numeros positivos</p></center>';
        }else if($_GET['error'] == "iguales"){
            echo '<center><p style="color: red">Número Identificación invalido</p></center>';
        }
    } else if (isset($_GET['exito'])) {
        if ($_GET['exito'] == "inserto") {
            echo '<p style="color: green">Registrado!</p>';
        }elseif ($_GET['exito'] == "elimino") {
            echo '<p style="color: green">Se ha eliminado Correctmente</p>';
        }elseif ($_GET['exito'] == "edito") {
            echo '<p style="color: green">Cambios guardados</p>';
        }
    }
?>
<?php
require_once "parte_inferior.php"
?>