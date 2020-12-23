@extends('layouts.base')

@section('req', " | " . $filereq)
@inject('controller', 'App\Http\Controllers\FileController')

@section('content')
    @include('includes.fetchheader')
    @include('includes.searchbar')

    <table class="table table-striped table-inverse table-dark" id="table-results">
        <thead class="thead-inverse">
        <tr>
            <th class="sortable">Filename</th>
            <th class="sortable">Date Added</th>
            <th class="sortable">Size</th>
        </tr>
        </thead>
        <tbody>
        @if(count(explode('/', url()->current())) > 4)
            @include('includes.updir')
        @endif
        @include('includes.dirs')
        @include('includes.files')
        </tbody>
    </table>

    @include('includes.wget')

    <div class="page-footer py-3">
        <p>{{json_decode(file_get_contents(env('API_URL') . "message" ))->message}}</p>
    </div>


@endsection
