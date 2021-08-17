<div class="content">
    <!-- SALONES -->
    <div class="content_salones" id="content_salones">
        <h2>SALONES</h2>
        <div class="content_menuSalones">
            <ul>
                <li><button type="button" class="btn btn-primary" onclick="viewsSalones(1);">Crear Salon</button></li>
                <li><button type="button" class="btn btn-primary" onclick="viewsSalones(2);">Listar Salones</button></li>
            </ul>
        </div>
        <!-- CREAR SALON -->
        <div class="content_crearSalones" id="crearSalones">
            <form id="formCrearSalones">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="nombreSalon" id="nombreSalon" placeholder="* Nombre del salon" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 btnFormCenter">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- LISTADO SALONES -->
        <div class="content_ListaSalones" id="listaSalones">
            
            <table class="table table-hover table-bordered  text-center" id="dtSalones" style="width:100%">
                <thead class="bg-primary text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
            </table>
        </div> 
        <!-- AGENDAR SALON -->
        <div class="content_agendarSalones" id="agendaSalones">
            <form id="formCrearAgenda">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="nSalon" id="nSalon" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select name="selectCurso" id="selectCurso" class="selectpicker form-control " data-size="5" title="* Seleccione el curso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                            <select name="horaEntrada" id="horaEntrada" class="selectpicker form-control " data-size="5" title="* Hora ingreso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados">
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select name="horaSalida" id="horaSalida" class="selectpicker form-control " data-size="5" title="* Hora salida" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados">
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                            <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 btnFormCenter">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
        <!-- AGENDA DE SALONES Y CURSOS-->
        <div class="content_listaAgenda" id="listaAgenda">
            
            <table class="table table-hover table-bordered  text-center" id="dtAgendaSalones" style="width:100%">
                <thead class="bg-primary text-center">
                    <tr>
                        <th>Salon</th>
                        <th>Curso</th>
                        <th>Profesor</th>
                        <th>Fecha</th>
                        <th>Hora Ingreso</th>
                        <th>Hora Salida</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- CURSOS -->

    <div class="content_cursos" id="content_cursos">
        <h2>CURSOS</h2>
        <div class="content_menuCursos">
            <ul>
                <li><button type="button" class="btn btn-primary" onclick="viewsCursos(1);">Crear Curso</button></li>
                <li><button type="button" class="btn btn-primary" onclick="viewsCursos(3);">Listado Curso</button></li>
            </ul>
        </div>
        <!-- CREAR CURSO -->
        <div class="content_crearCurso" id="crearCurso">
            <form id="formCrearCurso">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="nombreCurso" id="nombreCurso" placeholder="* Nombre del curso" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select name="selectProfesor" id="selectProfesor" class="selectpicker form-control " data-size="5" title="* Seleccione profesor para el curso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados"></select>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 btnFormIzquierda">
                        <div class="form-group">
                            <button type="submit" id="btnCrearCurso" class="btn btn-success">Crear Curso</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- ASIGNAR ALUMNOS -->
        <div class="content_asignarAlumno" id="asignarAlumno">
            <div class="titulosAsignarAlumno">
                <h3>Curso: <spna id="nCurso"></spam></h3>
                <h3>Profesor: <span id="nProfesor"></span></h3>
            </div>
            <form id="formAsignarAlumno" class="formAsignarAlumno">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-bordered  text-center" id="dtAlumnos" style="width:100%">
                            <thead class="bg-primary text-center">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Identificacion</th>
                                    <th>Codigo</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 btnFormIzquierda">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Asignar Estudiante</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
        <!-- LISTA DE CURSO -->
        <div class="content_ListaCursos" id="listaCursos">
            
            <table class="table table-hover table-bordered  text-center" id="dtCursos" style="width:100%">
                <thead class="bg-primary text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Profesor</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
            </table>
        </div>         
    </div>
    

</div>
<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>