<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>



            <!---User Management-->
            {{-- <li>
                <a class="app-menu__item {{ request()->is('admin/users') ? 'active' : '' }} {{ sidebar_open(['admin.users']) }}"
                    href="{{ route('admin.users.index') }}">
                    <i class="app-menu__icon fa fa-user"></i>
                    <span class="app-menu__label">User Management</span>
                </a>
            </li> --}}

                <!--  Project management -->
                <li>
                    <a class="app-menu__item {{ request()->is('admin/project') ? 'active' : '' }} {{ sidebar_open(['admin.project']) }}"
                        href="{{ route('admin.project.index') }}"><i class="app-menu__icon fa fa-sitemap"></i>
                        <span class="app-menu__label">Project management</span>
                    </a>
                </li>
               <!--  Lead management -->
             <li>
                 <a class="app-menu__item {{ request()->is('admin/lead') ? 'active' : '' }} {{ sidebar_open(['admin.lead']) }}"
                  href="{{ route('admin.lead.index') }}"><i class="app-menu__icon fa fa-handshake-o"></i>
                <span class="app-menu__label">Lead management</span>
                </a>
            </li>
            <!--  Lead User management -->
            {{-- <li>
                <a class="app-menu__item {{ request()->is('admin/leaduser') ? 'active' : '' }} {{ sidebar_open(['admin.leaduser']) }}"
                 href="{{ route('admin.leaduser.index') }}">  <i class="app-menu__icon fa fa-user"></i>
               <span class="app-menu__label">LeadUser Management</span>
               </a>
           </li> --}}
           <!--  Lead Feedback management -->
           <li>
            <a class="app-menu__item {{ request()->is('admin/leadfeedback') ? 'active' : '' }} {{ sidebar_open(['admin.leadfeedback']) }}"
             href="{{ route('admin.leadfeedback.index') }}"><i class="app-menu__icon fa fa-file"></i>
           <span class="app-menu__label">Lead Feedback Management</span>
           </a>
       </li>

       <li>
            <a class="app-menu__item {{ request()->is('sales/intern') ? 'active' : '' }} {{ sidebar_open(['sales.intern']) }}"
            href="{{ route('user.sales.intern.index') }}"><i class="app-menu__icon fa fa-handshake-o"></i>
            <span class="app-menu__label">Intern management</span>
            </a>
        </li>   
       <!---   Certificate Management ---->
        {{-- <li>
            <a class="app-menu__item {{ request()->is('admin/certificate') ? 'active' : '' }} {{ sidebar_open(['admin.certificate']) }}"
             href="{{ route('admin.certificate.index') }}"><i class="app-menu__icon fa fa-file"></i>
           <span class="app-menu__label">Certificate Management</span>
           </a>
       </li> --}}
    </ul>
</aside>
