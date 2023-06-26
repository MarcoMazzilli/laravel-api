<aside>

<ul>

    <li class="{{ Route::currentRouteName() === 'admin.home'? 'active' : '' }}">
        <a href="{{ route('admin.home') }}">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.project.index' ? 'active' : '' }}">
        <a href="{{ route('admin.project.index')}}">

            <i class="fa-solid fa-diagram-project"></i>
            <span>Projects</span>
        </a>
    </li>
    <li class="{{ Route::currentRouteName() === 'admin.project.create' ? 'active' : '' }}">
        <a href="{{ route('admin.project.create')}}">

            <i class="fa-solid fa-circle-plus"></i>
            <span>Create New</span>
        </a>
    </li>

</ul>

</aside>
