<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="javascript:;">Admin Panel</a>
                </div>
                <div class="toggler"><a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a> </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active ">
                    <a href="/admin" class='sidebar-link'> <i class="bi bi-grid-fill"></i> <span>Dashboard</span> </a>
                </li>
                
                <li class=" sidebar-item">
                    <a href="{{route('book.list')}}" class='sidebar-link'> <i class="bi bi-gear-fill"></i> <span>Books</span> </a>
                </li>
                
                <li class="sidebar-item  ">
                    <a href="{{route('admin.logout')}}" class='sidebar-link'> <i class="bi bi-power-fill"></i> <span>Logout</span> </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>