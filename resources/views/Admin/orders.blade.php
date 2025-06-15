<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="movies.blade.php"><i class="fas fa-film"></i> Quản lý phim</a></li>
                <li><a href="users.blade.php"><i class="fas fa-users"></i> Quản lý người dùng</a></li>
                <li><a href="dashboard.blade.php"><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
                <li><a href="categories.blade.php"><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
                <li><a href="orders.blade.php" class="active"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li><a href="snacks.blade.php"><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Quản lý đơn hàng</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="filter-box">
                        <select class="form-control">
                            <option value="">Tất cả trạng thái</option>
                            <option value="pending">Chờ xác nhận</option>
                            <option value="confirmed">Đã xác nhận</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Khách hàng</th>
                            <th>Phim</th>
                            <th>Suất chiếu</th>
                            <th>Ghế</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD001</td>
                            <td>Nguyễn Văn A</td>
                            <td>Avengers: Endgame</td>
                            <td>20:00 - 22/03/2024</td>
                            <td>A1, A2</td>
                            <td>320.000đ</td>
                            <td><span class="badge badge-success">Hoàn thành</span></td>
                            <td>20/03/2024</td>
                            <td>
                                <button class="btn btn-info" onclick="openModal()">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD002</td>
                            <td>Trần Thị B</td>
                            <td>Spider-Man: No Way Home</td>
                            <td>19:00 - 23/03/2024</td>
                            <td>B3, B4</td>
                            <td>320.000đ</td>
                            <td><span class="badge badge-warning">Chờ xác nhận</span></td>
                            <td>21/03/2024</td>
                            <td>
                                <button class="btn btn-info" onclick="openModal()">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="btn btn-outline-primary">Trước</button>
                <button class="btn btn-primary">1</button>
                <button class="btn btn-outline-primary">2</button>
                <button class="btn btn-outline-primary">3</button>
                <button class="btn btn-outline-primary">Sau</button>
            </div>
        </main>
    </div>

    <!-- Order Detail Modal -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 style="margin-bottom: 1.5rem;">Chi tiết đơn hàng #ORD001</h2>
            <div class="order-details">
                <div class="detail-group">
                    <h3>Thông tin khách hàng</h3>
                    <p><strong>Tên:</strong> Nguyễn Văn A</p>
                    <p><strong>Email:</strong> nguyenvana@email.com</p>
                    <p><strong>Số điện thoại:</strong> 0123456789</p>
                </div>
                <div class="detail-group">
                    <h3>Thông tin đặt vé</h3>
                    <p><strong>Phim:</strong> Avengers: Endgame</p>
                    <p><strong>Suất chiếu:</strong> 20:00 - 22/03/2024</p>
                    <p><strong>Rạp:</strong> CGV Aeon Mall</p>
                    <p><strong>Ghế:</strong> A1, A2</p>
                </div>
                <div class="detail-group">
                    <h3>Thông tin thanh toán</h3>
                    <p><strong>Tổng tiền:</strong> 320.000đ</p>
                    <p><strong>Phương thức:</strong> Chuyển khoản</p>
                    <p><strong>Trạng thái:</strong> <span class="badge badge-success">Hoàn thành</span></p>
                </div>
                <div class="detail-group">
                    <h3>Thao tác</h3>
                    <select class="form-control" style="margin-bottom: 1rem;">
                        <option value="pending">Chờ xác nhận</option>
                        <option value="confirmed">Đã xác nhận</option>
                        <option value="completed" selected>Hoàn thành</option>
                        <option value="cancelled">Đã hủy</option>
                    </select>
                    <button class="btn btn-primary" style="width: 100%;">Cập nhật trạng thái</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            document.getElementById('orderModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('orderModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('orderModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
