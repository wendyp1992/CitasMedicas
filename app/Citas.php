<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{

    	// Atributos que se pueden asignar de manera masiva.
        protected $fillable = [
            'date','specialty', 'id_paciente'
        ];
        
        // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
        protected $hidden = ['created_at','updated_at']; 
}
