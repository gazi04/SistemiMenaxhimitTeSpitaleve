<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Required</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Email Verification Required</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Thank you for registering! Before getting started, please verify your email address by clicking the link we just sent to your email.</p>

                        <p class="text-center">If you did not receive the email, click the button below to request another one.</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center" role="alert">
                                A new verification link has been sent to your email address.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <form method="GET" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link">Log Out</button>
                            </form>
                            <a href="{{ route('logout') }}" type="submit" class="btn btn-link">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
