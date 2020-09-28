@extends('layouts.base')

@section('req', " | " . $filereq)
@inject('controller', 'App\Http\Controllers\FileController')

@section('content')
    @include('includes.fetchheader')
    @include('includes.searchbar')

    <table class="table table-striped table-inverse table-dark" id="table-results">
        <thead class="thead-inverse">
        <tr>
            <th>Filename</th>
            <th>Date Added</th>
            <th>Size</th>
        </tr>
        </thead>
        <tbody>
        @include('includes.updir')
        @include('includes.dirs')
        @include('includes.files')
        </tbody>
    </table>

    @include('includes.wget')
@endsection
