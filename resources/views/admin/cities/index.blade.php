@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div><br />
            @endif
        </div>
    </div>
    <div class="row pb-3 pt-3 justify-content-between">
        <div class="col-6">
            <a class="btn btn-primary" href="{{ route('miasta.create') }}">Dodaj miasto</a>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('home') }}">Zobacz stronę</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Miasto</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td class="table__btn"><a href="{{ route('miasta.edit', [ 'miastum' => $city->id ]) }}" class="btn btn-primary">Edit</a></td>
                            <td class="table__btn">
                            <form action="{{ route( 'miasta.destroy', $city->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<div>
@endsection