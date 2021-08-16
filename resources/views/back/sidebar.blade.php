<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">پنل کاربران </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users')}}">کاربران</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.products')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">محصولات</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.categories')}}">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">دسته بندی ها</span>
            </a>
        </li>

    </ul>
</nav>
