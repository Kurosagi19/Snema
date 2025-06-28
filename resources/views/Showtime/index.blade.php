<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý admin - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
<div class="admin-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.rooms') }}"><i class="fas fa-solid fa-house"></i> Quản lý phòng chiếu</a></li>
            <li><a href="{{ route('admin.movies') }}"><i class="fas fa-film"></i> Quản lý phim</a></li>
            <li><a href="#" class="active"><i class="fas fa-solid fa-clock"></i> Quản lý giờ chiếu</a></li>
            <li><a href=""><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
            <li><a href=""><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            <li><a href="{{ route('admin.bookings') }}"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
            <li><a href=""><i class="fas fa-users"></i> Quản lý người dùng</a></li>
            <li><a href="#" ><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Trang quản trị</h1>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-primary">
                    <i class="fas fa-sign-out"></i> Đăng xuất
                </button>
            </form>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Giờ bắt đầu</th>
                    <th>Giờ kết thúc</th>
                    <th>Giá cộng thêm theo giờ</th>
                    <th>Phim</th>
                    <th>Phòng chiếu</th>
                    <th>Rạp</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($showtimes as $showtime)
                    <tr>
                        <th scope="row">{{ $showtime -> id }}</th>
                        <td>{{ $showtime -> start_time }}</td>
                        <td>{{ $showtime -> end_time }}</td>
                        <td>{{ $showtime -> price }}</td>
                        <td>{{ $showtime->movie->title }}</td>
                        <td>{{ $showtime->room->room_number }}</td>
                        <td>{{ $showtime->room->cinema->name }} - {{ $showtime->room->cinema->location->location_name }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger">Xoá</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Phân trang -->
            <div class="d-flex justify-content-center">
                {{ $showtimes->links() }}
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
                    2025 © <a href="https://bkacad.edu.vn">BKACAD</a>. All rights reserved. Developed by <a
                        href="https://github.com/Kurosagi19">Kurosagi19</a> and <a
                        href="https://www.facebook.com/DPawsParrot">DPawsParrot.</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--	End Footer	-->

<!-- Add/Edit Admin Modal -->
<div id="adminModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal('admin')">&times;</span>
        <h2 style="margin-bottom: 1.5rem;">Thêm admin mới</h2>
        <form id="adminForm" onsubmit="handleFormSubmit(event, 'admin')">
            <div class="form-group">
                <label for="username">Tên admin</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Lưu thông tin</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
