document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('.menu-button');
    const closeButton = document.querySelector('.closebar');
    const sidebar = document.querySelector('.sidebar');

    if (menuButton && sidebar) {
        menuButton.addEventListener('click', function () {
            sidebar.classList.add('show');
        });
    }

    if (closeButton && sidebar) {
        closeButton.addEventListener('click', function () {
            sidebar.classList.remove('show');
        });
    }
});