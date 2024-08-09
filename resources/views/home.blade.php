<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background: rgb(207, 241, 232);
        }
        /* Include your styles here */
        .articles {
            display: grid;
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Adjusted min width for better layout */
            gap: 16px;

        }

        article {
            border-radius: 20px;
            background: #fff;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            overflow: hidden;
            transition: transform 0.4s ease-in-out;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            left: 20%;
            text-align: left;
            height: 350px; /* Fixed height for the card */
            position: relative;
        }

        article.expanded {
            transform: scale(1.1);
            z-index: 10;
            height: auto; /* Allow height to expand */
            background: rgba(255, 255, 255, 0.95); /* Slight transparency for better readability */
            position: absolute;
            top: 100px; /* Add top margin */
            left: 50%; /* Position relative to the center */
            transform: translate(-50%, 20px); /* Center horizontally and adjust for the top margin */
            width: 80%; /* Reduce the width to prevent overflow */
            overflow-y: auto; /* Allow scrolling within the expanded card */
            max-height: 80vh; /* Limit the maximum height of the expanded card */
            padding: 16px; /* Add padding to ensure text doesn't touch the edges */
            margin-bottom: 20px; /* Add bottom margin */
        }

        .article-content {
            display: flex;
            flex-direction: column; /* Ensure the content is arranged vertically */
            height: 100%;
            position: relative; /* Enable positioning for child elements */
        }


        article a::after {
            position: absolute;
            inset-block: 0;
            inset-inline: 0;
            cursor: pointer;
            content: "";
        }

        h2 {
    font-family: 'Times New Roman', Times, serif;
    font-size: 1.4rem;
    color: black;
    margin: 0 0 8px 0;
}
        article .author {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }

        figure {
            margin: 0;
            padding: 0;
            height: 50%; /* Fill half the height of the card */
            overflow: hidden;
        }

        article img {
            width: 100%;
            height: 100%; /* Make image fill the figure */
            object-fit: cover; /* Ensure all images have the same size */
        }

        .article-body {
            padding: 16px;
            height: 50%; /* Fill half the height of the card */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensure content is spaced evenly */
            overflow: hidden; /* Hide overflowed content */
        }

        h2 {
            font-family: "Bebas Neue", cursive;
            font-size: 1.4rem;
            color: black;
            margin: 0 0 8px 0;
            overflow: hidden;
            text-overflow: ellipsis; /* Add ellipsis for truncated text */
            white-space: nowrap; /* Prevent wrapping */
        }
        .content {
            display: none; /* Hide content when not expanded */
        }

        .expanded-content {
            display: none;
            padding: 16px;
            background: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        article.expanded .expanded-content {
            display: block;
            text-align: center; /* Center align text */
            overflow: visible; /* Allow overflow in expanded state */
            padding: 16px;
        }
        .expanded-content-text {
            margin: 0;
        }

        article a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #28666e;
        }
        .expanded-content-text {
    margin: 0;
}
       .author, .publish-date {
            font-size: 0.9rem;
            color: #555;
            margin: 0 0 4px 0;
        }

        .publish-date {
            color: #777;
        }

        * {
            box-sizing: border-box;
        }



        .read-more {
    color: #28666e;
    text-decoration: none;
    font-weight: bold;
    margin-top: auto; /* Push it to the bottom */
    align-self: flex-start;
    background-color: white; /* Background color for better visibility */
    padding: 5px; /* Padding for better visibility */
}


.articles {
    display: grid;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Adjusted min width for better layout */
    gap: 10px;
}


        .sr-only:not(:focus):not(:active) {
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

        .sidebar-container {
            position: fixed;
            z-index: 1;
            top: 0px;

        }

        .container-fluid {
            padding: 0px;


        }

        .content {
    font-size: 0.8rem;
    color: #333;
    margin: 8px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Limit to 3 lines */
    -webkit-box-orient: vertical;
}

        .box {
            width: 200px;
            height: 100px;
            border: 1px solid #000;
            padding: 10px;
            background-color: #f0f0f0;
            position: absolute;
            top: -10px;
            right: 10px;
            text-align: center;
            border-radius: 16px;
        }



        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            border-radius: 50%;
            text-align: center;
            transition: background-color 0.3s;
        }

        .toggle-theme {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .pagination-navbar {
    position: fixed; /* Change from sticky to fixed */
    bottom: 0;
    right: 0; /* Align to the right side */
    width: auto; /* Set width to auto to avoid taking the entire row */
    background-color: #333; /* Navbar background color */
    padding: 5px 10px; /* Add some padding for spacing */
    text-align: left; /* Align content to the left */
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* Ensure it stays on top */
    border-radius: 0 0 0 4px; /* Rounded corners on bottom-left */
}

.pagination-navbar .pagination {
    margin: 0;
    display: flex;
    justify-content: flex-start; /* Align items to the left */
    list-style: none;
}

.pagination-navbar .page-item {
    margin: 0 3px; /* Margin between pagination items */
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

.btn-circle {
            background: black;
            width: 10%;
            height: 70px;
            padding: 10px;
            border-radius: 50%;
            text-align: center;
            font-size: 18px;
            line-height: 1.2;
        }

    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-circle">Create Blog</a>
        </div>
    </div>


    <div class="sidebar">
        <a href="#dark-mode" id="toggle-theme" class="active"><i class="fas fa-moon"></i></a>
        <a href="#about"><i class="fas fa-info-circle"></i></a>
        <a href="#settings"><i class="fas fa-cogs"></i></a>
    </div>

    <!-- Main Content -->
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
    <!-- Blog Cards Section -->
    <section class="articles">
    @forelse($blogs as $blog)
        <article onclick="toggleContent(this)">
            <div class="article-content">
                <figure>
                    <img src="{{ $blog->photos[0] ?? 'https://picsum.photos/800/450' }}" alt="{{ $blog->title }}" />
                </figure>
                <div class="article-body">
                    <h2>{{ $blog->title }}</h2>
                    <p class="author">By {{ $blog->author }}</p>
                    <p class="publish-date">Published on {{ $blog->publish_at->format('M d, Y') }}</p>
                </div>
                <div class="expanded-content">
                    <p class="expanded-content-text">{!! $blog->content !!}</p>
                    <p class="author">Posted By {{ $blog->user->name }}</p>
                </div>
            </div>
        </article>
    @empty
        <p style="text-align: center; ">No blogs available.</p>
    @endforelse
    </section>

    <!-- Pagination Section -->
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-navbar">
            {{ $blogs->links() }}
        </ul>
    </nav>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-navbar">
        {{ $blogs->links() }}
    </ul>
</nav>

<script>
    function toggleContent(article) {
        // Toggle expanded class on click
        const isExpanded = article.classList.toggle('expanded');
        if (isExpanded) {
            document.body.classList.add('no-scroll');
        } else {
            document.body.classList.remove('no-scroll');
        }
    }
</script>

</body>
</html>
