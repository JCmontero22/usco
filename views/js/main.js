var dtAlumno;
var dtCursos;
var dtSalones;
var dtAgenda;
let idCurso;
let edidAlumno;
let idSalon;

function init() {
    views(2);
    viewsCursos(1);
    viewsSalones(1);
    listadoProfesor();
    selectCurso();
    listarAlumnos();
    listarCusos();
    listarSalones();
    /* listaAgenda(); */
    $("#formCrearSalones").on('submit', function(e){
        crearSalon(e);
    });

    $("#formCrearCurso").on('submit', function(e){
        crearCurso(e);
    });

    $("#formAsignarAlumno").on('submit', function (e) {
        asignarAlumno(e);
    })

    $("#formCrearAgenda").on('submit', function (e) {
        crearAgenda(e);
    })

    idCurso = "";
    
    
}

function limpiarCursos() {
    $("#nombreCurso").val("");
    $("#selectProfesor").selectpicker('val', 0);
}

function limpiarSalon() {
    $("#nombreSalon").val("");
}

function limpiarAgenda() {
    $("#nSalon").val("");
    $("#selectCurso").selectpicker('val', 0);
    $("#horaEntrada").selectpicker('val', 0);
    $("#horaSalida").selectpicker('val', 0);
    
    
}

function viewsSalones(flag){
    if (flag == 1) {
        $("#listaSalones").hide();
        $("#crearSalones").show();
        $("#agendaSalones").hide();
        $("#listaAgenda").hide();
    }

    if (flag == 2) {
        $("#listaSalones").show();
        $("#crearSalones").hide();
        $("#agendaSalones").hide();
        $("#listaAgenda").hide();
    }

    if (flag == 3) {
        $("#listaSalones").hide();
        $("#crearSalones").hide();
        $("#agendaSalones").show();
        $("#listaAgenda").hide();
    }

    if (flag == 4) {
        $("#listaSalones").hide();
        $("#crearSalones").hide();
        $("#agendaSalones").hide();
        $("#listaAgenda").show();
    }
}

function views(flag) {
    if (flag == 1) {
        $("#content_salones").show();
        $("#content_cursos").hide();
        viewsSalones(1);
        
    }

    if (flag == 2) {
        $("#content_salones").hide();
        $("#content_cursos").show();
        viewsCursos(1);
    }
}

function viewsCursos(flag) {
    if (flag == 1) {
        $("#crearCurso").show();
        $("#asignarAlumno").hide();
        $("#listaCursos").hide();
        $("#btnCrearCurso").html("Crear Curso");
        limpiarCursos();
        idCurso = "";
    }

    if (flag == 2) {
        $("#crearCurso").hide();
        $("#asignarAlumno").show();
        $("#listaCursos").hide();
    }

    if (flag == 3) {
        $("#crearCurso").hide();
        $("#asignarAlumno").hide();
        $("#listaCursos").show();
        $("#alumno:checked").each(function() {
            $(this).prop("checked", false);
        });
    }

    if (flag == 4) {
        $("#crearCurso").show();
        $("#asignarAlumno").hide();
        $("#listaCursos").hide();   
        $("#btnCrearCurso").html("Actualizar Curso")     
    }

}

function crearSalon(e) {
    e.preventDefault();

    var nombreSalon = $("#nombreSalon").val();
    $.ajax({
        url: "./ajax/salonAjax.php",
        type: "POST",
        data: { nombreSalon:nombreSalon, idSalon : idSalon },
        success: function (data) {
            console.log(data);
            if (data == 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor diligenciar el campo nombre',
                });
            }

            if (data == 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lo sentimos',
                    text: 'El nombre del salon ya esta registrado',
                });
            }

            if (data == 3) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'El salon a sido creado',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarSalon();
                dtSalones.ajax.reload();
                viewsSalones(1);
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo crear el salon, por fallo en el sistema intente mas tarde',
                });
            }

            if (data == 5) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'El salon a sido actualizado',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarSalon();
                dtSalones.ajax.reload();
                viewsSalones(2);
                idSalon = "";
            }

            if (data == 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo actualizar el salon, por fallo en el sistema intente mas tarde',
                });
            }
        }
    });    

    
}

function listadoProfesor() {
    $.post("./ajax/profesorAjax.php?op=1", function (data) {
        $("#selectProfesor").html(data);
        $("#selectProfesor").selectpicker('refresh');
    })
}

function crearCurso(e) {
    e.preventDefault();
    
    var nombre = $("#nombreCurso").val();
    var idProfesor = $("#selectProfesor").val();
    
    $.ajax({
        url: "./ajax/cursoAjax.php",
        type: "POST",
        data: {nombreCurso : nombre, selectProfesor : idProfesor, idCurso : idCurso},
        success: function (data){
            
            if (data == 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor diligenciar los campos obligatorios',
                });
            }

            if (data == 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lo sentimos',
                    text: 'El nombre del curso ya esta registrado',
                });
            }

            if (data == 3) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'El curso a sido creado',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarCursos();
                selectCurso();
                dtCursos.ajax.reload();
                viewsCursos(2);
                $.post("./ajax/cursoAjax.php?op=1", function(data){
                    data = JSON.parse(data);
                    $("#nCurso").html(data.nombreCurso);
                    $("#nProfesor").html(data.nombreProfesor);
                    idCurso = data.id;
                });

                
                
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo crear el curso, por fallo en el sistema intente mas tarde',
                });
            }

            if (data == 5) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'El curso a sido actualizado',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarCursos();
                dtCursos.ajax.reload();
                viewsCursos(3);
                idCurso = "";
            }

            if (data == 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo actualizar el curso, por fallo en el sistema intente mas tarde',
                });
            }
        }
    });

}

function listarAlumnos() {
    dtAlumno = $('#dtAlumnos').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/AlumnoAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}

function asignarAlumno(e, id) {

    e.preventDefault();
        
    if (edidAlumno == 1) {
        let valores = [];
        $("input:checkbox").each(function(){
            valores.push(this.value);
        });
        $.post('./ajax/cursoAlumnoAjax.php?op=2', {idCurso : idCurso, idAlumno : valores}, function(data){
            if (data == 1) {
                let valoresChek = [];
                $("input:checked").each(function(){
                    valoresChek.push(this.value);
                });

                $.post('./ajax/cursoAlumnoAjax.php', {idCursos : idCurso, idAlumno : valoresChek}, function(data) {
                    if (data == 1) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Favor seleccione los alumnos para ser asignados al curso',
                        });
                    }
        
                    if (data == 2) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Los alumnos han sido asignados',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#alumno:checked").each(function() {
                            $(this).prop("checked", false);
                        });
                        viewsCursos(1);    
                        idCurso = "";
                        edidAlumno = 0;
                        
                    }
        
                    if (data == 4) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Opss',
                            text: 'No se pudo crear el curso, por fallo en el sistema intente mas tarde',
                        });
                    }
                })
            }
        });
    }else{

        let valoresCheck = [];
        $("#alumno:checked").each(function(){
            valoresCheck.push(this.value);
        });

        $.post('./ajax/cursoAlumnoAjax.php', {idCursos : idCurso, idAlumno : valoresCheck}, function(data) {
            if (data == 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor seleccione los alumnos para ser asignados al curso',
                });
            }

            if (data == 2) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Los alumnos han sido asignados',
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#alumno:checked").each(function() {
                    $(this).prop("checked", false);
                });
                viewsCursos(1);    
                idCurso = "";
                
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo crear el curso, por fallo en el sistema intente mas tarde',
                });
            }
        })
    }
}

function listarCusos() {
    
    dtCursos = $('#dtCursos').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/cursoAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}

function editarCursos(id) {
    
    viewsCursos(4);
    
    $.post('./ajax/cursoAjax.php', {idCurso : id}, function (data) {
        data = JSON.parse(data);
        $("#nombreCurso").val(data.nombreCurso);
        $("#selectProfesor").selectpicker('val', 1);
        idCurso = data.id;
    })
}

function editarAlumnos(id, curso, profesor) {
    idCurso = id
    edidAlumno = 1;
    $("#nCurso").html(curso);
    $("#nProfesor").html(profesor);
    $.post("./ajax/cursoAlumnoAjax.php?op=1", {idCurso : id}, function(data) {
        data = JSON.parse(data);
        $.each(data, function (iten) {
            $('input[name=alumno'+data[iten]+']').prop("checked", true);
        })
    });
    viewsCursos(2);


}

function listarSalones() {
    dtSalones = $('#dtSalones').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/salonAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}


function dataSalon(id) {
    viewsSalones(1);
    
    $.post('./ajax/salonAjax.php?op=1', {idSalon : id}, function(data){
        data = JSON.parse(data);
        idSalon = data.id;
        $("#nombreSalon").val(data.nombre);
    })
}

function selectCurso() {
    $.post("./ajax/cursoAjax.php?op=2", function (data) {
        $("#selectCurso").html(data);
        $("#selectCurso").selectpicker('refresh');
    })
}

function ajendaSalones(id, nombre) {
    viewsSalones(3);
    $("#nSalon").val(nombre);
    idSalon = id;
}

function crearAgenda(e) {
    
    e.preventDefault();
    var idCurso = $("#selectCurso").val();
    var horaEntrada = $("#horaEntrada").val();
    var horaSalida = $("#horaSalida").val();
    var fecha = $("#fecha").val();

    $.ajax({
        url: "./ajax/salonCursoAjax.php",
        type: "POST",
        data: {idCurso: idCurso, idSalon : idSalon,  horaEntrada : horaEntrada, horaSalida : horaSalida, fecha:fecha},
        success : function(data){
            console.log(data);
            if (data == 1) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Favor llene los campos obligatorios',
                    });
                }

                if (data == 2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'El horario para este salon ya esta ocupado',
                    });
                }
    
                if (data == 3) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Agenda creada',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    viewsSalones(2);
                    limpiarAgenda();
                    idSalon = "";
                    
                }
    
                if (data == 4) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opss',
                        text: 'No se pudo crear la agenda, por fallo en el sistema intente mas tarde',
                    });
                }  
        }
    });
}

function agenda(id) {
    console.log('idSalon : '+ id);
    viewsSalones(4);  
    listaAgenda(id);
}

function listaAgenda(id) {

    var hoy = new Date();
    var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
    console.log(hora);
    var fecha = hoy.getDate()+'-'+(hoy.getMonth() + 1)+'-'+hoy.getFullYear();
    dtAgenda = $('#dtAgendaSalones').dataTable({
        

        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

        "rowCallback": function (row, data, index) {
            if (data[3] <= fecha) {
                    $(row).css('color', 'White');
                    $('td', row).css('background-color', 'green');
                }
                if (data[3] > fecha) {
                    $(row).css('color', 'black');
                    $('td', row).css('background-color', 'yellow');
                }
        },

       "ajax":{
            url: "ajax/salonCursoAjax.php?dt=1",
            type: "get",
            data: {idSalon : id},
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();  
}



init();