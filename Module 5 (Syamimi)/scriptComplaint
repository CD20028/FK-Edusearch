// Sample complaint data
const complaints = [
    {
        id: 1,
        user_id: 123,
        expert_id: 456,
        complaint_type: "Unsatisfied Expert's Feedback",
        description: "Expert did not provide sufficient guidance.",
        status: "In Investigation"
    },
    {
        id: 2,
        user_id: 789,
        expert_id: 123,
        complaint_type: "Wrongly Assigned Research Area",
        description: "Assigned expert does not have expertise in the specified research area.",
        status: "Resolved"
    }
];

// Function to populate the complaint table
function populateComplaintTable() {
    const complaintTable = document.getElementById("complaintTable");

    complaints.forEach(complaint => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td>${complaint.id}</td>
            <td>${complaint.user_id}</td>
            <td>${complaint.expert_id}</td>
            <td>${complaint.complaint_type}</td>
            <td>${complaint.description}</td>
            <td>${complaint.status}</td>
            <td class="actions">
                <button onclick="viewComplaint(${complaint.id})">View</button>
                <button onclick="deleteComplaint(${complaint.id})">Delete</button>
            </td>
        `;

        complaintTable.querySelector("tbody").appendChild(row);
    });
}

// Function to handle the form submission
function handleFormSubmit(event) {
    event.preventDefault();

    const complaintForm = document.getElementById("complaintForm");

    // Get form values
    const user_id = complaintForm.user_id.value;
    const expert_id = complaintForm.expert_id.value;
    const complaint_type = complaintForm.complaint_type.value;
    const description = complaintForm.description.value;

    // Create new complaint object
    const newComplaint = {
        id: complaints.length + 1,
        user_id,
        expert_id,
        complaint_type,
        description,
        status: "In Investigation"
    };

    // Add new complaint to the complaints array
    complaints.push(newComplaint);

    // Clear the form fields
    complaintForm.reset();

    // Reset the complaint table
    const complaintTableBody = document.getElementById("complaintTable").querySelector("tbody");
    complaintTableBody.innerHTML = "";

    // Repopulate the complaint table
    populateComplaintTable();
}

// Function to view a complaint
function viewComplaint(id) {
    // Retrieve the complaint based on the ID and perform the necessary actions
    console.log("Viewing complaint:", id);
}

// Function to delete a complaint
function deleteComplaint(id) {
    // Retrieve the complaint based on the ID and perform the necessary actions
    console.log("Deleting complaint:", id);
}

// Populate the complaint table on page load
window.addEventListener("DOMContentLoaded", () => {
    populateComplaintTable();
});

// Attach the form submit event listener
const complaintForm = document.getElementById("complaintForm");
complaintForm.addEventListener("submit", handleFormSubmit);
