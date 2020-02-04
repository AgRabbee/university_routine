
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
               <a href="" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>Dashboard</p>
               </a>
           </li>

           <li class="nav-header">System Users</li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/allUsers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
            </ul></li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
