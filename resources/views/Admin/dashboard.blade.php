<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Movie Ticket</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="admin-logo">SNEMA MANAGEMENT</div>
            <nav class="admin-nav">
                <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{ route('Admin.movies') }}"><i class="fas fa-film"></i> Quản lý phim</a>
                <a href="showtimes.html"><i class="fas fa-calendar-alt"></i>Suất chiếu</a>
                <a href="users.html"><i class="fas fa-users"></i>Người dùng</a>
                <a href="bookings.html"><i class="fas fa-ticket-alt"></i>Đơn đặt vé</a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="admin-content">
            <header class="admin-header">
                <h1>Dashboard</h1>
                <div class="admin-user">
                    <span>Xin chào, Quản trị viên {{ Auth::user()->name }}</span>
                    <a href="#" class="logout-btn"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Đăng xuất</button>
                    </form>
                </div>
            </header>

            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #4e73df;">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Tổng phim</h3>
                        <p id="totalMovies">{{ $movies }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #1cc88a;">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Vé đã bán</h3>
                        <p id="totalTickets">{{ $bookings }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #36b9cc;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Người dùng</h3>
                        <p id="totalUsers">{{ $customers }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #f6c23e;">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Doanh thu</h3>
                        <p id="totalRevenue">∞</p>
                    </div>
                </div>
            </div>

            <div class="admin-charts">
                <div class="chart-container">
                    <h3>Doanh thu theo tháng</h3>
                    <canvas id="revenueChart"></canvas>
                </div>
                <div class="chart-container">
                    <h3>Phim có doanh thu cao nhất</h3>
                    <canvas id="topMoviesChart"></canvas>
                </div>
            </div>
        </main>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>
