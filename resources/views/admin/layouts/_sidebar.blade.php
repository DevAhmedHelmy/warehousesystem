<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- Brand Logo --}}
    <a href="#" class="brand-link">
      {{--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">  --}}
      <span class="brand-text font-weight-light">نظام المخازن</span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        {{-- Sidebar user panel (optional) --}}

        @if(Auth::check())
            <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                <div class="image">
                    <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>
        @endif
        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             {{--  main pages  --}}
                <li class="nav-item has-treeview @if(request()->is('roles')) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            الرئيسية
                        <i class="right fa fa-angle-left"></i>
                        </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-pie-chart nav-icon"></i>
                            <p>الاحصائيات</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الإعدادات</p>
                        </a>
                    </li>
                    @can('role-list')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link @if(request()->is('roles')) active @endif">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الصلاحيات</p>
                            </a>
                        </li>
                    @endcan
                </ul>
                </li>
                {{--  !main pages  --}}
                {{--  users link  --}}
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link @if(request()->is('users')) active @endif">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                @lang('general.users')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! users link  --}}
                {{--  clients link  --}}
                @can('client-list')
                    <li class="nav-item">
                        <a href="{{ route('clients.index') }}" class="nav-link @if(request()->is('clients')) active @endif">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                @lang('general.clients')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! clients link  --}}
                {{--  suppliers link  --}}
                @can('supplier-list')
                    <li class="nav-item">
                        <a href="{{ route('suppliers.index') }}" class="nav-link @if(request()->is('suppliers')) active @endif">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                @lang('general.suppliers')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! suppliers link  --}}
                {{--  companies link  --}}
                @can('company-list')
                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}" class="nav-link @if(request()->is('companies')) active @endif">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                @lang('general.companies')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! companies link  --}}
                {{--  categories link  --}}
                @can('category-list')
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link @if(request()->is('categories')) active @endif">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                @lang('general.categories')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! categories link  --}}
                {{--  products link  --}}
                @can('product-list')
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link @if(request()->is('products')) active @endif">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                @lang('general.products')
                            </p>
                        </a>
                    </li>
                @endcan
                {{--  ! products link  --}}
                {{--  logout link  --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>@lang('general.Logout')</p>

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                {{--  !users link  --}}
            </ul>
        </nav>
        {{-- /.sidebar-menu --}}
      </div>
    </div>
    {{-- /.sidebar --}}
</aside>
