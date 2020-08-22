<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnionSetupController extends Controller
{
    public function showUnion()
    {
        return view('admin.union-list');
    }

    public function showUnionSetupForm()
    {
        return view('admin.union-setup-form');
    }

    public function showUnionEditForm()
    {
        return view('admin.union-edit-form');
    }
}
