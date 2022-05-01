@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Contact ', 'key' => 'List','route_redirect'=> route('contact.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">File</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                            @foreach($contacts as $contact)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td> <a href="#" download="{{ $contact->file_contact_path }}">{{ $contact->file_contact_name }}</a> </td>

                                    @can('contact-delete', $contact)
                                        <td>
                                            <form method="POST" action="{{ route('contact.destroy', $contact->id) }}">
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
                    <div class="col-md-12">
                        {{ $contacts->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

