@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('technologist.includes.header')
    @include('technologist.includes.sidebar')
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
                <div class="col-md-8">
                    <div class="analysis-print">
                        <div class="hospital-header text-center">
                            <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Hospital Logo"
                                style="width: 100px; margin-bottom: 10px" />
                            <h2>Sistemi per menaxhimin e Spitaleve</h2>
                            <p><strong>Address:</strong> Rruga e Spitalit, Gjilan, Kosove</p>
                            <p><strong>Tel:</strong> +355 42 345 678 | <strong>Email:</strong> info@hospital.com</p>
                            <hr />
                        </div>

                        <div class="analysis-details">
                            <h3 class="text-center">Detajet e Analizës</h3>
                            <hr />
                            <p><strong>Emri i Pacientit:</strong> {{ $test->patient->first_name }}
                                {{ $test->patient->last_name }}
                            </p>
                            <p><strong>Data:</strong> {{ $test->created_at->format('d-m-Y') }}</p>
                            <p><strong>Tipi i Analizës:</strong> {{ $test->test_type }}</p>
                            <p><strong>Rezultatet:</strong><br> {!! nl2br(e($test->results)) !!}</p>
                            <hr />
                        </div>

                        <div class="hospital-footer text-center" style="margin-top: 20px">
                            <p><strong>Faleminderit qe keni Zgjedhur Spitalin tone!</strong></p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('inform-patient') }}">
                        @csrf
                        <input type="hidden" name="test_id" value="{{ $test->id }}" />
                        <button type="submit" class="btn btn-primary mt-2 mt-sm-3 mt-md-4">Dërgo rezultatet e testit</button>
                    </form>
                    <a href="{{ route('technologist-dashboard') }}" class="btn btn-secondary mt-2 mt-sm-3 mt-md-4">Kthehu te Lista</a>
                </div>

                <aside class="col-md-4 mt-2 mt-sm-3 mt-md-4">
                    <div class="widget search-widget">
                        <h5>Kërko Analiza</h5>
                        <form method="POST" action="{{ route('search-tests' )}}" class="search-form">
                            @csrf
                            <input type="hidden" name="patient_id" value={{ $test->patient_id }} />
                            <div class="input-group">
                                <input type="text" placeholder="Kërko sipas emrit të pacientit..." name="searchingTerm"
                                    class="form-control" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="widget post-widget">
                        <h5>Analizat e Pacientëve të Tjerë</h5>
                        <ul class="latest-posts">
                            @foreach($allTests as $test)
                                <li>
                                    <div class="post-info">
                                        <h6>
                                            <a href="{{ route('technologist.tests.show', $test->id) }}">
                                                {{ $test->patient->first_name }}
                                                {{ $test->patient->last_name }} - {{ $test->test_type }}
                                            </a>
                                        </h6>
                                        <p>
                                            <i aria-hidden="true" class="fa fa-calendar"></i>
                                            {{ $test->created_at->format('d-m-Y') }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
