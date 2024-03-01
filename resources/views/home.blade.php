@extends('layouts.app')

@section('content')
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
                    </div>
                </div>

                <div class="card my-2">
                    <div class="card-header">Users</div>

                    <div class="card-body table-responsive">
                        <table class="table table-responsive">
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
                                <tr>
                                    @foreach ($posts as $post)
                                        <td>{{ $post['id'] }}</td>
                                        <td>{{ $post['name'] }}</td>
                                        <td>{{ $post['birth-place'] }}</td>
                                        <td>{{ $post['birth-date'] }}</td>
                                        <td>{{ $post['email'] }}</td>
                                        <td><button class="btn btn-danger">delete</button><button class="btn btn-warning">edit</button></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
