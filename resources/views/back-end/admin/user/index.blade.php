@extends('back-end.master')

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Users ', 'key' => 'List','route_redirect'=> route('user.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('user-create')
                        <div class="col-md-12">
                            <a href="{{ route('user.create') }}" class="btn btn-info float-right m-2">Create User</a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Roles</th>
                                <th>Permission</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($users as $user)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if( $user->roles )
                                        <td>
                                            {{ $user->roles->name }}
                                        </td>
                                        <td>
                                            @foreach($user->roles->permissions as $per_name)
                                                <li>{{ $per_name->name }}</li>
                                            @endforeach
                                        </td>
                                    @else
                                        <td> No Roles</td>
                                        <td> No Permission </td>
                                    @endif

                                    @can('user-update', $user)
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        </td>
                                    @endcan

                                    @can('user-delete', $user)
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm_delete" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
                                        </td>
                                    @endcan

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection