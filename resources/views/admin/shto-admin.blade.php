@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Shto Adminin</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('create-admin') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label>Numri Personal</label>
                                        <input class="form-control" type="text" name="numri_personal" value="{{ old('numri_personal') }}" placeholder="Shkruani numrin personal" required><br>
                                        @error('numri_personal')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Emri</label>
                                        <input class="form-control" type="text" name="emri" value="{{ old('emri') }}" placeholder="Shkruani emrin" required><br>
                                        @error('emri')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Shkruani email-in" required><br>
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn" type="submit">
                                        Ruaj të dhënat
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
