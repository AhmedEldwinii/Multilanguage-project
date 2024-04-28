<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
// use DataTables;
use App\Http\Requests\Dashboard\Users\UsersStoreRequest;
use App\Http\Requests\Dashboard\Users\UsersUpdateRequest;

class UsersController extends Controller
{

    public function index()
    {
        return view('dashboard.users.index');
    }


    public function create()
    {
        return view('dashboard.users.create');
    }




    public function getAllData()
    {
        $query = User::select('*');
        return  DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return '<a href="' . route('dashboard.users.edit', $row->id) . '" class="edit btn btn-secondary"><i class="fas fa-thin fa-pen-fancy"></i></a>
            <button type="button" id="deleteBtn" data-id="' . $row->id .'" class="btn btn-danger mt-md-0 mt-2" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></button>';
        })

        ->addColumn('status' , function($row){
            return $row->status == null ? 'Not Activated' : $row->status;
        })

        ->rawColumns(['action' , 'status'])
        ->make(true);
    }





    public function store(UsersStoreRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(string $id)
    {
        //
    }
    public function delete( Request $request)
    {
        User::where('id' ,$request->id)->delete();
        return redirect()->route('dashboard.users.index');
    }
}
