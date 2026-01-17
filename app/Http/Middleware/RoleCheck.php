<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$funcoes)
    {   
        $usuario = Auth::user();

        $temPermissao = $usuario->roles()
        ->whereIn('funcao', $funcoes)
        ->exists();

        if (!$usuario || !$temPermissao) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
