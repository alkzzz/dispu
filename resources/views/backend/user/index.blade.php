@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark">User</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="mt-4">
        <table id="userTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col">Nama User</th>
                    <th class="col">Username</th>
                    <th class="col">Role</th>
                    <th class="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="col">{{ $user->name }}</td>
                        <td class="col">{{ $user->username }}</td>
                        <td class="col">{{ $user->getRoleNames()[0] }}</td>
                        <td class="col">
                            <form id="userReset-{{ $user->id }}"
                                class="d-inline"action="{{ route('dashboard.reset.password', $user->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button id="confirmReset-{{ $user->id }}" data-id={{ $user->id }}
                                    class="btn btn-warning btn-sm confirmReset" type="button"><i
                                        class="fa-solid fa-unlock-keyhole"></i>
                                    Reset Password</button>
                            </form>
                            {{-- <form id="userDelete-{{ $user->id }}"
                                class="d-inline"action="{{ route('dashboard.user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button id="confirmDelete-{{ $user->id }}" data-id={{ $user->id }}
                                    class="btn btn-danger btn-sm confirmDelete" type="button"><i
                                        class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada user yang dibuat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('extra_js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $('.confirmReset').click(function(e) {
            let id = $(this).data('id');
            let formreset = $('#userReset-' + id);
            Swal.fire({
                title: 'Reset password user?',
                text: "Password user akan direset menjadi 123456!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Reset saja',
                cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    formreset.submit();
                }
            })
        });

        $('.confirmDelete').click(function(e) {
            let id = $(this).data('id');
            let formuser = $('#userDelete-' + id);
            Swal.fire({
                title: 'Hapus user?',
                text: "Apakah anda yakin akan menghapus user ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    formuser.submit();
                }
            })
        });
    </script>
@endsection
