@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('technologist.includes.header')
    @include('technologist.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Analizat</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('technologist.tests.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fa fa-plus"></i> Shto Analizë
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pacienti</th>
                                    <th>Tipi i Analizës</th>
                                    <th>Data e Analizave</th>
                                    <th>Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tests as $test)
                                <tr>
                                    <td>{{ $test->id }}</td>
                                    <td>{{ $test->patient->first_name }} {{ $test->patient->last_name }}</td>
                                    <td>{{ $test->test_type }}</td>
                                    <td>{{ $test->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('technologist.tests.show', $test->id) }}" class="btn btn-info btn-sm">Shiko</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
