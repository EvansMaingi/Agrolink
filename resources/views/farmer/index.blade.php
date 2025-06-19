<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer Dashboard</title>

  <link rel="stylesheet" href="{{ asset('css/farmer.css') }}">

  <style>
    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 10;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 400px;
      text-align: center;
      border-radius: 8px;
    }

    .close {
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="text"] {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
    }

    .btn-primary {
      padding: 10px 20px;
      background-color: #28a745;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 5px;
    }

    .btn-primary:hover {
      background-color: #218838;
    }

    .category-list {
      margin-top: 30px;
    }

    .category-list ul {
      list-style-type: none;
      padding: 0;
    }

    .category-list li {
      background: #f3f3f3;
      padding: 10px;
      margin: 5px 0;
      border-radius: 4px;
    }

    .logout-button {
      text-align: right;
      margin: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
   <nav class="navbar">
  <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#" onclick="openModal()">Category</a></li>

    <li class="nav-item">
      <a href="javascript:void(0);" class="nav-link" onclick="toggleDropdown()">
        <i class="icon-windows"></i> Products ▼
      </a>
      <ul id="exampledropdownDropdown" class="list-unstyled" style="display: none;">
        <li><a class="nav-link" href="{{ url('add_product') }}">Add Product</a></li>
        <li><a class="nav-link" href="{{ url('view_product') }}">View Products</a></li>
        <li><a class="nav-link" href="#">Page 3</a></li>
      </ul>
    </li>

    <li class="nav-item"><a class="nav-link" href="#">Link 3</a></li>
  </ul>
</nav>

<script>
  function toggleDropdown() {
    const dropdown = document.getElementById("exampledropdownDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }
</script>

    <!-- Main content -->
    <div class="content">
      <!-- Logout -->
      <div class="logout-button">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <input type="submit" value="Logout">
        </form>
      </div>

      <!-- Modal -->
      <div id="categoryModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <h2>Add Category</h2>
          <form action="{{ url('add_category') }}" method="POST">
            @csrf
            <input type="text" name="category" placeholder="Enter category name" required>
            <br>
            <input class="btn-primary" type="submit" value="Add Category">
          </form>
        </div>
      </div>

      <!-- Success Message -->
      @if(session('status'))
        <p style="color: green; margin-top: 20px;">{{ session('status') }}</p>
      @endif

      <!-- Category List Display -->
      <!-- Category Table Display -->
<div class="category-list" style="margin-top: 30px;">
  <h3>Existing Categories</h3>

  @if(session('status'))
    <p style="color: green;">{{ session('status') }}</p>
  @endif

  @if($categories->count() > 0)
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
      <thead style="background-color: #f0f0f0;">
        <tr>
          <th>#</th>
          <th>Category Name</th>
          <th>Edit</th>
          <th>Delete</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $index => $category)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
              <a class="btn btn-success" href="{{ url('edit_category', $category->id) }}">Edit</a>	
            </td>
            <td>
              <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category',$category->id) }}">Delete</a>
            </td>
           
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No categories added yet.</p>
  @endif
</div>

    </div>
  </div>

  <footer>
    <p>&copy; 2023 Farmer Dashboard. All rights reserved.</p>
  </footer>

  <!-- JavaScript -->

  <script type="text/javascript">
    function confirmation(ev)


    {
      ev.preventDefault();

      var urlToRedirect= ev.currentTarget.getAttribute("href");

      console.log(urlToRedirect);
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willCancel) => {
  if (willCancel) {
    window.location.href = urlToRedirect;
  }
});


    }
   </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function openModal() {
      document.getElementById('categoryModal').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('categoryModal').style.display = 'none';
    }

    // Optional: Close modal when clicking outside of it
    window.onclick = function(event) {
      const modal = document.getElementById('categoryModal');
      if (event.target == modal) {
        closeModal();
      }
    }
  </script>
</body>
</html>
