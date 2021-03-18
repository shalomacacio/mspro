<?php

namespace App\Http\Controllers;

use App\Entities\Paciente;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $agendados = DB::table('agendas')->select('id', 'confirm')->get()->count();
        $vacinados = DB::table('agendas')->where('confirm', 'S')->select('id', 'confirm')->get()->count();
        $users = DB::table('convidados')->get()->count();
        $pacientes = Paciente::all()->count();
        return view('admin.home', compact('pacientes', 'users', 'agendados', 'vacinados'));
    }

}
