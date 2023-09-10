// admin.js

// Function to show the selected content section
function showSection(sectionId) {
  // Hide all content sections
  const sections = document.querySelectorAll('.main_content section');
  sections.forEach(section => {
      section.style.display = 'none';
  });

  // Show the selected content section
  const selectedSection = document.getElementById(sectionId);
  if (selectedSection) {
      selectedSection.style.display = 'block';
  }
}

// Function to handle menu item clicks
function handleMenuItemClick(event, sectionId) {
  // Prevent default link behavior
  event.preventDefault();

  // Show the selected content section
  showSection(sectionId);
}

// Attach click event listeners to menu items
document.addEventListener('DOMContentLoaded', () => {
  const menuItems = document.querySelectorAll('.sidebar ul li a');
  menuItems.forEach(item => {
      const sectionId = item.getAttribute('data-section');
      item.addEventListener('click', event => handleMenuItemClick(event, sectionId));
  });
});


const addRoomBtn = document.getElementById("addRoomBtn");
const addRoomModal = document.getElementById("addRoomModal");

const closeModal = addRoomModal.querySelector(".close");

// Show the modal when the button is clicked
addRoomBtn.addEventListener("click", () => {
    addRoomModal.style.display = "block";
});



// Close the modal when the close button is clicked
closeModal.addEventListener("click", () => {
    addRoomModal.style.display = "none";
});

// Close the modal when clicking outside the modal content
window.addEventListener("click", (event) => {
    if (event.target === addRoomModal) {
        addRoomModal.style.display = "none";
    }
});

const editRoomButtons = document.querySelectorAll(".edit-room");
const editRoomModal = document.getElementById("editRoomModal");
const closeModaledit = editRoomModal.querySelector(".close");
// Add a click event listener to each "Edit" button
editRoomButtons.forEach((button) => {
    button.addEventListener("click", () => {
        // Get the room number from the data attribute
        const roomNumber = button.getAttribute("data-room-number");
        editRoomModal.style.display = "block";
        // Here, you can perform any actions related to editing the room with the roomNumber
        // For example, you can open a modal or send an AJAX request to the server for editing.

        // For demonstration purposes, let's show an alert:
        alert("Editing room number " + roomNumber);
    });
});

const closeButton = document.createElement("span");
closeButton.className = "close";
closeButton.innerHTML = "&times;"; // You can use HTML entity to display the "x" symbol

// Get a reference to the modal

// Get a reference to the modal content
const modalContent = editRoomModal.querySelector(".modal-content");

// Append the close button to the modal content
modalContent.appendChild(closeButton);

// Add an event listener to the close button to hide the modal when clicked
closeButton.addEventListener("click", () => {
    editRoomModal.style.display = "none";
});
function closeAlert(button) {
  const alert = button.closest('.alert');
  if (alert) {
      const section = alert.closest('section');
      alert.style.display = 'none';
      section.style.display = 'none'; // Close the section
  }
}

editRoomButtons.forEach((button) => {
  button.addEventListener("click", () => {
      // Get the room number from the data attribute
      const roomNumber = button.getAttribute("data-room-number");
      editRoomModal.style.display = "block";

      // Send an AJAX request to fetch data from the server
      fetch("edit.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({ roomNumber: roomNumber }),
      })
      .then((response) => response.json())
      .then((data) => {
          // Handle the data received from the server
          // You can populate your modal or do other actions here
          console.log(data); // Display the fetched data in the browser console for testing
      })
      .catch((error) => {
          console.error("Error fetching data:", error);
      });
  });
});








