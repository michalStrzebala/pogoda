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

            <div class="col-12 pb-3 pt-3">
                <a class="btn btn-secondary" href="{{ route('miasta.index') }}">Lista miast</a>
            </div>

            <div class="col-12">
                <form method="post" action="{{ route('miasta.update', $city->id ) }}">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="city_name">Nazwa miasta:</label>
                        <input type="text" class="form-control" name="city_name" value="" placeholder="{{ $city->name }}"/>
                    </div>
                    <div class="form-group">
                        <label for="city_name">Kod pocztowy:</label>
                        <input type="text" class="form-control" name="city_zip" value="" placeholder="{{ $city->zip }}"/>
                    </div>
                    <div class="form-group">
                        <label for="city_name">Kod państwa:</label>
                        <input type="text" class="form-control" name="city_country" value="" placeholder="{{ $city->country_code }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </form>
            </div>
        </div>
    </div>

@endsection