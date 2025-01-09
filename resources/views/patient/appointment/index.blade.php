@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('patient.includes.header')
        @include('patient.includes.sidebar')
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Pershendetje {{ $patient->first_name }}, ketu mund te caktosh termini</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('get-free-appointments') }}">
                            <div class="form-group">
                                <label for="start_date">Data Fillimit</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                                @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="end_date">Data Mbarimit</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                                @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="department">Departamenti</label>
                                <select id="department" name="department" class="form-control">
                                    <option value="">Zgjidh departamentin</option>
                                    @foreach ($departaments as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                    @endforeach
                                </select>
                                @error('department')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="doctor">Doktori</label>
                                <select id="doctor" name="doctorId" class="form-control" required>
                                    <option value="">Zgjidh doktorin</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->first_name }}</option>
                                    @endforeach
                                </select>
                                @error('doctorId')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kerko Termin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const departmentSelect = document.getElementById('department');
            const doctorSelect = document.getElementById('doctor');

            // When department is selected, update doctors list
            departmentSelect.addEventListener('change', () => {
                const departmentId = departmentSelect.value;

                if (departmentId) {
                    fetch(`/get/doctors/${departmentId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Clear current doctor options
                            doctorSelect.innerHTML = '<option value="">Zgjidh doktorin</option>';

                            // Populate doctor options for the selected department
                            data.doctors.forEach(doctor => {
                                const option = document.createElement('option');
                                option.value = doctor.id;
                                option.textContent = doctor.first_name;
                                doctorSelect.appendChild(option);
                            });
                        });
                } else {
                    // Reset doctor options if no department is selected
                    doctorSelect.innerHTML = '<option value="">Zgjidh doktorin</option>';
                }
            });

            // When a doctor is selected, update the department field
            doctorSelect.addEventListener('change', () => {
                const doctorId = doctorSelect.value;

                if (doctorId) {
                    fetch(`/get/department/${doctorId}`)
                        .then(response => response.json())
                        .then(data => {
                            departmentSelect.value = data.department_id || '';
                        });
                }
            });
        });
    </script>
@endsection
