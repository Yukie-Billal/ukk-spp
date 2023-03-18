@props(['id', 'w' => '627px', 'static' => 'static'])
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="{{ $static }}">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: {{ $w }}; padding:20px;">
            <button type="button" data-bs-dismiss="modal" class="position-absolute bg-transparent border-0 me-2 cursor-pointer" style="top: 0; right: 0; cursor: default; z-index: 99999">
                <span class="header-l text-neutral-90">&times;</span>
            </button>
            {{ $slot }}
        </div>
    </div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div> --}}