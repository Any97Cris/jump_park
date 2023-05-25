<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceOrder::all();
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
            'vehiclePlate' => 'required|max:7|string',
            'entryDateTime' => 'required',
            'exitDateTime' => 'required',
            'priceType' => 'required|max:55|string',
            'price' => 'numeric',
            'userId' => 'exists:users,id|required'
        ];

        $feedback = [
            'required' => "O campo :attribute deve ser preenchido",
            'vehiclePlate' => 'O campo :attribute deve ser preenchido',
            'priceType' => 'O campo :attribute deve ter no máximo 55 caracteres',
            'userId.exists' => "O campo :attribute não existe",
        ];

        $validar = $request->validate($regras,$feedback);
        if($validar == true){
            ServiceOrder::create($request->all());
            return response()->json([
                'message' => 'Dados Inseridos com Sucesso'
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
    public function show(ServiceOrder $service_order)
    {
        $id = ServiceOrder::find($service_order);
        if($id == true){
            return $id;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_order)
    {
       $id = ServiceOrder::find($service_order);
       if($id == true){
        $regras = [
            'vehiclePlate' => 'required|max:7|string',
            'entryDateTime' => 'required',
            'exitDateTime' => 'required',
            'priceType' => 'required|max:55|string',
            'price' => 'numeric',
            'userId' => 'exists:users,id|required'
        ];

        $feedback = [
            'required' => "O campo :attribute deve ser preenchido",
            'vehiclePlate' => 'O campo :attribute deve ser preenchido',
            'priceType' => 'O campo :attribute deve ter no máximo 55 caracteres',
            'userId.exists' => "O campo :attribute não existe",
        ];

        $validar = $request->validate($regras,$feedback);
        if($validar == true){
            $id->update($request->all());
            return response()->json([
                'message' => 'Dados Inseridos com Sucesso'
            ],200);
        }else{
            return $validar;
        }
       }else{
            return response()->json([
                'message' => 'ID inválido'
            ],404);
       }       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrder $service_order)
    {
        
    }
}
