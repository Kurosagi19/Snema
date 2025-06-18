<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý admin - Admin Panel</title>
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
            <li><a href="{{ route('admin.movies') }}"><i class="fas fa-film"></i> Quản lý phim</a></li>
            <li><a href=""><i class="fas fa-tags"></i> Quản lý thể loại</a></li>
            <li><a href=""><i class="fas fa-cookie"></i> Quản lý snack</a></li>
            <li><a href=""><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
            <li><a href=""><i class="fas fa-users"></i> Quản lý người dùng</a></li>
            <li><a href="#" class="active"><i class="fas fa-user-shield"></i> Quản lý admin</a></li>
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

        <div class="page-header">
            <h1 class="page-title">Quản lý admin</h1>
            <button class="btn btn-primary" onclick="openModalWithData('admin')">
                <i class="fas fa-plus"></i> <a href="{{ route('admin.create') }}" style="color: white">Thêm admin</a>
            </button>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên admin</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{ $admin -> id }}</th>
                        <td>{{ $admin -> name }}</td>
                        <td>{{ $admin->email }}</td>

                        <td>
                            <a class="btn btn-warning btn-lg my-1" href=""><i
                                    class="fa-regular fa-pen-to-square fa-shake"></i></a>
                            <button type="button" class="btn btn-danger btn-lg my-1" data-bs-toggle="modal"
                                    data-bs-target="#myModal{{ $admin->id }}"><i
                                    class="fa-solid fa-dumpster fa-shake"></i></button>

                            {{--Modal--}}
                            <div class="modal fade" id="myModal{{ $admin->id }}">
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
                                                <form method="post" action="{{ route('Movies.destroy', $admin->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Có</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
{{--<script>--}}
{{--    // Load danh sách admin--}}
{{--    async function loadAdmins() {--}}
{{--        try {--}}
{{--            const response = await fetch('/admin/admins/list');--}}
{{--            const admins = await response.json();--}}
{{--            const tbody = document.querySelector('.table tbody');--}}
{{--            tbody.innerHTML = '';--}}

{{--            admins.forEach(admin => {--}}
{{--                const tr = document.createElement('tr');--}}
{{--                tr.innerHTML = `--}}
{{--                        <td>${admin.id}</td>--}}
{{--                        <td>--}}
{{--                            <img src="${admin.avatar || '../images/default-avatar.jpg'}" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%;">--}}
{{--                        </td>--}}
{{--                        <td>${admin.username}</td>--}}
{{--                        <td>${admin.email}</td>--}}
{{--                        <td>--}}
{{--                            <span class="badge badge-${getRoleBadgeClass(admin.role)}">--}}
{{--                                ${getRoleName(admin.role)}--}}
{{--                            </span>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <span class="badge badge-${admin.status === 'active' ? 'success' : 'warning'}">--}}
{{--                                ${admin.status === 'active' ? 'Hoạt động' : 'Tạm khóa'}--}}
{{--                            </span>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <button class="btn btn-info" onclick="openModalWithData('admin', ${JSON.stringify(admin)})">--}}
{{--                                <i class="fas fa-edit"></i>--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-danger" onclick="handleDelete('admin', ${admin.id})">--}}
{{--                                <i class="fas fa-trash"></i>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    `;--}}
{{--                tbody.appendChild(tr);--}}
{{--            });--}}
{{--        } catch (error) {--}}
{{--            console.error('Lỗi tải danh sách admin:', error);--}}
{{--        }--}}
{{--    }--}}

{{--    // Hàm lấy tên vai trò--}}
{{--    function getRoleName(role) {--}}
{{--        const roles = {--}}
{{--            'super': 'Super Admin',--}}
{{--            'content': 'Content Manager',--}}
{{--            'support': 'Support Admin'--}}
{{--        };--}}
{{--        return roles[role] || role;--}}
{{--    }--}}

{{--    // Hàm lấy class badge cho vai trò--}}
{{--    function getRoleBadgeClass(role) {--}}
{{--        const classes = {--}}
{{--            'super': 'danger',--}}
{{--            'content': 'warning',--}}
{{--            'support': 'info'--}}
{{--        };--}}
{{--        return classes[role] || 'secondary';--}}
{{--    }--}}

{{--    // Khởi tạo trang--}}
{{--    document.addEventListener('DOMContentLoaded', () => {--}}
{{--        loadAdmins();--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
