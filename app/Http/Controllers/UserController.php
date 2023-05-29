<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = User::paginate(5);
        return response()->json($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $cadastrar = User::create($request->all());
        return response()->json([
            'message' => 'Sucesso ao Cadastrar'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        if(!$id = User::find($user)){
            return response()->json(['message' => 'Not Found'], 404);
        } 

        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $user)
    {
        
      
        if(!$id = User::find($user)){
            return response()->json(['message' => 'Not Found'], 404);
        }        

        $id->update($request->all());
        return response()->json($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if(!$id = User::find($user)){
            return response()->json(['message' => 'Not Found'], 404);
        }  

        $id->destroy($user);
        
        return response()->json([
            'message' => 'Registro Deletado com Sucesso!'
                
        ],200);
    }
}
