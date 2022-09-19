<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['name', 'password', 'role', 'active'];
    protected $hidden = ['password', 'remember_token'];
    protected $primaryKey = 'id';
                                        
    //encryp password
    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
                                        
    public function scopeSearch($query, $name)
    {
         if(trim($name) !="")//quita espacios en blanco y mira si no sta vacio
         {
            $query->where('name', 'LIKE', "%$name%");   
         }
    }
    
    public function scopeRole($query, $role)
    {
        $roles= config('options.role');//ojete con el plural
        if($role !="" && isset($roles[$role]))//ver si no esta vacio y es valido
        {
            $query->where('role', $role);//se pasa al controlador
        }
    }
                                        
}