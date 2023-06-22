// Sample data for demonstration
const activitySummary = {
  totalPosts: 10,
  totalComments: 5,
  totalLikes: 20,
  engagementRate: 75,
  retentionRate: 80,
  userSatisfaction: 4.5,
};

const reports = [
  { id: 1, type: "bug", description: "Issue with login functionality" },
  { id: 2, type: "inappropriate-content", description: "Offensive language used in a post" },
  { id: 3, type: "bug", description: "Error when uploading a file" },
];
// Function to auto-generate date and time
function generateDateTime() {
  var currentDateTime = new Date();
  var formattedDateTime = currentDateTime.toLocaleString();
  document.getElementById("postDateTime").value = formattedDateTime;
               }

// Call the function to generate date and time when the form is loaded
window.onload = generateDateTime;

// Update the user dashboard with activity summary data
document.getElementById("total-posts").textContent = activitySummary.totalPosts;
document.getElementById("total-comments").textContent = activitySummary.totalComments;
document.getElementById("total-likes").textContent = activitySummary.totalLikes;
document.getElementById("engagement-rate").textContent = activitySummary.engagementRate;
document.getElementById("retention-rate").textContent = activitySummary.retentionRate;
document.getElementById("user-satisfaction").textContent = activitySummary.userSatisfaction;

// Populate the reports list
const reportsList = document.getElementById("reports");
reports.forEach(report => {
  const li = document.createElement("li");
  li.innerHTML = `
    <span>Type: ${report.type}</span>
    <span>Description: ${report.description}</span>
  `;
  reportsList.appendChild(li);
});

// Handle report submission
const reportForm = document.getElementById("report-form");
reportForm.addEventListener("submit", e => {
  e.preventDefault();
  const reportType = document.getElementById("report-type").value;
  const reportDescription = document.getElementById("report-description").value;
  
  // Perform API call to submit the report to the backend
  // Include necessary createReport() function here
  createReport(reportType, reportDescription);
  
  // Clear form fields after submission
  reportForm.reset();
});
// Sample data for demonstration
const adminMetrics = {
  totalReports: 20,
};

const adminReports = [
  { id: 1, type: "bug", description: "Issue with login functionality" },
  { id: 2, type: "inappropriate-content", description: "Offensive language used in a post" },
  { id: 3, type: "bug", description: "Error when uploading a file" },
];

// Update the admin dashboard with metrics data
document.getElementById("total-reports").textContent = adminMetrics.totalReports;

// Populate the reports list
const adminReportsList = document.getElementById("admin-reports");
adminReports.forEach(report => {
  const li = document.createElement("li");
  li.innerHTML = `
    <span>Type: ${report.type}</span>
    <span>Description: ${report.description}</span>
    <button class="resolve-button" data-report-id="${report.id}">Resolve</button>
    <button class="hold-button" data-report-id="${report.id}">On Hold</button>
  `;
  adminReportsList.appendChild(li);
});

// Handle resolving a report
const resolveButtons = document.getElementsByClassName("resolve-button");
Array.from(resolveButtons).forEach(button => {
  button.addEventListener("click", () => {
    const reportId = button.getAttribute("data-report-id");
    
    // Perform API call to resolve the report in the backend
    // Include necessary resolveReport() function here
    resolveReport(reportId);
    
    // Remove the resolved report from the UI
    button.parentNode.remove();
  });
});

// Handle putting a report on hold
const holdButtons = document.getElementsByClassName("hold-button");
Array.from(holdButtons).forEach(button => {
  button.addEventListener("click", () => {
    const reportId = button.getAttribute("data-report-id");
    
    // Perform API call to put the report on hold in the backend
    // Include necessary putReportOnHold() function here
    putReportOnHold(reportId);
    
    // Update the status of the report in the UI
    button.textContent = "On Hold";
  });
});
