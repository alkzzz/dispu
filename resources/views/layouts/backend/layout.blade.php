<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru - @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/vendor/ckeditor5/ckeditor.js') }}"></script>
    @livewireStyles
    <style>
        body {
            font-family: 'Inter', sherif;
        }

        th,
        td {
            vertical-align: middle;
        }
    </style>
    @yield('extra_css')
</head>

<body class="sb-nav-fixed">
    @include('layouts.backend.partials.navbar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">
                @yield('content')
            </div>
        </main>
        @include('layouts.backend.partials.footer')
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @livewireScripts
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    @yield('extra_js')

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="passwordModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="{{ route('dashboard.update.password') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input id="new_password" type="password" name="new_password" class="form-control"
                                autocomplete="true" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input id="confirm_password" type="password" name="confirm_password" class="form-control"
                                autocomplete="true" required>
                        </div>
                        <div class="alert alert-danger mb-0" style="display: none;"></div> <!-- Error container -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fa-solid fa-ban"></i> Batal</button>
                    <button id="changePassword" type="button" class="btn btn-success"><i
                            class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changePasswordButton = document.getElementById('changePassword');

            changePasswordButton.addEventListener('click', function() {
                const new_password = document.getElementById('new_password').value;
                const confirm_password = document.getElementById('confirm_password').value;

                // Get CSRF token from the meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch("{{ route('dashboard.update.password') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            new_password: new_password,
                            confirm_password: confirm_password
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.errors) {
                            const errorContainer = document.querySelector('.alert-danger');
                            errorContainer.innerHTML = '';

                            const errorList = document.createElement('ul'); // Create a <ul> element

                            // Apply styles to remove margin at the bottom of the <ul> element
                            errorList.style.marginBottom = '0';

                            data.errors.forEach(function(error) {
                                const listItem = document.createElement(
                                    'li'); // Create a <li> element
                                listItem.textContent = error; // Set the error text
                                errorList.appendChild(listItem); // Append the <li> to the <ul>
                            });

                            errorContainer.style.display = 'block';
                            errorContainer.appendChild(errorList);
                        } else {
                            // Hide error messages
                            document.querySelector('.alert-danger').style.display = 'none';

                            // Display success message in the modal
                            const modalBody = document.querySelector('.modal-body');

                            const successMessage = document.createElement('p');
                            successMessage.textContent = 'Password berhasil diubah.';
                            successMessage.classList.add(
                                'text-success'); // You can customize this class for styling

                            // Append the success message to the modal body
                            modalBody.appendChild(successMessage);

                            // Close the modal after 2 seconds
                            setTimeout(function() {
                                const modal = document.getElementById('passwordModal');
                                modal.classList.remove('show');
                                modal.style.display = 'none';
                                document.querySelector('.modal-backdrop').remove();

                                // Remove the success message
                                modalBody.removeChild(successMessage);

                                // Clear input fields
                                document.getElementById('new_password').value = '';
                                document.getElementById('confirm_password').value = '';
                            }, 1000);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
</body>

</html>
