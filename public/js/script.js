document.addEventListener('DOMContentLoaded', function () {
    var dropdowns = document.querySelectorAll('.dropdown-submenu a.dropdown-toggle');
    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener('click', function (event) {
            var submenu = this.nextElementSibling;
            if (submenu.classList.contains('show')) {
                submenu.classList.remove('show');
            } else {
                // Close other open submenus
                document.querySelectorAll('.dropdown-menu .show').forEach(function (openMenu) {
                    openMenu.classList.remove('show');
                });
                submenu.classList.add('show');
            }
            event.stopPropagation();
            event.preventDefault();
        });
    });
});