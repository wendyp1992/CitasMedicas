<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table="pacientes";

	// Atributos que se pueden asignar de manera masiva.
    protected $fillable = [
        'dni','first_name','second_name','surnames',
        'email','phone','birthdate'
    ];
	
	// Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
	protected $hidden = ['created_at','updated_at']; 
}
