<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$roles =['Admin(Super)', 'Admin', 'Field Worker'];
        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }
        $permissions = ['NewLocation', 'AddDivision', 'AddDistrict', 'AddUpazila', 'AddCityCorporation', 'AddUnion', 'AddMunicipal', 'AddPolicestation', 'AddPostoffice', 'AddVillage', 'AddWard', 'AddRoad', 'AddHouse', 'UpdateLocation', 'UpdateDivision', 'UpdateDistrict', 'UpdateUpazila', 'UpdateCityCorporation', 'UpdateUnion', 'UpdateMunicipal', 'UpdatePolicestation', 'UpdatePostoffice', 'UpdateVillage', 'UpdateWard', 'UpdateRoad', 'UpdateHouse', 'ViewLocation', 'SearchHouse', 'AddUser', 'Help', 'Setting', 'LayoutSetting', 'Notification'];
        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }*/
        /*$role       = Role::findById(3);
        $permission = ['NewLocation', 'AddUnion', 'AddPostoffice', 'AddVillage', 'AddWard', 'AddRoad', 'AddHouse', 'UpdateLocation', 'UpdateVillage', 'UpdateWard', 'UpdateRoad', 'UpdateHouse', 'ViewLocation', 'SearchHouse', 'Help', 'Setting', 'LayoutSetting', 'Notification'];
        $role->givePermissionTo($permission);*/

        /*$user = auth()->user();
        $user->assignRole('Field Worker');*/
        return view('home');
    }
}
