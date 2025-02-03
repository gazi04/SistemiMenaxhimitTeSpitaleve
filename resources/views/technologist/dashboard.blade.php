@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('technologist.includes.header')
    @include('technologist.includes.sidebar')

    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="page-title">Analizat</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('tests.create') }}" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Shto një Analizë
                    </a>
                </div>
            </div>

        @include('technologist.tests.index')
        </div>
    </div>
</div>
@endsection
