<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: rgb(207, 241, 232);
        }
        .container {
            max-width: 900px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .custom-file-label::after {
            content: "Choose files";
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar-container">
                @include('sidebar')
            </div>
            <div class="col-md-9 content-container">

            </div>
        </div>
    </div>
<div class="container">
    <h2 class="mb-4">Edit Blog</h2>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter blog title" required>
        </div>
        <div class="form-group">
            <label for="publish_at">Publish At</label>
            <input type="datetime-local" class="form-control" id="publish_at" name="publish_at" value="{{ $blog->publish_at->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your blog content here..." required>{{ $blog->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $blog->author }}" placeholder="Enter author's name" required>
        </div>
        <div class="form-group">
                <label for="photos">Current Photos</label>
                <div class="current-photos mb-3">
                    @if (is_array($blog->photos))
                        @foreach ($blog->photos as $index => $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Current Photo" class="img-thumbnail">
                            <input type="hidden" name="current_photos[]" value="{{ $photo }}">
                        @endforeach
                    @endif
                </div>
            </div>
        <div class="form-group">
                <label for="photos">Upload New Photos</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photos" name="photos[]" multiple>
                    <label class="custom-file-label" for="photos">Choose files</label>
                </div>
            </div>
        <button type="submit" class="btn btn-primary btn-block">Update Blog</button>
    </form>
</div>
<script>
    $(document).ready(function(){
        bsCustomFileInput.init();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>
