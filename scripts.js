// Sample report data (replace with actual data from backend or database)
const reports = [
  {
    date: '2023-06-15',
    reportId: 'R001',
    userId: 'U001',
    title: 'Inappropriate Content',
    type: 'Content',
    description: 'A user posted offensive content.',
    reportProcess: 'InInvestigation',
  },
  {
    date: '2023-06-14',
    reportId: 'R002',
    userId: 'U002',
    title: 'Harassment',
    type: 'Behavior',
    description: 'A user is harassing others.',
    reportProcess: 'Resolved',
  },
  // Add more sample report objects
];

// Function to filter reports by a specific time frame (day, week, month)
function filterReportsByTimeFrame(timeFrame) {
  const currentDate = new Date();
  let startDate;

  if (timeFrame === 'day') {
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate());
  } else if (timeFrame === 'week') {
    const firstDayOfWeek = currentDate.getDate() - currentDate.getDay();
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), firstDayOfWeek);
  } else if (timeFrame === 'month') {
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  }

  return reports.filter((report) => new Date(report.date) >= startDate);
}

// Function to populate the report table
function populateReportTable(timeFrame) {
  const filteredReports = filterReportsByTimeFrame(timeFrame);

  const reportTable = document.getElementById('report-table');
  const tbody = reportTable.getElementsByTagName('tbody')[0];
  tbody.innerHTML = ''; // Clear existing rows

  filteredReports.forEach((report) => {
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

// Function to populate the status table
function populateStatusTable() {
  const statusTable = document.getElementById('status-table');
  const tbody = statusTable.getElementsByTagName('tbody')[0];
  tbody.innerHTML = ''; // Clear existing rows

  reports.forEach((report) => {
    const row = tbody.insertRow();

    const reportIdCell = row.insertCell();
    reportIdCell.textContent = report.reportId;

    const statusCell = row.insertCell();
    const statusSelect = document.createElement('select');
    statusSelect.addEventListener('change', (event) => {
      const selectedStatus = event.target.value;
      // Handle status change and notify relevant users
    });
    const statusOptions = ['In Investigation', 'Resolved', 'On Hold'];
    statusOptions.forEach((option) => {
      const statusOption = document.createElement('option');
      statusOption.textContent = option;
      statusSelect.appendChild(statusOption);
    });
    statusSelect.value = report.reportProcess;
    statusCell.appendChild(statusSelect);
  });
}

// Function to perform calculations and display results
function performCalculation(timeFrame) {
  const filteredReports = filterReportsByTimeFrame(timeFrame);

  // Perform relevant calculations based on filtered report data
  const totalReports = filteredReports.length;
  const reportTypes = filteredReports.map((report) => report.type);
  const reportTypeCounts = {};
  reportTypes.forEach((type) => {
    reportTypeCounts[type] = (reportTypeCounts[type] || 0) + 1;
  });

  const calculationResult = document.getElementById('calculation-result');
  calculationResult.innerHTML = `
    <p>Total Reports: ${totalReports}</p>
    <p>Report Types:</p>
    <ul>
      ${Object.entries(reportTypeCounts)
        .map(([type, count]) => `<li>${type}: ${count}</li>`)
        .join('')}
    </ul>
    <p>Perform other calculations and display results here.</p>
  `;
}

// Function to handle time frame selection
function handleTimeFrameSelection() {
  const timeFrameSelect = document.getElementById('time-frame-select');
  const selectedTimeFrame = timeFrameSelect.value;

  // Populate report table, status table, and perform calculations based on the selected time frame
  populateReportTable(selectedTimeFrame);
  populateStatusTable();
  performCalculation(selectedTimeFrame);
}

// Add event listener for time frame selection
const timeFrameSelect = document.getElementById('time-frame-select');
timeFrameSelect.addEventListener('change', handleTimeFrameSelection);

// Initial population of report table, status table, and calculations based on the default time frame (day)
handleTimeFrameSelection();
// Function to handle post creation
function createPost(event) {
  event.preventDefault();

  const postTitleInput = document.getElementById('post-title');
  const postContentInput = document.getElementById('post-content');

  const postTitle = postTitleInput.value;
  const postContent = postContentInput.value;

  // Perform actions to create the post (e.g., send data to the server)
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'database.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Post created successfully!');
      postTitleInput.value = '';
      postContentInput.value = '';
    } else {
      alert('Error creating post. Please try again.');
    }
  };
  xhr.send(`action=createPost&title=${encodeURIComponent(postTitle)}&content=${encodeURIComponent(postContent)}`);


  postTitleInput.value = '';
  postContentInput.value = '';

  alert('Post created successfully!');
}

// Function to handle comment addition
function addComment(event) {
  event.preventDefault();

  const commentPostIdInput = document.getElementById('comment-post-id');
  const commentContentInput = document.getElementById('comment-content');

  const commentPostId = commentPostIdInput.value;
  const commentContent = commentContentInput.value;

  // Perform actions to add the comment (e.g., send data to the server)

  commentPostIdInput.value = '';
  commentContentInput.value = '';

  alert('Comment added successfully!');
}

// Function to handle like addition
function addLike(event) {
  event.preventDefault();

  const likePostIdInput = document.getElementById('like-post-id');

  const likePostId = likePostIdInput.value;

  // Perform actions to add the like (e.g., send data to the server)

  likePostIdInput.value = '';

  alert('Like added successfully!');
}

// Get the post form and add event listener
const postForm = document.getElementById('post-form');
postForm.addEventListener('submit', createPost);

// Get the comment form and add event listener
const commentForm = document.getElementById('comment-form');
commentForm.addEventListener('submit', addComment);

// Get the like form and add event listener
const likeForm = document.getElementById('like-form');
likeForm.addEventListener('submit', addLike);

// Function to handle post creation
function createPost(event) {
  event.preventDefault();

  const postTitleInput = document.getElementById('post-title');
  const postContentInput = document.getElementById('post-content');

  const postTitle = postTitleInput.value;
  const postContent = postContentInput.value;

  // Send an AJAX request to the server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'database.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200 && xhr.responseText === 'success') {
      alert('Post created successfully!');
      postTitleInput.value = '';
      postContentInput.value = '';
    } else {
      alert('Error creating post. Please try again.');
    }
  };
  xhr.send(`action=createPost&title=${encodeURIComponent(postTitle)}&content=${encodeURIComponent(postContent)}`);
}

// Function to handle comment addition
function addComment(event) {
  event.preventDefault();

  const commentPostIdInput = document.getElementById('comment-post-id');
  const commentContentInput = document.getElementById('comment-content');

  const postId = commentPostIdInput.value;
  const commentContent = commentContentInput.value;

  // Send an AJAX request to the server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'database.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200 && xhr.responseText === 'success') {
      alert('Comment added successfully!');
      commentPostIdInput.value = '';
      commentContentInput.value = '';
    } else {
      alert('Error adding comment. Please try again.');
    }
  };
  xhr.send(`action=addComment&postId=${encodeURIComponent(postId)}&content=${encodeURIComponent(commentContent)}`);
}

// Function to handle like addition
function addLike(event) {
  event.preventDefault();

  const likePostIdInput = document.getElementById('like-post-id');
  const postId = likePostIdInput.value;

  // Send an AJAX request to the server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'database.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200 && xhr.responseText === 'success') {
      alert('Like added successfully!');
      likePostIdInput.value = '';
    } else {
      alert('Error adding like. Please try again.');
    }
  };
  xhr.send(`action=addLike&postId=${encodeURIComponent(postId)}`);
}

// Add event listeners to form submissions
document.getElementById('post-form').addEventListener('submit', createPost);
document.getElementById('comment-form').addEventListener('submit', addComment);
document.getElementById('like-form').addEventListener('submit', addLike);
