<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container-fluid {
            padding: 0px;


        }
        .sticky-header {
            background-color: #000000;
            color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .sticky-header h2 {
            margin: 0;
            width: 100%;

        }
        .btn-primary {
            background-color: #000000;
            border-color: #ffffff;
            border-radius: 50%;

        }
        .btn-primary:hover {
            background-color: #000000;
            border-color: #ffffff;
        }
        .table-wrapper {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            background-color: rgb(207, 241, 232);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            padding: 15px;
            vertical-align: middle;
        }
        .table th {
            background-color: #000000;
            color: white;
        }
        .table td img {
            width: 100px;
            border-radius: 5px;
        }
        .btn-minimalistic {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            font-size: 14px;
            color: #555;
            background-color: transparent;
            border: none;
            border-radius: 3px;
            transition: color 0.2s ease-in-out;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-minimalistic i {
            margin-right: 5px;
            font-size: 16px;
        }
        .btn-minimalistic:hover {
            color: #007bff;
        }
        .btn-edit {
            color: #28a745;
        }
        .btn-edit:hover {
            color: #218838;
        }
        .btn-delete {
            color: #dc3545;
        }
        .btn-delete:hover {
            color: #c82333;
        }
        .pagination-navbar {
            position: fixed;
            bottom: 0;
            right: 0;
            width: auto;
            background-color: #333;
            padding: 5px 10px;
            text-align: left;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            border-radius: 0 0 0 4px;
        }
        .pagination-navbar .pagination {
            margin: 0;
            display: flex;
            justify-content: flex-start;
            list-style: none;
        }
        .pagination-navbar .page-item {
            margin: 0 3px;
        }
        .pagination-navbar .page-item a {
            padding: 5px 10px;
            color: white;
            background-color: #444;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .pagination-navbar .page-item a:hover {
            background-color: #555;
        }
        .pagination-navbar .page-item.active span {
            background-color: #007bff;
            border-radius: 4px;
            color: white;
        }
        .pagination-navbar .page-item.disabled span {
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 sidebar-container">
                        @include('sidebar')
                    </div>
                    <div class="col-md-9 content-container">

                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="col-md-9">
                <!-- Sticky Navbar -->
                <div class="sticky-top sticky-header">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">List of Blogs</h2>
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog</a>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="container mt-5">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-wrapper">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publish At</th>
                                <th>Content</th>
                                <th>Photos</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ $blog->publish_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>
                                        @if (is_array($blog->photos))
                                            @foreach ($blog->photos as $photo)
                                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ url('blogs', $blog->id) }}/edit" class="btn btn-minimalistic btn-edit">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ url('blogs', $blog->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-minimalistic btn-delete" onclick="return confirm('Are you sure you want to delete this item?')">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <nav aria-label="Page navigation">
        <ul class="pagination pagination-navbar">
            {{ $blogs->links() }}
        </ul>
    </nav>
</body>
</html>
