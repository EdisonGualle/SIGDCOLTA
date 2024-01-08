<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Empleado extends Model
{
    use HasFactory, Notifiable;


    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'cedula',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'fechaNacimiento',
        'genero',
        'telefonoPersonal',
        'telefonoTrabajo',
        'correo',
        'etnia',
        'estadoCivil',
        'tipoSangre',
        'nacionalidad',
        'id_provincia',
        'id_canton',
        'idCargo',
    ];

    public function routeNotificationForMail()
    {
        return $this->correo;
    }

      // Relación con el modelo AprobacionPermiso (Empleado solicitante)
      public function aprobacionesSolicitante()
      {
          return $this->hasMany(AprobacionPermiso::class, 'idEmpleadoSolicitante');
      }
  
      // Relación con el modelo AprobacionPermiso (Empleado aprobador)
      public function aprobacionesAprobador()
      {
          return $this->hasMany(AprobacionPermiso::class, 'idEmpleadoAprobador');
      }
    // Relacion con usuario
    public function usuario()
    {
        return $this->hasOne(User::class, 'idEmpleado', 'idEmpleado');
    }

    public function capacitacionesDeEmpleado()
    {
        return $this->hasMany(EmpleadoHasCapacitacion::class, 'idEmpleado');
    }


    public function capacitaciones()
    {
        return $this->belongsToMany(Capacitacion::class, 'empleado_has_capacitacion', 'idEmpleado', 'idCapacitacion')
            ->withTimestamps();
    }

    public function discapacidades()
    {
        return $this->belongsToMany(Discapacidad::class, 'empleado_has_discapacidad', 'idEmpleado', 'idDiscapacidad')
            ->withTimestamps();
    }

    // Define las relaciones con otras entidades si es necesario
    //Relacion Empleado-Cargo
    public function cargo()
    {
        return $this->hasOne(Cargo::class, 'idCargo');
    }


    //Relacion Empleado-Contratos
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'idEmpleado');
    }
    //Relacion Empleado-Departamento ya definido


    //Relacion Empleado-DatosBancarios
    public function datosBancarios()
    {
        return $this->hasMany(DatoBancario::class, 'idEmpleado', 'idEmpleado');
    }

    //Relacion Empleado-Evaluacion Desempeno
    public function evaluacionesDeEmpleado()
    {
        // Suponiendo que el modelo de evaluación se llama EvaluacionDesempeno
        return $this->hasMany(EvaluacionDesempeno::class, 'idEmpleado');
    }

    //Relacion Empleado-ExperienciaLaboral
    public function experienciasLaborales()
    {
        return $this->hasMany(ExperienciaLaboral::class, 'idEmpleado');
    }
    //Relacion Empleado-Instruccion Formal
    public function instruccionesFormales()
    {
        return $this->belongsToMany(InstruccionFormal::class, 'empleado_has_instruccionformal', 'idEmpleado', 'idInstruccionFormal')
            ->withTimestamps();
    }
}
