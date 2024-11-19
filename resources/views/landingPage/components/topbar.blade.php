
        <!-- Topbar Start -->
        <div class="container-fluid bg-success px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/rubaalhelo23?mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/in/rubaalhelo?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/dietitian.rubaalhelo?igsh=MTFiM2o1NXZjd2MwbQ==" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
               <div class="col-lg-4 text-center text-lg-end">
    <div class="d-inline-flex align-items-center" style="height: 45px;">
        @guest
            <a href="{{ route('register') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>انشاء حساب</small></a>
            <a href="{{ route('login') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>تسجيل الدخول</small></a>
        @endguest

        @auth
            <div class="dropdown">
                <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown">
                     @if(Auth::user()->role === 'admin')
                    <small><i class="fa fa-home me-2"></i> لوحة التحكم  </small>
                    @endif
                    @if(Auth::user()->role === 'user')
                    <small><i class="fa fa-home me-2"></i> حسابي</small>
                    @endif  

                </a>
                <div class="dropdown-menu rounded">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="dropdown-item"><i class="fas fa-tachometer-alt me-2"></i> لوحة التحكم</a>
                    @endif

                    @if(Auth::user()->role === 'user')
<a href="{{ route('profile.index', Auth::id()) }}" class="dropdown-item">
    <i class="fas fa-user-alt me-2"></i> حسابي
</a>
                    @endif


                    <a href="{{ route('logout') }}" 
                       class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off me-2"></i> تسجيل خروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @endauth
    </div>
</div>

        </div>
        </div>
        <!-- Topbar End -->