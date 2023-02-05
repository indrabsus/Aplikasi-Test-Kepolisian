<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    @if (Auth::user()->level == 'admin')
    <li class="nav-item">
        <a href="{{route('indexAdmin')}}" class="nav-link {{ Route::currentRouteName() == 'indexAdmin' ? 'active':''}}">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
          <a href="{{route('peserta')}}" class="nav-link {{ Route::currentRouteName() == 'peserta' ? 'active':''}}">
              <i class="nav-icon fa fa-user"></i>
            <p>
              Peserta
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('test1')}}" class="nav-link {{ Route::currentRouteName() == 'test1' ? 'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Kesamaptaan A
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('test2')}}" class="nav-link {{ Route::currentRouteName() == 'test2' ? 'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Kesamaptaan B
            </p>
          </a>
        </li>

    @endif


    <li class="nav-item">
      <a href="{{route('logout')}}" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
