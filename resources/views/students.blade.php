@extends('layouts.app')
@section('title', 'Alumnos')
@section('section', 'Alumnos')
@section('content')
<div class="row">

    <!-- Modal para agregar un estudiante -->
    <div class="modal fade in" id="newStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Cuerpo del Modal -->
                <div class="modal-body">

                    <!-- Formulario de nuevo alumno -->
                    <form class="form" action="/alumnos/crear" method="post" id="createStudentForm">

                        <!-- Crear el token de seguridad -->
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="controlNumberControlInput">Número de control</label>
                                    <input type="text" id="controlNumberControlInput" name="controlNumber" class="form-control {{ $errors->has('controlNumber') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('controlNumber') }}</div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="careerControlInput">Carrera</label>
                                    <select class="form-control" id="careerControlInput" name="career">
                                        <option>Lic. Administración</option>
                                        <option>Contador Público</option>
                                        <option>Ing. Industrial</option>
                                        <option>Ing. Informática</option>
                                        <option>Lic. Biología</option>
                                        <option>Ing. Bioquímica</option>
                                        <option>Ing. Química</option>
                                        <option>Ing. Gest. Empresarial</option>
                                        <option>Ing. Mecatrónica</option>
                                        <option>Ing. Electrónica</option>
                                        <option>Ing. Electromecánica</option>
                                        <option>Arquitectura</option>
                                        <option>Ing. Ind. Alimentarias</option>
                                        <option>Ing. Innovación Agrícola S.</option>
                                        <option>Carrera no registrada</option>
                                        <option>Alumno externo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstNamesControlInput">Nombre(s)</label>
                            <input type="text" id="firstNamesControlInput" name="firstNames" class="form-control {{ $errors->has('firstNames') ? 'is-invalid' : ''}}">
                            <div class="invalid-feedback">{{ $errors->first('firstNames') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="fathersLastNameControlInput">Apellido paterno</label>
                            <input type="text" id="fathersLastNameControlInput" name="fathersLastName" class="form-control {{ $errors->has('fathersLastName') ? 'is-invalid' : ''}}">
                            <div class="invalid-feedback">{{ $errors->first('fathersLastName') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="mothersLastNameControlInput">Apellido materno</label>
                            <input type="text" id="mothersLastNameControlInput" name="mothersLastName" class="form-control {{ $errors->has('mothersLastName') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">{{ $errors->first('mothersLastName') }}</div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phoneNumberControlInput">Número telefónico</label>
                                    <input type="tel" id="phoneNumberControlInput" name="phoneNumber" class="form-control {{ $errors->has('phoneNumber') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('phoneNumber') }}</div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="emailControlInput">Correo electrónico</label>
                                    <input type="email" id="emailControlInput" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                        </div>

                        <!--Revisar si este formulario regresó un error -->
                        @if($errors->any())
                            @foreach($errors as $error)
                            @endforeach
                        @endif

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Crear" form="createStudentForm">
                </div>
            </div>
        </div>
    </div>

    <!--Botones para manipular tabla de estudiantes-->
    <div class="btn-toolbar mb-3 w-100" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newStudentModal">Nuevo</button>
            <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('deleteStudentForm').submit();">Eliminar seleccionado</button>
        </div>

        <!-- Formulario oculto para eliminar. Mucho cuidado aquí -->
        <form class="form" action="/alumnos/eliminar" method="post" id="deleteStudentForm">
                <input type="hidden" name="id" value="">
                {{ csrf_field() }}
            </form>

        <div class="input-group col-auto mr-0 ml-auto">
            <input type="text" class="form-control w-auto" placeholder="Escriba algo..." aria-describedby="btnGroupAddon">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <!--Tabla de estudiantes-->
    <table class="table table-hover">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Número de control</th>
            <th>Nombre(s)</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Carrera</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
        </tr>
        <!--Imprimir un renglón dentro de la tabla para cada estudiante-->
        @foreach($students as $student)
        <tr id="studentRow{{ $student->id }}">
            <td><input type="checkbox" name="studentCheckbox{{ $student->id }}" onchange="selectStudent({{ $student->id }})"></td>
            <td>{{ $student->id }}</td>
            <td>{{ $student->control_number }}</td>
            <td>{{ $student->first_names }}</td>
            <td>{{ $student->fathers_last_name }}</td>
            <td>{{ $student->mothers_last_name }}</td>
            <td>{{ $student->career }}</td>
            <td>{{ $student->phone_number }}</td>
            <td>{{ $student->email }}</td>
        </tr>
        @endforeach
    </table>

    <!-- Botones de paginación -->
    <div class="mx-auto">
        {{ $students->links('pagination::bootstrap-4') }}
    </div>
    
    <!--<div class="w-100">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>-->

    </div>

@endsection

@section('scripts')

<script type="text/javascript">

    var selectedId;

    //Método para que cuando un renglón de la tabla esté seleccionado este cambie de color
    function selectStudent(id) {
        var row = document.getElementById("studentRow" + id);
        var chk = document.getElementsByName("studentCheckbox" + id);
        if (chk[0].checked) {

            row.className = "table-active";

            //console.log(row);

            //Obtener las otras rows y deseleccionarlas
            if(selectedId != null){
                var previousRow = document.getElementById("studentRow" + selectedId);
                var previousChk = document.getElementsByName("studentCheckbox" + selectedId);
                previousRow.className = "";
                previousChk[0].checked = false;
            }

            //Establecer el ID como el seleccionado actual
            selectedId = id;
            document.forms['deleteStudentForm'].elements[0].value = selectedId;

        } else {
            row.className = "";
            selectedId = null;
            document.forms['deleteStudentForm'].elements[0].value = null;
        }

    }
</script>

<!-- Si hubo un error en el formulario de nuevo estudiante, abrir modal automaticamente -->
@if($errors->any())
    <script type="text/javascript">
        var $errorMessage = 'Error al crear el alumno.';
        @foreach($errors->all() as $error)
            $errorMessage = $errorMessage + ' {{ $error }}';
        @endforeach
        alert($errorMessage);
        
        //Abrir modal de estudiante
        $( document ).ready(function() {
            $('#newStudentModal').modal('show');
        });
        
    </script>
@endif

@endsection
