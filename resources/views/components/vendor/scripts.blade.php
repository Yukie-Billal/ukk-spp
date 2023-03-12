<div>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/toastify/toastify.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetAlert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script>
        let loader = document.querySelector('#loader');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 1500);
    </script>
</div>