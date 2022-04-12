<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#user-management-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Student Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-management-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('studentsListTemplate') }}">
                        <i class="bi bi-circle"></i><span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('studentsMarkListTemplate') }}">
                        <i class="bi bi-circle"></i><span>Students Marks</span>
                    </a>
                </li>
            </ul>
        </li><!-- End user-management Nav -->

    </ul>

</aside><!-- End Sidebar-->