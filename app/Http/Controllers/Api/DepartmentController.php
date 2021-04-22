<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    public function getAllDepartments() {
        $departments = Department::get()->toJson(JSON_PRETTY_PRINT);
        return response($departments, 200);
      }
}
