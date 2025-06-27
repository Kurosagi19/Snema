<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thể loại - Admin Panel</title>
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
                <li><a href="index.blade.php"><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
                <li><a href="categories.blade.php" class="active"><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
                <li><a href="orders.blade.php"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li><a href="snacks.blade.php"><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Quản lý thể loại</h1>
                <button class="btn btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i> Thêm thể loại
                </button>
            </div>

            <div class="card-grid">
                <div class="card">
                    <div class="card-header">
                        <h3>Hành động</h3>
                        <div class="card-actions">
                            <button class="btn btn-info" onclick="openModal()">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Số phim: 15</p>
                        <p>Mô tả: Phim hành động với các cảnh đánh đấm gay cấn</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Hài hước</h3>
                        <div class="card-actions">
                            <button class="btn btn-info" onclick="openModal()">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Số phim: 12</p>
                        <p>Mô tả: Phim hài với các tình huống vui nhộn</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Tình cảm</h3>
                        <div class="card-actions">
                            <button class="btn btn-info" onclick="openModal()">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Số phim: 20</p>
                        <p>Mô tả: Phim tình cảm lãng mạn</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Kinh dị</h3>
                        <div class="card-actions">
                            <button class="btn btn-info" onclick="openModal()">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Số phim: 8</p>
                        <p>Mô tả: Phim kinh dị với các yếu tố ma quái</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add/Edit Category Modal -->
    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 style="margin-bottom: 1.5rem;">Thêm thể loại mới</h2>
            <form id="categoryForm">
                <div class="form-group">
                    <label for="categoryName">Tên thể loại</label>
                    <input type="text" id="categoryName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categoryDescription">Mô tả</label>
                    <textarea id="categoryDescription" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categoryIcon">Biểu tượng</label>
                    <select id="categoryIcon" class="form-control" required>
                        <option value="action">Hành động</option>
                        <option value="comedy">Hài hước</option>
                        <option value="romance">Tình cảm</option>
                        <option value="horror">Kinh dị</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Lưu thông tin</button>
            </form>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            document.getElementById('categoryModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('categoryModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('categoryModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Form submission
        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            closeModal();
        });
    </script>
</body>
</html>
