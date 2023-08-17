// script para esconder e mostrar a sidebar
const sidebar = document.getElementById('sidebar');

function toggleSidebar() {
    sidebar.style.left = sidebar.style.left === '-250px' ? '0' : '-250px';
} 