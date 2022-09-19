<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    protected $table = 'pqr';
    protected $fillable = ['month', 'niu', 'user', 'address', 'bill', 'name_applicant','identity_applicant', 'address_applicant', 'phone', 'application_means_idapplication_means', 'additional_information', 'treatment', 'date', 'time', 'pending','sspd', 'answer_date','rta_niu','date_notification', 'department_code','municipality_code','settlement_type','causal_detail_idcausal_detail', 'answer_pqr_idanswer_pqr', 'procedure_pqr_idprocedure_pqr' ,'notification_pqr_idnotification_pqr', 'users_id', 'user_update'];
    protected $primaryKey = 'idpqr';
    
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
