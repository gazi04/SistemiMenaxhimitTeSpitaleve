@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('patient.includes.header')
        @include('patient.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                @if (session('message'))
                    <div id="notify" class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @elseif (session('error'))
                    <div id="notify" class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Testet e juaja</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($tests->isEmpty())
                            <p>Nuk ka të dhëna shëndetësore për ju në sistem.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Teknologu</th>
                                        <th>Lloji Analizës</th>
                                        <th>Rezultati</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test)
                                        <tr>
                                            <td>{{ $test->technologist->first_name }} {{ $test->technologist->last_name }}</td>
                                            <td>{{ $test->test_type }}</td>
                                            <td>{!! nl2br(e($test->results)) !!}</td>
                                            <td>{{ \Carbon\Carbon::parse($test->created_at)->format('m-d-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
