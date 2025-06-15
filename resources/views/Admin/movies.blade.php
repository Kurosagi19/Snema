<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phim - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="fas fa-film"></i> Quản lý phim</a></li>
                <li><a href=""><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
                <li><a href=""><i class="fas fa-cookie"></i> Quản lý snack</a></li>
                <li><a href=""><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li><a href=""><i class="fas fa-users"></i> Quản lý người dùng</a></li>
                <li><a href="{{ route('Admin.dashboard') }}"><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Quản lý phim</h1>
                <button class="btn btn-primary" onclick="openModalWithData('movie')" data-bs-toggle="movieModal">
                    <i class="fas fa-plus"></i> <a href="{{ route('Movies.create') }}" style="color: white">Thêm phim</a>
                </button>
            </div>

            <div class="movie-slider row">
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

                    </div>
{{--                    End Modal--}}
            @endforeach
        </main>

    </div>

    <!-- Add/Edit Movie Modal -->
    <div id="movieModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('movie')">&times;</span>
            <h2 style="margin-bottom: 1.5rem;">Thêm phim mới</h2>
            <form id="movieForm" onsubmit="handleFormSubmit(event, 'movie')">
                <div class="form-group">
                    <label for="title">Tên phim</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="duration">Thời lượng (phút)</label>
                    <input type="number" id="duration" name="duration" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rating">Đánh giá</label>
                    <select id="rating" name="rating" class="form-control" required>
                        <option value="G">G - Mọi lứa tuổi</option>
                        <option value="PG">PG - Có sự hướng dẫn của phụ huynh</option>
                        <option value="PG-13">PG-13 - Không phù hợp với trẻ dưới 13 tuổi</option>
                        <option value="R">R - Hạn chế người xem dưới 17 tuổi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Thể loại</label>
                    <select id="category" name="category" class="form-control" required>
                        <!-- Thể loại sẽ được thêm vào đây bằng JavaScript -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="poster">Poster phim</label>
                    <input type="file" id="poster" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Lưu thông tin</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        // Load danh sách phim
        async function loadMovies() {
            try {
                const response = await fetch('/admin/movies/list');
                const movies = await response.json();
                const cardGrid = document.querySelector('.card-grid');
                cardGrid.innerHTML = '';

                movies.forEach(movie => {
                    const card = createMovieCard(movie);
                    cardGrid.appendChild(card);
                });
            } catch (error) {
                console.error('Lỗi tải danh sách phim:', error);
            }
        }

        // Tạo card phim
        function createMovieCard(movie) {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <div class="card-image">
                    <img src="${movie.poster}" alt="${movie.title}">
                </div>
                <div class="card-header">
                    <h3>${movie.title}</h3>
                    <div class="card-actions">
                        <button class="btn btn-info" onclick="openModalWithData('movie', ${JSON.stringify(movie)})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger" onclick="handleDelete('movie', ${movie.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="duration">${movie.duration} phút</p>
                    <p class="rating">${movie.rating}</p>
                    <p class="description">${movie.description}</p>
                </div>
            `;
            return card;
        }

        // Load danh sách thể loại
        async function loadCategories() {
            try {
                const response = await fetch('/admin/categories/list');
                const categories = await response.json();
                const categorySelect = document.getElementById('category');
                categorySelect.innerHTML = '';

                categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            } catch (error) {
                console.error('Lỗi tải danh sách thể loại:', error);
            }
        }

        // Khởi tạo trang
        document.addEventListener('DOMContentLoaded', () => {
            loadMovies();
            loadCategories();
        });
    </script>
</body>
</html>
