<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        <h1>Përshëndetje {{ $patientName }} {{ $patienLastname }},</h1>
        <p>Rezultatet e testit tuaj <b>{{ $testType }}</b>  janë përfunduar, ju tani keni akses nga profili juaj në sistemin tonë për menaxhimin e spitalit.</p>
        <p><strong>Rezultatet:</strong><br> {!! nl2br(e($results)) !!}</p>
        <br>
        <p class="footer">Ju lutemi të mos iu përgjigjeni këtij emaili, sepse ky është një email i automatizuar.</p>
    </div>
</body>
</html>
