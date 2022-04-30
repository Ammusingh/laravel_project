<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ url('/dashboard')}}" class="sidebar-brand">
      <!-- <img src="{{asset('images/dashboard-logo.png')}}"> -->
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  
  <div class="sidebar-body">
    <ul class="nav">
     
      <!-- <li class="nav-item nav-category">MAIN</li>
      
     
      <li class="li_box ">
       
        <a href="{{ url('/dashboard')}}" class="nav-link">
          <span class="sideicon">
            <i class="fas fa-tachometer-alt"></i>
          </span>
          <span class="link-title">Dashboard</span>
        </a>
      </li> -->
     
      <li class="nav-item nav-category">Sidebar</li>

      @if(auth()->user()->role == 1)
      <li class="li_box  ">
        <a href="{{route('department.index')}}" class="nav-link">
          <span class="sideicon">
            <i class="fas fa-copy"></i>
          </span>
          <span class="link-title">Departments</span>
        </a>
      </li>

      <li class="li_box  ">
        <a href="{{route('incharge.index')}}" class="nav-link">
          <span class="sideicon">
            <i class="fas fa-copy"></i>
          </span>
          <span class="link-title">Incharge</span>
        </a>
      </li>
      @endif
      
      @if(auth()->user()->role == 2 || auth()->user()->role == 3 || auth()->user()->role == 1)
      <li class="li_box  ">
        <a href="{{route('complaint.index')}}" class="nav-link">
          <span class="sideicon">
            <i class="fas fa-copy"></i>
          </span>
          <span class="link-title">Complaints</span>
        </a>
      </li>
      @endif
     
      <li class="li_box ">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
              <span class="sideicon">
                <!-- <img src="{{asset('images/menu-icons/logout.png')}}" class="imgblk">
                <img src="{{asset('images/menu-icons/logout-b.png')}}" class="imgblu"> -->
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span class="link-title">Logout</span>
            </a>
        </form>
        
      </li>
     
    </ul>
  </div>
</nav> 
<script type="text/javascript">

</script>