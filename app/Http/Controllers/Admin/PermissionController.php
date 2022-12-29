<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            } 
            if (session('error')) {
                Alert::error(session('error'));
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('updated_at','desc')->paginate(5);
        return view('admin.permissions.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|min:5'
        ]);
        Permission::create($validated);
        $permissions = Permission::orderBy('updated_at','desc')->paginate(5);
        return redirect()->route('admin.permissions')->with(['permissions' =>$permissions ,'success' => 'Permission Added Successfully']);
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
        $permissions = Permission::find($id);
        // dd($permissions);
        return view('admin.permissions.permission-edit',compact('permissions'));
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
        $permissions = Permission::find($id);
        $permissions->name = $request->name;
        $permissions->update();
        return redirect()->route('admin.permissions')->with(['permissions' =>$permissions ,'success' => 'Permission Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $resutl = Permission::find($id);
        // dd($resutl);
        $resutl->delete();
        $permissions = Permission::orderBy('updated_at','desc')->paginate(5);
        return redirect()->route('admin.permissions')->with(['permissions' =>$permissions ,'success' => 'Permission Deleted Successfully']);
    }
}
