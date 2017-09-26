<?php

namespace SysGESSI\Http\Controllers;

use Illuminate\Http\Request;
use SysGESSI\Http\Controllers\Controller;
use SysGESSI\SolicitudEstudio;
use SysGESSI\Provincia;
use SysGESSI\Canton;
use SysGESSI\Parroquia;
use SysGESSI\OrdenTrabajo;

class SolicitudEstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view ('pages.solicitud.index');

        // $solicitudEstudios = SolicitudEstudio::all();
         
        // if($request -> ajax()){
        //     return response()->json(view('pages.solicitud._table', compact('solicitudEstudios'))->render());            
        // }
        // return view('pages.solicitud.index', compact('solicitudEstudios'));
    }

    public function getSolicitudes($estado)
    {
        $solicitudEstudios = SolicitudEstudio::where('estado', $estado)->with(['cliente'])->get();
        
        return $solicitudEstudios;
    }


    public function findSolicitudEstudio($id)
    {
         $solicitudEstudios = SolicitudEstudio::
            with([
                'cliente',
                'ordenesTrabajo',
                'ordenesTrabajo.trabajoCampo',
                'ordenesTrabajo.trabajoCampo.trabajosLaboratorio',
               // 'ordenesTrabajo.informeFinal'
                ])->find($id);

/*        $solicitudEstudios = 

            SolicitudEstudio::find($id)
                ->with(['cliente',
                        'ordenTrabajo',
                        'ordenTrabajo.trabajoCampo',
                        'ordenTrabajo.trabajoCampo.trabajoLaboratorio'
                    ])->get();
*/
        return $solicitudEstudios;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitud = new SolicitudEstudio;
        $provincia = Provincia::pluck('provincia','id')->all();
        $cantones = [];
        $parroquias = [];

        if($request -> ajax()){
            return response()->json(
                                view('pages.solicitud._form', 
                                    compact('solicitud', 'provincia', 'cantones', 'parroquias'))->render());}
        
        return view('pages.solicitud.show', compact('solicitud', 'provincia', 'cantones', 'parroquias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordenTrabajo = new OrdenTrabajo;      
      
        /*$ordenTrabajo->Descripcion = $request->Descripcion;
        $ordenTrabajo->Estado = $request->Estado;
        $ordenTrabajo->Observacion = $request->Observacion;
        $ordenTrabajo->Extras = $request->Extras;
        $ordenTrabajo->solicitud_estudio_id = $request->solicitud_estudio_id;
        $ordenTrabajo->UsuarioIdAutorizado = 1;
        $ordenTrabajo->UsuarioIdResponsable = 1;
         $ordenTrabajo->RecibidoPor = "Ramon";
        $ordenTrabajo->Fecha = '01/01/01';

        $ordenTrabajo->save();*/
        
        return response($ordenTrabajo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $solicitud = SolicitudEstudio::find($id);
        $provincia = Provincia::pluck('provincia','id')->all();


        $cantones=Canton::where('provincia_id', $solicitud->parroquia->canton->provincia->id)->pluck('canton','id')->all();
        $parroquias=Parroquia::where('canton_id', $solicitud->parroquia->canton->id)->pluck('parroquia','id')->all();

        if($request -> ajax()){
            return response()->json(
                                view('pages.solicitud._form', 
                                    compact('solicitud','provincia','cantones', 'parroquias'))->render());
        }
      
        return view('pages.solicitud.show', compact('solicitud','provincia','cantones', 'parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
