@extends('layout')

@section('content')
    <h1>Menaxho Pacientet</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Email Verified</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->first_name }} {{ $patient->last_name}}</td>
                    <td>{{ $patient->gender ? "Male" : "Female" }}</td>
                    <td>{{ $patient->phone_number }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->email_verified_at ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="container mt-5">
        <h1 class="text-center">Kerko Perdoruesit</h1>
        <form method="GET" action="{{ route('search-patient') }}" class="mb-4">
            <div class="input-group">
                <input type="text" id="search-input" name="query" class="form-control" placeholder="Kerko sipas emrit ose email-it" autocomplete="off">
            </div>
        </form>

        <table class="table table-striped" id="results-table" style="display: none;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Data Regjistrimit</th>
                </tr>
            </thead>
            <tbody id="results-body">
                <!-- Results will be inserted here -->
            </tbody>
        </table>

        <p class="text-danger" id="no-results" style="display: none;">Nuk u gjet asnje perdorues qe pershtatet me kerkimin tuaj.</p>
    </div>

    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                let query = $(this).val();

                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('search-patient') }}",
                        type: "GET",
                        data: { query: query },
                        success: function(data) {
                            let resultsBody = $('#results-body');
                            let resultsTable = $('#results-table');
                            let noResults = $('#no-results');

                            resultsBody.empty(); // Clear previous results
                            console.log(data);
                            if (data.length > 0) {
                                resultsTable.show();
                                noResults.hide();

                                data.forEach(function(result, index) {
                                    resultsBody.append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${result.emri_umdl}</td>
                                            <td>${result.email_umdl}</td>
                                            <td>${result.DataRegjistrimit}</td>
                                        </tr>
                                    `);
                                });
                            } else {
                                resultsTable.hide();
                                noResults.show();
                            }
                        }
                    });
                } else {
                    $('#results-table').hide();
                    $('#no-results').hide();
                }
            });
        });
    </script>
@endsection
