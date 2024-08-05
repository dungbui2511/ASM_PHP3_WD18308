<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="<?=$page_title == 'Dashboard' ? 'active-link' : '';?>">
                <a href="{{url('admin')}}"><i class="fa fa-desktop "></i>Dashboard</a>
            </li>
            <li class="<?=$page_title == 'Posts' ? 'active-link' : '';?>">
                <a href="{{url('admin/posts')}}"><i class="fa fa-table "></i>Posts</a>
            </li>
            <li class="<?=$page_title == 'Categories' ? 'active-link' : '';?>">
                <a href="{{url('admin/categories')}}"><i class="fa fa-edit "></i>Categories</a>
            </li>
            <li class="<?=$page_title == 'Tags' ? 'active-link' : '';?>">
                <a href="{{url('admin/tags')}}"><i class="fa fa-qrcode "></i>Tags</a>
            </li>
        </ul>
    </div>

</nav>