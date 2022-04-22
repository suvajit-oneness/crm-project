<header class="app-header">
    <a class="app-header__logo" href="#">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    @php
                    if ($notification->unreadCount > 0) {
                        echo '<span class="badge badge-danger navbar-badge">' . $notification->unreadCount . '</span>';
                    } elseif ($notification->unreadCount > 99) {
                        echo '<span class="badge badge-danger navbar-badge">99+</span>';
                    } else {
                        echo '';
                    }
                @endphp
                @if (count($notification) > 0)
                You have
                <b>{{ $notification->unreadCount }}</b> unread
                {{ $notification->unreadCount == 1 ? 'notification' : 'notifications' }}
            @else
                No New Notification
            @endif
                </li>
                <div class="app-notification__content">
                    @foreach ($notification as $noti)
                    <li>
                        <a href="javascript:void(0)"
                        class=" {{ $noti->read_flag == 0 ? 'unread' : 'read' }}"
                        onclick="readNotification('{{ $noti->id }}', '{{ $noti->route ? route($noti->route) : '' }}')">
                        <p>{{ $noti->title }}
                            @php
                                if ($noti->created_at == '') {
                                    $noti_date = date('Y-m-d H:i:s');
                                } else {
                                    $noti_date = $noti->created_at;
                                }
                            @endphp
                            {{-- <span class="font-weight-bold">{{ date('d-M-y',strtotime($noti_date)) }}, {{ date('h:i A',strtotime($noti_date)) }}</span> --}}
                            <span
                                class="font-weight-bold">{{ \carbon\carbon::parse($noti->created_at)->diffForHumans() }}</span>
                            {{-- <span class="font-weight-bold">{{ date('d-M-y',strtotime($noti->created_at)) }}, {{ date('h:i A',strtotime(getAsiaTime24($noti->created_at))) }}</span> --}}
                        </p>
                    </a>
                    </li>
                    @endforeach
                    {{-- <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction complete
                                </p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a>
                    </li> --}}
                </div>
                <li class="app-notification__footer">
                    <a href="">See all notifications.</a>
                </li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> {{ Auth::user()->name }} <span><i class="treeview-indicator fa fa-angle-down" style="font-size: 15px;"></i></span></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right account-dropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
