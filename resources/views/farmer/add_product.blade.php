<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="{{ asset('css/farmer.css') }}">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f4;
    }

    form {
      max-width: 700px;
      margin: 80px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    form div {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #34495e;
    }

    input[type="text"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
    }
  </style>
</head>
<body>

<h1>Add Product</h1>
<div>

  <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
    @csrf 

    <div>
      <label>Product Title</label>
      <input type="text" name="title" required>
    </div>

    <div>
      <label>Description</label>
      <textarea name="description" required></textarea>
    </div>

    <div>
      <label>Product category</label>
      <select  name="category" required>
        <option>Select Option</option>

        @foreach($category as $category)

        <option>{{$category->category_name}}</option>

        @endforeach

      </select>
      
    </div>

    <div>
      <label>Product image</label>
      <input type="file" name="image">
    </div>

    <div>
      <label>Title deed (if land)</label>
      <input type="file" name="title_deed">
    </div>

    <div>
      <label>Contacts</label>
      <input type="text" name="contacts">
    </div>

    <div>
      <label>Price</label>
      <input type="text" name="price">
    </div>

    <div>
      <label>Location</label>
      <input type="text" name="location">

    <div>

    <div>
      <label>Email</label>
      <input type="text" name="email" required>
    </div>
      
      <input class="btn btn-success" type="submit" Value="add Product">
      <a href="{{ url('farmer/dashboard') }}" class="btn btn-outline-success back-button">Back</a>

    </div>

  </form>
</div>

</body>
</html>
