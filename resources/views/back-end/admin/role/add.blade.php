@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Role', 'key' => 'Add','route_redirect'=> route('role.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>role name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name role" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Role Access</label>
    
                                <div class="row">
                                    {{-- Parent permission --}}
                                        @foreach($permission_parent as $key => $parent)
                                            <div class="col-12 col-md-4 role_access">
                                                <label for="{{ $parent->id }}" >
                                                    <input id="{{ $parent->id }}" type="checkbox" class="parent_checkbox--all">
                                                    {{ $parent->name }}
                                                </label>
                                                <div class="row ml-2">
                                                    {{-- Child Permission --}}
                                                        @foreach($parent->permission_child as $key => $child)
                                                            <div class="col-12">
                                                                <label for="{{ $child->id }}">
                                                                    <input  class="child_checkbox"
                                                                            name="permission_id[]" 
                                                                            value="{{ $child->id }}" 
                                                                            id="{{ $child->id }}" 
                                                                            type="checkbox" />
                                                                    {{ $child->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    {{-- Child Permission --}}
                                                </div>
                                                <div class="w-100 bg-primary border border-primary my-2"></div>
                                            </div>
                                        @endforeach
                                    {{-- Parent permission --}}
                                </div>
                                   
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/admins/custom/checkbox_custom.js') }}"></script>
@endsection
