 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>  
  </ul>  
</nav>
<!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-5">
  <!-- Brand Logo -->
  <a href="{{ url('admin/dashboard')}}" class="brand-link">
    <img src="{{ asset ('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">File Tracker</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img style="height:40px;width:40px;" src="{{  Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </a>
        <a href="#" class="d-block ml-4 " style="color: skyblue;">{{ Auth::user()->designation }} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       
       @if(Auth::user()->user_type == 1)

       <li class="nav-item">
        
          <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{ url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin')active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Admin
            </p>
          </a>
        </li> --}}

        <li class="nav-item">
          <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Faculty
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class')active @endif">
            <i class="nav-icon fas fa-book"></i>
            <p>
             Course Code
            </p>
          </a>
        </li>

{{--         
        <li class="nav-item">
          <a href="{{ url('admin/subject/list')}}" class="nav-link @if(Request::segment(2) == 'subject')active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              File Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2) == 'assign_subject')active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Assign File 
            </p>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a href="{{ url('admin/homework/list')}}" class="nav-link @if(Request::segment(2) == 'homework')active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Documents 
            </p>
          </a>
        </li> --}}
        
        <li class="nav-item">
          <a href="{{ url('admin/homework/list')}}" class="nav-link @if(Request::segment(2) == 'homework')active @endif">
            <i class="nav-icon far fa-file"></i>

            <p>
              Documents
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/homework/list')}}" class="nav-link @if(Request::segment(2) == 'homework')active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p> First Semester</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/homework/list/secondsem')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Second Semester </p>
              </a>
            </li>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('admin/homework/notsubmitted')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Not Submitted </p>
            </a>
          </li> --}}
          
          </ul>
        </li>
  

        <li class="nav-item">
          <a href="{{ url('admin/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon fas fa-user"></i>

            <p>
              My Account
              
            </p>
          </a>
        </li>

        @elseif(Auth::user()->user_type == 3)

             <li class="nav-item">
        
          <a href="{{ url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>


        <li class="nav-item">
   
   <a href="{{ url('teacher/my_student')}}" class="nav-link @if(Request::segment(2) == 'my_student')active @endif">
    <i class="nav-icon far fa-user"></i>
     <p>
       My Student
     
     </p>
   </a>
 </li>

 <li class="nav-item">
   
   <a href="{{ url('teacher/my_class_subject')}}" class="nav-link @if(Request::segment(2) == 'my_class_subject')active @endif">
   
     <p>
       My Section & Subject
     
     </p>
   </a>
 </li>

 <li class="nav-item">
     <a href="{{ url('teacher/homework/list')}}" class="nav-link @if(Request::segment(2) == 'homework')active @endif">
       
       <p>
         Homework
       </p>
     </a>
   </li>
  

        <li class="nav-item">
          <a href="{{ url('teacher/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('teacher/myaccount')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
              
            </p>
          </a>
        </li>

       @elseif(Auth::user()->user_type == 2)

       <li class="nav-item">
          <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('student/class/list')}}" class="nav-link @if(Request::segment(2) == 'class')active @endif">
            <i class="nav-icon fas fa-book"></i>
            <p>
             Course Code
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('student/homework/list')}}" class="nav-link @if(Request::segment(2) == 'homework')active @endif">
            <i class="nav-icon far fa-file"></i>
            <p>
              Documents 
            </p>
          </a>
        </li>
  
        

        {{-- <li class="nav-item">
     <a href="{{ url('student/my_subject')}}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
      <i class="nav-icon far fa-user"></i>
       <p>
        My Category
         
       </p>
     </a>
   </li> --}}

   {{-- <li class="nav-item">
     <a href="{{ url('student/my_homework')}}" class="nav-link @if(Request::segment(2) == 'my_homework') active @endif">
      <i class="nav-icon far fa-user"></i>
       <p>
        Documents Submission
         
       </p>
     </a>
   </li>

   <li class="nav-item">
   <a href="{{ url('student/my_submitted_homework')}}" class="nav-link @if(Request::segment(2) == 'my_submitted_homework') active @endif">
    <i class="nav-icon far fa-user"></i>
     <p>
      Submitted Documents
       
     </p>
   </a>
 </li> --}}



        <li class="nav-item">
          <a href="{{ url('student/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
              My Account
              
            </p>
          </a>
          
        </li>

        <li class="nav-item">
          <a href="{{ url('student/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

       @endif
        
        <li class="nav-item">
          <a href="{{ url('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>

            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
          
    
        
 </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>