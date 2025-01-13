<!DOCTYPE html>
<html>
<head>
    <title>Njoftimi për Ricaktimin e Takimit</title>
</head>
<body>
    <h1>Pershendetje {{ $patient_name }},</h1>
    <p>Ky email është për t'ju informuar për një ndryshim në takimin tuaj të ardhshëm.</p>
    <p>Takimi juaj është riplanifikuar me {{ \Carbon\Carbon::parse($new_start_date)->format('d-m-Y H:i') }}</p>
    <p>Ju lutemi vini re orarin e përditësuar të takimit, për më shumë informacion mund të kyqeni në sistem për të pasur një pasqyrë më të mirë të takimeve.</p>
    <p><b>Me respekt,</b></p>
    <p>{{ $doctor_name }}.</p>
    <p>Ju lutemi mos iu përgjigjni këtij emaili sepse ky është një email i automatizuar.</p>
</body>
</html>

