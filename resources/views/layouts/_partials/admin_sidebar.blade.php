
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

           <li class="nav-header">University Subjects</li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/allSubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/addSubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
            </ul></li>

            {{-- // ===================================================
            // don't require for completing the requirements
            // =================================================== --}}

           {{-- <li class="nav-header">University Class Times</li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Class Times
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/allClassTimes') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Class Times</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/addClassTime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class Time</p>
                </a>
              </li>
            </ul></li> --}}

            {{-- // ===================================================
            // don't require for completing the requirements
            // =================================================== --}}

           <li class="nav-header">University Class Routines</li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Class Routines
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/allClasses') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/addClass') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class to Routine</p>
                </a>
              </li>
            </ul></li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
