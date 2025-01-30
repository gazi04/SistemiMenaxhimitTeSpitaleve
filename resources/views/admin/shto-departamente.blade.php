@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Modifiko te dhenat e Departmentit</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form id="departament-form" action="{{ route('save-departament') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Emri i Departamentit:</label>
                                <input class="form-control" type="text" id="name" name="name"/>
                            </div>
                            <div class="form-group">
                                <label>Pershkrimi:</label>
                                <textarea cols="30" rows="7" class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">
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
