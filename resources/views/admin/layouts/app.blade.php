{{--  header  --}}
 @include('admin.layouts._header')
  {{-- Navbar --}}
  @include('admin.layouts._nav')
  {{-- /.navbar --}}

  {{-- Main Sidebar Container --}}

  @include('admin.layouts._sidebar')
  {{-- Main Sidebar Container --}}

  {{-- Content Wrapper. Contains page content --}}
  <div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <div class="content-header">
            <div class="container-fluid">
                @yield('header')
            </div><!-- /.container-fluid -->
          </div>



    </section>
    {{-- /.content-header --}}

    {{-- Main content --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        @yield('content')

        </div>  {{-- /.row (main row) --}}
      </div>{{-- /.container-fluid --}}

    </section>
    {{-- /.content --}}
  </div>
  {{--  footer  --}}
  @include('admin.layouts._footer')


  @yield('js')
