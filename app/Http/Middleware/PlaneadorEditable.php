<?php

namespace App\Http\Middleware;

use Closure;
use App\Configuracion;
use Illuminate\Support\Carbon;

class PlaneadorEditable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $configuracion = Configuracion::find(1);
        $fecha_inicio = Carbon::parse($configuracion->inicio_clases);
             
        if($fecha_inicio->add("week",2)->isSameDay(Carbon::today())){
            alert('No se puede editar este Planeador','El periodo de para hacer ediciones terminó', 'error')->showConfirmButton("Entendido")->autoClose(false);

            return redirect()->back();
        }
        
        return $next($request);
    }
}
