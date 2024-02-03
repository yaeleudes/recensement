<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succes</title>
</head>
<body>
    <h1>Succès!</h1>
    @if (session('success'))
        <div class="alert alert-success mx-auto">
            {{session('success')}}
        </div>
    @endif
</body>
</html>
