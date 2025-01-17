@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('doctor.includes.header')
        @include('doctor.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Modifiko Terminin</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Kerko termine te lira</h4>
                        <form method="POST" action="{{ route('get-free-appointments-for-doctor') }}">
                            @csrf
                            <div class="form-group">
                                <label for="start_date">Data Fillimit</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                                @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="end_date">Data Mbarimit</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                                @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="appointment_id" value="{{ $appointment_id }}" />
                                <button type="submit" class="btn btn-primary">Kerko Termin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
