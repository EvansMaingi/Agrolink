<!DOCTYPE html>
<html>
<head>
    <title>AgroLink Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8e0;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #2e7d32;
        }
        .navbar-brand, .nav-link, .text-white {
            color: white !important;
        }
        .table thead {
            background-color: #e0f2f1;
        }
        .btn-success {
            background-color: #4caf50;
            border-color: #4caf50;
        }
        .btn-danger {
            background-color: #e53935;
            border-color: #e53935;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">AgroLink Admin</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5">

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h6>Total Users</h6>
            <h4>{{ $totalUsers }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h6>Total Farmers</h6>
            <h4>{{ $totalFarmers }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h6>Total Buyers</h6>
            <h4>{{ $totalBuyers }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h6>Total Products</h6>
            <h4>{{ $totalProducts }}</h4>
        </div>
    </div>
</div>



    <h2 class="mb-4">Add New User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4 mb-5 bg-white rounded">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>
                <div class="col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required />
                </div>
            </div>

            <div class="mb-3">
                <label>User Type</label>
                <select name="usertype" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="farmer">Farmer</option>
                    <option value="user">User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Add User</button>
        </form>
    </div>

    <h2 class="mb-3">All Users</h2>

    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->usertype) }}</td>
                        <td>
                            <a href="{{ route('admin.delete', $user->id) }}"
                               onclick="return confirm('Are you sure you want to delete this user?')"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($users->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">No users found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
