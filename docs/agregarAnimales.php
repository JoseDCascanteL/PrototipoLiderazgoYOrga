<?php
require_once "parte_superior.php";

$mysqli = new mysqli('bdsaarzq9yuljgfpu8pd-mysql.services.clever-cloud.com:3306', 'uh1lswr3elmvxw6c', 'mOr6PwBm3s636NOLVPpF', 'bdsaarzq9yuljgfpu8pd');


$consulta = "SELECT * FROM animales";
$data = $mysqli->query($consulta);

if(isset($_POST['submit'])){
    $id = 0;
    $nombre = $_POST['nombre'];
    $codigo=$_POST['codigo'];
    $raza=$_POST['raza'];
    $ciclo=$_POST['ciclo'];
    $proposito=$_POST['proposito'];
    $nacimiento=$_POST['nacimiento'];
    $padre=$_POST['padre'];
    $madre=$_POST['madre'];

    $stmt = "INSERT INTO animales (id, nombre, codigo,raza,ciclo,proposito,nacimiento,padre,madre) VALUES ('$id', '$nombre', '$codigo','$raza','$ciclo','$proposito','$nacimiento','$padre','$madre')";
    $mysqli->query($stmt);
    header('Location: agregarAnimales.php');
    $msg = "<div class='alert alert-success'>Successfull</div>";
}
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>REGISTRO DE LOS ANIMALES</h1>
          <p>Información sobre los animales que tiene en la ganaderia.</p>
        </div>
      </div> 
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Agregar Animal
    </button>        
    <div class="col-md-12">
        <?php echo isset($msg)?$msg:''; ?>
    </div>

</br>
</br>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>NOMBRE</th>
                      <th>CÓDIGO</th>
                      <th>RAZA</th>
                      <th>CICLO</th>
                      <th>PROPOSITO</th>
                      <th>FECHA NACIMIENTO</th>
                      <th>PADRE</th>
                      <th>MADRE</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php                            
                        foreach($data as $dat) {                                                        
                        ?>
                        <tr>
                            <td ><?php echo $dat['nombre'] ?></td>
                            <td><?php echo $dat['codigo'] ?></td>
                            <td><?php echo $dat['raza'] ?></td>
                            <td><?php echo $dat['ciclo'] ?></td>   
                            <td><?php echo $dat['proposito'] ?></td>    
                            <td><?php echo $dat['nacimiento'] ?></td>    
                            <td><?php echo $dat['padre'] ?></td>    
                            <td><?php echo $dat['madre'] ?></td>    
                        </tr>
                        <?php
                        }
                    ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Animal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="col">
                <input type="text" class="form-control" name="codigo" placeholder="Código">
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col">
                    <select class="form-control form-control-sm" name="raza" id="raza">
                        <option value="Raza">Raza</option>
                        <option value="Holstein">Holstein</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Brahman">Brahman</option>
                        <option value="Angus">Angus</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="ciclo" id="ciclo">
                        <option value="Proposito">Ciclo de Vida</option>
                        <option value="Destete">Destete</option>
                        <option value="Ternera">Ternera</option>
                        <option value="Novilla">Novilla</option>
                        <option value="Adulta">Adulta</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="proposito" id="proposito">
                        <option value="propo">Proposito</option>
                        <option value="Leche">Leche</option>
                        <option value="Engorde">Engorde</option>
                    </select>
                </div>
            </br>
            </br>
            </br>

            </div>
            <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="nacimiento" placeholder="Fecha Nacimiento">
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="padre" id="padre">
                        <option value="Proposito">Padre</option>
                        <option value="Pancho">Pancho</option>
                        <option value="Lolo">Lolo</option>
                    </select>
                </div>                
                <div class="col">
                    <select class="form-control form-control-sm" name="madre" id="madre">
                        <option value="madre">Madre</option>
                        <option value="Florsita">Florsita</option>
                        <option value="Petunia">Petunia</option>
                    </select>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" type="submit" name="submit">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div> 
    </main>
    <?php
    require_once "parte_inferior.php"
    ?>