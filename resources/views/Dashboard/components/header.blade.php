
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <a href="{{url('/')}}" class="logo d-flex align-items-center">
<img src="{{ asset('images/logo.png') }}" alt="WikiDiet_logo" class="img-fluid" style="max-width: 200px; height: auto;">
</a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
<li class="nav-item dropdown">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">
            {{ Auth::check() ? Auth::user()->customNotifications()->where('read_at', null)->count() : 0 }}
        </span>
    </a>
    <!-- End Notification Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
            @if(Auth::check())
                You have {{ Auth::user()->customNotifications()->where('read_at', null)->count() }} new notifications
            @else
                You have 0 new notifications
            @endif
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>

        <li><hr class="dropdown-divider"></li>

        @foreach (Auth::user()->customNotifications()->where('read_at', null)->get() as $notification)
        <li class="notification-item">
            <i class="bi bi-envelope text-primary"></i>
            <div>
                <h4>New message from User ID {{ $notification->sender_id }}</h4> 
                                <p>{{ Str::limit($notification->message_content, 50) }}</p> 
                <p>{{ $notification->created_at->diffForHumans() }}</p>
                <a href="{{ route('messages.show', $notification->message_id) }}" class="stretched-link"></a> 
            </div>
        </li>
        @endforeach

        <li class="dropdown-footer">
            <a href="{{ route('messages.index') }}">Show all notifications</a>
        </li>
    </ul>
</li>

<!-- End Notification Nav -->


  
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
       
         

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('/')}}">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <!-- <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a> -->
               <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <i class="bi bi-box-arrow-left"></i>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->