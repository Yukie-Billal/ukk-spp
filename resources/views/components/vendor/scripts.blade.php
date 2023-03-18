<div>
    <script src="{{ asset('vendor/moment/moment-locale.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/toastify/toastify.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetAlert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/chart/chartjs.min.js') }}"></script>
    <script src="{{ asset('vendor/alpinejs/alpine.min.js') }}"></script>
    <script src="{{ asset('vendor/autoCompleteJs/autoComplete.min.js') }}"></script>
    <script>
        let loader = document.querySelector('#loader');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 1500);
        const locale = "{{ config('app.locale') }}";
        moment.locale(locale);
        console.log(moment().format('MMMM dddd'));
    </script>
</div>