<?php

namespace App\Http\Controllers;

use App\Services\InstruccionFormalService;
use Illuminate\Http\Request;

class InstruccionFormalController extends Controller
{
    protected $instruccionFormalService;

    public function __construct(InstruccionFormalService $instruccionFormalService)
    {
        $this->instruccionFormalService = $instruccionFormalService;
    }

    public function listarInstruccionesFormales()
    {
        return $this->instruccionFormalService->listarInstruccionesFormales();
    }

    public function mostrarInstruccionFormalPorId($id)
    {
        return $this->instruccionFormalService->mostrarInstruccionFormalPorId($id);
    }

    public function crearInstruccionFormal(Request $request)
    {
        return $this->instruccionFormalService->crearInstruccionFormal($request);
    }

    public function actualizarInstruccionFormal(Request $request, $id)
    {
        return $this->instruccionFormalService->actualizarInstruccionFormal($request, $id);
    }

    public function eliminarInstruccionFormal($id)
    {
        return $this->instruccionFormalService->eliminarInstruccionFormal($id);
    }
}