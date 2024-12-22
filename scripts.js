document.addEventListener('DOMContentLoaded', function() {
    const productos = document.querySelectorAll('.producto');
    productos.forEach(producto => {
        producto.addEventListener('click', function() {
            const productId = this.dataset.id;
            window.location.href = `producto.php?id=${productId}`;
        });
    });
});
