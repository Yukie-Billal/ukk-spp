@props(['parent' => false, 'where' => 'Beranda'])
<nav class="breadcrumb">
    @if ($where != 'Beranda')
        <a class="breadcrumb-item text-l-regular" href="/beranda">Beranda</a>
    @endif
    @if ($parent)        
        <a class="breadcrumb-item text-l-regular" href="#">{{ $parent }}</a>
    @endif
    <span class="breadcrumb-item text-l-regular active">{{ $where }}</span>
</nav>