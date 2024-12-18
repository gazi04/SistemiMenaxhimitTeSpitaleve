@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">modifiko adminin</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    {{--TODO- problem me route error 419 Page expired kur te behet submit forma--}}
                    <form id="departament-form" action="{{ route('edit-admin') }}" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Admin <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $id }}" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" type="text" placeholder="{{ $personal_id }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Shkruani emrin" value="{{ $adminName }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri</label>
                                    <input class="form-control" type="text" placeholder="Shkruani mbiemrin" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" placeholder="Shkruani email-in" value="{{ $adminEmail }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="from-group">
                                    <label>Datëlindja</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="Zgjidhni datën" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="from-group gender-select">
                                    <label class="gen-label">Gjinia:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" />
                                            Mashkull
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" />
                                            Femër
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" type="text" placeholder="Shkruani numrin" />
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
