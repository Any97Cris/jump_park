<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = ['vehiclePlate', 'entryDateTime', 'exitDateTime', 'priceType', 'price', 'userId'];

    public function getResults($data, $total){
        if(!isset($data['vehiclePlate'])){
            return ServiceOrder::paginate($total);
        }

        return ServiceOrder::where(function ($query) use ($data){
            if(isset($data['vehiclePlate'])){
                $filter = $data['vehiclePlate'];
                $query->where('vehiclePlate', 'LIKE', "%{$filter}%");
            }
        })->paginate($total);
    }
}
