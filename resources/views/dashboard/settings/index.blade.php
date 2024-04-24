@extends('dashboard.layout.layout')

@section('title2',__('words.settings'))

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
    <div class="card card-secondary ">
        <div class="card-header">
            <h3 class="btn btn-block btn-secondary">{{ __('words.site') }} {{ __('words.settings') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('dashboard.settings.update' , $setting->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{ __('words.email') }}"
                        name="email" value="{{ $setting->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="phone" class="form-control" id="exampleInputEmail1" placeholder="{{ __('words.phone') }}"
                        name="phone" value="{{ $setting->phone }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label" > <i class="fas fa-anchor"></i> {{ __('words.logo') }} </label>
                    <input class="form-control dropify" type="file" id="formFile" name="logo" data-default-file="{{asset($setting->logo)}}">
                </div>


                <div class="mb-3">
                    <label for="formFile" class="form-label"><i class="fas fa-blog"></i>     {{ __('words.favicon') }} </label>
                    <input class="form-control dropify" type="file" id="formFile" name="favicon" data-default-file="{{asset($setting->favicon)}}">
                    </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                            </path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Facebook" aria-label="Input group example"
                        aria-describedby="basic-addon1" name="facebook" value="{{ $setting->facebook }}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15">
                            </path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Twitter" aria-label="Input group example"
                        aria-describedby="basic-addon1" name="twitter" value="{{ $setting->twitter }}">
                </div>
            </div>


        </div>


      <div class="">
        <div class="card-header">
        </div>
        <div class="">
                <h4 class="btn btn-block btn-secondary disabled">{{ __('words.translations') }}</h4>
        </div>
        <br>

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
                @foreach (config('app.languages') as $key=>$lang)
                <div class="tab-pane fade @if($loop->index == 0) show active in @endif"  id="{{ $key }}" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="{{ __('words.username') }}" name="{{ $key }}[name]"
                        value="{{ $setting->translate($key)->name }}">
                    </div>
                    <div class="form-group">
                        {{-- <label>Intl US phone mask:</label> --}}

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('words.address') }}" name="{{ $key }}[address]"
                            value="{{ $setting->translate($key)->address }}">
                        </div>
                        <!-- /.input group -->
                      </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrows-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('words.content') }}" name="{{ $key }}[content]"
                            value="{{ $setting->translate($key)->content }}">
                        </div>
                        <!-- /.input group -->
                      </div>
                  </div>
            </div>
            @endforeach
          <!-- /.form group -->

        </div>
        <!-- /.card-body -->
      </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
    </div>
@endsection
