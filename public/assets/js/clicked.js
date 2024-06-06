// let clicked = function (event, index) {
//     const formData = new FormData();
//     formData.append('index', index);
//     $.ajax({
//         url: '/Translizer/public/close_ticket',
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: function (response) {

//           if (response['data']['reports'].length > 0 || response['data']['reports_closed'].length > 0) {
//             const container = document.getElementById('listTickets'); // Replace with your container element's selector
//             container.innerHTML = "";

//             response['data']['reports'].forEach(report => {
//                 const card = document.createElement('div');
//                 card.classList.add('col-sm-12', 'col-md-6', 'col-lg-4');
//                 card.innerHTML = `
//                 <div class="card shadow mb-4">
//                   <div class="card-header bg-light">
//                     <h5 class="card-title mb-0">Ticket #${report.Report_id}</h5>
//                   </div>
//                   <div class="card-body">
//                     <h6 class="card-subtitle mb-2 text-muted">Submitted by: ${report.username}</h6>
//                     <p class="card-text my-1">
//                       <strong>Document Language:</strong><br>
//                       ${report.language}
//                     </p>
//                     <p class="card-text my-1">
//                       <strong>Target Language:</strong><br>
//                       ${report.target_language}
//                     </p>
//                     <p class="card-text my-1">
//                       <strong>Document Length (Words):</strong><br>
//                       ${report.wordlen / 0.08}
//                     </p>
//                     <p class="card-text my-1">
//                       <strong>Is the Document Urgent?</strong><br>
//                       <td>${report.urgent === 1 ? 'Yes' : 'No'}</td>
//                     </p>

//                     <p class="card-text my-1">
//                     <strong>Status:</strong><br>
//                     <td>${report.status}</td>
//                   </p>
//                     <a href="/Translizer/public/manager_ticketDetails/${report.Report_id}" class="btn view">View Detials</a>
//                     <a href="#" class="btn mark" onclick="clicked(event, ${report.Report_id})">Mark as Resolved</a>
//                   </div>
//                   <div class="card-footer text-muted">
//                     Submitted on: ${report.rep_date}
//                   </div>
//                 </div>
//               `;
//                 container.appendChild(card);
//             });

//             response['data']['reports_closed'].forEach(report => {
//               const card = document.createElement('div');
//               card.classList.add('col-sm-12', 'col-md-6', 'col-lg-4');
//               card.innerHTML = `
//               <div class="card shadow mb-4">
//                 <div class="card-header bg-light">
//                   <h5 class="card-title mb-0">Ticket #${report.Report_id}</h5>
//                 </div>
//                 <div class="card-body">
//                   <h6 class="card-subtitle mb-2 text-muted">Submitted by: ${report.username}</h6>
//                   <p class="card-text my-1">
//                     <strong>Document Language:</strong><br>
//                     ${report.language}
//                   </p>
//                   <p class="card-text my-1">
//                     <strong>Target Language:</strong><br>
//                     ${report.target_language}
//                   </p>
//                   <p class="card-text my-1">
//                     <strong>Document Length (Words):</strong><br>
//                     ${report.wordlen / 0.08}
//                   </p>
//                   <p class="card-text my-1">
//                     <strong>Is the Document Urgent?</strong><br>
//                     <td>${report.urgent === 1 ? 'Yes' : 'No'}</td>
//                   </p>

//                   <p class="card-text my-1">
//                   <strong>Status:</strong><br>
//                   <td>${report.status}</td>
//                 </p>
//                   <a href="/Translizer/public/manager_ticketDetails/${report.Report_id}" class="btn view">View Detials</a>

//                 </div>
//                 <div class="card-footer text-muted">
//                   Submitted on: ${report.rep_date}
//                 </div>
//               </div>
//             `;
//               container.appendChild(card);
//           });
//             } else {
//                 // Handle the case where the array is empty (optional)
//                 const container = document.getElementById('listTickets');
//                 container.innerHTML = `<div class="col"><div class="card shadow mb-4 text-center" style="background-color: #f8f9fa;">
//                 <div class="card-body">
//                   <i class="fas fa-file-alt fa-4x mb-3" style="color: #888;"></i>
//                   <p class="card-text">No reports found.</p>
//                 </div>
//               </div></div>`;
//             }

//         },
//         error: function (xhr, status, error) {
//             console.error('Error:', status, error);
//         }
//     });
// };


$(document).ready(function () {
  let allReports = [];
  const itemsPerPage = 6;
  let currentPage = 1;

  function displayPage(page) {
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedItems = allReports.slice(start, end);

    const container = document.getElementById('listTickets');
    container.innerHTML = "";
    paginatedItems.forEach(cardHtml => {
      container.appendChild(cardHtml);
    });

    currentPage = page;
    updatePagination();
  }

  function updatePagination() {
    const totalPages = Math.ceil(allReports.length / itemsPerPage);
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

  function loadTickets() {
    $.ajax({
      url: '/Translizer/public/load_tickets',
      type: 'POST',
      data: 0,
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response['data']['reports'].length > 0 || response['data']['reports_closed'].length > 0) {
          allReports = [];
          response['data']['reports'].forEach(report => {
            allReports.push(createCard(report));
          });

          response['data']['reports_closed'].forEach(report => {
            allReports.push(createCard(report));
          });

          displayPage(1);
        } else {
          const container = document.getElementById('listTickets');
          container.innerHTML = `<div class="col"><div class="card shadow mb-4 text-center" style="background-color: #f8f9fa;">
                      <div class="card-body">
                        <i class="fas fa-file-alt fa-4x mb-3" style="color: #888;"></i>
                        <p class="card-text">No reports found.</p>
                      </div>
                    </div></div>`;
        }
      },
      error: function (xhr, status, error) {
        console.error('Error:', status, error);
      }
    });
  }

  function createCard(report) {
    let markAsResolvedButton = '';
    if (report.status.toLowerCase() !== 'closed') {
      markAsResolvedButton = `<a href="#" class="btn mark" onclick="clicked(event, ${report.Report_id})">Mark as Resolved</a>`;
    }

    const card = document.createElement('div');
    card.classList.add('col-sm-12', 'col-md-6', 'col-lg-4');
    card.innerHTML = `
          <div class="card shadow mb-4">
              <div class="card-header bg-light">
                  <h5 class="card-title mb-0">Ticket #${report.Report_id}</h5>
              </div>
              <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted">Submitted by: ${report.username}</h6>
                  <p class="card-text my-1">
                      <strong>Document Language:</strong><br>
                      ${report.language}
                  </p>
                  <p class="card-text my-1">
                      <strong>Target Language:</strong><br>
                      ${report.target_language}
                  </p>
                  <p class="card-text my-1">
                      <strong>Document Length (Words):</strong><br>
                      ${report.wordlen / 0.08}
                  </p>
                  <p class="card-text my-1">
                      <strong>Is the Document Urgent?</strong><br>
                      <td>${report.urgent === 1 ? 'Yes' : 'No'}</td>
                  </p>
                  <p class="card-text my-1">
                      <strong>Status:</strong><br>
                      <td>${report.status}</td>
                  </p>
                  <a href="/Translizer/public/manager_ticketDetails/${report.Report_id}" class="btn view">View Details</a>
                  ${markAsResolvedButton}
              </div>
              <div class="card-footer text-muted">
                  Submitted on: ${report.rep_date}
              </div>
          </div>
      `;
    return card;
  }

  window.clicked = function (event, index) {
    const formData = new FormData();
    formData.append('index', index);
    $.ajax({
      url: '/Translizer/public/close_ticket',
      type: 'POST',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status === 'success') {
          console.log('Ticket closed successfully:', response);
          allReports = [];
          response['data']['reports'].forEach(report => {
            allReports.push(createCard(report));
          });

          response['data']['reports_closed'].forEach(report => {
            allReports.push(createCard(report));
          });

          displayPage(1);
        } else {
          console.error('Failed to close the ticket:', response);
        }
      },
      error: function (xhr, status, error) {
        console.error('Error:', status, error);
        console.error(xhr.responseText);
      }
    });
  };

  loadTickets();
});
