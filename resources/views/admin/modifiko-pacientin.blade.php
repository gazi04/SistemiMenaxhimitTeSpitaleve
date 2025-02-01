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
                    <h4 class="page-title">Modifiko Pacientin</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('modify-patient') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $patient->id }}" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Pacientit <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $patient->id_number }}" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" name="numri_personal" type="text" placeholder="Shkruani numrin personal" value="{{ $patient->personal_id }}" />
                                    @error('numri_personal') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri Pacientit</label>
                                    <input class="form-control" name="emri" type="text" value="{{ $patient->first_name }}" />
                                    @error('emri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri Pacientit</label>
                                    <input class="form-control" name="mbiemri" type="text" placeholder="Shkruani numrin personal" value="{{ $patient->last_name }}" />
                                    @error('mbiemri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Shkruani email-in" value="{{ $patient->email }}" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" name="numri_kontaktues" type="text" placeholder="Shkruani numrin" value="{{ $patient->phone_number }}" />
                                            @error('numri_kontaktues') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Gjinia</label>
                                            <select class="form-control select" name="gjinia">
                                                <option value="">Zgjidhni Gjinin</option>
                                                <option value="0" {{ $patient->gender == 0 ? 'selected' : '' }}>Femer</option>
                                                <option value="1" {{ $patient->gender == 1 ? 'selected' : '' }}>Mashkull</option>
                                            </select>
                                            @error('gjinia') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">
                                Modifiko të dhënat e pacientit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
