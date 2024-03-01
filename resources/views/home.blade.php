@extends('layouts.app')

@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card my-2">
                    <div class="card-header">Notification</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <br>
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
                                            <button id="delete" value="{{ $post['id'] }}" onclick="debug()"
                                                class="btn btn-danger btn-sm">delete</button>
                                            <button id="edit" class="btn btn-warning btn-sm">edit</button>
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
        function debug() {
            Swal.fire({
                title: "Custom animation with Animate.css",
                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInUp
                        `
                },
                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                        `
                }
            });
        }

        function deleteCustomer(event) {
            event.preventDefault();
            const id = event.target.getAttribute("value");

            swal({
                    title: "Yakin?",
                    text: "Data yang dihapus tidak bisa dipulihkan.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        fetch(`api/delete/${id}`, {
                            method: 'DELETE'
                        })
                    }
                });
        }
    </script>
