<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f7f1;
      padding: 40px;
    }

    .form-container {
      max-width: 800px;
      margin: auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 128, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #2e7d32;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #2f4f2f;
    }

    input[type="text"],
    select,
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 6px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    img {
      display: block;
      margin-bottom: 10px;
      border-radius: 6px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #388e3c;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Update Product</h1>

    <form action="{{ url('edit_product', $product->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $product->title }}">
      </div>

      <div>
        <label>Description</label>
        <textarea name="description" rows="5">{{ $product->description }}</textarea>
      </div>

      <div>
        <label>Current Image</label>
        <img src="{{ asset('images/' . $product->image) }}" width="150">
        <label>Change Image</label>
        <input type="file" name="image" accept="image/*">
      </div>

      <div>
        <label>Current Title Deed</label>
        <img src="{{ asset('title_deeds/' . $product->title_deed) }}" width="150">
        <label>Change Title Deed</label>
        <input type="file" name="title_deed" accept="image/*">
      </div>

      <div>
        <label>Price</label>
        <input type="text" name="price" value="{{ $product->price }}">
      </div>

      <div>
        <label>Category</label>
        <select name="category">
          <option value="{{ $product->category }}">{{ $product->category }}</option>
        </select>
      </div>

      <div>
        <label>Contacts</label>
        <input type="text" name="contacts" value="{{ $product->contacts }}">
      </div>

      <input type="submit" value="Update Product">
    </form>
  </div>

</body>
</html>
