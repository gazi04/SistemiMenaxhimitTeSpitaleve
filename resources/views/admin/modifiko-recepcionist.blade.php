@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            @if (session('error'))
                <div id="notify" class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Modifiko Recepcionistin/en</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('edit-receptionist') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="form-id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Recepcionistin/en
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $id_number }}" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" name="numri_personal" type="text" placeholder="Shkruani numrin personal" value="{{ $personal_id }}" />
                                    @error('numri_personal') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri</label>
                                    <input class="form-control" name="emri" type="text" placeholder="Shkruani emrin" value="{{ $receptionistName }}" />
                                    @error('emri') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri</label>
                                    <input class="form-control" name="mbiemri" type="text" placeholder="Shkruani mbiemrin" value="{{ $receptionistLastName }}" />
                                    @error('mbiemri') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="email" placeholder="Shkruani email-in" value="{{ $receptionistEmail }}" />
                                    @error('email') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" name="numri_kontaktues" type="text" placeholder="Shkruani numrin" value="{{ $phoneNumber }}" />
                                            @error('numri_kontaktues') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">
                                Ruaj të dhënat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
