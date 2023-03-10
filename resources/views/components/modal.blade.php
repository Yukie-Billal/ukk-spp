@props(['id'])
<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
            {{ $slot }}
        </div>
    </div>
</div>