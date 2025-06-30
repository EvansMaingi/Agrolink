<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Starred Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5fff5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 40px;
    }

    .container {
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 100, 0, 0.1);
    }

    h2 {
      color: #2d6a4f;
      margin-bottom: 25px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      background-color: #d8f3dc;
      color: #1b4332;
      padding: 12px;
      text-align: center;
    }

    td {
      padding: 12px;
      text-align: center;
      vertical-align: middle;
    }

    img {
      width: 100px;
      height: 100px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid #c8e6c9;
    }

    tr:nth-child(even) {
      background-color: #f0fdf4;
    }

    tr:hover {
      background-color: #e6ffe6;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🌾 Starred Agricultural Products</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product Title</th>
          <th>Image</th>
          <th>Title Deed</th>
          <th>Price</th>
          <th>Contacts</th>
          <th>email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($star as $item)
        <tr>
          <td>{{ $item->product->title }}</td>
          <td>
            <img src="{{ asset('images/' . $item->product->image) }}" alt="Product Image">
          </td>
          <td>
            <img src="{{ asset('title_deeds/' . $item->product->title_deed) }}" alt="Title Deed">
          </td>
          <td>Ksh. {{ $item->product->price }}</td>
          <td>{{ $item->product->contacts }}</td>
          <td>{{ $item->product->email }}</td>

          <td>
            <form action="{{ route('star.destroy', $item->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Unstar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
