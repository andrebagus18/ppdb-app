@if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#f0fdf4',
            color: '#166534',
            iconColor: '#22c55e',
            showClass: {
                popup: 'animate__animated animate__slideInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__slideOutRight'
            }
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            background: '#fef2f2',
            color: '#991b1b',
            iconColor: '#ef4444',
            showClass: {
                popup: 'animate__animated animate__slideInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__slideOutRight'
            }
        });
    </script>
@endif
@if ($errors->any())
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Lengkapi semua data!',
            showConfirmButton: false,
            timer: 3000,
            background: '#FECACA',
            color: '#991b1b',
            showClass: {
                popup: 'animate__animated animate__slideInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__slideOutRight'
            }
        });
    </script>
@endif
