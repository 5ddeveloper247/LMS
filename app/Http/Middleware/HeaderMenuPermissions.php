<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Modules\FrontendManage\Entities\HeaderMenu;

class HeaderMenuPermissions
{

    public function handle($request, Closure $next)
    {

        $permissions = HeaderMenu::where('link', getRoutePath(Request::path()))->first('permissions');
        if (!empty($permissions) && !headerMenuPermissions(json_decode($permissions->permissions))) {
            abort(401);
        }
        return $next($request);
    }
}
