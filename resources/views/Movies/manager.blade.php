<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Snema</title>
</head>
<body>


<div class="admin-container">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-logo">SNEMA MANAGEMENT</div>
        <nav class="admin-nav">
            <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('Admin.movies') }}"><i class="fas fa-film"></i> Quản lý phim</a>
            <a href="#"><i class="fas fa-calendar-alt"></i>Suất chiếu</a>
            <a href="#"><i class="fas fa-users"></i>Người dùng</a>
            <a href="#"><i class="fas fa-ticket-alt"></i>Đơn đặt vé</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="admin-content">
        <header class="admin-header">
            <h1>Dashboard</h1>
            <div class="admin-user">
                <span>Xin chào, Admin</span>
                <a href="#" class="logout-btn"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </header>

        <section class="featured-movies">
            <h2>Danh sách phim</h2>
            <div class="movie-slider">
                @foreach($movies as $movie)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <button type="button" class="btn btn-warning" >Sửa</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal{{ $movie->id }}">Xoá</button>
                            </div>
                        </div>
                    </div>

                    {{--        Modal--}}
                    <div class="modal fade" id="myModal{{ $movie->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Xác nhận xóa</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa mục này?
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <div class="modal-footer">
                                        <button class="btn btn-light" data-bs-dismiss="modal">Không</button>
                                        <form method="post" action="{{ route('Movies.destroy', $movie->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Có</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </section>

<!--	Footer	-->
<div id="footer-bottom" class="bg-dark">
    <div class="container text-center text-light">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>
                    2025 © <a href="https://bkacad.edu.vn">BKACAD</a>. All rights reserved. Developed by <a href="https://github.com/Kurosagi19">Kurosagi19</a> and <a href="https://www.facebook.com/DPawsParrot">DPawsParrot.</a>
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

