@props(['id', 'w' => '627px'])
<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: {{ $w }}; padding:20px;">
            {{ $slot }}
        </div>
    </div>
</div>