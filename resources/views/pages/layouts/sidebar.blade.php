<header>
  <div class="drawer drawer-right slide" tabindex="-1" role="dialog" aria-labelledby="drawer-demo-title" aria-hidden="true" id="drawer-demo">
  <div class="drawer-content drawer-content-scrollable" role="document">
      <div class="drawer-header">
        <h4 class="drawer-title" id="drawer-demo-title">{{ $user->first_name }}</h4>
      </div>
      <div class="drawer-body">
        <ul class="list-group list-group-flush mobile" id="menu-for-mobile">
              @if($user->role == 'SuperAdmin')
              <li class="list-group-item mobile">
                <a href="{{route('admin.offlinedonations')}}" class="nav-link {{ Request::routeIs('admin.offlinedonations') ? 'active' : '' }}"><i class="fa fa-university mr-3"></i>Bank Deposits</a>
              </li>
              <li class="list-group-item mobile">
                <a href="{{route('admin.checkpickup')}}" class="nav-link {{ Request::routeIs('admin.checkpickup') ? 'active' : '' }}"><i class="fa fa-money-check-alt mr-3"></i>Check Pick-up</a>
              </li>
              <li class="list-group-item mobile">
                <a disabled href="{{route('coins.index')}}" class="nav-link {{ Request::routeIs('coins.index') ? 'active' : '' }}"><i class="fas fa-coins mr-3"></i>Coins Donations</a>  
              </li>
              @endif
              <li class="list-group-item mobile"><a href="{{route('settlement.index')}}" class="nav-link {{ Request::routeIs('settlement.index') ? 'active' : '' }}"><i class="fas fa-hands-helping mr-3"></i>Settlement</a></li>
        </ul>
        <!-- <button type="button" class="btn btn-secondary btn-block" data-dismiss="drawer" aria-label="Close">
          Close Button
        </button> -->
      </div>
      <div class="drawer-footer"><a href="{{ route('logout')}}" class="h5 text-black float-right"> <i class="fas fa-sign-out-alt mr-3"></i> Logout</a></div>
  </div>
</div>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <!-- <button type="button" class="btn gava-btn-color btn-sm btn-process" data-toggle="drawer" data-target="#drawer-demo">
    <i class="fas fa-bars mr-3"></i>
  </button> -->
  <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#drawer-demo">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <h4 class="drawer-title" id="drawer-demo-title" style="margin-left: 30px">{{ $user->first_name }}</h4> 
  </div>
  <h4 class="logout-mobile"><a href="{{ route('logout')}}" class="float-right" style="margin-right: 30px">Logout</a></h4>
</nav> 


  <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <div class="text-center">
          <img src="{{ asset('img/logo-lg.png') }}" class="img-fluid" alt="">
        </div>
      </a>

      <div class="list-group list-group-flush">
        @if($user->role == 'SuperAdmin')
        <a href="{{route('admin.offlinedonations')}}" class="text-black list-group-item list-group-item-action {{ Request::routeIs('admin.offlinedonations') ? 'active' : '' }}">
          <i class="fa fa-university mr-3"></i>Bank Deposits</a>
        <a href="{{route('admin.checkpickup')}}" class="text-black list-group-item list-group-item-action {{ Request::routeIs('admin.checkpickup') ? 'active' : '' }}">
          <i class="fa fa-money-check-alt mr-3"></i>Check Pick-up</a>
        <a disabled href="{{route('coins.index')}}" class="text-black list-group-item list-group-item-action {{ Request::routeIs('coins.index') || Request::routeIs('coins.show') ? 'active' : '' }}">
          <i class="fas fa-coins mr-3"></i>Coins Donations</a>  
        @endif
        <a href="{{route('settlement.index')}}" class="text-black list-group-item list-group-item-action {{ Request::routeIs('settlement.index') || Request::routeIs('settlement.show') ? 'active' : '' }}">
          <i class="fas fa-hands-helping mr-3"></i>Settlement</a>
          
        
        <!-- <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>
      <!-- <footer class="page-row row">
        <div class="cell text-center" style="padding: 20px;">
          <a href="{{ route('logout')}}" class="text-black" style="font-size: 30px; margin-left: 35px;">Logout</a>
        </div>
      </footer> -->
  </div>

</header>