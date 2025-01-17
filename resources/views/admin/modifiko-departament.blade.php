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
                    <h4 class="page-title">Modifiko te dhenat e Departmentit</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="departament-form" action="{{ route('update-departament') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="form-id" value="{{ $departament->id }}">
                        <div class="form-group">
                            <label>Emri i Departamentit:</label>
                            <input class="form-control" name="emri_departamentit" type="text" value="{{ $departament->name }}" />
                            @error('emri_departamentit') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Pershkrimi:</label>
                            <textarea cols="30" rows="4" class="form-control" name="pershkrimi_departamentit">{{ $departament->description }}</textarea>
                            @error('pershkrimi_departamentit') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">
                                Ruaj ndryshimet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
