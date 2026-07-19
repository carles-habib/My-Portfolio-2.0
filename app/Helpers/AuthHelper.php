<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthHelper {
    public static function authSession(){
        $session = new \App\Models\User;
        if(Session::has('auth_user')){
            $session = Session::get('auth_user');
        }else{
            $user = Auth::user();
            Session::put('auth_user',$user);
            $session = Session::get('auth_user');
        }
        return $session;
    }

    public static function checkRolePermission($role, string $permissionName): bool
    {
        return $role->hasPermissionTo($permissionName);
    }

}
