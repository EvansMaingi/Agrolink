<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Category</title>
  <style type="text/css">
    .div_deg {
      width: 400px;
      height: 300px;
      background-color: #f0f0f0;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
  
  </style>
</head>
<body>

<div class="div_deg">
    <h1>Update Category</h1>


    <form action="{{ url('update_category',$category->id) }}" method="post">
        

        @csrf

        <input type="text" name="category" value="{{ $category->category_name }}"required>
        <input class="btn btn-secondary" type="submit" value="update Category">

    </form>
</div>

  

</body>
</html>
