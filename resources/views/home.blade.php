@extends('layouts.app')

@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mb-3">
                    <div class="card-header">Notification</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome, <text class="fw-bold">{{ Auth::user()->name }}</text>!
                    </div>
                </div>

                <div class="card my-2">
                    <div class="card-header">Users</div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th width="5%">id</th>
                                    <th width="20%">name</th>
                                    <th width="20%">birth-place</th>
                                    <th width="20%">birth-date</th>
                                    <th width="20%">email</th>
                                    <th width="15%"><span>action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="align-baseline">
                                        <td>{{ $post['id'] }}</td>
                                        <td>{{ $post['name'] }}</td>
                                        <td>{{ $post['birth-place'] }}</td>
                                        <td>{{ $post['birth-date'] }}</td>
                                        <td>{{ $post['email'] }}</td>
                                        <td class="d-flex gap-1">
                                            <button id="delete" value="{{ $post['id'] }}" onclick="deleteUser(event)"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                            <button id="edit" class="btn btn-warning btn-sm">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script>
        window.onload = () => {
            if (sessionStorage.getItem('userDeleted')) {
                deletedNoti();
                sessionStorage.removeItem('userDeleted');
            }
        };

        function deletedNoti(){
            Swal.fire({
                position: "bottom-end",
                title: "Item telah dihapus",
                showConfirmButton: false,
                timer: 1500,
            }); 
        }

        function deleteUser(event) {
            event.preventDefault();
            const id = event.target.getAttribute("value");

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data tidak akan bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                animation: false
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`api/delete/${id}`, {
                        method: 'DELETE'
                    })
                    sessionStorage.setItem('userDeleted', 'true');
                    window.location.href = window.location.href

                }
            });
        }
    </script>
