<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    public function getAllRoles() {
        $roles = Role::get()->toJson(JSON_PRETTY_PRINT);
        return response($roles, 200);
      }
}
