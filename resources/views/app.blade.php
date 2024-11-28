<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    My Bootstrap Card
                </div>
                <div class="card-body">
                    <button class="btn btn-success">Click Me</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
