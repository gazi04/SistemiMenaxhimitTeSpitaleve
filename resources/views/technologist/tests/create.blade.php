@extends('layout')

@section('content')
<div class="main-wrapper mt-4">
    @include('technologist.includes.header')
    @include('technologist.includes.sidebar')
    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Shto një Analizë</h2>
                    <form action="{{ route('technologist.tests.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="patient_id">Pacienti</label>
                            <select name="patient_id" class="form-control" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="technologist_id"
                            value="{{ Auth::guard('technologist')->user()->id }}">
                        <div class="form-group">
                            <label for="test_type">Tipi i Analizës</label>
                            <input type="text" name="test_type" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="results">Rezultatet</label>
                            <textarea name="results" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Shto Analizën</button>
                        <a href="{{ route('technologist-dashboard') }}" class="btn btn-secondary">Kthehu</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
