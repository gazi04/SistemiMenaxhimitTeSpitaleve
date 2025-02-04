@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('receptionist.includes.header')
        @include('receptionist.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                @if (session('message'))
                    <div id="notify" class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @elseif (session('error'))
                    <div id="notify" class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('confirm-appointment-status-change') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label>Numri Personal i Pacientit</label>
                                        <input type='hidden' name='appointment_id' value='{{ $appointment->id }}' />
                                        <input class="form-control" type="text" name="numri_personal" value="{{ old('numri_personal') }}" placeholder="Shkruani numrin personal të pacientit" required><br>
                                        @error('numri_personal')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">Konfirmo ardhjen e pacientit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
