<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch Reporting and Analytics</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>FK-Edusearch</h1>

  <div class="topnav">
    <a href="#manageC">Manage Complaints</a>
    <a class="active" href="#manageR">Manage Report</a>
    <a href="#manageE">Manage Experts</a>
    <a href="#manageR">Manage Role</a>
    <a href="#manageU">Manage User</a>
  </div>

  <div style="padding-right:16px">
    <h2>Manage Reports</h2>
    <div>
      <label for="time-frame-select">Time Frame:</label>
      <select id="time-frame-select">
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
      </select>
    </div>
    <table id="report-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Report ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Type</th>
          <th>Description</th>
          <th>Report Process</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <h2>Manage Status</h2>
    <table id="status-table">
      <thead>
        <tr>
          <th>Report ID</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <h2>Calculations</h2>s
    <div id="calculation-result"></div>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
