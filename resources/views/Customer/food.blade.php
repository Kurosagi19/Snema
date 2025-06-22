<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snema - Đồ ăn & Giải trí</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        :root {
            --primary-color: #FFA500;
            --secondary-color: #F5F5F5;
            --accent-color: #FF0000;
            --text-color: #333;
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f9f9f9;
            padding-top: 60px;
        }

        /* Header Styles */
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header h1 {
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .category-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .category-tab {
            padding: 0.5rem 1rem;
            border: none;
            background: var(--secondary-color);
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-tab.active {
            background: var(--primary-color);
            color: white;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .search-bar input {
            flex: 1;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            outline: none;
        }

        .search-bar button {
            padding: 0.8rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            display: flex;
            gap: 2rem;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Filter Sidebar */
        .filter-sidebar {
            width: 30%;
            background: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .filter-section {
            margin-bottom: 1.5rem;
        }

        .filter-section h3 {
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .price-range {
            width: 100%;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .apply-filter {
            width: 100%;
            padding: 0.8rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            margin-top: 1rem;
        }

        /* Products Grid */
        .products-grid {
            width: 70%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.02);
        }

        .product-image {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            color: white;
            font-size: 0.8rem;
        }

        .badge-hot {
            background: var(--accent-color);
        }

        .badge-new {
            background: #4CAF50;
        }

        .product-info {
            padding: 1rem;
        }

        .product-name {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .original-price {
            text-decoration: line-through;
            color: #999;
        }

        .discount-price {
            color: var(--accent-color);
            font-size: 1.2rem;
            font-weight: bold;
        }

        .add-to-cart {
            width: 100%;
            padding: 0.8rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .add-to-cart:hover {
            background: #e69500;
        }

        /* Combo Card */
        .combo-card {
            grid-column: span 2;
            display: flex;
            gap: 1rem;
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 2px solid var(--primary-color);
        }

        .combo-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .combo-info {
            padding: 1rem;
            flex: 1;
        }

        .combo-items {
            display: flex;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .combo-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            background: var(--secondary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .savings {
            color: var(--accent-color);
            font-weight: bold;
        }

        /* Cart Mini */
        .cart-mini {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent-color);
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 50%;
            font-size: 0.8rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }

            .filter-sidebar {
                width: 100%;
                display: none;
            }

            .filter-sidebar.active {
                display: block;
            }

            .products-grid {
                width: 100%;
                grid-template-columns: repeat(2, 1fr);
            }

            .combo-card {
                grid-column: span 1;
                flex-direction: column;
            }

            .combo-image {
                width: 100%;
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .category-tabs {
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .category-tab {
                white-space: nowrap;
            }
        }

        /* Thêm CSS cho Navbar */
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
            gap: 1.5rem;
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

        /* Thêm CSS cho filter active */
        .filter-option input:checked + span {
            color: var(--primary-color);
            font-weight: bold;
        }

        /* Thêm CSS cho sản phẩm ẩn */
        .product-card.hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Thêm lại Navbar -->
    <header class="navbar">
        <div class="container">
            <a href="index.blade.php" class="logo">Snema</a>
            <nav>
                <a href="index.blade.php">Trang chủ</a>
                <a href="forum.blade.php">Diễn đàn</a>
                <a href="movies.blade.php">Phim</a>
                <a href="cinemas.blade.php">Rạp</a>
                <a href="food.blade.php" class="active">Đồ ăn</a>
                <a href="about.blade.php">Về chúng tôi</a>
                <a href="contact.blade.php">Liên hệ</a>
            </nav>
            <div class="auth-buttons">
                <a href="login.blade.php" class="login-btn">Đăng nhập</a>
                <a href="register.blade.php" class="register-btn">Đăng ký</a>
            </div>
        </div>
    </header>

    <div class="header">
        <h1>🍿 Đồ Ăn & Giải Trí</h1>
        <div class="category-tabs">
            <button class="category-tab active">Tất cả</button>
            <button class="category-tab">Combo</button>
            <button class="category-tab">Đồ ăn</button>
            <button class="category-tab">Thức uống</button>
            <button class="category-tab">Đồ chơi</button>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Tìm món ăn...">
            <button><i class='bx bx-search'></i> Tìm kiếm</button>
        </div>
    </div>

    <div class="main-content">
        <div class="filter-sidebar">
            <div class="filter-section">
                <h3>Khoảng giá</h3>
                <input type="range" class="price-range" min="50000" max="500000" step="10000">
                <div class="price-values">
                    <span>50.000đ</span> - <span>500.000đ</span>
                </div>
            </div>

            <div class="filter-section">
                <h3>Loại sản phẩm</h3>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox"> Đồ ngọt
                    </label>
                    <label class="filter-option">
                        <input type="checkbox"> Đồ mặn
                    </label>
                    <label class="filter-option">
                        <input type="checkbox"> Đồ uống
                    </label>
                    <label class="filter-option">
                        <input type="checkbox"> Đồ chơi
                    </label>
                </div>
            </div>

            <div class="filter-section">
                <h3>Sắp xếp theo</h3>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="radio" name="sort"> Bán chạy nhất
                    </label>
                    <label class="filter-option">
                        <input type="radio" name="sort"> Mới nhất
                    </label>
                    <label class="filter-option">
                        <input type="radio" name="sort"> Giá thấp đến cao
                    </label>
                </div>
            </div>

            <button class="apply-filter">Áp dụng</button>
        </div>

        <div class="products-grid">
            <!-- Combo -->
            <div class="combo-card" data-category="combo">
                <img src="https://example.com/combo1.jpg" alt="Combo Gia Đình" class="combo-image">
                <div class="combo-info">
                    <h3 class="product-name">Combo Gia Đình</h3>
                    <div class="combo-items">
                        <span class="combo-item">🍿 Bắp lớn</span>
                        <span class="combo-item">🥤 Pepsi M</span>
                        <span class="combo-item">🍫 Snickers</span>
                    </div>
                    <div class="product-price">
                        <span class="original-price">250.000đ</span>
                        <span class="discount-price">199.000đ</span>
                    </div>
                    <p class="savings">Tiết kiệm: 51.000đ (20%)</p>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <!-- Đồ ăn -->
            <div class="product-card" data-category="food">
                <img src="https://example.com/popcorn.jpg" alt="Bắp rang" class="product-image">
                <span class="product-badge badge-hot">Bán chạy</span>
                <div class="product-info">
                    <h3 class="product-name">Bắp rang bơ</h3>
                    <p class="product-description">Bắp ngọt size lớn</p>
                    <div class="product-price">
                        <span class="original-price">85.000đ</span>
                        <span class="discount-price">65.000đ</span>
                    </div>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <div class="product-card" data-category="food">
                <img src="https://example.com/hotdog.jpg" alt="Hotdog" class="product-image">
                <span class="product-badge badge-new">Mới</span>
                <div class="product-info">
                    <h3 class="product-name">Hotdog</h3>
                    <p class="product-description">Xúc xích Đức với sốt đặc biệt</p>
                    <div class="product-price">
                        <span class="discount-price">45.000đ</span>
                    </div>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <!-- Thức uống -->
            <div class="product-card" data-category="drink">
                <img src="https://example.com/pepsi.jpg" alt="Pepsi" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Pepsi</h3>
                    <p class="product-description">Size M</p>
                    <div class="product-price">
                        <span class="discount-price">25.000đ</span>
                    </div>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <div class="product-card" data-category="drink">
                <img src="https://example.com/coca.jpg" alt="Coca Cola" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Coca Cola</h3>
                    <p class="product-description">Size L</p>
                    <div class="product-price">
                        <span class="discount-price">30.000đ</span>
                    </div>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <!-- Đồ chơi -->
            <div class="product-card" data-category="toy">
                <img src="https://example.com/toy1.jpg" alt="Đồ chơi" class="product-image">
                <span class="product-badge badge-hot">Bán chạy</span>
                <div class="product-info">
                    <h3 class="product-name">Gấu bông</h3>
                    <p class="product-description">Gấu bông nhân vật phim</p>
                    <div class="product-price">
                        <span class="discount-price">150.000đ</span>
                    </div>
                    <button class="add-to-cart">+ Thêm vào giỏ</button>
                </div>
            </div>

            <!-- Thêm các sản phẩm khác tương tự -->
        </div>
    </div>

    <div class="cart-mini">
        <i class='bx bx-cart'></i>
        <span class="cart-count">0</span>
    </div>

    <script>
        // Toggle filter sidebar on mobile
        const filterBtn = document.createElement('button');
        filterBtn.className = 'filter-toggle';
        filterBtn.innerHTML = '<i class="bx bx-filter"></i>';
        document.querySelector('.header').appendChild(filterBtn);

        filterBtn.addEventListener('click', () => {
            document.querySelector('.filter-sidebar').classList.toggle('active');
        });

        // Category tabs
        const tabs = document.querySelectorAll('.category-tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });

        // Price range slider
        const priceRange = document.querySelector('.price-range');
        const priceValues = document.querySelector('.price-values');
        
        priceRange.addEventListener('input', (e) => {
            const value = e.target.value;
            priceValues.children[1].textContent = `${value.toLocaleString()}đ`;
        });

        // Add to cart animation
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        const cartCount = document.querySelector('.cart-count');
        let count = 0;

        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                count++;
                cartCount.textContent = count;
                
                // Add animation
                button.classList.add('added');
                setTimeout(() => button.classList.remove('added'), 1000);
            });
        });

        // Giữ nguyên script cũ và thêm script mới cho chức năng lọc
        document.addEventListener('DOMContentLoaded', function() {
            // Lọc theo category
            const categoryTabs = document.querySelectorAll('.category-tab');
            const products = document.querySelectorAll('.product-card, .combo-card');

            categoryTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const category = tab.textContent.toLowerCase();
                    
                    products.forEach(product => {
                        if (category === 'tất cả') {
                            product.classList.remove('hidden');
                        } else {
                            if (product.dataset.category === category) {
                                product.classList.remove('hidden');
                            } else {
                                product.classList.add('hidden');
                            }
                        }
                    });
                });
            });

            // Lọc theo giá
            const priceRange = document.querySelector('.price-range');
            const priceValues = document.querySelector('.price-values');
            
            priceRange.addEventListener('input', (e) => {
                const maxPrice = parseInt(e.target.value);
                priceValues.children[1].textContent = `${maxPrice.toLocaleString()}đ`;

                products.forEach(product => {
                    const price = parseInt(product.querySelector('.discount-price').textContent.replace(/[^\d]/g, ''));
                    if (price <= maxPrice) {
                        product.classList.remove('hidden');
                    } else {
                        product.classList.add('hidden');
                    }
                });
            });

            // Lọc theo loại sản phẩm
            const typeFilters = document.querySelectorAll('.filter-option input[type="checkbox"]');
            
            typeFilters.forEach(filter => {
                filter.addEventListener('change', () => {
                    const selectedTypes = Array.from(typeFilters)
                        .filter(f => f.checked)
                        .map(f => f.nextElementSibling.textContent.toLowerCase());

                    products.forEach(product => {
                        if (selectedTypes.length === 0) {
                            product.classList.remove('hidden');
                        } else {
                            const productType = product.dataset.category;
                            if (selectedTypes.includes(productType)) {
                                product.classList.remove('hidden');
                            } else {
                                product.classList.add('hidden');
                            }
                        }
                    });
                });
            });

            // Sắp xếp sản phẩm
            const sortOptions = document.querySelectorAll('.filter-option input[type="radio"]');
            
            sortOptions.forEach(option => {
                option.addEventListener('change', () => {
                    const sortType = option.nextElementSibling.textContent.toLowerCase();
                    const productsArray = Array.from(products);
                    const productsGrid = document.querySelector('.products-grid');

                    productsArray.sort((a, b) => {
                        const priceA = parseInt(a.querySelector('.discount-price').textContent.replace(/[^\d]/g, ''));
                        const priceB = parseInt(b.querySelector('.discount-price').textContent.replace(/[^\d]/g, ''));

                        switch(sortType) {
                            case 'giá thấp đến cao':
                                return priceA - priceB;
                            case 'giá cao đến thấp':
                                return priceB - priceA;
                            case 'bán chạy nhất':
                                return b.querySelector('.badge-hot') ? 1 : -1;
                            case 'mới nhất':
                                return b.querySelector('.badge-new') ? 1 : -1;
                            default:
                                return 0;
                        }
                    });

                    productsArray.forEach(product => {
                        productsGrid.appendChild(product);
                    });
                });
            });
        });
    </script>
</body>
</html> 