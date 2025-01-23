<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Welcome to the Employee Dashboard</h1>
        <!-- Rest of your dashboard content -->
    </div>
</body>
</html>
