let clicked = function (event, index) {
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

            if (response['data']['reports'].length > 0) {
                const container = document.getElementById('listTickets'); // Replace with your container element's selector
                container.innerHTML = "";

                response['data']['reports'].forEach(report => {
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
                        <a href="/Translizer/public/manager_ticketDetails/${report.Report_id}" class="btn view my-1">View Detials</a>
                        <a href="#" class="btn mark my-1" onclick="clicked(event, ${report.Report_id})">Mark as Resolved</a>
                      </div>
                      <div class="card-footer text-muted">
                        Submitted on: ${report.rep_date}
                      </div>
                    </div>
                  `;
                    container.appendChild(card);
                });
            } else {
                // Handle the case where the array is empty (optional)
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
};