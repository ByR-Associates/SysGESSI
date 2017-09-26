@extends('voyager::master')

@if(isset($dataTypeContent->id))
    @section('page_title','Edit '.$dataType->display_name_singular)
@else
    @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')


    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.clientes.update', $dataTypeContent->id) }}@else{{ route('voyager.clientes.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-12">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Tipo Documento:</label>
                            <select class="form-control" name="TipoDocumento">
                                <option value="Cedula" @if(isset($dataTypeContent->TipoDocumento) && $dataTypeContent->TipoDocumento == 'Cedula'){{ 'selected="selected"' }}@endif>Cedula</option>
                                <option value="RUC" @if(isset($dataTypeContent->TipoDocumento) && $dataTypeContent->TipoDocumento == 'RUC'){{ 'selected="selected"' }}@endif>RUC</option>
                                <option value="Pasaporte" @if(isset($dataTypeContent->TipoDocumento) && $dataTypeContent->TipoDocumento == 'Pasaporte'){{ 'selected="selected"' }}@endif>Pasaporte</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">No. Documento:</label>
                            <input type="text" class="form-control" id="NumeroDocumento" name="NumeroDocumento" placeholder="Numero Documento" value="@if(isset($dataTypeContent->NumeroDocumento)){{ $dataTypeContent->NumeroDocumento }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="name">Nombres:</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombres" value="@if(isset($dataTypeContent->Nombre)){{ $dataTypeContent->Nombre }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="name">Apellidos:</label>
                            <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellidos" value="@if(isset($dataTypeContent->Apellido)){{ $dataTypeContent->Apellido }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="name">Provincia:</label>
                            <select class="form-control" name="provincia_id" id="provincia">
                                @foreach(STD\Provincia::all() as $provincia)
                                    <option value="{{ $provincia->id }}"
                                    @if(isset($dataTypeContent->provincia_id) && $dataTypeContent->provincia_id == $provincia->id)
                                        {{ 'selected="selected"' }}
                                    @endif>{{ $provincia->provincia }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="name">Canton:</label>
                            <select class="form-control" name="canton_id" id="canton">
                                @foreach(STD\Canton::where('provincia_id', $dataTypeContent->provincia_id)->get() as $canton)
                                    <option value="{{ $canton->id }}"
                                    @if(isset($dataTypeContent->canton_id) && $dataTypeContent->canton_id == $canton->id)
                                        {{ 'selected="selected"' }}                                    
                                    @endif>{{ $canton->canton }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Parroquia:</label>
                            <select class="form-control" name="parroquia_id" id="parroquia">
                                @foreach(STD\Parroquia::where('canton_id', $dataTypeContent->canton_id)->get() as $parroquia)
                                    <option value="{{ $parroquia->id }}"
                                    @if(isset($dataTypeContent->parroquia_id) && $dataTypeContent->parroquia_id == $parroquia->id){{ 'selected="selected"' }}                                    
                                    @endif>{{ $parroquia->parroquia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Dirección:</label>
                            <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion" value="@if(isset($dataTypeContent->Direccion)){{ $dataTypeContent->Direccion }}@endif">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="hidden" class="from-group" id="inputArrayTelefono" name="StrTelefonos">
                                <label for="telefono" style="display:block;">Telefono</label>
                                <select name="inputTipoTelefono" id="inputTipoTelefono" class="form-control" style="width:20%; display:inline-block;">
                                    <option value="Personal">Personal</option>
                                    <option value="Domicilio">Domicilio</option>
                                    <option value="Trabajo">Trabajo</option>
                                </select>
                                <input type="text" class="form-control" id="inputNumeroTelefono" placeholder="Numero de telefono" style="width: 40%; display: inline-block;">
                                <a href="#" id="agregarTelefono" >
                                    <span id="labelAgregarTelefono" class="icon-trash-o btn btn-default", style="width: 18%" >Agregar</span>
                                </a>
                                <a href="#" id="eliminarTelefono" >
                                    <span id="labelEliminarTelefono" class="icon-trash-o btn btn-default" style="width: 18%">Eliminar</span>
                                </a>
                            </div>
                            <div class="form-group">      
                                <table id="TableRecordTelefono"  class="table table-hover table-strip gridlist" >
                                    <thead>
                                        <tr>
                                            <th>Tipo Telefono</th>
                                            <th>Numero</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableTelefono">
                                        @foreach (STD\Telefono::where('cliente_id', $dataTypeContent->id)->get() as $telefono)
                                            <tr>
                                                <td class="id" style="display:none;">{{ $telefono->id }}</td>
                                                <td class="tipo">{{ $telefono->TipoTelefono }}</td>
                                                <td class="dato">{{ $telefono->Numero }}</td>
                                                <td class="deleted" style="display:none;">false</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="hidden" id="inputArrayEmail" name="StrEmails" class="form-control">
                                <label for="email" style="display:block;">Email:</label>
                                <select name="inputTipoEmail" id="inputTipoEmail" class="form-control" style="width:20%; display: inline-block;">
                                    <option value="Personal">Personal</option>
                                    <option value="Trabajo">Trabajo</option>
                                </select>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email" style="width: 40%; display: inline-block;">
                                <a href="#" id="agregarEmail" >
                                    <span id="labelAgregarEmail" class="icon-trash-o btn btn-default", style="width: 18%" >Agregar</span>
                                </a>
                                <a href="#" id="eliminarEmail" >
                                    <span id="labelEliminarEmail" class="icon-trash-o btn btn-default", style="width: 18%">Eliminar</span>
                                </a>
                            </div>
                            <div class="form-group">      
                                <table id="TableRecordEmail"  class="table table-hover table-strip gridlist" >
                                    <thead>
                                        <tr>
                                            <th>Tipo Email</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableEmail">
                                        @foreach (STD\Email::where('cliente_id', $dataTypeContent->id)->get() as $email)
                                            <tr>
                                                <td class="id" style="display:none;">{{ $email->id }}</td>
                                                <td class="tipo">{{ $email->TipoEmail }}</td>
                                                <td class="dato">{{ $email->Email }}</td>
                                                <td class="deleted" style="display:none;">false</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">
                @if(isset($dataTypeContent->id)){{ 'Actualizar Cliente' }}@else <i class="icon wb-plus-circle"></i> Crear Nuevo Cliente @endif
            </button>
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('#slug').slugify();

        @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
        @endif
        });


$(document).on('change', '#provincia', function(e){
    $("#canton").empty();
    $("#parroquia").empty();
    $.get("/getCantones/"+e.target.value+"",function(response){
        //console.log(response);
    $("#canton").append("<option  selected='true' value='0'>Seleccione un cantón</option>");
        for(i=0;i<response.length; i++){
            $("#canton").append("<option value='"+response[i].id+"'>"+response[i].canton+"</option>");
        }
    });
    document.getElementById("canton").selectedIndex = -1;

});

$(document).on('change', '#canton', function(e){
    $("#parroquia").empty();
    $.get("/getParroquias/"+e.target.value+"",function(response){
        //console.log(response);
    $("#parroquia").append("<option  selected='true' value='0'>Seleccione una parroquia</option>");

        for(i=0;i<response.length; i++){
            $("#parroquia").append("<option value='"+response[i].id+"'>"+response[i].parroquia+"</option>");
        }
    });

});

function getAllProvincia(){
//$(document).on('click','#provincia', function(e){

    //alert($("#provincia").options.length);
    //if($("#provincia").length ==1){

        var route = "/getProvincias";

        $.ajax({
            url:route,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                for(i=0;i<data.length; i++){
                    $("#provincia").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                }       
            },
            error: function (data) {
                alert("error");
                console.log('Error:', data);
            }   
        });
    //};
};


//***************** SECTION TELEFONO *****************//
//RESET CONTROL
function resetControlsTelefono(){
    $("#inputArrayTelefono").val(getAllPhone());

    document.getElementById("inputTipoTelefono").selectedIndex = 0;
    $("#inputNumeroTelefono").val("");
    document.getElementById("labelAgregarTelefono").innerHTML="Agregar";
};

//GET ALL PHONES
function getAllPhone(){
    var json ="", jsonRow ="";
    $("#tableTelefono tr").each(function(){
        json+=",{"
        jsonRow ="";
        $(this).find("td").each(function () {
            $this=$(this);
            jsonRow+=',"'+$this.attr("class")+'":"'+$this.html()+'"';
        });
        json+= jsonRow.substr(1)+"}";
    });
   obj= '['+json.substr(1)+']';
    return obj;
};

//Select Row in TelefonoTable
$(document).on('click','#tableTelefono tr', function(e){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var tipoTelefono=$(this).find('td:nth-child(2)').html(); //td:first
   var numeroTelefono=$(this).find('td:nth-child(3)').html();
    $("#inputTipoTelefono").val(tipoTelefono);
    $("#inputNumeroTelefono").val(numeroTelefono);
    document.getElementById("labelAgregarTelefono").innerHTML="Modificar";
});

//BUTTON AGREGAR/MODIFICAR TELEFONO
$(document).on('click', '#agregarTelefono', function(e){
    e.preventDefault();

    var idTelefono;
    var isDeleted = false;
    var tipoTelefono = $("#inputTipoTelefono").val();
    var numeroTelefono = $("#inputNumeroTelefono").val();

    if(numeroTelefono){
        if($('#labelAgregarTelefono').text()=="Modificar"){
            var trSelected = $("#tableTelefono tr.selected");
            idTelefono = trSelected.find('td:first').html();

            var indexselec = trSelected.closest("tr").index();
            var node = document.getElementById("tableTelefono").rows[indexselec];

            var dataRow="<tr><td class='id' style='display:none;'>"+idTelefono+"</td><td  class='tipo' >"+tipoTelefono+"</td><td class='dato'>"+numeroTelefono+"</td><td class='deleted' style='display:none;'>"+isDeleted+"</td></tr> ";
            var newRow = document.createElement("tr");
            newRow.innerHTML=dataRow;
            document.getElementById("tableTelefono").replaceChild(newRow, node);
        }
        else{
            var dataRow="<tr><td class='id' style='display:none;'>"+idTelefono+"</td><td  class='tipo' >"+tipoTelefono+"</td><td class='dato'>"+numeroTelefono+"</td><td class='deleted' style='display:none;'>"+isDeleted+"</td></tr> ";

            var newRow = document.createElement("tr");
            newRow.innerHTML=dataRow;
            document.getElementById("tableTelefono").appendChild(newRow);
        };
   };
    
    resetControlsTelefono();
});

//BUTTON ELIMINAR TELEFONO
$(document).on('click','#eliminarTelefono', function(e){
    e.preventDefault();

    //$("#tableTelefono tr.selected").remove();
    var trSelected= $("#tableTelefono tr.selected");

    trSelected.attr("style", "display:none;");
    var td = trSelected.find('td:nth-child(4)');
    //alert(td.html());
    td.html("true");
    //td.find('.isDeleted').prop('checked', true);
    
    resetControlsTelefono();
});
//***************** FIN SECTION TELEFONO *****************//



//***************** SECTION E-MAIL *****************//
//RESET CONTROL
function resetControlsEmail(){
    $("#inputArrayEmail").val(getAllEmail());

    document.getElementById("inputTipoEmail").selectedIndex = 0;
    $("#inputEmail").val("");
    document.getElementById("labelAgregarEmail").innerHTML="Agregar";
};

//GET ALL EMAIL
function getAllEmail(){
    var json ="", jsonRow ="";
    $("#tableEmail tr").each(function(){
        json+=",{"
        jsonRow ="";
        $(this).find("td").each(function () {
            $this=$(this);
            jsonRow+=',"'+$this.attr("class")+'":"'+$this.html()+'"';
        });
        json+= jsonRow.substr(1)+"}";
    });
   obj= '['+json.substr(1)+']';
    return obj;
};

//Select Row in EmailTable
$(document).on('click','#tableEmail tr', function(e){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var tipoTelefono=$(this).find('td:nth-child(2)').html(); //td:first
   var numeroTelefono=$(this).find('td:nth-child(3)').html();
    $("#inputTipoEmail").val(tipoTelefono);
    $("#inputEmail").val(numeroTelefono);
    document.getElementById("labelAgregarEmail").innerHTML="Modificar";
});

//BUTTON AGREGAR/MODIFICAR EMAIL
$(document).on('click', '#agregarEmail', function(e){
    e.preventDefault();

    var idEmail;
    var isDeleted = false;
    var tipoEmail = $("#inputTipoEmail").val();
    var email = $("#inputEmail").val();

    if(email){
        if($('#labelAgregarEmail').text()=="Modificar"){
            var trSelected = $("#tableEmail tr.selected");
            idEmail = trSelected.find('td:first').html();

            var indexselec = trSelected.closest("tr").index();
            var node = document.getElementById("tableEmail").rows[indexselec];

            var dataRow="<tr><td class='id' style='display:none;'>"+idEmail+"</td><td  class='tipo' >"+tipoEmail+"</td><td class='dato'>"+email+"</td><td class='deleted' style='display:none;'>"+isDeleted+"</td></tr> ";
            var newRow = document.createElement("tr");
            newRow.innerHTML=dataRow;
            document.getElementById("tableEmail").replaceChild(newRow, node);
        }
        else{
            var dataRow="<tr><td class='id' style='display:none;'>"+idEmail+"</td><td  class='tipo' >"+tipoEmail+"</td><td class='dato'>"+email+"</td><td class='deleted' style='display:none;'>"+isDeleted+"</td></tr> ";

            var newRow = document.createElement("tr");
            newRow.innerHTML=dataRow;
            document.getElementById("tableEmail").appendChild(newRow);
        };
   };
    
    resetControlsEmail();
});

//BUTTON ELIMINAR EMAIL
$(document).on('click','#eliminarEmail', function(e){
    e.preventDefault();
    var trSelected= $("#tableEmail tr.selected");

    trSelected.attr("style", "display:none;");
    var td = trSelected.find('td:nth-child(4)');
    td.html("true");
    
    resetControlsEmail();
});
//***************** FIN SECTION TELEFONO *****************//






    </script>
    @if($isModelTranslatable)
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script src="{{ voyager_asset('lib/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ voyager_asset('js/voyager_tinymce.js') }}"></script>
    <script src="{{ voyager_asset('js/slugify.js') }}"></script>
@stop
