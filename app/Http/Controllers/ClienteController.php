<?php

namespace SysGESSI\Http\Controllers;

use Illuminate\Http\Request;
use SysGESSI\Cliente;
use SysGESSI\Telefono;
use SysGESSI\Provincia;
use SysGESSI\Canton;
use SysGESSI\Parroquia;


class ClienteController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $clientes = Cliente::orderBy('id', 'DESC')->paginate(500);
         
        if($request -> ajax()){
            return response()->json(view('cliente._table', compact('clientes'))->render());            
        }
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function create(Request $request){
        $cliente = new Cliente;
        $provincia = Provincia::pluck('provincia','id')->all();
        $cantones = [];
        $parroquias = [];

        if($request -> ajax()){
            return response()->json(
                                view('pages.cliente._form', 
                                    compact('cliente', 'provincia', 'cantones', 'parroquias'))->render());}
        
        return view('pages.cliente.show', compact('cliente', 'provincia', 'cantones', 'parroquias'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ 
        $cliente = new Cliente;      
        $cliente->TipoDocumento = $request->TipoDocumento;
        $cliente->NumeroDocumento = $request->NumeroDocumento;
        $cliente->Nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->provincia_id = $request->provincia;
        $cliente->canton_id = $request->canton;
        $cliente->parroquia_id = $request->parroquia;
        
        $cliente->save();

        if(!is_null($request->StrTelefonos)){
            foreach (json_decode($request->StrTelefonos, true) as $fono) {

                if(is_null($fono['id']) || ($fono['id'])=="undefined" ){
                    
                    if($fono['deleted']=='false'){
                        $newTelefono = new Telefono;
                        $newTelefono->TipoTelefono = $fono['tipo'];
                        $newTelefono->Numero = $fono['dato'];
                        $newTelefono->cliente_id = $cliente->id;
                        $newTelefono->save();
                    };
                };
            };
        };

       // return response()->json(['message' => $request->Telefonos]);
        return redirect('cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SysGESSI\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente);
        //return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SysGESSI\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
        $cliente = Cliente::find($id);
        $provincia = Provincia::pluck('provincia','id')->all();
        $cantones=Canton::where('provincia_id', $cliente->provincia_id)->pluck('canton','id')->all();
        $parroquias=Parroquia::where('canton_id', $cliente->canton_id)->pluck('parroquia','id')->all();

        if($request -> ajax()){
            return response()->json(
                                view('pages.cliente._form', 
                                    compact('cliente','provincia','cantones', 'parroquias'))->render());
        }
      
        return view('pages.cliente.show', compact('cliente','provincia','cantones', 'parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SysGESSI\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $cliente = Cliente::find($id);
        
        $cliente->tipo_documento = $request->tipo_documento;
        $cliente->numero_documento = $request->numero_documento;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->provincia_id = $request->provincia;
        $cliente->canton_id = $request->canton;
        $cliente->parroquia_id = $request->parroquia;
        
        $cliente->save();

        if(!is_null($request->StrTelefonos)){
            foreach (json_decode($request->StrTelefonos, true) as $fono) {
                if(is_null($fono['id']) || ($fono['id'])=="undefined" ){
                    if($fono['deleted']=='false'){
                        $newTelefono = new Telefono;
                        $newTelefono->tipo_telefono = $fono['tipo'];
                        $newTelefono->numero = $fono['dato'];
                        $newTelefono->cliente_id = $cliente->id;
                        $newTelefono->save();
                    };
                }else{
                    $telefono = Telefono::find($fono['id']);
                    if(($fono['deleted'])=='true'){
                    
                         $telefono->delete();
                    }else{
                        $telefono->tipo_telefono = $fono['tipo'];
                        $telefono->numero = $fono['dato'];
                        $telefono->save();
                    };
                };
            };
        };

        if(!is_null($request->StrEmails)){
            foreach (json_decode($request->StrEmails, true) as $email) {
                if(is_null($email['id']) || ($email['id'])=="undefined" ){
                    if($email['deleted']=='false'){
                        $newEmail = new Email;
                        $newEmail->tipo_email = $email['tipo'];
                        $newEmail->email = $email['dato'];
                        $newEmail->cliente_id = $cliente->id;
                        $newEmail->save();
                    };
                }else{
                    $telefono = Telefono::find($fono['id']);
                    if(($fono['deleted'])=='true'){
                    
                         $telefono->delete();
                    }else{
                        $telefono->tipo_telefono = $fono['tipo'];
                        $telefono->numero = $fono['dato'];
                        $telefono->save();
                    };
                };
            };
        };

       //  return response()->json($cliente);
        return redirect()->route('cliente.index')->with('info', 'El cliente fue actualizado') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SysGESSI\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function destroyByAjax(Request $request, $id)
    {
        if($request -> ajax()){
            $cliente = Cliente::find($id);

            foreach ($cliente->telefonos as $fono) {
                $fono->delete();
            };

            $cliente->delete();

            $totalClientes = Cliente::all()->count();

            return response()->json([
                'total' => $totalClientes,
                'message' => $cliente->Nombre . ' Fue eliminado correctamente'
                ]);
        }
    }

    public function getAllCustomer()
    {
        return Cliente::all();
    }
}
