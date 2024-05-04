@extends('dashboard.layout.layout')

@section('title2',__('words.useredit'))

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
        <h3 class="btn btn-block btn-info ">{{ __('words.useredit') }}</h3>
    </div>

    <form action="{{ route('dashboard.users.update' , $user) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="card-body ">



            <div class="form-group col">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-solid fa-file-signature"></i>
                    </span>
                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="{{ __('words.name') }}"
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


            @can('viewAny', $user)
            <label class="blockquote-footer Source Title ">{{ __('words.select') }} {{ __('words.status') }}</label>
            <div class="form-floating col">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-pointer"></i></span>
                    <select class="form-control" id="" name="status">
                        <option value="admin"  @if ($user->status == 'admin') selected @endif>{{ __('words.admin') }}</option>
                        <option value="writer" @if ($user->status == 'writer') selected @endif>{{ __('words.status') }}</option>
                        <option value="" @if ($user->status == '') selected @endif>{{ __('words.inputstatus') }}</option>
                    </select>
                </div>
            </div>
            @endcan
            <br>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">{{ __('words.submit') }}</button>
            </div>
        </form>
    </div>



@endsection





