@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Shto Doktor</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('create-doctor') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" type="text" name="numri_personal" placeholder="Shkruani numrin personal" />
                                    @error('numri_personal') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="form-group">
                                    <label>Emri <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="emri" placeholder="Shkruani emrin" />
                                    @error('emri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="from-group">
                                    <label>Mbiemri</label>
                                    <input class="form-control" type="text" name="mbiemri" placeholder="Shkruani mbiemrin" />
                                    @error('mbiemri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Shkruani email-in" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" type="text" name="numri_kontaktues" placeholder="Shkruani numrin" />
                                            @error('numri_kontaktues') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="from-group">
                                            <label>Departamenti</label>
                                            <select class="form-control select" name="departamenti">
                                                <option value="">Zgjidhni Departamentin</option>
                                                @foreach ($departaments as $departament)
                                                    <option value="{{ $departament['id'] }}">{{ $departament['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('departamenti') <span class="text-danger">{{ $message }}</span> @enderror
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
