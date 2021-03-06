<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Invitation;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Support\Collection;

class SalesController extends BaseController
{
    public function index() {
        $modules = Module::get();
        $roles = Role::get();
        return view('sales.intern.index',compact('modules','roles'));
    }

}