<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $table = 'emergency';
    protected $fillable = ['niu', 'application_date', 'time_application', 'day_care', 'hour_care', 'observations', 'name_holder', 'address', 'bill', 'name_applicant', 'identity_applicant', 'phone','emergency_network', 'users_id', 'user_update', 'event_type_idevent_type', 'application_means_idapplication_means'];
    protected $primaryKey = 'radicated_received';
    
    public function scopeSearch($query, $niu)
    {
        return $query->where('niu', 'LIKE', "%$niu%");
    }
}//lineas adicionales en el modelo de usuario
