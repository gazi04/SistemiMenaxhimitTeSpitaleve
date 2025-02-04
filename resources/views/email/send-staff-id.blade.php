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
        <h1>Pershendetje {{ $name }} {{ $lastname }},</h1>
        <p>Kjo është ID-ja yte për llogarinë tënde në sistemin për menaxhimin e spitalit: <strong>{{ $staffId }}</strong></p>
        <p>Kështu që ruaje atë në një vend të sigurtë.</p>
        <br>
        <p class="footer">Ju lutemi të mos iu përgjigjeni këtij emaili, sepse ky është një email i automatizuar.</p>
    </div>
</body>
</html>
