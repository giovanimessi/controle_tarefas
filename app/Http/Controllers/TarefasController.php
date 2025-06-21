<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth;
use App\Mail\NovaTarefaMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class TarefasController extends Controller
{

   public function __construct(){
       $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $user_id = auth()->user()->id;
   
        $tarefa = Tarefa::where('user_id', $user_id)->paginate(2);

    

       return view ('tarefa.index', compact('tarefa'));
   
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dados = $request->all('tarefa','data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;


        $tarefa = Tarefa::create($dados);

        $destinatario = auth()->user()->email;
    

        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show',['tarefa' => $tarefa->id]);



      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {

        //
        return view('tarefa.show',['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
      

        return view('tarefa.edit', ['tarefa' => $tarefa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //

        $dados = $request->only(['tarefa','data_limite_conclusao']);
        $tarefa->update($dados);

        return redirect()->route('tarefa.show',$tarefa->id);

     

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
