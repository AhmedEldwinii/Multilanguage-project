<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dashboard') }}/dist//img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard') }}/dist//img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('dashboard.users.index') }}" class="d-block"> {{ auth()->user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ trans('words.dashboard') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.posts.index') }}" class="nav-link">
                <i class="nav-icon fas fa-regular fa-paste"></i>
                <p>
                    {{ __('words.posts') }}
                    {{-- <span class="">&#9881;</span> --}}
                </p>
            </a>
        </li>

        @can('view', $setting)
          <li class="nav-item">
            <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    {{ __('words.categories') }}
                    {{-- <span class="">&#9881;</span> --}}
                </p>
            </a>
        </li>
        @endcan

        <li class="nav-item">
            <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{ __('words.members') }}
                    {{-- <span class="">&#9881;</span> --}}
                </p>
            </a>
        </li>

        @can('view', $setting)
          <li class="nav-item">
              <a href="{{ route('dashboard.settings.index') }}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    {{ __('words.settings') }}
                    {{-- <span class="">&#9881;</span> --}}
                </p>
            </a>
        </li>
        @endcan

        <li class="nav-item">
            <a href="" class="nav-link"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    {{ __('words.logout') }}
                    {{-- <span class="">&#9881;</span> --}}
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



