<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý snack - Admin Panel</title>
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
                <li><a href="categories.blade.php"><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
                <li><a href="orders.blade.php"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li><a href="snacks.blade.php" class="active"><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Quản lý snack</h1>
                <button class="btn btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i> Thêm snack
                </button>
            </div>

            <div class="card-grid">
                <div class="card">
                    <div class="card-image">
                        <img src="../images/snacks/popcorn.jpg" alt="Popcorn">
                    </div>
                    <div class="card-header">
                        <h3>Bắp rang bơ</h3>
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
                        <p class="price">45.000đ</p>
                        <p class="description">Bắp rang bơ thơm ngon, giòn rụm</p>
                        <p class="stock">Tồn kho: 100</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../images/snacks/coke.jpg" alt="Coke">
                    </div>
                    <div class="card-header">
                        <h3>Coca Cola</h3>
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
                        <p class="price">25.000đ</p>
                        <p class="description">Nước ngọt Coca Cola mát lạnh</p>
                        <p class="stock">Tồn kho: 150</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../images/snacks/hotdog.jpg" alt="Hotdog">
                    </div>
                    <div class="card-header">
                        <h3>Hotdog</h3>
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
                        <p class="price">35.000đ</p>
                        <p class="description">Hotdog thịt bò với sốt đặc biệt</p>
                        <p class="stock">Tồn kho: 50</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../images/snacks/nachos.jpg" alt="Nachos">
                    </div>
                    <div class="card-header">
                        <h3>Nachos</h3>
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
                        <p class="price">55.000đ</p>
                        <p class="description">Nachos phô mai cay</p>
                        <p class="stock">Tồn kho: 75</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add/Edit Snack Modal -->
    <div id="snackModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 style="margin-bottom: 1.5rem;">Thêm snack mới</h2>
            <form id="snackForm">
                <div class="form-group">
                    <label for="snackName">Tên snack</label>
                    <input type="text" id="snackName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="snackPrice">Giá (VNĐ)</label>
                    <input type="number" id="snackPrice" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="snackDescription">Mô tả</label>
                    <textarea id="snackDescription" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="snackStock">Số lượng tồn kho</label>
                    <input type="number" id="snackStock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="snackImage">Hình ảnh</label>
                    <input type="file" id="snackImage" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Lưu thông tin</button>
            </form>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            document.getElementById('snackModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('snackModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('snackModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Form submission
        document.getElementById('snackForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            closeModal();
        });
    </script>
</body>
</html>
