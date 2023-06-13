// Sample report data
const reports = [
    {
      date: '2023-06-01',
      reportId: 'R001',
      userId: 'U001',
      title: 'Inappropriate Content',
      type: 'Content',
      description: 'This post contains offensive language.',
      reportProcess: 'In Investigation'
    },
    {
      date: '2023-06-02',
      reportId: 'R002',
      userId: 'U002',
      title: 'Spam',
      type: 'Content',
      description: 'This post is spamming the forum.',
      reportProcess: 'Resolved'
    }
  ];
  
  // Function to populate the report table
  function populateReportTable() {
    const reportTable = document.getElementById('report-table');
    const tbody = reportTable.getElementsByTagName('tbody')[0];
    tbody.innerHTML = ''; // Clear existing rows
    
    reports.forEach((report) => {
      const row = tbody.insertRow();
      
      const dateCell = row.insertCell();
      dateCell.textContent = report.date;
      
      const reportIdCell = row.insertCell();
      reportIdCell.textContent = report.reportId;
      
      const userIdCell = row.insertCell();
      userIdCell.textContent = report.userId;
      
      const titleCell = row.insertCell();
      titleCell.textContent = report.title;
      
      const typeCell = row.insertCell();
      typeCell.textContent = report.type;
      
      const descriptionCell = row.insertCell();
      descriptionCell.textContent = report.description;
      
      const processCell = row.insertCell();
      processCell.textContent = report.reportProcess;
      
      const editCell = row.insertCell();
      const editButton = document.createElement('button');
      editButton.textContent = 'Edit';
      editButton.addEventListener('click', () => {
        // Handle edit functionality
        // You can prompt the admin for edits or open a modal
        // with a form for editing the report details
      });
      editCell.appendChild(editButton);
      
      const deleteCell = row.insertCell();
      const deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.addEventListener('click', () => {
        // Handle delete functionality
        // You can prompt the admin for confirmation before deleting the report
      });
      deleteCell.appendChild(deleteButton);
    });
  }
  
  // Call the function to populate the report table
  populateReportTable();
  