<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administrador de cuotas')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    @include('components/nav')


    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás segura?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar patinador',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, enviar el formulario de eliminación
                    document.getElementById('form-eliminar-' + id).submit();
                }
            });
        }
        function confirmarEdicion(id) {
            Swal.fire({
                title: 'Confirmar edición',
                text: '¿Desea confirmar la edción?',
                icon: 'succes',
                showCancelButton: true,
                confirmButtonColor: '#green',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, editar patinador',
                cancelButtonText: 'Cancelar',
                timer: 6000,
                
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, enviar el formulario de eliminación
                    document.getElementById('form-editar-' + id).submit();
                }
            });
        }
</script>
</body>
</html>
