@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('nurse.includes.header')
    @include('nurse.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Shto Medikament</h4>
                </div>
            </div>
            <form action="{{ route('medications.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Emri</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        placeholder="Shkruaj emrin e Medikamentit">
                </div>
                <div class="form-group">
                    <label for="type">Lloji</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Injeksion">Injeksion</option>
                        <option value="Infuzion">Infuzion</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dose">Doza</label>
                    <input type="text" class="form-control" id="dose" name="dose" required placeholder="Shkruaj dozen">
                </div>
                <div class="form-group">
                    <label for="description">Pershkrimi</label>
                    <textarea class="form-control" id="description" name="description"
                        placeholder="Pershkruaj Medikamentin"></textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Sasia ne Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" required
                        placeholder="Shkruani sasinë e stokut">
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Ruaj</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
