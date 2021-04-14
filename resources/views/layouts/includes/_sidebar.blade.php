@if(auth()->user()->role=='admin')
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('template/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{auth()->user()->name}}</a>
    </div>
  </div>



  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="{{route('admin/dashboard')}}" class="{{Request::is('admin/dashboard')?'active':''}} nav-link ">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard

          </p>
        </a>
      </li>

      <li class="nav-item 
          
          @if(Request::is('admin/siswa'))
          {{Request::is('admin/siswa')?'menu-open':''}}
          @elseif(Request::is('admin/guru'))
          {{Request::is('admin/guru')?'menu-open':''}}
          @endif ">
        <a href="#" class="nav-link {{Request::is('admin/guru')?'active':''}}{{Request::is('admin/siswa')?'active':''}} ">
          <i class="nav-icon far fa-user"></i>
          <p>
            User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{route('admin/guru')}}" class="nav-link {{Request::is('admin/guru')?'active':''}}">
              <i class="@if(Request::is('admin/guru'))
                far fa-dot-circle nav-icon
              @else
                far fa-circle nav-icon
              @endif "></i>
              <p>Guru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/siswa')}}" class="nav-link {{Request::is('admin/siswa')?'active':''}}">
              <i class="@if(Request::is('admin/siswa'))
                far fa-dot-circle nav-icon
              @else
                far fa-circle nav-icon
              @endif "></i>
              <p>Siswa</p>
            </a>
          </li>


        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('admin/kelas')}}" class="{{Request::is('admin/kelas')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Kelas

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin/mapel')}}" class="{{Request::is('admin/mapel')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Matapelajaran

          </p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{route('admin/pengumuman')}}" class="{{Request::is('admin/pengumuman')?'active':''}} nav-link">
          <i class="nav-icon fas fa-bullhorn"></i>
          <p>
            Pengumuman

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin/agenda')}}" class="{{Request::is('admin/agenda')?'active':''}} nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>
            Agenda

          </p>
        </a>
      </li>
      <li class="nav-item 
          @if (Request::is('admin/kategori'))
          {{Request::is('admin/kategori')?'menu-open':''}}
          @elseif(Request::is('admin/postberita'))
          {{Request::is('admin/postberita')?'menu-open':''}}
          @elseif(Request::is('admin/listberita'))
          {{Request::is('admin/listberita')?'menu-open':''}}
          @endif ">
        <a href="#" class="nav-link 
          @if (Request::is('admin/kategori'))
          {{Request::is('admin/kategori')?'active':''}}
          @elseif(Request::is('admin/postberita'))
          {{Request::is('admin/postberita')?'active':''}}
          @elseif(Request::is('admin/listberita'))
          {{Request::is('admin/listberita')?'active':''}}
          @endif ">
          <i class="nav-icon far fa-newspaper"></i>
          <p>
            Berita
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{route('admin/listberita')}}" class="nav-link {{Request::is('admin/listberita')?'active':''}}">
              <i class="fas fa-list nav-icon"></i>
              <p>List Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin/postberita')}}" class="nav-link {{Request::is('admin/postberita')?'active':''}}">
              <i class="fas fa-pencil-alt nav-icon"></i>
              <p>Post Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin/kategori')}}" class="nav-link {{Request::is('admin/kategori')?'active':''}}">
              <i class="fas fa-wrench nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="/logout" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Sign Out
          </p>
        </a>
      </li>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
@elseif(auth()->user()->role='guru')
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ auth()->user()->guru->getAvatar() }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{auth()->user()->name}}</a>
    </div>
  </div>



  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="{{route('guru/dashboard')}}" class="{{Request::is('guru/dashboard')?'active':''}} nav-link ">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('guru/profile')}}" class="{{Request::is('guru/profile')?'active':''}} nav-link ">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Profile

          </p>
        </a>
      </li>

      
      {{-- <li class="nav-item">
        <a href="{{route('guru/kelas')}}" class="{{Request::is('guru/kelas')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Kelas

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('guru/mapel')}}" class="{{Request::is('guru/mapel')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Matapelajaran

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('guru/mapel')}}" class="{{Request::is('guru/mapel')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Materi

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('guru/mapel')}}" class="{{Request::is('guru/mapel')?'active':''}} nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Tugas

          </p>
        </a>
      </li> --}}
      
      
      
      <li class="nav-item">
        <a href="/logout" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Sign Out
          </p>
        </a>
      </li>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
@endif

