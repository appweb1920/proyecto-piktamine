<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MEventos;
use App\Models\Users;
use App\Models\MTorneos;
use App\Models\MJugadores;
use App\Models\MBracketIndividual;

use Illuminate\Support\Facades\Auth;

class MiControladorEvento extends Controller
{
    //
    public function index() {
        $idu = Auth::id();
        $datos=MEventos::select("*")->where('creadopor',$idu)->get();
        return view('welcome')->with('datosevento',$datos);
        //return $idu;
    }
    
    public function eventosgenerales() {
        $datos=MEventos::all();
        return view('eventos.eventos')->with('datosevento',$datos);
    }
    
    public function submitevento(Request $request){
        $datosdelform = new MEventos;
        
        $datosdelform->Nombre = $request->Nombre;
        $datosdelform->ZonaH = 'CDT';
        $datosdelform->FechaI = $request->Fechainicio;
        $datosdelform->duracion = $request->Duracion;
        $datosdelform->creadopor = $request->idUsuario;
            
        $datosdelform->save();
        
        return redirect('event/'.$datosdelform->id);
    }
    
    public function eventoindividual($id_event){
        $dato=MEventos::find($id_event);
        
        return view('eventos.evento')->with('datosevento',$dato);
    }
    
    public function eventos(){//borrado con softdelete
        $dato=MEventos::all();
        
        return view('eventos.evento')->with('datosevento',$dato);
    }
    
    public function crearevento(){
        return view('eventos.crear');
    }
    
    public function administrarevento($id_event) {//Equivalente a editar
        return view('eventos.administrar');
    }
    
    public function borrar(){//borrado con softdelete
        
    }
    public function torneoindividual($id_event,$id_torneo){
        $datost=MTorneos::find($id_torneo);
        
        return view('eventos.torneos.torneo')->with('datost',$datost)->with('id_event',$id_event);
    }
    
    public function bracketindividual($id_event,$id_torneo){
        $datosb=MBracketIndividual::select("*")->where('idTorneo',$id_torneo)->get();
        
        //return $datosb;
        
        return view('eventos.torneos.bracketind')->with('datosb',$datosb)->with('id_torneo',$id_torneo);
    }
    
    public function testing(){
        return view('eventos.testing');
    }
    
}
