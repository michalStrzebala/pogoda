@extends('layouts.dashboard')

@section('content')
    
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <form method="post" action="{{ route('miasta.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="city_name">Nazwa miasta:</label>
                        <input type="text" class="form-control" name="city_name" value="" />
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="city_zip">Kod pocztowy:</label>
                        <input type="text" class="form-control" name="city_zip" value="" />
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="city_country">Kod państwa:</label>
                        <input type="text" class="form-control" name="city_country" value="" />
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
            </div>
        </div>
    </div>

@endsection