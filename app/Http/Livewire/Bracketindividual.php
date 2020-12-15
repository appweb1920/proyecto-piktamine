<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\MJugadores;
use App\Models\MBracketIndividual;
use Illuminate\Database\Query\JoinClause;

class Bracketindividual extends Component
{
    public $datab,$datosj1,$datosj2,$idtorneo,$nfases;
    public $total=1;
    public $totalrondas=1;
    public $totaltemp=1;
    public $valor1=1;
    
    public function mount($databracket,$idtorneo){
        $this->datab=$databracket;
        $this->idtorneo=$idtorneo;
        $this->totalrondas=DB::table('m_bracket_individuals') 
            ->max('nRonda');
        $this->totaltemp=count($databracket);
        $this->total=count($databracket);
    }
    
    public function render()
    {
        //$this->datosj=DB::table('m_jugadores')->where('idTorneo', '=',$this->idtorneo)->get();
        
       /*$this->datosj1 = DB::table('m_bracket_individuals')
            ->join('m_jugadores', 'm_jugadores.idTorneo', '=', 'm_bracket_individuals.idTorneo')
            ->select('m_bracket_individuals.*', 'm_jugadores.Nombre', 'm_jugadores.Tag', 'm_jugadores.Sponsor')
            ->get(); */
        
        ///*
        $this->datosj1 = DB::table('m_bracket_individuals')
            ->join('m_jugadores',function ($join) {
                $join->on('m_bracket_individuals.idTorneo', '=', 'm_jugadores.idTorneo')
                    ->on('m_jugadores.id', '=','m_bracket_individuals.idOp1');
            })
            ->select('m_bracket_individuals.*', 'm_jugadores.Nombre', 'm_jugadores.Tag', 'm_jugadores.Sponsor')
            ->get(); //Nos trae un iner join con todos los datos que necesito //*/
        
        $this->datosj2 = DB::table('m_bracket_individuals')
            ->join('m_jugadores',function ($join) {
                $join->on('m_bracket_individuals.idTorneo', '=', 'm_jugadores.idTorneo')
                    ->on('m_jugadores.id', '=','m_bracket_individuals.idOp2');
            })
            ->select('m_bracket_individuals.*', 'm_jugadores.Nombre', 'm_jugadores.Tag', 'm_jugadores.Sponsor')
            ->get(); //Nos trae un iner join con todos los datos que necesito //*/
        
        
        return view('livewire.bracketindividual')->with('datosj',$this->datosj1);
    }
}
