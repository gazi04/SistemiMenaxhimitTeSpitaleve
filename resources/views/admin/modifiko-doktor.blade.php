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
                    <h4 class="page-title">Modifiko Doktorin/esh</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('edit-doctor') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Doktorit</label>
                                    <input class="form-control" name="id" type="hidden" value="{{ $id }}" readonly="" />
                                    <input class="form-control" type="text" value="{{ $id_number }}" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" name="numri_personal" type="text" placeholder="Shkruani numrin personal" value="{{ $personal_id }}" />
                                    @error('numri_personal') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri Doktorit</label>
                                    <input class="form-control" name="emri" type="text" value="{{ $doctorName }}" />
                                    @error('emri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri Doktorit</label>
                                    <input class="form-control" name="mbiemri" type="text" placeholder="Shkruani numrin personal" value="{{ $doctorLastName }}" />
                                    @error('mbiemri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Shkruani email-in" value="{{ $doctorEmail }}" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" name="numri_kontaktues" type="text" placeholder="Shkruani numrin" value="{{ $phoneNumber }}" />
                                            @error('numri_kontaktues') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Departamenti</label>
                                            <select class="form-control select" name="departamenti">
                                                <option>Zgjidhni Departamentin</option>
                                                @foreach ($departaments as $departament)
                                                    <option value="{{ $departament['id'] }}" {{ $departament_id == $departament['id']? 'selected' : '' }}>{{ $departament['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">
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
