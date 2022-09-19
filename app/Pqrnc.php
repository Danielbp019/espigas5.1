<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pqrnc extends Model
{
    protected $table = 'pqrnc';
    protected $fillable = ['niu', 'user', 'address', 'phone', 'application_means_idapplication_means', 'date', 'time', 'treatment', 'additional_information', 'answer_date', 'execution_date', 'pending', 'code_dane','type_service','user_update', 'users_id', 'answer_pqrnc_idanswer_pqrnc', 'procedure_pqrnc_idprocedure_pqrnc'];
    protected $primaryKey = 'idpqrnc';
    
     public function scopeSearch($query, $niu)
    {
         if(trim($niu) !="")//quita espacios en blanco y mira si no sta vacio
         {
            $query->where('niu', 'LIKE', "%$niu%");   
         }
    }
    
    public function scopePending($query, $pending)
    {
        $pendings= config('options.pending');//ojete con el plural
        if($pending !="" && isset($pendings[$pending]))//ver si no esta vacio y es valido
        {
            $query->where('pending', $pending);//se pasa al controlador
        }
    }
}
