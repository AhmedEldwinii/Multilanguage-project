@extends('dashboard.layout.layout')

@section('title2','Edit User')

@section('index')


    @if ($errors->any())
    @csrf
    <div class="alert alert-danger" role="alert">
        <ui>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ui>
    </div>
    @endif


    <div class="card-header">
        <h3 class="btn btn-block btn-info ">Edit User</h3>
    </div>

    <form action="{{ route('dashboard.users.update' , $user) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="card-body ">



            <div class="form-group col">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-solid fa-file-signature"></i>
                    </span>
                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name"
                    name="name" value="{{ $user->name }}">
                 </div>
            </div>


            <div class="form-group col">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{ __('words.email') }}"
                    name="email" value="{{ $user->email }}">
                 </div>
            </div>

            <label class="blockquote-footer Source Title ">Select Status</label>
            <div class="form-floating col>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-pointer"></i></span>
                    <select class="form-control" id="" name="status">
                        <option value="admin"  @if ($user->status == 'admin') selected @endif>Admin</option>
                        <option value="writer" @if ($user->status == 'writer') selected @endif>Writer</option>
                        <option value="" @if ($user->status == '') selected @endif>Input the status</option>
                    </select>
                </div>
            </div>
            <br>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>



@endsection





