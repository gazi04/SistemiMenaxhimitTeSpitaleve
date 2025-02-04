@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('nurse.includes.header')
    @include('nurse.includes.sidebar')

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

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="page-title">Medikamentet</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('medications.create') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i> Shto Medikament
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="GET" action="{{ route('search-medication') }}" class="mb-4">
                        <div class="form-row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <input type="text" name="searchingTerm" class="form-control"
                                    placeholder="Kërko sipas emrit ose llojit" autocomplete="off" />
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                <select name="medicationType" class="form-control">
                                    <option value="">Zgjidh llojin e medikamentit</option>
                                    <option value="Injeksion">Injeksion</option>
                                    <option value="Infuzion">Infuzion</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 mb-2">
                                <button class="btn btn-primary btn-block" type="submit">Kërko</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th style="min-width: 200px">Emri</th>
                                    <th>Lloji</th>
                                    <th>Doza</th>
                                    <th>Pershkrimi</th>
                                    <th>Sasia në Stok</th>
                                    <th class="text-right">Veprimi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medications as $medication)
                                    <tr>
                                        <td>{{ $medication->name }}</td>
                                        <td>{{ $medication->type }}</td>
                                        <td>{{ $medication->dose }}</td>
                                        <td>{{ $medication->description }}</td>
                                        <td>{{ $medication->stock }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('medications.use') }}" method="POST"
                                                class="d-flex align-items-center">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $medication->id }}">
                                                <input type="number" name="stock" class="form-control form-control-sm mr-2"
                                                    style="width: 70px;" min="1" max="{{ $medication->stock }}"
                                                    placeholder="Nr." required />
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i> Përdor
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Asnjë medikament nuk u gjet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        {{ $medications->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
