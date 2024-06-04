<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Index</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
    }

    .add-btn {
        margin: 20px auto;
        display: block;
        width: 150px;
        margin-bottom: 20px;
        border-radius: 20px;
    }

    .table-container {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table th,
    .table td {
        text-align: center;
        border: 1px solid #dee2e6;
        padding: 15px;
        vertical-align: middle;
    }

    .table th {
        text-align: center;
        font-weight: bold;
        background-color: #007bff;
        color: #fff;
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }

    .btn-action {
        border-radius: 20px;
        margin: 2px;
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }

    .btn-info {
        border-radius: 20px;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-primary {
        border-radius: 20px;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        border-radius: 20px;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-primary p-5 mt-1 mb-0 rounded title">Data Village</h1>
        <a href="{{ route('villages.create')}}" class="btn btn-primary add-btn">Add Village</a>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>District ID</th>
                        <th>Name</th>
                        <th>Meta</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($villages as $village)
                    <tr>
                        <td>{{ $village->code }}</td>
                        <td>{{ $village->district_id }}</td>
                        <td>{{ $village->name }}</td>
                        <td>{{ $village->meta }}</td>
                        <td>
                            <a href="{{ route('villages.show', ['id' => $village->id]) }}"
                                class="btn btn-info btn-action"><i class="fas fa-eye"></i> Show</a>
                            <a href="{{ route('villages.edit', ['id' => $village->id]) }}"
                                class="btn btn-warning btn-action"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ url('/api/desa/'.$village->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action"
                                    onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>