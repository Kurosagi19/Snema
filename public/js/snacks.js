document.addEventListener('DOMContentLoaded', function () {
    const snackList = document.getElementById('snack-list');
    const totalEl = document.getElementById('snack-total');

    snackList.addEventListener('click', function (e) {
    const target = e.target;

    if (target.classList.contains('increase') || target.classList.contains('decrease')) {
    const container = target.closest('.snack-item');
    const input = container.querySelector('.quantity');
    const price = parseInt(container.dataset.price);
    let quantity = parseInt(input.value);

    if (target.classList.contains('increase')) {
    quantity++;
} else if (target.classList.contains('decrease') && quantity > 0) {
    quantity--;
}

    input.value = quantity;

    // Cập nhật tổng tiền
    updateTotal();
}
});

    function updateTotal() {
    let total = 0;
    document.querySelectorAll('.snack-item').forEach(item => {
    const qty = parseInt(item.querySelector('.quantity').value);
    const price = parseInt(item.dataset.price);
    total += qty * price;
});

    document.getElementById('snack-total').textContent = total.toLocaleString('vi-VN');
}
});
