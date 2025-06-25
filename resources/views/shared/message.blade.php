@if (Session::has('flash'))
    <script>
        Swal.fire({
            title: 'Success!',
            icon: 'success',
            text: '{{ session('flash') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: '{{ $errors->first() }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif