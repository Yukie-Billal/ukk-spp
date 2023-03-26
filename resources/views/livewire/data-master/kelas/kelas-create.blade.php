<div class="modal-body">
    <div class="form-group text-center">
        <h2>
            Tambah Data Kelas
        </h2>
    </div>
    <hr>
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label class="text-m-regular">Nama Kelas</label>
            <x-form.input placeholder="Masukkan Nama Kelas" wire:model.lazy='nama_kelas' />
            @error('nama_kelas')
                <small class="text-m-regular text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3" wire:ignore wire:target='fresh'>
            <label class="text-m-regular">Kompetensi Keahlian</label>
            <x-form.input placeholder="Kompetensi Keahlian" id="komp-keahlian" wire:model.lazy='kompetensi_keahlian' />
            @error('kompetensi_keahlian')
                <small class="text-m-regular text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <x-button color="success">Tambah Kelas</x-button>
    </form>
    @foreach ($kelas as $item)
        <input type="hidden" class="barangList input-form" value="{{ $item->kompetensi_keahlian }}">
    @endforeach
</div>

@push('scripts')
    <script>
        function freshed() {  
            console.log("set up your desk");          
            var dataList = document.querySelectorAll('input.barangList');
            var arrayData = [];
            dataList.forEach((item) => {
                arrayData.push(item.value);
            });
            var autoCompleteJS = new autoComplete({
                selector: "#komp-keahlian",
                placeHolder: "kompetensi Keahlian",
                data: {
                    src: arrayData,
                },
                resultsList: {
                    element: (list, data) => {
                        if (!data.results.length) {
                            // Create "No Results" message element
                            const message = document.createElement("div");
                            // Add class to the created element
                            message.setAttribute("class", "no_result");
                            // Add message text content
                            message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                            // Append message element to the results list
                            list.prepend(message);
                        }
                    },
                    noResults: true,
                    maxResults: 15,
                    tabSelect: true,
                },
                resultItem: {
                    highlight: true
                },
                events: {
                    input: {
                        selection: (event) => {
                            const selection = event.detail.selection.value;
                            const params = ['serial', selection];
                            autoCompleteJS.input.value = selection;
                        }
                    }
                }
             });
        }
        Livewire.on('fresh', freshed);
        freshed();
    </script>
    <script>
        Livewire.on('getTahun', function () {
            var value = $('#tahunSpp').val();
            Livewire.emit('setTahun', value);
        })
        Livewire.on('fresh',function () {$('#modalTambahKelas').modal('hide')});
    </script>
@endpush