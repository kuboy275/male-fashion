@extends('back-end.master')

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Settings ', 'key' => 'List','route_redirect'=> route('setting.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                        <a href="{{ route('setting.create') }}" class="btn btn-info float-right m-2">Create </a>
                    </div> --}}
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($settings as $setting)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $setting->config_key }}</td>
                                    <td>{{ $setting->config_value }}</td>
                                    @can('setting-update', $setting)
                                        <td>
                                            <a href="{{ route('setting.edit', $setting->id)}}"
                                            class="btn btn-default">Edit</a>
                                        </td>
                                    @endcan

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $settings->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

