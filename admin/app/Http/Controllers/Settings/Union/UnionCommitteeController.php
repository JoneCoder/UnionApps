<?php

namespace App\Http\Controllers\Settings\Union;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnionCommitteeController extends Controller
{
    public function index()
    {
        return view('settings.union.committee');
    }
}
