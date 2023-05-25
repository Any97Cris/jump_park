<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'name' => 'required|min:3|max:40'
        ];

        $feedback = [ 
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres'
        ];

        $validar = $request->validate($regras, $feedback);        

        if($validar == true){
            User::create($request->all());
            return response()->json([
                'message' => 'Sucesso ao Cadastrar!'
            ]);
        }else{            
            return $validar;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $id = User::find($user);
       
        if($id == true){
            return $id;
        }else{
            return response()->json([
                'message' => 'ID inválido!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
      
        $u = User::find($user);
        if($u == true){
            $regras = [
                'name' => 'required|min:3|max:40'
            ];
    
            $feedback = [ 
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres'
            ];
            
            $validar = $request->validate($regras, $feedback);  

            if($validar == true){
                $u->update($request->all());
                return response()->json([
                    'message' => 'Atualização Realizada com Sucesso'
                ]);
            }else{
                return $validar;
            }           

        }else{
            return response()->json([
                'message' => 'ID inválido'
            ]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $u = User::find($user);

        if($u == true){
            $u->destroy($user);
            return response()->json([
                'messagem' => 'Deletado com Sucesso'
            ]);
        }else{
            return response()->json([
                'message' => 'ID Inválido'
            ]);
        }       
        
    }
}
