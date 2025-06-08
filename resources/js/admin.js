// admin.js - JavaScript cho khu vực quản trị

document.addEventListener('DOMContentLoaded', function() {
    // Chỉ chạy trong khu vực quản trị
    if (!document.querySelector('.admin-container')) return;

    // Xử lý menu active
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.admin-nav a');

    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href').split('/').pop();
        if (linkPage === currentPage) {
            link.classList.add('active');
        }
    });

    // Xử lý đăng xuất
    document.querySelector('.logout-btn') ? .addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
            window.location.href = '../login.html';
        }
    });

    // Khởi tạo biểu đồ nếu có trên trang
    if (document.getElementById('revenueChart')) {
        initCharts();
    }
});

// Khởi tạo biểu đồ
function initCharts() {
    // Biểu đồ doanh thu
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
            datasets: [{
                label: 'Doanh thu (triệu đồng)',
                data: [12, 19, 15, 22, 18, 25],
                backgroundColor: 'rgba(78, 115, 223, 0.5)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Biểu đồ phim có doanh thu cao nhất
    const topMoviesCtx = document.getElementById('topMoviesChart').getContext('2d');
    const topMoviesChart = new Chart(topMoviesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Avengers: Endgame', 'Spider-Man: No Way Home', 'The Batman', 'Dune', 'Black Panther'],
            datasets: [{
                data: [35, 25, 15, 10, 8],
                backgroundColor: [
                    'rgba(78, 115, 223, 0.8)',
                    'rgba(28, 200, 138, 0.8)',
                    'rgba(54, 185, 204, 0.8)',
                    'rgba(246, 194, 62, 0.8)',
                    'rgba(231, 74, 59, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}