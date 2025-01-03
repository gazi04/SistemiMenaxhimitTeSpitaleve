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
                    <h4 class="page-title">Modifiko Adminin</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="departament-form" action="{{ route('edit-admin') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="form-id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Admin <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $id_number }}" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input name="numri_personal" class="form-control" type="text" value="{{ $personal_id }}" />
                                    @error('numri_personal') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri <span class="text-danger">*</span></label>
                                    <input name="emri" class="form-control" type="text" placeholder="Shkruani emrin" value="{{ $adminName }}" />
                                    @error('emri') <div class="alert alert-danger"> {{ $message }} </div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input name="email" class="form-control" type="email" placeholder="Shkruani email-in" value="{{ $adminEmail }}" />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
