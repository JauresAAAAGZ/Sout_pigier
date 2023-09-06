<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
               // return redirect(RouteServiceProvider::HOME);

                // L'utilisateur est authentifié, vérifiez la durée de vie de la session
                $sessionLifetime = config('session.lifetime');
                $lastActivity = session('last_activity', 0);

                if (time() - $lastActivity > $sessionLifetime * 60) {
                    // La session a expiré, redirigez l'utilisateur vers la page de connexion
                    return redirect('/login');
                }

                // Mettez à jour la dernière activité de l'utilisateur
                session(['last_activity' => time()]);
                
            }
        }

        return $next($request);
    }
}
