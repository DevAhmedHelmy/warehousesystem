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
            {{-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library --}}


            <li class="nav-item has-treeview">
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
                <li class="nav-item">
                  <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>الصلاحيات</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tree"></i>
                <p>
                    البيانات الاساسية
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              {{--  <ul class="nav nav-treeview">
                @if (\Auth::check() && auth()->user()->hasPermission('read_company'))
                    <li class="nav-item">
                        <a href="{{route('dashboard.companies.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الشركات</p>
                        </a>
                    </li>
                @endif
                @if (\Auth::check() && auth()->user()->hasPermission('read_department'))
                    <li class="nav-item">
                        <a href="{{route('dashboard.departments.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الادارات</p>
                        </a>
                    </li>
                @endif
                @if (\Auth::check() && auth()->user()->hasPermission('read_job'))
                    <li class="nav-item">
                        <a href="pages/UI/buttons.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الوظائق</p>
                        </a>
                    </li>
                @endif
                @if (\Auth::check() && auth()->user()->hasPermission('read_category'))
                    <li class="nav-item">
                        <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الاصناف</p>
                        </a>
                    </li>
                @endif
                @if (\Auth::check() && auth()->user()->hasPermission('read_product'))
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>المنتجات</p>
                        </a>
                    </li>
                @endif
                @if (\Auth::check() && auth()->user()->hasPermission('read_specialoffer'))
                    <li class="nav-item">
                        <a href="{{route('dashboard.specialOffers.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>عروض خاصة</p>
                        </a>
                    </li>
                @endif

                    {{--  <li class="nav-item">
                        <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>الالوان</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>البنوك</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>اعدادات نوع البطاقة</p>
                        </a>
                    </li>  --}}

              </ul>  --}}
            </li>











          </ul>
        </nav>
        {{-- /.sidebar-menu --}}
      </div>
    </div>
    {{-- /.sidebar --}}
  </aside>
