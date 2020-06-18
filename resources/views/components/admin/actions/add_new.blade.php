@props(['url' => ''])
<a href="{{ route($url) }}" {{ $attributes }}>
    <i class="fa fa-plus"></i>
    {{ $slot }}
</a>
