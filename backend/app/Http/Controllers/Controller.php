<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="APLICACION CREADA PARA GESTION DE TALENTO HUMANO EN EL GAD MUNICIPAL DEL CANTON COLTA", 
 *     version="1.0",
 *     description="Esta API fue realizada con el propósito de ser utilizada en los sistemas del GAD de Colta. El uso no autorizado está prohibido.",
 *     termsOfService="https://tu-url.com/terminos",
 *     contact={
 *         "name"="Angel Melendres & Edison Gualle",
 *         "url"="https://tu-url.com/contacto",
 *         "email"="correo@ejemplo.com"
 *     },
 *     license={
 *         "name"="Licencia de grupo gym",
 *         "url"="https://tu-url.com/licencia"
 *     }
 * )
 *
 * @OA\Server(url="http://localhost:8000/api")
 */

 
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
