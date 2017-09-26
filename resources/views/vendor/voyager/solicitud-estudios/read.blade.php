@extends('voyager::master')

@section('css')
    <style>
a {
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease; }

a, a:hover, a:focus, a:active {
  text-decoration: none; }

ul {
  padding: 0;
  margin: 0; }

figure {
  margin: 0;
  padding: 0; }

.gutter {
  padding-left: 15px;
  padding-right: 15px; }

.alto, .row, .container, .container-fluid {
  height: 100%; }

.container, .container-fluid {
  width: 100%; }

.ancho-full {
  width: 100%;
  max-width: 1400px;
  padding: 0px;
  margin: 0 auto;
  overflow: hidden; }

.oculto {
  display: none; }

.primario {
  background: #00CA67; }

.segundo {
  background: #0E6185; }

.tercero {
  background: #242424; }

.color-primario {
  color: #00CA67; }

.color-segundo {
  color: #0E6185; }

.color-tercero {
  color: #242424; }

.color-blanco {
  color: white; }

.color-negro {
  color: #212121; }

.color-blanco {
  color: white; }

.centrado-flex {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column; }

.parallax {
  background-position: center 0;
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat; }

[class^="icon-"]::before {
  position: relative;
  top: 2px; }

.sinpadding {
  padding: 0; }

.cuerpo {
  padding-top: 3.75em;
  background-color: #FBFBFB; }

.leer-mas {
  display: inline-block;
  padding: 10px 15px;
  background-color: #00CA67;
  color: white;
  cursor: pointer;
  border-radius: 5px; }
  .leer-mas:hover {
    background: #00a152;
    color: white; }

.pagination .page-numbers {
  background: #00CA67;
  color: white;
  padding: 5px; }
  .pagination .page-numbers:hover {
    background: #00a152; }

.pagination .current {
  background: #00a152; }

.breadcrumb {
  color: #757575;
  margin-left: 15px;
  margin-right: 15px;
  margin-bottom: 0; }
  .breadcrumb a {
    color: #00CA67; }

.facebook {
  color: #3b5998;
  border: 1px solid #3b5998; }

.twitter {
  color: #55acee;
  border: 1px solid #55acee; }

.instagram {
  color: #e95950;
  border: 1px solid #e95950; }

ul.paginacion {
  list-style: none; }

.content {
  padding-top: 0; }

.division {
  width: 100%;
  height: 1px;
  background: #757575;
  margin-top: 15px;
  margin-bottom: 15px; }

.primary {
  background: #286090; }

.cinfo {
  background: #31B0D5; }

.warning {
  background: #EC971F; }

.success {
  background: #449D44; }

.danger {
  background: #C9302C; }

.menu_activo {
  color: white !important; }

.menu_open {
  display: block !important; }

.content-header__page {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-top: 5px; }

.content-header__left {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between; }
  .content-header__left h1 {
    margin-top: 0;
    font-size: 22px;
    margin-bottom: 0; }

.content-header__right {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -ms-flex-pack: end;
  justify-content: flex-end; }
  .content-header__right .breadcrumb {
    display: inline-block;
    padding: 10px 15px;
    font-size: 13px; }

.content-header__enlace {
  margin-left: 15px; }

.content-header__icono__item {
  margin-right: 10px; }
  .content-header__icono__item span {
    font-size: 20px; }
  .content-header__icono__item:last-child {
    margin-right: 30px; }

.content__title {
  padding-right: 15px;
  padding-left: 15px; }
  .content__title h2 {
    font-size: 20px;
    color: #757575;
    margin-top: 0; }

.content__head h3 {
  font-size: 22px;
  display: inline-block; }

.content__head .headgrid__enlace {
  display: inline-block;
  margin-left: 20px; }

.steps {
  /* margin: 40px; */
  margin: 10px 0px 2px 0px;
  padding: 0;
  overflow: hidden; }

.steps a {
  color: white;
  text-decoration: none; }

.steps em {
  display: block;
  font-size: 1.1em;
  font-weight: bold; }

.steps li {
  float: left;
  margin-left: 0;
  width: 200px;
  /* 100 / number of steps */
  height: 70px;
  /* total height */
  list-style-type: none;
  padding: 5px 5px 5px 30px;
  /* padding around text, last should include arrow width */
  border-right: 3px solid white;
  /* width: gap between arrows, color: background of document */
  position: relative; }
  @media (min-width: 992px) {
    .steps li {
      width: 20%; } }

.steps li a {
  width: 100%;
  height: 100%;
  display: block; }

/* remove extra padding on the first object since it doesn't have an arrow to the left */
.steps li:first-child {
  padding-left: 5px; }

/* white arrow to the left to "erase" background (starting from the 2nd object) */
.steps li:nth-child(n+2)::before {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  border-left: 25px solid white;
  /* width: arrow width, color: background of document */
  border-top: 35px solid transparent;
  /* width: half height */
  border-bottom: 35px solid transparent;
  /* width: half height */
  width: 0;
  height: 0;
  content: " "; }

/* colored arrow to the right */
.steps li::after {
  z-index: 1;
  /* need to bring this above the next item */
  position: absolute;
  top: 0;
  right: -25px;
  /* arrow width (negated) */
  display: block;
  border-left: 25px solid #7c8437;
  /* width: arrow width */
  border-top: 35px solid transparent;
  /* width: half height */
  border-bottom: 35px solid transparent;
  /* width: half height */
  width: 0;
  height: 0;
  content: " "; }

/* Setup colors (both the background and the arrow) */
/* Completed */
.steps li {
  background-color: #7C8437; }

.steps li.orden-trabajo {
  background-color: #EC971F; }

.steps li.orden-trabajo::after {
  border-left-color: #EC971F; }

.steps li.orden-trabajo:hover {
  background-color: #d18112; }

.steps li.orden-trabajo:hover::after {
  border-left-color: #d18112; }

.steps li.trabajo-campo {
  background-color: #0E6185; }

.steps li.trabajo-campo::after {
  border-left-color: #0E6185; }

.steps li.trabajo-campo:hover {
  background-color: #0a4660; }

.steps li.trabajo-campo:hover::after {
  border-left-color: #0a4660; }

.steps li.trabajos-laboratorio {
  background-color: #31B0D5; }

.steps li.trabajos-laboratorio::after {
  border-left-color: #31B0D5; }

.steps li.trabajos-laboratorio:hover {
  background-color: #2597b8; }

.steps li.trabajos-laboratorio:hover::after {
  border-left-color: #2597b8; }

.steps li.trabajos-finalizado {
  background-color: #00CA67; }

.steps li.trabajos-finalizado::after {
  border-left-color: #00CA67; }

.steps li.trabajos-finalizado:hover {
  background-color: #00a152; }

.steps li.trabajos-finalizado:hover::after {
  border-left-color: #00a152; }

.steps li::after {
  border-left-color: #7c8437; }

/* Current */
.steps li.current {
  background-color: #C36615; }

.steps li.current::after {
  border-left-color: #C36615; }

/* Following */
.steps li.current ~ li {
  background-color: #bcbcbc;
      cursor: not-allowed;
       }

.steps li.current ~ li::after {
  border-left-color: #bcbcbc;
   cursor: not-allowed;
    }

.steps li.current ~ li:hover {
  background-color: #bcbcbc;
   }

 .steps li.current ~ li:hover::after {
  border-left-color: #bcbcbc; } 

     </style>
@stop



    @section('page_header')
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ ucfirst($dataType->display_name_singular) }} &nbsp;
            @if (Voyager::can('edit_'.$dataType->name))
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                Editar
            </a>
            @endif
            <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Regresar a la lista
            </a>        
            <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Anular Solicitud de Estudio">
              <span class="glyphicon glyphicon-ban-circle"></span>&nbsp; 
              Anular
            </a>
        </h1>
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: none;"><span aria-hidden="true">&times;</span></button>
                <strong>Cliente: </strong> {{$dataTypeContent->cliente->getFullName()}}
                <br>
                <strong>Obra: </strong>{{$dataTypeContent->Obra}}
                <br>
                <strong>Dirección: </strong>{{$dataTypeContent->Direccion}}
            </div>
        </div>

        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered" style="padding-bottom:5px;">
                        <div class="containerApp">

                            <!-- content -->

                            <section class="content">
                               <div class="content__head">
                               <input type="hidden" id="idSolicitud" value="{{$dataTypeContent->id}}" >
                                  <h3>
                                     Ordenes de trabajo   
                                 </h3> &nbsp; 
                                 <button
                                     id="btnNewOrdenTrabajo" 
                                     class="btn btn-success add_item"
                                     v-bind:class="[haveNewOrdenTrabajo ? 'disabled': '']"  
                                     style="margin-bottom: 7px;"                      
                                     v-on:click.prevent="newOrdenTrabajo()">
                                     <span class="voyager-plus"></span>Nuevo
                                 </button>
                               </div>
                            
                                <!-- Your Page Content Here -->
                                 <div id="pageContent">
                                   <div class="row panel-group" v-for="ordenTrabajo in solicitudEstudio.ordenes_trabajo">
                                       <div class="col-xs-12">             
                                            <ul id="ulSteps" class="steps steps-4">
                                                <li class="orden-trabajo" v-if="ordenTrabajo" 
                                                    v-bind:class="[!ordenTrabajo.trabajo_campo ? 'current': '']">
                                                   <a 
                                                        v-bind:href="'#collapseOrdenTrabajo' + ordenTrabajo.id"
                                                        v-on:click.prevent="selectTab('#collapseOrdenTrabajo' + ordenTrabajo.id)"
                                                        data-toggle="collapse" 
                                                        title="Orden de Trabajo">
                                                       <em>Orden de Trabajo:</em>
                                                       <span>@{{ordenTrabajo.Descripcion}}</span>
                                                   </a>
                                                </li>
                                                <li class="orden-trabajo" v-else>
                                                   <a title="Orden de Trabajo">
                                                       <em>Orden de Trabajo:</em>
                                                   </a>
                                                </li>

                                                <li class="trabajo-campo" v-if="ordenTrabajo.trabajo_campo" 
                                                    v-bind:class="[ordenTrabajo.trabajo_campo.trabajos_laboratorio ? ordenTrabajo.trabajo_campo.trabajos_laboratorio.length == 0 ? 'current': '' : '']">
                                                   <a
                                                       v-bind:href="'#collapseTrabajoCampo'+ordenTrabajo.trabajo_campo.id" 
                                                        v-on:click.prevent="selectTab('#collapseTrabajoCampo'+ordenTrabajo.trabajo_campo.id)"
                                                       data-toggle="collapse" 
                                                       title="Trabajo de Campo">
                                                       <em>Trabajo de Campo:</em>
                                                       <span>@{{ordenTrabajo.trabajo_campo.Observacion}}</span>
                                                   </a>
                                                </li>
                                                <li class="trabajo-campo" v-else>
                                                    <a
                                                       title="Trabajo de Campo">
                                                       <em>Trabajo de Campo:</em>
                                                   </a>
                                                </li>
                                   

                                              <li class="trabajos-laboratorio" 
                                                  v-if="ordenTrabajo.trabajo_campo && ordenTrabajo.trabajo_campo.trabajos_laboratorio && ordenTrabajo.trabajo_campo.trabajos_laboratorio.length != 0" 
                                                  v-bind:class="[!ordenTrabajo.InformeFinal ? 'current': '']">
                                                   <a 
                                                     v-bind:href="'#collapseTrabajoLaboratorio' +ordenTrabajo.trabajo_campo.trabajos_laboratorio[0].id" 
                                                    v-on:click.prevent="selectTab('#collapseTrabajoLaboratorio' +ordenTrabajo.trabajo_campo.trabajos_laboratorio[0].id)"
                                                     data-toggle="collapse" 
                                                     title="Trabajo de Laboratorio">
                                                     <em>Trabajo de Laboratorio:</em>
                                                     <span>@{{ordenTrabajo.trabajo_campo.trabajos_laboratorio[0].DescripcionMuestra}}</span>
                                                   </a>
                                                </li>
                                                <li class="trabajos-laboratorio" v-else>
                                                   <a 
                                                       title="Trabajo de Laboratorio">
                                                       <em>Trabajo de Laboratorio:</em>
                                                   </a>
                                                </li>  
                                                     
                                                <li class="trabajos-finalizado" v-bind:class="[ordenTrabajo.Estado == 'Finalizado' ? 'current' :'']">
                                                    <a 
                                                        href="#collapseInformeFinal"
                                                        data-toggle="collapse" 
                                                        title="Informe Final">
                                                        <em>Informe Final:</em>
                                                    </a>
                                                </li>

                                                <div class="box-tools">
                                                    <a href="#" class="ultimo_icono oculto" title="Finalizada"  >
                                                        <span 
                                                           class="fa fa-flag" 
                                                           style="font-size: 60px; color: green;">
                                                        </span>
                                                    </a>      
                                                    <a href="#" class="ultimo_icono oculto" title="Anulada"  >
                                                        <span 
                                                           class="fa fa-times-circle" 
                                                           style="font-size:  60px; color: #C9302C;">
                                                        </span>
                                                    </a>
                                                </div>
                                            </ul>
                                            
                                            {{-- se llama el formulario de orden trabajo --}}                            
                                            @include('ordenTrabajo._form')
                                            
                                            {{-- se llama el formulario de trabajo de Campo --}}                            
                                            @include('trabajoCampo._form')    

                                            {{-- se llama el formulario de trabajo de Campo --}}                            
                                          <!--   @include('trabajoLaboratorio._form')    -->  
                               
                                       </div>
                                   </div>  

                                  <pre> @{{ $data }}  </pre>    
                               </div>
                                
                                            
                                    <div class="division"></div>                 
                                
                                
                                    <div class="solicitud-footer">
                                        <button class="btn leer-mas form-group" type="submit">
                                        <span class="fa fa-check-square-o"></span> Finalizar Estudio / Generar Factura</button>
                                       
                                    </div>                
                            </section>

                            <!-- end content section -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop



@section('example-vue-template')
   <select>
      <slot></slot>
  </select>
@endsection

@section('javascript')
 
 <script src="{{ asset('js/axios.js') }}"></script>
 <script src="{{ asset('js/vue.js') }}"></script>
<script>

Vue.component('select2',{
  props: ['options', 'value'],
  template: `@yield('example-vue-template')`,
  mounted: function() {
    var self = this;
    $(this.$el)
      .val(this.value)
       // init select2
      .select2({ placeholder: "Select options", data: this.options })
      // emit event on change.
      .on('change', function () {
        self.$emit('input',  $(this).val())
      });
  },
  watch: {
    value: function (value) {
      // update value
      $(this.$el).val(value)
    },
    options: function (options) {
      // update options
      $(this.$el).select2({ data: options })
    }
  },
    destroyed: function () {
    $(this.$el).off().select2('destroy')
  }
});



Vue.component('date-picker', {
  prop:['currentDate'
  ],

  template: '<input/>',
  mounted: function() {
     var self = this;
     
 //    console.log(currentDate);
    $(this.$el).datetimepicker({
      locale: 'fr',
      //date: this.currentDate, //'2012-08-08',
      //language: 'es',
      //autoclose: true,
      //todayHighlight: true,
      tooltips: {
            today: 'Revenir à aujourd\'hui',
            clear: 'Effacer la sélection',
            close: 'Fermer',
            selectMonth: 'Sélectionner le mois',
            prevMonth: 'Mois précédent',
            nextMonth: 'Mois suivant',
            selectYear: 'Sélectionner l\'année',
            prevYear: 'Année précédente',
            nextYear: 'Année suivante',
            selectDecade: 'Sélectionner la décénnie',
            prevDecade: 'Décénnie précédente',
            nextDecade: 'Décennie suivante',
            prevCentury: 'Siècle précédent',
            nextCentury: 'Siècle suivant'
        },
       format: 'YYYY-MM-DD HH:mm:ss'
    })
      .on("dp.change", function(e) {
        self.$emit('update-date', e.date );
      })
  },
  beforeDestroy: function() {
    $(this.$el).datetimepicker('hide').datetimepicker('destroy');
  }

});

  new Vue({
    el:'.containerApp',
    created: function(){
        this.id = $('#idSolicitud').val();
        this.findSolicitudEstudio(this.id);
    },
    data: {
        id: 0,
        selectedUser:'',
        listUsers:'',
        solicitudEstudio: '',
        currentPage: '',
        haveNewOrdenTrabajo: false,
        startDate: '',
    }, 
    ready: function(){
    
    } ,   
    mounted: function() {
     
    },
    methods: {
       updateDate: function(ordenTrabajo, date) {
        if(ordenTrabajo){
          var indice = this.solicitudEstudio.ordenes_trabajo.indexOf(ordenTrabajo); //, 1
          this.solicitudEstudio.ordenes_trabajo[indice].Fecha = date;


          
        }


/*                console.log(ordenTrabajo);
        console.log(date)*/
        /*
        if(typeObject=="ordenTrabajo")
        {
        console.log(objectId);
        console.log(field);
        console.log(date);

         // this.solicitudEstudio.ordenes_trabajo.

        }*/
       // ordenTrabajo.Fecha = date;
      //this.startDate = date;
    },

        findSolicitudEstudio: function(param){
            axios.get('/findSolicitudEstudio/'+param).then(response => {
                this.solicitudEstudio = response.data;
            }),

            axios.get('/getAllUsers').then(response => {
                this.listUsers = response.data;
            });
            
        },
        selectTab: function(e){
            if(this.currentPage == e)
                this.currentPage="";
            else
                this.currentPage = e;
        },      
        newOrdenTrabajo: function(e){
            if(!this.haveNewOrdenTrabajo){
                var ordenTrabajo = {
                    id:0,
                    solicitud_estudio_id:this.id,
                    UsuarioIdAutorizado: 0,
                    UsuarioIdResponsable: 0,
                    Descripcion: '',
                    Fecha:'',
                    RecibidoPor: '',
                    Estado: 'En Espera',
                    Observacion : '',
                    Extras: '0.00',
                    created_at: new Date(),
                    updated_at: new Date(),
                    trabajo_campo:''
                };
                this.solicitudEstudio.ordenes_trabajo.push(ordenTrabajo);
                this.haveNewOrdenTrabajo = true;
                this.currentPage="#collapseOrdenTrabajo0";
            }
        },
        urlEditSolicitud: function(){
            return '/solicitud/'+this.id+'/edit';
        },
        cancelOrdenTrabajo: function(e){
            if(e.id == 0){
                this.solicitudEstudio.ordenes_trabajo.splice(
                    this.solicitudEstudio.ordenes_trabajo.indexOf(e), 1);
                this.haveNewOrdenTrabajo = false;
            }
            this.currentPage='';
        },
        saveOrdenTrabajo: function(e){
            axios.post('solicitud',e).then(response => {
            console.log(response.data);
            
                this.solicitudEstudio.ordenes_trabajo.push(response.data)
                
            });
        },
        newTrabajoCampo: function(e){
          alert("entro");
         // var ordenTrabajoId = this.currentPage.replace('#collapseTrabajoCampo');
          var trabajoCampo = {
            id: 0,
            orden_trabajo_id: e.id,
            UsuarioIdResponsable: 0,
            EquiposUtilizados: '',
            Operadores: '',
            Observacion:'',
            trabajos_laboratorio: []
          };
          e.trabajo_campo = trabajoCampo;
          

          //this.solicitudEstudio.ordenes_trabajo[0].trabajo_campo.push(trabajoCampo);
          this.currentPage="#collapseTrabajoCampo0";

        }
    }
  });

</script>

@stop
