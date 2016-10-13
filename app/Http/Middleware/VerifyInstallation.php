<?php

namespace App\Http\Middleware;

use Closure;
use Stigma\Installation\InstallManager ;

class VerifyInstallation
{ 
    protected $installManager ;

    public function __construct(InstallManager $installManager)
    {
        $this->installManager = $installManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        if(! $this->installManager->verifyToBeInstalled()){
            return redirect('/installation') ;
        }

        return $next($request);
    }
}
