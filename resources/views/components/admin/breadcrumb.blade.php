@props(['title' => ''])
<div class="mb-2 row">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ trans('general.'.$title) }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{ $slot }}

        </ol>
    </div>
</div>

