<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">

          </div>
        </div> 
      </div>
    </form>
    <div class="header-name">
      <!-- <span class="header-name-span">
        @if(Auth::check())
        Welcome {{Auth::user()->name}}
        @endif
      </span>  -->
      <ul class="navbar-nav mt-3">
        <li class="nav-item">
          <span class="header-name-span" style="white-space: nowrap">
            @if(Auth::check())
            Welcome {{Auth::user()->name}}
            @endif
          </span>
        </li>  
      <!-- <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="info text-center">
                <p class="name font-weight-bold mb-0"></p>
                <p class="email text-muted mb-3"></p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="{{url('profile')}}" class="nav-link">
                  <i class="fas fa-user-circle"></i>
                  <span>Profile</span>
                </a>
              </li> 
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link"> 
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span>
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </li> -->
      </ul>
    </div> 
  </div>
</nav>

