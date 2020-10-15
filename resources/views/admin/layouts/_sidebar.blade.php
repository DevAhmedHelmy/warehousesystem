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
                
                {{--  basic information  --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.basic_information')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                         
                         {{--  !main pages  --}}
                            @can('unit-list')
                            <li class="nav-item">
                                <a href="{{ route('branches.index') }}" class="nav-link @if(request()->is('branches')) active @endif">
                                    <i class="nav-icon fa fa-building-o"></i>
                                    <p>
                                        @lang('general.branches')
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('unit-list')
                            <li class="nav-item">
                                <a href="{{ route('units.index') }}" class="nav-link @if(request()->is('units')) active @endif">
                                    <i class="nav-icon fa fa-balance-scale"></i>
                                    <p>
                                        @lang('general.units')
                                    </p>
                                </a>
                            </li>
                        @endcan
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

                        {{--  companies link  --}}
                        @can('company-list')
                            <li class="nav-item">
                                <a href="{{ route('companies.index') }}" class="nav-link @if(request()->is('companies') || request()->is('companies/*')) active @endif">
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
                                <a href="{{ route('categories.index') }}" class="nav-link @if(request()->is('categories') || request()->is('categories/*')) active @endif">
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
                                <a href="{{ route('products.index') }}" class="nav-link @if(request()->is('products') || request()->is('products/*')) active @endif">
                                    <i class="nav-icon fa fa-product-hunt"></i>
                                    <p>
                                        @lang('general.products')
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{--  ! products link  --}}

                    </ul>
                </li>
                {{--  !basic information  --}}

                {{--  purchases pages  --}}
                <li class="nav-item has-treeview {{active_menu('purchasebills')[0]}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.purchases')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('purchasebills')[1]}}">
                        {{--  suppliers link  --}}
                        @can('supplier-list')
                            <li class="nav-item">
                                <a href="{{ route('suppliers.index') }}" class="nav-link @if(request()->is('suppliers') || request()->is('suppliers/*')) active @endif">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        @lang('general.suppliers')
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{--  ! suppliers link  --}}
                        <li class="nav-item">
                            <a href="{{ route('purchasebills.index') }}" class="nav-link {{active_menu('purchasebills')[2]}}">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>@lang('general.purchases_bills')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>@lang('general.purchases_returns')</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--  !purchases pages  --}}
                {{--  sales pages  --}}
                <li class="nav-item has-treeview {{active_menu('salebills')[0]}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.sales')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview {{active_menu('salebills')[1]}}">
                        {{--  clients link  --}}
                        @can('client-list')
                            <li class="nav-item">
                                <a href="{{ route('clients.index') }}" class="nav-link @if(request()->is('clients') || request()->is('clients/*')) active @endif">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        @lang('general.clients')
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{--  ! clients link  --}}
                        <li class="nav-item">
                            <a href="{{ route('salebills.index') }}" class="nav-link {{active_menu('salebills')[2]}}">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>@lang('general.sales_bills')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>@lang('general.Sales_returns')</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--  !sales pages  --}}
                {{--  notices pages  --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.notices')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>@lang('general.add_notices')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>@lang('general.dismissal_notices')</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--  !notices pages  --}}
                {{--  stocks pages  --}}
                <li class="nav-item has-treeview {{active_menu('stocks')[0]}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.stocks')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('stocks')[1]}}">
                        @can('stock-list')
                            <li class="nav-item">
                                <a href="{{ route('stocks.index') }}" class="nav-link {{active_menu('stocks')[2]}}">
                                    <i class="fa fa-pie-chart nav-icon"></i>
                                    <p>@lang('general.main_stocks')</p>
                                </a>
                            </li>
                        @endcan


                    </ul>
                </li>
                {{--  !stocks pages  --}}
                {{--  financial  --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.financial')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    </ul>
                </li>
                {{-- ! financial  --}}
                {{--  reports  --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('general.reports')
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    </ul>
                </li>
                {{-- ! reports  --}}
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
