<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer Dashboard</title>

  <link rel="stylesheet" href="{{ asset('css/farmer.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 10;
      left: 0; top: 0;
      width: 100%; height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
      background: #fff;
      margin: 15% auto;
      padding: 20px;
      width: 400px;
      border-radius: 8px;
    }
    .close {
      float: right;
      font-size: 24px;
      cursor: pointer;
    }
    .category-list table {
      width: 100%;
      border-collapse: collapse;
    }
    .category-list th, .category-list td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    .inbox-table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
    }
    .inbox-table th, .inbox-table td {
      padding: 10px;
      border: 1px solid #ccc;
    }
    .hidden-section {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 bg-light p-3">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="openModal()">Add Category</a></li>

          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link" onclick="toggleDropdown()">Products ▼</a>
            <ul id="productDropdown" class="list-unstyled ms-3" style="display: none;">
              <li><a class="nav-link" href="{{ url('add_product') }}">Add Product</a></li>
              <li><a class="nav-link" href="{{ url('view_product') }}">View Products</a></li>
              <li><a class="nav-link" href="#" onclick="showSection('inboxSection')">Inbox</a></li>
            </ul>
          </li>

          <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 p-4">
        <!-- Modal for Adding Category -->
        <div id="categoryModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h4>Add Category</h4>
            <form action="{{ url('add_category') }}" method="POST">
              @csrf
              <input type="text" name="category" placeholder="Category name" class="form-control mb-3" required>
              <button type="submit" class="btn btn-success">Add Category</button>
            </form>
          </div>
        </div>

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <!-- Category Section -->
        <div class="category-list">
          <h4>Existing Categories</h4>
          @if($categories->count() > 0)
            <table>
              <thead>
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
                    <td><a href="{{ url('edit_category', $category->id) }}" class="btn btn-sm btn-success">Edit</a></td>
                    <td>
                      <a href="{{ url('delete_category',$category->id) }}" class="btn btn-sm btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p>No categories yet.</p>
          @endif
        </div>

        <!-- Inbox Section -->
        <div id="inboxSection" class="hidden-section">
          <h4 class="mt-4">Inbox - Buyer Inquiries</h4>
          @if(!empty($inquiries) && count($inquiries) > 0)

            <table class="inbox-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>From</th>
                  <th>Message</th>
                  <th>Sent At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($inquiries as $inquiry)
                <tr>
                  <td>{{ $inquiry->product->title ?? 'N/A' }}</td>
                  <td>{{ $inquiry->user->name ?? 'Guest' }}</td>
                  <td>{{ $inquiry->message }}</td>
                  <td>{{ $inquiry->created_at->diffForHumans() }}</td>
                  <td>
                    <form action="{{ route('inquiry.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirmation(event);">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p>No inquiries received yet.</p>
          @endif
        </div>
      </div>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('categoryModal').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('categoryModal').style.display = 'none';
    }

    function toggleDropdown() {
      const dropdown = document.getElementById("productDropdown");
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    function showSection(id) {
      document.querySelectorAll('.hidden-section').forEach(section => {
        section.style.display = 'none';
      });
      document.getElementById(id).style.display = 'block';
    }

    function confirmation(ev) {
      ev.preventDefault();
      const urlToRedirect = ev.currentTarget.getAttribute("href");
      swal({
        title: "Are you sure?",
        text: "Once deleted, this category will be gone forever!",
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
</body>
</html>
