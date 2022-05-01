@extends('back-end.master')

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Role', 'key' => 'List','route_redirect'=> route('role.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('role-create')
                        <div class="col-md-12">
                            <a href="{{ route('role.create') }}" class="btn btn-info float-right m-2">Create </a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role name</th>
                                <th colspan="2" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $stt =  1;
                            @endphp
                            @foreach($roles as $role)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $role->name }} </td>

                                    @can('role-update', $role)
                                        <td>
                                            <a href="{{ route('role.edit', $role->id) }}"
                                                class="btn btn-secondary mr-2">Edit</a>
                                        </td>
                                    @endcan

                                    @can('role-delete', $role)
                                        <td>
                                            <form method="POST" action="{{ route('role.destroy', $role->id) }}">
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

