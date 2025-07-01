<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Details</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f9f4;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 40px;
    }

    .product-container {
      max-width: 800px;
      margin: auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 128, 0, 0.1);
      padding: 30px;
    }

    .product-title {
      font-size: 2rem;
      font-weight: bold;
      color: #2d6a4f;
    }

    .product-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    .product-info p {
      font-size: 1.1rem;
      margin: 8px 0;
    }

    .inquiry-form {
      margin-top: 30px;
    }

    .inquiry-form textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      resize: vertical;
    }

    .inquiry-form button {
      margin-top: 10px;
      background-color: #2d6a4f;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
    }

    .back-button {
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <div class="product-container">
    <h1 class="product-title">{{ $data->title }}</h1>

    <img src="{{ asset('images/' . $data->image) }}" alt="Product Image" class="product-image">
    <img src="{{ asset('title_deeds/' . $data->title_deed) }}" alt="Title Deed" class="product-image">

    <div class="product-info">
      <p><strong>Price:</strong> Ksh. {{ $data->price }}</p>
      <p><strong>Description:</strong> {{ $data->description }}</p>
      <p><strong>Category:</strong> {{ $data->category }}</p>
      <p><strong>Location:</strong> {{ $data->location }}</p>
      <p><strong>Contacts:</strong> {{ $data->contacts }}</p>
      <p><strong>Email:</strong> {{ $data->email }}</p>
    </div>

    <!-- Inquiry Form -->
    <div class="inquiry-form">
      <h4>Send an Inquiry to the Farmer</h4>
      <form method="POST" action="{{ route('inquiry.send', $data->id) }}">
        @csrf
        <textarea name="message" rows="4" placeholder="Write your inquiry here..." required></textarea>
        <button type="submit">Send Inquiry</button>
      </form>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-outline-success back-button">Back</a>
  </div>

</body>
</html>
