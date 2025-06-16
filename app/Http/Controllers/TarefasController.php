<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth;
use App\Mail\NovaTarefaMail;
use Illuminate\Support\Facades\Mail;


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
        return view('tarefa.create');

        if(auth()->check()){

           $id = auth()->user()->id;
           $nome = auth()->user()->name;
           $email = auth()->user()->email;

           return "Id  $id | Email $email |Nome $nome";



            

        }else{
          
        }
        //
        return "Você não esta logado no sistema!";
   
       
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
       $request->validate([
        'tarefa' => 'required|string|max:200',
        'data_limite_conclusao' => 'required|date',
    ]);

      $tarefa =  \App\Models\Tarefa::create([
        'tarefa' => $request->tarefa,
        'data_limite_conclusao' => $request->data_limite_conclusao,
    ]);

   Mail::to(auth()->user()->email)->send(new NovaTarefaMail($tarefa));

    return redirect()->route('tarefa.show',['tarefa' => $tarefa->id])->with('success', 'Tarefa cadastrada com sucesso!');

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
        dd($tarefa);
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
