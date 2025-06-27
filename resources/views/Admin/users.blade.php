<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - Admin Panel</title>
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
                <li><a href="users.blade.php" class="active"><i class="fas fa-users"></i> Quản lý người dùng</a></li>
                <li><a href="index.blade.php"><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
                <li><a href="categories.blade.php"><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
                <li><a href="orders.blade.php"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li><a href="snacks.blade.php"><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Quản lý người dùng</h1>
                <button class="btn btn-primary" onclick="openModalWithData('user')">
                    <i class="fas fa-plus"></i> Thêm người dùng
                </button>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Danh sách người dùng sẽ được thêm vào đây bằng JavaScript -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add/Edit User Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('user')">&times;</span>
            <h2 style="margin-bottom: 1.5rem;">Thêm người dùng mới</h2>
            <form id="userForm" onsubmit="handleFormSubmit(event, 'user')">
                <div class="form-group">
                    <label for="username">Tên người dùng</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh đại diện</label>
                    <input type="file" id="avatar" name="image" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" class="form-control">
                        <option value="active">Hoạt động</option>
                        <option value="inactive">Tạm khóa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Lưu thông tin</button>
            </form>
        </div>
    </div>

    <script src="../js/admin.js"></script>
    <script>
        // Load danh sách người dùng
        async function loadUsers() {
            try {
                const response = await fetch('/admin/users/list');
                const users = await response.json();
                const tbody = document.querySelector('.table tbody');
                tbody.innerHTML = '';

                users.forEach(user => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${user.id}</td>
                        <td>
                            <img src="${user.avatar || '../images/default-avatar.jpg'}" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%;">
                        </td>
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        <td>
                            <span class="badge badge-${user.status === 'active' ? 'success' : 'warning'}">
                                ${user.status === 'active' ? 'Hoạt động' : 'Tạm khóa'}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-info" onclick="openModalWithData('user', ${JSON.stringify(user)})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger" onclick="handleDelete('user', ${user.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            } catch (error) {
                console.error('Lỗi tải danh sách người dùng:', error);
            }
        }

        // Khởi tạo trang
        document.addEventListener('DOMContentLoaded', () => {
            loadUsers();
        });
    </script>
</body>
</html>
