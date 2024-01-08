<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CantonesService;
use App\Models\Cantones; // Importación del modelo Cantones

class CantonesController extends Controller
{
    protected $cantonesService; // Declaración de la propiedad

    public function __construct(CantonesService $cantonesService)
    {
        $this->cantonesService = $cantonesService;
    }

    public function listarCantones()
    {
        // Llama al servicio para obtener la lista de cantones
        $response = $this->cantonesService->listarCantones();

        // Devuelve la respuesta
        return $response;
    }

    public function mostrarCantones($id)
    {
        // Llama al servicio para obtener la información de un cantón específico por ID
        $response = $this->cantonesService->mostrarCantones($id);

        // Devuelve la respuesta
        return $response;
    }
}
