<!DOCTYPE html>
<html>
    <head>
        <title>Njoftimi për anulim të takimit</title>
        <style>
        body {
            font-family: Rubik, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            border-left: 7px solid blue;
        }
        h1 {
            font-size: 24px;
            color: #444;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        p b {
            color: #555;
        }
        .footer {
            font-size: 14px;
            color: #999;
            margin-top: 20px;
        }
        </style>
    </head>
    <body>
        <div class="email-container">
            <h1>Përshendetje {{ $patient_name }},</h1>
            <p>Ky email është për t'ju informuar për një anulim të takimit tuaj më {{ \Carbon\Carbon::parse($appointment_date)->format('d-m-Y H:i') }}.</p>
            <p><b>Me respekt,</b></p>
            <p>{{ $doctor_name }}.</p>
            <p class="footer">Ju lutemi të mos iu përgjigjeni këtij emaili, sepse ky është një email i automatizuar.</p>
        </div>
    </body>
</html>
