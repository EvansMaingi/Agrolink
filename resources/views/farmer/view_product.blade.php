<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Listing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f2f7f1;
      padding: 40px;
    }

    .table-container {
      max-width: 1100px;
      margin: auto;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 100, 0, 0.1);
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 14px 18px;
      border-bottom: 1px solid #cde0c9;
      text-align: left;
      vertical-align: middle;
    }

    th {
      background-color: #d4edda;
      color: #155724;
    }

    tr:hover {
      background-color: #eef7ec;
    }

    tr:last-child td {
      border-bottom: none;
    }

    img {
      width: 100px;
      border-radius: 5px;
      object-fit: cover;
    }

    .pagination-wrapper {
      text-align: center;
      margin-top: 30px;
    }

    .pagination {
      display: inline-flex;
      list-style: none;
      padding: 0;
      border-radius: 5px;
    }

    .pagination li {
      margin: 0 4px;
    }

    .pagination li a,
    .pagination li span {
      display: block;
      padding: 8px 14px;
      background-color: #28a745;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .pagination li.active span,
    .pagination li a:hover {
      background-color: #218838;
    }

    .pagination li.disabled span {
      background-color: #ccc;
      color: #666;
      cursor: not-allowed;
    }

    input[type="search"] {
      width: 50%;
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .logout-button {
      text-align: right;
      margin: 20px;
    }
    
  </style>
</head>
<body>

<div class="logout-button">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <input type="submit" value="Logout">
        </form>
      </div>


<form action="{{ url('product_search') }}" method="get">
  @csrf

  <input type="search" name="search">
  <input type="submit" class="btn btn-secondary" value="Search">
</form>

  <div class="table-container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Title Deed</th>
          <th>Price</th>
          <th>Category</th>
          <th>Location</th>
          <th>Contacts</th>
          <th>Email</th>          
           <th>Edit</th>
          <th>Delete</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($product as $products)
        <tr>
          <td>{{ $products->title }}</td>
          <td>{{ $products->description }}</td>
          <td><img src="{{ asset('images/' . $products->image) }}"></td>
          <td><img src="{{ asset('title_deeds/' . $products->title_deed) }}"></td>
          <td>{{ $products->price }}</td>
          <td>{{ $products->category }}</td>
          <td>{{ $products->location }}</td>
          <td>{{ $products->contacts }}</td>
          <td>{{ $products->email }}</td>

          <td>
           <a class="btn btn-primary" href="{{ url('update_product', $products->id) }}">Edit</a>

          </td>
          <td>
            <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product',$products->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="pagination-wrapper">
      {{ $product->onEachSide(1)->links() }}
    </div>
  </div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  function confirmation(event) {
    event.preventDefault(); // Prevent the default link action

    var urlToRedirect = event.currentTarget.getAttribute("href");

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this item!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        window.location.href = urlToRedirect;
      }
    });
  }
</script>

<a href="{{ url('farmer/dashboard') }}" class="btn btn-outline-success back-button">Back</a>


</body>
</html>
