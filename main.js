$('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());    
    var contrasenia =$.trim($("#contrasenia").val());    
    if(usuario.length == "" || contrasenia == ""){
        alert("debe ingresar usuario y/o contrasenia");
       return false; 
     } else{
        $.ajax({
            url:"bd/login.php",
            type:"POST",
            datatype: "json",
            data: {usuario:usuario, contrasenia:contrasenia}, 
            success:function(data){ 
            if(data == "null"){
                alert("usuario y/o contrasenia");
            }else{
                window.location.href = "vistas/home.php";
            }
           }    
        });
    }    
 });

$(document).ready(function() {    
    tablaPacientes =$('#pacientes').DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnEliminar'>Eliminar</button></div></div>"  
           }],
            
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

//Segunda tabla para solo los pacientes debido que lleva el expediente
$(document).ready(function() {    
    tablaPacientes =$('#pacientes2').DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnEliminar'>Eliminar</button><button class='btn btn-info btnExpediente'>Expediente</button></div></div>"  
           }],
            
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

$("#btnNuevo").click(function(){
    $("#formPacientes").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Paciente");            
    $("#modalCRUD").modal("show");        
    opcion = 1; //alta
});  

var fila;
//Permite editar los datos de la tabla
$(document).on("click", ".btnEditar", function(){

    fila = $(this).closest("tr");
    codigo = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();
    raza = fila.find('td:eq(2)').text();
    tipo = fila.find('td:eq(3)').text();

    $("#codigo").val(codigo);
    $("#nombre").val(nombre);
    $("#tipo").val(tipo);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Paciente"); 
    $("#modalCRUD").modal("show");
}); 

var fila2;
//Boton que permite redireccionarse a la vista de expedientes
$(document).on("click", ".btnExpediente", function(){
    fila2 = $(this).closest("tr");
    id = fila2.find('td:eq(0)').text();
    //window.location='./vistaExpediente.php?id='+id+'';
    $.ajax({
        url: "../Negocio/accionExpediente.php",
        type: "POST",
        dataType: "json",
        data: {id:id},
        success: function(data){  
            window.location.href = data;
        }        
    });
}); 


$("#formPacientes").submit(function(e){
    e.preventDefault();  
    cedula = $.trim($("#cedula").val());  
    nombre = $.trim($("#nombre").val());
    apellido1 = $.trim($("#apellido1").val());
    apellido2 = $.trim($("#apellido2").val());
    edad = $.trim($("#edad").val());
    telefono = $.trim($("#telefono").val()); 
    correo = $.trim($("#correo").val());   
    $.ajax({
        url: "data/addpaciente.php",
        type: "POST",
        dataType: "json",
        data: {cedula:cedula, nombre:nombre, apellido1:apellido1, apellido2:apellido2, edad:edad, telefono:telefono, carreo:carreo},
        success: function(data){  
            console.log(data);
            cedula = data[0].cedula;            
            nombre = data[0].nombre;
            apellido1 = data[0].apellido1;
            apellido2 = data[0].apellido2;
            edad = data[0].edad;
            telefono = data[0].telefono;
            correo = data[0].correo;
            tablaPacientes.row.add([cedula,nombre,apellido1,apellido2, edad, telefono, correo]).draw();
        }        
    });
    $("#modalCRUD").modal("hide");    
    
}); 

function enviarDatos(e){
    e.preventDefault(); 
    cedula = $.trim($("#cedula").val()); 
    alert("entro",cedula);
}

function confirmacion() {
    if(confirm('¿Está seguro de hacer el agendado?')){
        return true;
    }else{
        return false;
    }
}