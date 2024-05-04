@extends('dashboard.layout.layout')

@section('title2', __('words.edit') , __('words.category'))

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
        <h3 class="btn btn-block btn-info "> {{ __('words.edit') }}  {{ __('words.category') }}</h3>
    </div>


    <form action="{{ route('dashboard.categories.update' , $category) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="card-body ">


            <label class="blockquote-footer Source Title ">{{ __('words.select') }}  {{ __('words.category') }}</label>
            <div class="form-group col">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-pointer"></i></span>
                    <select name='parent_id' class="form-control" id="exampleInputEmail1">
                        <option value="" @if ($category->parent_id == 0 || $category->parent_id == null ) selected @endif>Main Category</option>
                        @foreach ($categories as $item)
                            <option @if ($category->parent_id == $item->id)
                                selected
                            @endif value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>

            <div class=" col mb-3">
                    <label for="formFile" class="form-label" > <i class="fas fa-anchor"></i> {{ __('words.image') }}  </label>
                    <input class="form-control dropify" type="file" id="formFile" name="image"
                        data-default-file="{{ asset($category->image) }}">
                    </div>
            </div>

            <br>

            <div class="">
                <div class="card-header">
                    <h3 class="btn btn-block btn-secondary ">{{ __('words.translations') }}</h3>
                </div>

                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    @foreach (config('app.languages') as $key=>$lang)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop ->index == 0) active @endif" id="custom-content-below-home-tab" data-toggle="pill" href="#{{ $key }}"
                            role="tab" aria-controls="custom-content-below-home" aria-selected="true">{{ $lang }}</a>
                    </li>
                    @endforeach
                        </ul>
                <div class="card-body">
                    <div class="tab-content" id="custom-content-below-tabContent">
                        @foreach (config('app.languages') as $key => $lang)
                        <div class="tab-pane fade @if($loop->index == 0) show active in @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-solid fa-file-signature"></i></span>
                                    </div>
                                    <input type="text" class="form-control"
                                    value="{{ optional($category->translate($key))->title }}"  placeholder="Title" name="{{ $key }}[title]">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-arrows-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control"
                                    value="{{ optional($category->translate($key))->content }}" placeholder="{{ __('words.content') }}" name="{{ $key }}[content]">
                                </div>
                            </div>
                        </div>
                    @endforeach
                        </div>
                    </div>
                </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-info">{{ __('words.submit') }}</button>
            </div>
        </form>
    </div>

@endsection





