<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MJugadores;
use App\Models\MBracketIndividual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Registrojugadores extends Component
{
    public $idtorneo,$nombre,$tag,$sponsor,$idevento,$datosj,$datosb,$datosbf,$idusuario;
    public $n=1,$aviso=false,$haydatos=false;
    public $nparticipantes=0,$capacidad=0,$npartidasiniciales=0;
    
    public function mount($datatorneo,$id_event){
        $this->idtorneo = $datatorneo->id;
        $this->idevento = $id_event;
        $this->idusuario = $datatorneo->creadopor;
    }
    
    public function render()
    {
        $this->datosj=DB::table('m_jugadores')->where('idTorneo', '=',$this->idtorneo)->get();
        $this->datosb=DB::table('m_bracket_individuals')->where('idTorneo', '=',$this->idtorneo)->get();
        $this->datosbf=MBracketIndividual::firstOrNew();
        $this->nparticipantes=count($this->datosj);
        $this->capacidad=$this->datosbf->Capacidad;
        $this->npartidasiniciales=(count($this->datosb)*2);
        //$datosj=MJugadores::latest('id')->get();
        if(!empty($this->datosj)){
            $this->haydatos=true;
        }else{
            $this->haydatos=false;
        }
        
        return view('livewire.registrojugadores')->with('datosj',$this->datosj);//tukutuku
    }
    
    public function store(){
        
        $pre=DB::table('m_bracket_individuals')->orderBy('created_at','desc')->first();
        if(!empty($pre)){
            $pree=MBracketIndividual::find($pre->id);
        }
           
        if(!empty($pre)){
        
            if(count($this->datosj)<$pree->Capacidad){
                MJugadores::create([
                    'idTorneo' => $this->idtorneo,
                    'Nombre'=>$this->nombre,
                    'Tag'=>$this->tag,
                    'Sponsor'=>$this->sponsor,
                ]);//create me guarda en la base de datos
        
                $ultimo=DB::table('m_jugadores')->orderBy('created_at','desc')->first();
                
                //lo ponemos como un arreglo
                //$this->reset(['name','body']);
                //$this->$action="store";
        
                //pone el primero
                if($this->n==1){
                    MBracketIndividual::create([
                        'idTorneo' => $this->idtorneo,
                        'idOp1' => $ultimo->id,
                        'idOp2' => 0,
                        'Res1' => 0,
                        'Res2' => 0,
                        'nRonda' => 1,
                        'Capacidad' => 32
                    ]);
                    $this->n=2;
                }
        
                //pone el segundo
                else if($this->n==2){
                    $ultimob=DB::table('m_bracket_individuals')->orderBy('created_at','desc')->first();
                    $ultimobb=MBracketIndividual::find($ultimob->id);
                    $ultimobb->idOp2 = $ultimo->id;
                    $ultimobb->save();
                    $this->n=1;
                }
            
            }else{
                $this->aviso=true;
            }
            
        }else{
            MJugadores::create([
                'idTorneo' => $this->idtorneo,
                'Nombre'=>$this->nombre,
                'Tag'=>$this->tag,
                'Sponsor'=>$this->sponsor,
            ]);//create me guarda en la base de datos
        
            $ultimo=DB::table('m_jugadores')->orderBy('created_at','desc')->first();
        
            //lo ponemos como un arreglo
            //$this->$action="store";
        
            //pone el primero
            if($this->n==1){
            MBracketIndividual::create([
                'idTorneo' => $this->idtorneo,
                'idOp1' => $ultimo->id,
                'idOp2' => 0,
                'Res1' => 0,
                'Res2' => 0,
                'nRonda' => 1,
                'Capacidad' => 32
            ]);
                $this->n=2;
            }
        }
        
        $this->reset(['sponsor','tag','nombre']);
        
    }
    public function gobracket(){//crear el los brackets
        //$todoslosjugadores=DB::table('m_jugadores')->where('idTorneo', '=',$this->idtorneo)->get();
        
        //$smitad=$todoslosjugadores->splice(2);//nos pone un mitad en la variable indicada y en el mismo arreglo se guarda la otra mitad
        //$pmitad=$todoslosjugadores;
        
        return redirect(route('R-bracketindividual',[$this->idevento,$this->idtorneo]));
    }
    
    public function reiniciartodo(){
        DB::table('m_jugadores')->delete();
        DB::table('m_bracket_individuals')->delete();
        $this->reset(['haydatos','n']);
    }
    
    public function delete($id){
        $tor=MJugadores::find($id);
        $tor->delete();
        $this->aviso=false;
     }
}
