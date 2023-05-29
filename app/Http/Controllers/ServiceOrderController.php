<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Http\Requests\StoreUpdateServiceOrderFormRequest;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $serviceOrder = new ServiceOrder();
        $data = $serviceOrder->getResults($request,5);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateServiceOrderFormRequest $request)
    {
        $cadastrar = ServiceOrder::create($request->all());
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
    public function show($service_order)
    {
        if(!$id = ServiceOrder::find($service_order)){
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
    public function update(StoreUpdateServiceOrderFormRequest $request, $service_order)
    {
        if(!$id = ServiceOrder::find($service_order)){
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
    public function destroy($service_order)
    {
        if(!$id = ServiceOrder::find($service_order)){
            return response()->json(['message' => 'Not Found'], 404);
        } 

        $id->destroy($service_order);
        return response()->json([
            'message' => 'Delete Realizado com Sucesso'
        ]);
    }
}
