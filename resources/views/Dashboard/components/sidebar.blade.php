  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard_first') }}">
        <i class="bi bi-speedometer2"></i>
        <span>Dashboard</span>
    </a>
</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.index') }}">
        <i class="bi bi-people"></i>
        <span>Users</span>
    </a>
</li>


    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-egg-fried"></i><span>Recipes</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('categories.index') }}">
                <i class="bi bi-circle"></i><span>Categories</span>
            </a>
        </li>
        <li>
            <a href="{{ route('recipes.index') }}">
                <i class="bi bi-circle"></i><span>Recipes</span>
            </a>
        </li>
    </ul>
</li>


 

  

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('categories_blog.index') }}">
                <i class="bi bi-circle"></i><span>Categories of Blogs</span>
            </a>
        </li>
        <li>
            <a href="{{ route('blogs.index') }}">
                <i class="bi bi-circle"></i><span>Blogs</span>
            </a>
        </li>
    </ul>
</li>


      <li class="nav-heading">Pages</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('bmi.index') }}">
        <i class="bi bi-heart-pulse"></i>
        <span>BMI</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('messages.index') }}">
        <i class="bi bi-chat-dots"></i>
        <span>Messages</span>
    </a>
</li>


      <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('contact.index') }}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Contacts</span>
    </a>
</li>




    </ul>

  </aside><!-- End Sidebar-->