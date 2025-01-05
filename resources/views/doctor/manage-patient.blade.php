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
@endsection
