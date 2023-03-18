@props(['id', 'w' => '627px', 'static' => 'static'])
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="{{ $static }}">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: {{ $w }}; padding:20px;">
            {{ $slot }}
        </div>
    </div>
</div>