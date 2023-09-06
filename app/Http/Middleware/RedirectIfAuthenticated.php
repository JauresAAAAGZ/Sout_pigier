<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next, string ...$guards): Response | RedirectResponse
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                // L'utilisateur est authentifié, vérifiez la durée de vie de la session
                $sessionLifetime = Config::get('session.lifetime');
                $lastActivity = session('last_activity', 0);

                if (time() - $lastActivity > $sessionLifetime * 60) {
                    // La session a expiré, redirigez l'utilisateur vers la page de connexion
                    return redirect('/login');
                }

                // Mettez à jour la dernière activité de l'utilisateur
                session(['last_activity' => time()]);

                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
