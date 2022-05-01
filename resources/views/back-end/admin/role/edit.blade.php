@extends('back-end.master')

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

<div class="content-wrapper">
    @include('back-end.components.content-header', ['name' => 'Role', 'key' => 'Edit','route_redirect'=> route('role.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('back-end.components.alert-session' , ['path_home' => route('role.index')])
                    <form action="{{ route('role.update', $role->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Role name</label>
                            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
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
                                            <label for="{{ $parent->id }}">
                                                <input id="{{ $parent->id }}" type="checkbox" class="parent_checkbox--all">
                                                {{ $parent->name }}
                                            </label>
                                            <div class="row ml-2">
                                                @foreach($parent->permission_child as $key => $child)
                                                    <div class="col-12">
                                                        <label for="{{ $child->id }}">
                                                            <input  class="child_checkbox"
                                                                    name="permission_id[]" 
                                                                    value="{{ $child->id }}" 
                                                                    id="{{ $child->id }}" 
                                                                    type="checkbox" 
                                                                    {{ $permission_checked->contains('id',$child->id) ? 'checked' : '' }} 
                                                                    />
                                                            {{ $child->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="w-100 bg-primary border border-primary my-2"></div>
                                        </div>
                                    @endforeach
                                    
                                    {{-- Child Permission --}}
                                    {{-- Parent permission --}}
                                    {{-- Child Permission --}}
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
