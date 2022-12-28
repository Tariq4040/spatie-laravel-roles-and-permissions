<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('name' ,['admin'])->orderBy('updated_at','desc')->paginate(5);
        return view('admin.roles.index' , compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Happy Codding";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required|min:5',
        ]);
        Role::create($validated);
        $roles = Role::orderBy('updated_at','desc')->paginate(5);
        return redirect()->route('admin.roles')->with(['roles' =>$roles ,'success' => 'Role Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        // dd($roles);
        return view('admin.roles.role-edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->name = $request->name;
        $roles->update();
        return redirect()->route('admin.roles')->with(['roles' =>$roles ,'success' => 'Permission Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $resutl = Role::find($id);
        // dd($resutl);
        $resutl->delete();
        $roles = Role::orderBy('updated_at','desc')->paginate(5);
        return redirect()->route('admin.roles')->with(['roles' =>$roles ,'success' => 'Permission Deleted Successfully']);
    }
}
