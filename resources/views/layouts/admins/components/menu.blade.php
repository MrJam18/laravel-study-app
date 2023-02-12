<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        @foreach($menuLists->get() as $menuList)
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{$menuList->getTitle()}}</span>
            </h6>
                <ul class="nav flex-column">
            @foreach($menuList->get() as $menuRoute)
                <li class="nav-item">
                    <a class="nav-link {{$menuRoute->isCurrentRoute ? 'active' : ''}}" href="{{$menuRoute->getHref()}}">
                        {{$menuRoute->getTitle()}}
                    </a>
                </li>
            @endforeach
                </ul>
        @endforeach
    </div>
</nav>
