$(document).ready(function () {
    // Example data
    const cards = [];
    for (let i = 1; i <= 50; i++) {
        cards.push(`<div class="col-md-4"><div class="card"><div class="card-body">Card ${i}</div></div></div>`);
    }

    const itemsPerPage = 9;
    let currentPage = 1;

    function displayPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedItems = cards.slice(start, end);

        $('#listTickets').html(paginatedItems.join(''));
        currentPage = page;
        updatePagination();
    }

    function updatePagination() {
        const totalPages = Math.ceil(cards.length / itemsPerPage);
        let paginationHtml = '';

        if (currentPage > 1) {
            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a></li>`;
        }

        for (let i = 1; i <= totalPages; i++) {
            const activeClass = currentPage === i ? 'active' : '';
            paginationHtml += `<li class="page-item ${activeClass}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }

        if (currentPage < totalPages) {
            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">Next</a></li>`;
        }

        $('#pagination').html(paginationHtml);
    }

    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        displayPage(page);
    });

    // Initial display
    displayPage(1);
});