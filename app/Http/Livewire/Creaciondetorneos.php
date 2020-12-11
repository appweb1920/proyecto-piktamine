<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MEventos;
use App\Models\MTorneos;
use Illuminate\Support\Facades\DB;

class Creaciondetorneos extends Component
{
    
    public $Nombrejuego;
    public $Formato;//propiedades sin inicializar
    //public $action="store";
    public $divcolor="bg-white";
    public $idevento;
    public $nom;
    public $haytorneos;
    
    public function mount($dataevento){
        $this->idevento = $dataevento->id;
        $this->haytorneos=false;
        
    }
    
    public function render()
    {
        $datost=DB::table('m_torneos')->where('idEvento','=',$this->idevento)->get();
        //$datost = MTorneos::latest('id')->get();//latest me trae y me ordena los registros poniendo el mas reciente primero
        if(!empty($datost)){
            $this->haytorneos=true;
        }

        
        return view('livewire.creaciondetorneos',compact('datost'));
    }
    
    public function setNJ($nombre){
         $this->Nombrejuego=$nombre;
     }
    
    public function setF($tipo){
         $this->Formato=$tipo;
     }
    
    public function store(){
        MTorneos::create([
            'idEvento' => $this->idevento,
            'Nombrejuego'=>$this->Nombrejuego,
            'Formato'=>$this->Formato
        ]);//create me guarda en la base de datos
        
        //lo ponemos como un arreglo
        //$this->reset(['name','body']);
        //$this->$action="store";
    }
    //select con blade,eloquent para el select + mandar los datos en el with normal
    
     //public function delete(MTorneos $tor){ //lo dejaria asi pero da error
         //$tor->delete();
     //}
    public function delete($id){
        $tor=MTorneos::find($id);
        $tor->delete();
     }
    
    public function gotourney($idtorneo,$idevento){
        return redirect()->to('/event/'.$idevento.'/'.$idtorneo);
    }
    public function gobracket($idevento,$idtorneo){
        return redirect(route('R-bracketindividual',[$idevento,$idtorneo]));
    }
}
