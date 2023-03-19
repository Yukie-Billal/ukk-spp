@props(['parent' => false, 'where'])
<nav class="breadcrumb">
    <a class="breadcrumb-item text-l-regular" href="/beranda">Beranda</a>
    @if ($where)        
        <a class="breadcrumb-item text-l-regular" href="#">{{ $parent }}</a>
    @endif
    <span class="breadcrumb-item text-l-regular active">{{ $where }}</span>
</nav>