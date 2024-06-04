<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Village</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        /* Make it rounded */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #007bff;
        /* Change title color */
        margin-bottom: 20px;
        text-align: center;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .form-control {
        border-radius: 12px;
        /* Make input fields rounded */
    }

    .form-select {
        border-radius: 12px;
        /* Make select field rounded */
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Village</h2>

        <form action="{{ url('/api/desa/'.$village->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="code" class="form-label">Code:</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                    value="{{ old('code', $village->code) }}" required>
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="district_id" class="form-label">District:</label>
                <select class="form-select @error('district_id') is-invalid @enderror" id="district_id"
                    name="district_id" required>
                    @foreach($districts as $district)
                    <option value="{{ $district->id }}"
                        {{ old('district_id', $village->district_id) == $district->id ? 'selected' : '' }}>
                        {{ $district->name }}</option>
                    @endforeach
                </select>
                @error('district_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $village->name) }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="meta" class="form-label">Meta:</label>
                <input type="text" class="form-control @error('meta') is-invalid @enderror" id="meta" name="meta"
                    value="{{ old('meta', $village->meta) }}">
                @error('meta')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>