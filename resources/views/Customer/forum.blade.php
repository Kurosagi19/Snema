<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snema - Diễn đàn</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f6f7fb;
            color: #222;
            font-family: 'Segoe UI', Arial, sans-serif;
            padding-top: 60px;
        }
        .navbar {
            background: #181818;
            color: #fff;
            padding: 0.8rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ff4d4d;
            text-decoration: none;
            transition: color 0.2s;
        }
        .logo:hover {
            color: #e43c3c;
        }
        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
        }
        nav a.active, nav a:hover {
            background: #ff4d4d;
            color: #fff;
        }
        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .auth-buttons a {
            color: #fff;
            background: #ff4d4d;
            border-radius: 4px;
            padding: 0.5rem 1.2rem;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
        }
        .auth-buttons a.login-btn {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .auth-buttons a:hover {
            background: #e43c3c;
        }
        .auth-buttons a.register-btn {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .main-content {
            display: flex;
            gap: 2rem;
            margin: 2rem auto;
            max-width: 1400px;
            padding: 0 1rem;
        }
        .ad-sidebar {
            width: 200px;
            background: #fff;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .content-area {
            flex: 1;
        }
        :root {
            --primary-color:rgb(255, 4, 4);
            --secondary-color:rgba(0, 0, 0, 0);
            --text-color: #1F2937;
            --background-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --border-color: #E5E7EB;
            --hover-color:rgb(235, 37, 37);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Forum Header */
        .forum-header {
            margin-top: 80px;
            padding: 2rem 0;
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .forum-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .forum-menu {
            display: flex;
            gap: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .forum-menu a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .forum-menu a.active {
            background: var(--primary-color);
            color: white;
        } /

        /* Forum Content */
        .forum-content {
            display: grid;
            grid-template-columns: 70% 30%;
            gap: 2rem;
            padding: 2rem 0;
        }

        /* Thread List */
        .thread-card {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .thread-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .thread-card.important {
            border-left: 4px solid var(--secondary-color);
        }

        .thread-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .movie-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .movie-poster {
            width: 50px;
            height: 70px;
            border-radius: 4px;
            object-fit: cover;
        }

        .movie-title {
            font-weight: 600;
            color: var(--primary-color);
        }

        .thread-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .thread-content {
            color: #4B5563;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .thread-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #6B7280;
            font-size: 0.9rem;
        }

        .thread-stats {
            display: flex;
            gap: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .thread-tags {
            display: flex;
            gap: 0.5rem;
        }

        .tag {
            background: #E5E7EB;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-box {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .box-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .movie-carousel {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
        }

        .movie-item {
            flex: 0 0 120px;
            text-align: center;
        }

        .movie-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 0.5rem;
        }

        .top-users {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .user-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .user-item img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .hot-topics {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .topic-tag {
            background: #E5E7EB;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* FAB Button */
        .fab-button {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .fab-button:hover {
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .forum-content {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .forum-menu {
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .thread-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .movie-info {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .search-bar {
                flex-direction: column;
            }

            .thread-footer {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <a href="index.blade.php" class="logo">Snema</a>
            <nav>
                <a href="index.blade.php">Trang chủ</a>
                <a href="forum.blade.php" class="active">Diễn đàn</a>
                <a href="movies.blade.php">Phim</a>
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
    </header>
    <div class="main-content">
        <div class="ad-sidebar">
            <!-- Quảng cáo bên trái -->
            <img src="images/ad-left.jpg" alt="Quảng cáo" style="width:100%;border-radius:8px;">
        </div>
        <div class="content-area">
            <!-- Nội dung trang diễn đàn -->
            <h1>Diễn đàn</h1>
        </div>
        <div class="ad-sidebar">
            <!-- Quảng cáo bên phải -->
            <img src="images/ad-right.jpg" alt="Quảng cáo" style="width:100%;border-radius:8px;">
        </div>
    </div>

    <!-- Forum Header -->
    <header class="forum-header">
        <div class="container">
            <h1 class="forum-title">Cộng đồng điện ảnh</h1>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Tìm kiếm phim, chủ đề...">
            </div>
            <div class="forum-menu">
                <a href="#" class="active">Trang chủ</a>
                <a href="#">Phim hot</a>
                <a href="#">Chủ đề mới</a>
                <a href="#">Thông báo</a>
            </div>
        </div>
    </header>

    <!-- Forum Content -->
    <main class="container forum-content">
        <!-- Thread List -->
        <div class="thread-list">
            <!-- Thread 1 -->
            <article class="thread-card important">
                <div class="thread-header">
                    <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar" class="user-avatar">
                    <div class="movie-info">
                        <img src="https://image.tmdb.org/t/p/w500/1E5baAaEse26fej7uHcjOgEE2t2.jpg" alt="Avengers: Endgame" class="movie-poster">
                        <span class="movie-title">Avengers: Endgame</span>
                    </div>
                </div>
                <h2 class="thread-title">[SPOILER] Phân tích chi tiết về cái kết của Avengers: Endgame</h2>
                <p class="thread-content">
                    Sau khi xem xong Avengers: Endgame, mình có một số phân tích về cái kết của phim và cách nó ảnh hưởng đến vũ trụ Marvel trong tương lai. Đây là những suy nghĩ cá nhân của mình...
                </p>
                <div class="thread-footer">
                    <div class="thread-stats">
                        <span class="stat-item">
                            <i class="fas fa-comment"></i>
                            128
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-heart"></i>
                            256
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-clock"></i>
                            2 giờ trước
                        </span>
                    </div>
                    <div class="thread-tags">
                        <span class="tag">#phimhay</span>
                        <span class="tag">#spoiler</span>
                        <span class="tag">#marvel</span>
                    </div>
                </div>
            </article>

            <!-- Thread 2 -->
            <article class="thread-card">
                <div class="thread-header">
                    <img src="https://i.pravatar.cc/150?img=2" alt="User Avatar" class="user-avatar">
                    <div class="movie-info">
                        <img src="https://image.tmdb.org/t/p/w500/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg" alt="Oppenheimer" class="movie-poster">
                        <span class="movie-title">Oppenheimer</span>
                    </div>
                </div>
                <h2 class="thread-title">Review: Oppenheimer - Kiệt tác điện ảnh của Christopher Nolan</h2>
                <p class="thread-content">
                    Oppenheimer là một bộ phim đầy tham vọng của Christopher Nolan, kể về câu chuyện của "cha đẻ bom nguyên tử". Với diễn xuất xuất sắc của Cillian Murphy và kỹ thuật quay phim ấn tượng...
                </p>
                <div class="thread-footer">
                    <div class="thread-stats">
                        <span class="stat-item">
                            <i class="fas fa-comment"></i>
                            89
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-heart"></i>
                            156
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-clock"></i>
                            5 giờ trước
                        </span>
                    </div>
                    <div class="thread-tags">
                        <span class="tag">#review</span>
                        <span class="tag">#nolan</span>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Hot Movies -->
            <div class="sidebar-box">
                <h3 class="box-title">Phim đang thảo luận nhiều</h3>
                <div class="movie-carousel">
                    <div class="movie-item">
                        <img src="https://image.tmdb.org/t/p/w500/1E5baAaEse26fej7uHcjOgEE2t2.jpg" alt="Avengers: Endgame">
                        <div>128 bài</div>
                    </div>
                    <div class="movie-item">
                        <img src="https://image.tmdb.org/t/p/w500/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg" alt="Oppenheimer">
                        <div>89 bài</div>
                    </div>
                    <div class="movie-item">
                        <img src="https://image.tmdb.org/t/p/w500/ngl2FKBlU4fhbdsrtdom9LVLBXw.jpg" alt="Fast X">
                        <div>45 bài</div>
                    </div>
                </div>
            </div>

            <!-- Top Users -->
            <div class="sidebar-box">
                <h3 class="box-title">Top thành viên tích cực</h3>
                <div class="top-users">
                    <div class="user-item">
                        <img src="https://i.pravatar.cc/150?img=1" alt="User">
                        <div>
                            <div>Nguyễn Văn A</div>
                            <div style="color: #6B7280; font-size: 0.9rem;">128 bài viết</div>
                        </div>
                    </div>
                    <div class="user-item">
                        <img src="https://i.pravatar.cc/150?img=2" alt="User">
                        <div>
                            <div>Trần Thị B</div>
                            <div style="color: #6B7280; font-size: 0.9rem;">89 bài viết</div>
                        </div>
                    </div>
                    <div class="user-item">
                        <img src="https://i.pravatar.cc/150?img=3" alt="User">
                        <div>
                            <div>Lê Văn C</div>
                            <div style="color: #6B7280; font-size: 0.9rem;">45 bài viết</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hot Topics -->
            <div class="sidebar-box">
                <h3 class="box-title">Chủ đề hot</h3>
                <div class="hot-topics">
                    <span class="topic-tag">
                        <i class="fas fa-hashtag"></i>
                        Marvel
                        <span style="color: #6B7280;">(128)</span>
                    </span>
                    <span class="topic-tag">
                        <i class="fas fa-hashtag"></i>
                        Nolan
                        <span style="color: #6B7280;">(89)</span>
                    </span>
                    <span class="topic-tag">
                        <i class="fas fa-hashtag"></i>
                        Review
                        <span style="color: #6B7280;">(45)</span>
                    </span>
                </div>
            </div>

            <!-- Community Rules -->
            <div class="sidebar-box">
                <h3 class="box-title">Quy định cộng đồng</h3>
                <p style="color: #6B7280; margin-bottom: 1rem;">
                    Để xây dựng một cộng đồng lành mạnh, vui lòng tuân thủ các quy định của chúng tôi...
                </p>
                <a href="#" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">
                    Đọc thêm
                </a>
            </div>
        </aside>
    </main>

    <!-- FAB Button -->
    <a href="#" class="fab-button">
        <i class="fas fa-pen"></i>
    </a>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const sidebar = document.querySelector('.sidebar');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });
        }

        // Thread Card Click
        const threadCards = document.querySelectorAll('.thread-card');
        threadCards.forEach(card => {
            card.addEventListener('click', () => {
                // Add fade-in animation when navigating to thread detail
                document.body.style.opacity = '0';
                setTimeout(() => {
                    window.location.href = 'thread_detail.blade.php';
                }, 200);
            });
        });
    </script>
</body>
</html> 