<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phim - Snema</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #e50914;
            --text-color: #ffffff;
            --background-color: #141414;
            --card-bg: #1f1f1f;
            --hover-color: #ff0f1a;
            --filter-bg: #2a2a2a;
            --border-color: #333;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color);
            padding: 0.8rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ff4d4d;
        }

        nav {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            transition: background 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
            margin: 0.2rem;
        }

        nav a.active, nav a:hover {
            background: #ff4d4d;
            color: #fff;
        }

        /* Movies Page Layout */
        .movies-container {
            margin-top: 80px;
            padding: 2rem 0;
            display: flex;
            gap: 2rem;
        }

        /* Sidebar Filter */
        .filter-sidebar {
            width: 25%;
            background: var(--filter-bg);
            padding: 1.5rem;
            border-radius: 10px;
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .filter-section {
            margin-bottom: 1.5rem;
        }

        .filter-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .filter-group {
            margin-bottom: 1rem;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #b3b3b3;
        }

        .filter-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .filter-checkbox input {
            margin-right: 0.5rem;
        }

        .filter-select {
            width: 100%;
            padding: 0.5rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            color: var(--text-color);
        }

        .filter-radio {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .filter-radio input {
            margin-right: 0.5rem;
        }

        .filter-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .filter-btn {
            flex: 1;
            padding: 0.7rem;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .filter-btn.apply {
            background: #2196f3;
            color: white;
        }

        .filter-btn.reset {
            background: #666;
            color: white;
        }

        /* Movies Grid/List */
        .movies-content {
            flex: 1;
        }

        .movies-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .movies-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--text-color);
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }

        .view-btn {
            padding: 0.5rem;
            background: var(--filter-bg);
            border: none;
            border-radius: 4px;
            color: var(--text-color);
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .view-btn.active {
            background: var(--secondary-color);
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .movies-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .movie-card {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .movie-card:hover {
            transform: translateY(-5px);
        }

        .movie-poster {
            position: relative;
            padding-top: 150%;
        }

        .movie-poster img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .movie-info {
            padding: 1rem;
        }

        .movie-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .movie-year {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            background: #666;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .movie-rating {
            color: #ffd700;
            margin-bottom: 0.5rem;
        }

        .movie-genre {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .genre-tag {
            padding: 0.2rem 0.5rem;
            background: var(--filter-bg);
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .book-btn {
            display: block;
            width: 100%;
            padding: 0.7rem;
            background: var(--secondary-color);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .book-btn:hover {
            background: var(--hover-color);
        }

        /* List View */
        .movie-list-item {
            display: flex;
            gap: 1.5rem;
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
        }

        .movie-list-poster {
            width: 200px;
            height: 300px;
        }

        .movie-list-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .movie-list-info {
            flex: 1;
            padding: 1.5rem;
        }

        /* Mobile Filter Button */
        .mobile-filter-btn {
            display: none;
            padding: 0.7rem 1.5rem;
            background: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .movies-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .movies-container {
                flex-direction: column;
            }

            .filter-sidebar {
                display: none;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1001;
                overflow-y: auto;
            }

            .filter-sidebar.active {
                display: block;
            }

            .mobile-filter-btn {
                display: block;
            }

            .movies-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .movie-list-item {
                flex-direction: column;
            }

            .movie-list-poster {
                width: 100%;
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .movies-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
            <div class="logo">Snema</div>
            <nav>
                <a href="index.blade.php">Trang chủ</a>
                <a href="forum.blade.php">Diễn đàn</a>  
                <a href="movies.blade.php" class="active">Phim</a>
                <a href="cinemas.blade.php">Rạp</a>
                <a href="food.blade.php">Đồ ăn</a>
                <a href="about.blade.php">Về chúng tôi</a>
                <a href="contact.blade.php">Liên hệ</a>
            </nav>
            <div class="auth-buttons">
                <a href="login.blade.php" class="login-btn">Đăng nhập</a>
                <a href="register.blade.php" class="register-btn">Đăng ký</a>
            </div>
        </div>
    </nav>

    <!-- Movies Container -->
    <div class="container movies-container">
        <!-- Mobile Filter Button -->
        <button class="mobile-filter-btn" id="mobileFilterBtn">
            <i class="fas fa-filter"></i> Lọc phim
        </button>

        <!-- Filter Sidebar -->
        <aside class="filter-sidebar" id="filterSidebar">
            <div class="filter-section">
                <h3 class="filter-title">Trạng thái</h3>
                <div class="filter-group">
                    <label class="filter-radio">
                        <input type="radio" name="status" value="now" checked>
                        Đang chiếu
                    </label>
                    <label class="filter-radio">
                        <input type="radio" name="status" value="upcoming">
                        Sắp chiếu
                    </label>
                </div>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">Thể loại</h3>
                <div class="filter-group">
                    <label class="filter-checkbox">
                        <input type="checkbox" name="genre" value="action">
                        Hành động
                    </label>
                    <label class="filter-checkbox">
                        <input type="checkbox" name="genre" value="romance">
                        Lãng mạn
                    </label>
                    <label class="filter-checkbox">
                        <input type="checkbox" name="genre" value="horror">
                        Kinh dị
                    </label>
                    <label class="filter-checkbox">
                        <input type="checkbox" name="genre" value="comedy">
                        Hài
                    </label>
                    <label class="filter-checkbox">
                        <input type="checkbox" name="genre" value="drama">
                        Tâm lý
                    </label>
                </div>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">Năm sản xuất</h3>
                <div class="filter-group">
                    <select class="filter-select" name="year">
                        <option value="">Tất cả</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">Đánh giá</h3>
                <div class="filter-group">
                    <label class="filter-radio">
                        <input type="radio" name="rating" value="4">
                        ★4.0 trở lên
                    </label>
                    <label class="filter-radio">
                        <input type="radio" name="rating" value="3.5">
                        ★3.5 trở lên
                    </label>
                    <label class="filter-radio">
                        <input type="radio" name="rating" value="3">
                        ★3.0 trở lên
                    </label>
                </div>
            </div>

            <div class="filter-buttons">
                <button class="filter-btn apply">Áp dụng</button>
                <button class="filter-btn reset">Đặt lại</button>
            </div>
        </aside>

        <!-- Movies Content -->
        <main class="movies-content">
            <div class="movies-header">
                <h1 class="movies-title">Danh sách phim</h1>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <div class="movies-grid" id="moviesContainer">
                <!-- Movie Card 1 -->
                <div class="movie-card" data-genre="action,adventure" data-year="2019" data-rating="4.5">
                    <div class="movie-poster">
                        <img src="https://image.tmdb.org/t/p/w500/1E5baAaEse26fej7uHcjOgEE2t2.jpg" alt="Avengers: Endgame">
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Avengers: Endgame</h3>
                        <span class="movie-year">2019</span>
                        <div class="movie-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <div class="movie-genre">
                            <span class="genre-tag">Hành động</span>
                            <span class="genre-tag">Phiêu lưu</span>
                        </div>
                        <a href="movie_detail.blade.php" class="book-btn">Đặt vé</a>
                    </div>
                </div>

                <!-- Movie Card 2 -->
                <div class="movie-card" data-genre="drama,romance" data-year="2023" data-rating="4.2">
                    <div class="movie-poster">
                        <img src="https://image.tmdb.org/t/p/w500/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg" alt="Oppenheimer">
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Oppenheimer</h3>
                        <span class="movie-year">2023</span>
                        <div class="movie-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.2</span>
                        </div>
                        <div class="movie-genre">
                            <span class="genre-tag">Tâm lý</span>
                            <span class="genre-tag">Lịch sử</span>
                        </div>
                        <a href="movie_detail.blade.php" class="book-btn">Đặt vé</a>
                    </div>
                </div>

                <!-- Movie Card 3 -->
                <div class="movie-card" data-genre="action,comedy" data-year="2023" data-rating="4.0">
                    <div class="movie-poster">
                        <img src="https://image.tmdb.org/t/p/w500/ngl2FKBlU4fhbdsrtdom9LVLBXw.jpg" alt="Fast X">
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Fast X</h3>
                        <span class="movie-year">2023</span>
                        <div class="movie-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <div class="movie-genre">
                            <span class="genre-tag">Hành động</span>
                            <span class="genre-tag">Hài</span>
                        </div>
                        <a href="movie_detail.blade.php" class="book-btn">Đặt vé</a>
                    </div>
                </div>

                <!-- Movie Card 4 -->
                <div class="movie-card" data-genre="horror,thriller" data-year="2023" data-rating="3.8">
                    <div class="movie-poster">
                        <img src="https://image.tmdb.org/t/p/w500/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg" alt="The Nun II">
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">The Nun II</h3>
                        <span class="movie-year">2023</span>
                        <div class="movie-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>3.8</span>
                        </div>
                        <div class="movie-genre">
                            <span class="genre-tag">Kinh dị</span>
                            <span class="genre-tag">Hồi hộp</span>
                        </div>
                        <a href="movie_detail.blade.php" class="book-btn">Đặt vé</a>
                    </div>
                </div>

                <!-- Thêm các movie card khác tương tự -->
            </div>
        </main>
    </div>

    <script>
        // Mobile Filter Toggle
        const mobileFilterBtn = document.getElementById('mobileFilterBtn');
        const filterSidebar = document.getElementById('filterSidebar');

        mobileFilterBtn.addEventListener('click', () => {
            filterSidebar.classList.toggle('active');
        });

        // View Toggle (Grid/List)
        const viewBtns = document.querySelectorAll('.view-btn');
        const moviesContainer = document.getElementById('moviesContainer');

        viewBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                viewBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                const view = btn.dataset.view;
                if (view === 'grid') {
                    moviesContainer.className = 'movies-grid';
                } else {
                    moviesContainer.className = 'movies-list';
                }
                
                // Lưu lựa chọn vào localStorage
                localStorage.setItem('movieView', view);
            });
        });

        // Khôi phục lựa chọn view từ localStorage
        const savedView = localStorage.getItem('movieView');
        if (savedView) {
            const btn = document.querySelector(`[data-view="${savedView}"]`);
            if (btn) btn.click();
        }

        // Filter Form Submit
        const filterForm = document.querySelector('.filter-sidebar');
        const applyBtn = document.querySelector('.filter-btn.apply');
        const resetBtn = document.querySelector('.filter-btn.reset');

        applyBtn.addEventListener('click', () => {
            const formData = new FormData(filterForm);
            const params = new URLSearchParams();
            
            for (let [key, value] of formData.entries()) {
                if (value) params.append(key, value);
            }
            
            // Cập nhật URL không reload trang
            window.history.pushState({}, '', `?${params.toString()}`);
            
            // Lọc phim dựa trên các tiêu chí
            const movies = document.querySelectorAll('.movie-card');
            const selectedGenres = Array.from(formData.getAll('genre'));
            const selectedYear = formData.get('year');
            const selectedRating = formData.get('rating');
            const selectedStatus = formData.get('status');

            movies.forEach(movie => {
                let show = true;

                // Lọc theo thể loại
                if (selectedGenres.length > 0) {
                    const movieGenres = movie.dataset.genre.split(',');
                    show = show && selectedGenres.some(genre => movieGenres.includes(genre));
                }

                // Lọc theo năm
                if (selectedYear) {
                    show = show && movie.dataset.year === selectedYear;
                }

                // Lọc theo rating
                if (selectedRating) {
                    show = show && parseFloat(movie.dataset.rating) >= parseFloat(selectedRating);
                }

                // Lọc theo trạng thái (giả lập)
                if (selectedStatus === 'now') {
                    show = show && Math.random() > 0.3; // 70% phim đang chiếu
                } else if (selectedStatus === 'upcoming') {
                    show = show && Math.random() <= 0.3; // 30% phim sắp chiếu
                }

                movie.style.display = show ? 'block' : 'none';
            });
        });

        resetBtn.addEventListener('click', () => {
            filterForm.reset();
            window.history.pushState({}, '', window.location.pathname);
        });

        // Lazy Loading Images
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    </script>
</body>
</html>
