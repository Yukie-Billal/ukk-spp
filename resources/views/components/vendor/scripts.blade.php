<div>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/toastify/toastify.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetAlert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/chart/chartjs.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.js" integrity="sha512-vCUbejtS+HcWYtDHRF2T5B0BKwVG/CLeuew5uT2AiX4SJ2Wff52+kfgONvtdATqkqQMC9Ye5K+Td0OTaz+P7cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        let loader = document.querySelector('#loader');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 1500);
    </script>
</div>