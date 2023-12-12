<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\EmpleadoHasCapasitacionController;
use App\Models\Capasitacion;
use App\Models\Cargo;
use App\Models\Contrato;
use App\Models\ControlDiario;
use App\Models\Cuestionario;
use App\Models\DatoBancario;
use App\Models\Departamento;
use App\Models\Discapacidad;
use App\Models\Estado;
use App\Models\EvaluacionDesempeno;
use App\Models\InstruccionFormal;
use App\Models\Residencia;
use App\Models\Rol;
use App\Models\TipoContrato;
use App\Models\TipoPermiso;
use App\Models\TipoSalida;
use App\Models\Unidad;
use App\Models\Empleado;
use App\Models\EmpleadoHasCapasitacion;
use App\Models\EmpleadoHasDiscapacidad;
use App\Models\EmpleadoHasEvaluacionDesempeno;
use App\Models\EmpleadoHasInstruccionformal;
use App\Models\ExperienciaLaboral;
use App\Models\Permiso;
use App\Models\PreguntaRespuestaCuestionario;
use App\Models\Referencialaboral;
use App\Models\SalidaCampo;
use App\Models\Usuario;
use Database\Factories\EmpleadoHasCapasitacionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ///BORAR PRIMERO

        Capasitacion::query()->delete();
        Cargo::query()->delete();
        Departamento::query()->delete();
        Discapacidad::query()->delete();
        Estado::query()->delete();
        EvaluacionDesempeno::query()->delete();
        InstruccionFormal::query()->delete();
        Residencia::query()->delete();
        Rol::query()->delete();
        TipoContrato::query()->delete();
        TipoPermiso::query()->delete();
        TipoSalida::query()->delete();
        Unidad::query()->delete();
        Empleado::query()->delete();
        Usuario::query()->delete();




        //CREAR LUEGO
        Capasitacion::factory(10)->create();
        Cargo::factory(10)->create();
        Discapacidad::factory(10)->create();
        Estado::factory(1)->create();
        EvaluacionDesempeno::factory(10)->create();
        InstruccionFormal::factory(10)->create();
        Rol::factory(10)->create();
        TipoContrato::factory(10)->create();
        TipoPermiso::factory(10)->create();
        TipoSalida::factory(10)->create();

        Unidad::factory(10)->create();
        Departamento::factory(10)->create();
        Empleado::factory(10)->create();
        Usuario::factory(10)->create();


        Contrato::factory(10)->create();
        ControlDiario::factory(10)->create();
        Cuestionario::factory(10)->create();
        DatoBancario::factory(10)->create();
        ExperienciaLaboral::factory(10)->create();
        Permiso::factory(10)->create();
        PreguntaRespuestaCuestionario::factory(10)->create();
        Referencialaboral::factory(10)->create();
        Residencia::factory(10)->create();
        SalidaCampo::factory(10)->create();


        EmpleadoHasDiscapacidad::factory(2)->create();
        EmpleadoHasCapasitacion::factory(10)->create();
        EmpleadoHasEvaluacionDesempeno::factory(10)->create();
        /* EmpleadoHasInstruccionformal::factory(10)->create();
        EmpleadoHasDiscapacidad::factory(10)->create();
        EmpleadoHasCapasitacion::factory(10)->create();
        EmpleadoHasEvaluacionDesempeno::factory(10)->create(); */

    }
}
