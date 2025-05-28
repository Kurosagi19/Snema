<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Snema</title>
</head>
<body>


<!-- Hero Section -->
<div class="hero-section bg-dark text-light py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Chào mừng đến với Rạp Chiếu Phim</h1>
                <p class="lead">Khám phá những bộ phim hay nhất với chất lượng hình ảnh và âm thanh tuyệt vời.</p>
                <a href="{% url 'movies:movie_list' %}" class="btn btn-primary btn-lg">Xem Phim Ngay</a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/600x400" alt="Hero Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

        <button><a href="{{ route('Movies.create') }}">Thêm phim mới</a></button>

            @foreach($movies as $movie)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ $movie->duration }}</p>
                            <a href="{% url 'movies:movie_detail' movie.slug %}" class="btn btn-primary">{{ $movie->description }}</a>
                        </div>
                    </div>
                </div>
            @endforeach


<!--	Footer	-->
<div id="footer-bottom">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>
                    2025 © <a href="https://bkacad.edu.vn">BKACAD</a>. All rights reserved. Developed by <a href="{{ route('Admin.home') }}">Kurokuro Usagi.</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--	End Footer	-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>
</html>

