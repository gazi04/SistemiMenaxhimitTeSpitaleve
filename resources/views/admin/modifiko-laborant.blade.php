@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Modifiko Laborantin/en</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('edit-technologist') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="form-id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Laborantin/en
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
                                    <input class="form-control" name="emri" type="text" placeholder="Shkruani emrin" value="{{ $technologistName }}" />
                                    @error('emri') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri</label>
                                    <input class="form-control" name="mbiemri" type="text" placeholder="Shkruani mbiemrin" value="{{ $technologistLastName }}" />
                                    @error('mbiemri') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="email" placeholder="Shkruani email-in" value="{{ $technologistEmail }}" />
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
    </div>
</div>
@endsection
