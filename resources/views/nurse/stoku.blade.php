@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('nurse.includes.header')
    @include('nurse.includes.sidebar')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Medikamentet</h4>
                </div>
            </div>

            <!-- Low Stock Alert -->
            @if($lowStockMedications->isNotEmpty())
                <div class="alert alert-warning">
                    <strong>Vëmendje!</strong> Këto medikamente janë me sasi të ulët. Ju lutemi porositni menjëherë!
                </div>
            @endif

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
                                    <th>Sasia ne Stok</th>
                                    <th class="text-right">Veprimi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medications as $medication)
                                    <tr>
                                        <td>{{ $medication->name }}</td>
                                        <td>{{ $medication->type }}</td>
                                        <td>{{ $medication->dose }}</td>
                                        <td>{{ $medication->description }}</td>
                                        <td>
                                            @if($medication->stock < 10)
                                                <span class="badge badge-danger">Sasia e Ulët ({{ $medication->stock }})</span>
                                            @else
                                                <span class="badge badge-success">Në Stok ({{ $medication->stock }})</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if($medication->stock < 10)
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#orderModal{{ $medication->id }}"
                                                    onclick="setMedName('{{ $medication->name }}', '{{ $medication->id }}')">Porosit</button>
                                            @else
                                                <button class="btn btn-primary">Sasia e mjaftueshme</button>
                                            @endif
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

<!-- Order Modal -->
@foreach($medications as $medication)
    <div class="modal fade" id="orderModal{{ $medication->id }}" tabindex="-1" role="dialog"
        aria-labelledby="orderModalLabel{{ $medication->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel{{ $medication->id }}">Porositni Medikamentin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ju po porositni <strong id="medName{{ $medication->id }}"></strong></p>
                    <form action="{{ route('order-medication') }}" method="POST">
                        @csrf
                        <input type="hidden" name="medication_id" value="{{ $medication->id }}">
                        <div class="form-group">
                            <label for="quantity">Sa njësi dëshironi të porositni?</label>
                            <input type="number" class="form-control" name="quantity" min="1" value="1" />
                        </div>
                        <div id="orderMessage{{ $medication->id }}" class="alert alert-success" style="display: none">
                            <strong>Porosia është vendosur me sukses!</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
                            <button type="submit" class="btn btn-primary">Vendos Porosinë</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function setMedName(medName, medId) {
        document.getElementById("medName" + medId).innerText = medName;
        document.getElementById("orderMessage" + medId).style.display = "none";
    }
</script>

@endsection
