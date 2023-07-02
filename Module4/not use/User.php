<div id="dashboard">
  <h2>User Dashboard</h2>
  <!-- Display user's activity summary and metrics -->
  <div id="activity-summary">
    <p>Total Posts: <span id="total-posts"></span></p>
    <p>Total Comments: <span id="total-comments"></span></p>
    <p>Total Likes: <span id="total-likes"></span></p>
    <p>Engagement Rate: <span id="engagement-rate"></span></p>
    <p>Retention Rate: <span id="retention-rate"></span></p>
    <p>User Satisfaction: <span id="user-satisfaction"></span></p>
  </div>
</div>

<div id="reports-list">
  <h2>Reports List</h2>
  <!-- Display a list of reports -->
  <ul id="reports">
    <!-- Reports will be dynamically added here -->
  </ul>
</div>

<div id="submit-report">
  <h2>Submit a Report</h2>
  <!-- Report submission form -->
  <form id="report-form">
    <label for="report-type">Report Type:</label>
    <select id="report-type">
      <option value="bug">Bug</option>
      <option value="inappropriate-content">Inappropriate Content</option>
      <option value="other">Other</option>
    </select>
    <label for="report-description">Description:</label>
    <textarea id="report-description" rows="4"></textarea>
    <button type="submit">Submit Report</button>
  </form>
</div>
