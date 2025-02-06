<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikimi i Emailit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Verifikimi i Emailit</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Faleminderit që u regjistruat! Përpara se të filloni, ju lutemi verifikoni adresën tuaj të emailit duke klikuar në linkun që sapo ju dërguam.</p>

                        <p class="text-center">Nëse nuk e keni marrë emailin, klikoni butonin më poshtë për të kërkuar një tjetër.</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center" role="alert">
                                Një link i ri verifikimi është dërguar në adresën tuaj të emailit.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">Ridërgo Emailin e Verifikimit</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('logout') }}" type="submit" class="btn btn-link">Dilni</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
