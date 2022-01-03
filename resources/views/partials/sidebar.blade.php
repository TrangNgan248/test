  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="https://bktoanthu.com/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Group 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://scontent.fhan5-4.fna.fbcdn.net/v/t1.6435-9/152406961_1802432383270100_3355430014002109187_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=8631f5&_nc_ohc=3Yrx4Na3mp8AX9-k55-&_nc_ht=scontent.fhan5-4.fna&oh=aa958872a53416c145c25d61d767af58&oe=618F2A1B" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('home')}}" class="d-block">GROUP 1</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                DANH MỤC SÁCH
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('sachs.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               SÁCH
                <span class="right badge badge-danger">hot</span>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('nxbs.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                NHÀ XUẤT BẢN
                <span class="right badge badge-danger">Nxb</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('tacgias.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                TÁC GIẢ
                <span class="right badge badge-danger">Tg</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('advert.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               ADVERTISEMENT
               <span class="right badge badge-danger">Advert</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              SETTING
              <span class="right badge badge-danger">St</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('newsgroup.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                NHÓM TIN
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('news.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                TIN TỨC
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>