<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProvinciaService;
use App\Models\Provincia; // Agregado el uso del modelo Provincia

class ProvinciaController extends Controller
{
    protected $provinciaService; // Declaración de la propiedad

    public function __construct(ProvinciaService $provinciaService)
    {
        $this->provinciaService = $provinciaService;
    }

    public function listarProvincia()
    {
        $response = $this->provinciaService->listarProvincia();
        return $response;
    }
    public function mostrarProvincia($id)
    {
        $response = $this->provinciaService->mostrarProvincia($id);
        return $response;
    }
}
