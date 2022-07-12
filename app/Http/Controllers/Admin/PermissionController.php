<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Invitation;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;

class PermissionController extends BaseController
{
    public function index()
    {
        $modules = Module::get();
        $users = User::get();
        return view('admin.intern.index', compact('modules', 'users'));
    }

    public function store(Request $req)
    {
        // dd(implode(',', $req->module_id));
        // $modules_id = implode(',', $req->module_id);
        // $save = Permission::insert([
        //     'user_id' => $req->user_id,
        //     'module_id' => $modules_id,
        // ]);

        if ($save) {
            return back()->with('success', 'Permission added successfully!');
        }
        return back()->with('unsuccess', 'Data cannot be added!');
    }
}