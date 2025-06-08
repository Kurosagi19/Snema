<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đồ ăn/Thức uống - Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <!-- ... -->
        </aside>

        <main class="admin-content">
            <header class="admin-header">
                <h1>Quản lý Đồ ăn/Thức uống</h1>
                <!-- ... -->
            </header>

            <div class="admin-tabs">
                <button class="tab-btn active" data-tab="foods">Đồ ăn</button>
                <button class="tab-btn" data-tab="drinks">Thức uống</button>
            </div>

            <div class="admin-actions">
                <button class="add-btn" id="addFoodDrinkBtn">
                    <i class="fas fa-plus"></i> Thêm mới
                </button>
            </div>

            <!-- Tab Đồ ăn -->
            <div class="tab-content active" id="foodsTab">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>F001</td>
                            <td>Bắp rang bơ</td>
                            <td><img src="../images/food1.jpg" alt="Bắp rang bơ" class="table-img"></td>
                            <td>45,000 đ</td>
                            <td><span class="status active">Có sẵn</span></td>
                            <td>
                                <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Thêm các đồ ăn khác -->
                    </tbody>
                </table>
            </div>

            <!-- Tab Thức uống -->
            <div class="tab-content" id="drinksTab">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>D001</td>
                            <td>Coca Cola</td>
                            <td><img src="../images/drink1.jpg" alt="Coca Cola" class="table-img"></td>
                            <td>25,000 đ</td>
                            <td><span class="status active">Có sẵn</span></td>
                            <td>
                                <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Thêm các thức uống khác -->
                    </tbody>
                </table>
            </div>

            <!-- Modal thêm/sửa -->
            <div class="modal" id="foodDrinkModal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2 id="modalTitle">Thêm đồ ăn/thức uống</h2>
                    <form id="foodDrinkForm">
                        <input type="hidden" id="itemId">
                        <div class="form-group">
                            <label for="itemType">Loại:</label>
                            <select id="itemType" required>
                                <option value="food">Đồ ăn</option>
                                <option value="drink">Thức uống</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="itemName">Tên:</label>
                            <input type="text" id="itemName" required>
                        </div>
                        <div class="form-group">
                            <label for="itemPrice">Giá:</label>
                            <input type="number" id="itemPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="itemImage">Hình ảnh:</label>
                            <input type="file" id="itemImage">
                        </div>
                        <div class="form-group">
                            <label for="itemStatus">Trạng thái:</label>
                            <select id="itemStatus" required>
                                <option value="active">Có sẵn</option>
                                <option value="inactive">Hết hàng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="itemDesc">Mô tả:</label>
                            <textarea id="itemDesc" rows="3"></textarea>
                        </div>
                        <button type="submit" class="save-btn">Lưu</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="../js/admin.js"></script>
    <script>
        // Xử lý tab
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                document.getElementById(`${this.dataset.tab}Tab`).classList.add('active');
            });
        });

        // Xử lý modal
        const modal = document.getElementById('foodDrinkModal');
        const openModalBtn = document.getElementById('addFoodDrinkBtn');
        const closeBtn = document.querySelector('.close-btn');

        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'block';
            document.getElementById('modalTitle').textContent = 'Thêm đồ ăn/thức uống';
            document.getElementById('foodDrinkForm').reset();
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>

</html>