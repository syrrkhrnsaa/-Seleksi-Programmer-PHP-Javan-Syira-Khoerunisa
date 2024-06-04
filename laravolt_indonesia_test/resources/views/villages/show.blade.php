<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        /* Make it rounded */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
        display: block;
        width: 150px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }

    .details {
        margin-bottom: 20px;
    }

    .details h3 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 24px;
        color: #007bff;
        /* Title color */
    }

    .details p {
        font-size: 18px;
        line-height: 3;
        margin-bottom: 10px;
        /* Add some space between paragraphs */
    }

    .details label {
        font-weight: bold;
        color: #555;
        /* Label color */
    }

    /* Add horizontal line */
    .details p {
        position: relative;
    }

    .details p:not(:last-child)::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #ddd;
        /* Line color */
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Village Details</h1>
        <div class="details">
            <h3>Village Information</h3>
            <p><label>Code:</label> {{ $village->code }}</p>
            <p><label>District ID:</label> {{ $village->district_id }}</p>
            <p><label>Name:</label> {{ $village->name }}</p>
            <p><label>Meta:</label> {{ $village->meta }}</p>
        </div>
        <a href="{{ url('/desa') }}" class="btn btn-primary back-btn">Back to Index</a>
    </div>
</body>

<html>