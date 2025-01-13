<!DOCTYPE html>
<html>
<head>
    <title>Njoftimi për Anulimi të Takimit</title>
</head>
<body>
    <h1>Pershendetje {{ $patient_name }},</h1>
    <p>Ky email është për t'ju informuar për një anulim të takimit tuaj më {{ \Carbon\Carbon::parse($appointment_date)->format('d-m-Y H:i') }}.</p>
    <p><b>Me respekt,</b></p>
    <p>{{ $doctor_name }}.</p>
    <p>Ju lutemi mos iu përgjigjni këtij emaili sepse ky është një email i automatizuar.</p>
</body>
</html>

