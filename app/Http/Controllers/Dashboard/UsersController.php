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

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('dashboard.users.index');
    }


    public function create()
    {
        $this->authorize('viewAny' , $this->user );
        return view('dashboard.users.create');
    }




    public function getAllData()
    {

        if(auth()->user()->can('viewAny' , $this->user )){
            $query = User::select('*');
        }else{
            $query = User::where('id' , auth()->user()->id);
        }

        return  DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {

            $btn = "";
            if(auth()->user()->can('update' , $row)){
            $btn = '<a href="' . route('dashboard.users.edit', $row->id) . '" class="edit btn btn-secondary"><i class="fas fa-thin fa-pen-fancy"></i></a>';
            }
            if(auth()->user()->can('delete', $row)){
            $btn =  '<a href="' . route('dashboard.users.edit', $row->id) . '" class="edit btn btn-secondary"><i class="fas fa-thin fa-pen-fancy"></i></a>
                     <button type="button" id="deleteBtn" data-id="' . $row->id .'" class="btn btn-danger mt-md-0 mt-2" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            }return $btn;
        })

        ->addColumn('status' , function($row){
            return $row->status == null ? 'Not Activated' : $row->status;
        })

        ->rawColumns(['action' , 'status'])
        ->make(true);
    }





    public function store(UsersStoreRequest $request)
    {
        $this->authorize('update' , $this->user );
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
        $this->authorize('update' , $user );
        return view('dashboard.users.edit' , compact('user'));
    }


    public function update(UsersUpdateRequest $request, User $user)
    {
        $this->authorize('update' , $user );
        $user->update($request->validated());
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(string $id)
    {
        //
    }
    public function delete( Request $request)
    {
        $this->authorize('delete' , $this->user );
        User::where('id' ,$request->id)->delete();
        return redirect()->route('dashboard.users.index');
    }
}
