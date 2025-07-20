function showSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
    }
function hideSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
    }
    

const itemsPerPage = 18;
const items = document.querySelectorAll('.comicWall > a');
const totalPages = Math.ceil(items.length / itemsPerPage);
let currentPage = 1;

function showPage(page) {
    items.forEach((item, index) => {
        item.style.display = (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage)
            ? 'block' : 'none';
    });

    document.getElementById('pagination-info').textContent = `Page ${page} / ${totalPages}`;
}

function nextPage() {
    if (currentPage < totalPages) {
        currentPage++;
        showPage(currentPage);
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        showPage(currentPage);
    }
}

// Ajout des boutons de pagination
const pagination = document.createElement('div');
pagination.innerHTML = `
    <div class="pagination-controls">
        <button onclick="prevPage()">Précédent</button>
        <span id="pagination-info"></span>
        <button onclick="nextPage()">Suivant</button>
    </div>
`;
document.querySelector('.landing').appendChild(pagination);

showPage(currentPage);