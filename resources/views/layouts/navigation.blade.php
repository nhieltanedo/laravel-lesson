<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar">
        <li class="nav-item">
            <a class="{{ Request::is('dashboard') ? 'bg-info text-dark bg-opacity-10' : 'bg-white' }} nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="{{ Request::is('post','posts') ? 'collapse bg-info bg-opacity-10 text-dark' : 'collapsed bg-white' }} nav-link" data-bs-target="#resources-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Resources</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="resources-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Request::is('post') && !Request::is('posts') ? 'active' : 'bg-white' }}" href="{{ route('post.index') }}">
                        <i class="bi bi-circle"></i><span>My Post</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ Request::is('posts') ? 'active' : 'bg-white' }}" href="{{ route('post.posts') }}">
                        <i class="bi bi-circle"></i><span>All Posts</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- End Components Nav -->
    </ul>
</aside>
<!-- End Sidebar-->