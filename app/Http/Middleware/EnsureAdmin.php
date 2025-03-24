<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se é admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Se não for admin, redireciona com erro
        return redirect('/welcome')->with('error', 'Acesso negado! Apenas administradores podem acessar esta página.');
    }
}
