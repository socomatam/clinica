<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Medico extends Model
{
	//especifica qué campos se desean guardar en la base de datos usando este modelo
	protected $fillable = ['nombre','apellido_1', 'apellido_2','fecha_nacimiento','telefono'];
	
	protected $table = 'medicos';
	
    public function cita(){
		return $this->hasMany('App\Cita');
	}//fin cita
	
	public function especialidade(){
		return $this->belongsToMany('App\Especialidade');
	}//fin especialidade
	
	 public function tratamiento(){
		return $this->belongsToMany('App\Tratamiento');
	}//fin tratamiento
	
	public function getEdadMedicoAttribute()
    {
		$nacimiento = new Carbon($this->fecha_nacimiento);
		$now = Carbon::now('Europe/London');
		$edad = $now->diffInYears($nacimiento);
		
		return $edad;
    }
	
	public function getFechaNacimientoAttribute($value) {
		$value = new Carbon($value);
        return $value->format('d-m-Y');
    }
	
	public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucwords($value);
    }
	
	public function setApellido1Attribute($value)
    {
        $this->attributes['apellido_1'] = ucwords($value);
    }
	
	public function setApellido2Attribute($value)
    {
        $this->attributes['apellido_2'] = ucwords($value);
    }
}
