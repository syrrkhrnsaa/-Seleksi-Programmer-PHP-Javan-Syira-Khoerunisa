<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Village</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .error-message {
        color: #d9534f;
        margin-bottom: 15px;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Add Village</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ url('/api/desa') }}" method="POST">
            @csrf
            <label for="code">Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
            @if ($errors->has('code'))
            <div class="error-message">
                {{ $errors->first('code') }}
            </div>
            @endif

            <label for="district_id">District:</label>
            <select id="district_id" name="district_id" required>
                @foreach($districts as $district)
                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                    {{ $district->name }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('district_id'))
            <div class="error-message">
                {{ $errors->first('district_id') }}
            </div>
            @endif

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
            <div class="error-message">
                {{ $errors->first('name') }}
            </div>
            @endif

            <label for="meta">Meta:</label>
            <input type="text" id="meta" name="meta" value="{{ old('meta') }}">
            @if ($errors->has('meta'))
            <div class="error-message">
                {{ $errors->first('meta') }}
            </div>
            @endif

            <button type="submit" class="btn">Add</button>
        </form>
    </div>

</body>

</html>