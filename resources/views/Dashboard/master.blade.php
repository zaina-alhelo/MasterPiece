@include("Dashboard.components.head")
@include("Dashboard.components.header")
@include("Dashboard.components.sidebar")

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title-page')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">@yield('title-page')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
@yield("content")



 </main>



@include("Dashboard.components.footer")
