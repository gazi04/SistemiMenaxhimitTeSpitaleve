@extends('layout')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper" style="margin-left: 0px !important;">
        <div class="content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h4 class="page-title text-center">Krijo nje llogari te pacientit</h4>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('create-patient') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Numri Personal</label>
                                        <input class="form-control" type="text" name="numri_personal"
                                            placeholder="Shkruani numrin personal" />
                                        @error('numri_personal') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <div class="form-group">
                                        <label>Emri</label>
                                        <input class="form-control" type="text" name="emri"
                                            placeholder="Shkruani emrin" />
                                        @error('emri') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <div class="form-group">
                                        <label>Mbiemri</label>
                                        <input class="form-control" type="text" name="mbiemri"
                                            placeholder="Shkruani mbiemrin" />
                                        @error('mbiemri') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Shkruani email-in" />
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Numri Kontaktues</label>
                                                <input class="form-control" type="text" name="numri_kontaktues"
                                                    placeholder="Shkruani numrin" />
                                                @error('numri_kontaktues') <span
                                                    class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gjinia</label>
                                                <select class="form-control select" name="gjinia">
                                                    <option value="">Zgjidhni Gjinin</option>
                                                    <option value="0">Femer</option>
                                                    <option value="1">Mashkull</option>
                                                </select>
                                                @error('gjinia') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">
                                    Regjistrohu
                                </button>
                                <br>
                                <a href="{{ route('login') }}">Kthehu prapa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
