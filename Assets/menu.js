'use strict'

// Selecting the menu icon and the menu container elements from the DOM
const menubar = document.querySelector(".menu-icon");
const navBar = document.querySelector(".menu-container");

// Adding a click event listener to the menu icon
menubar.addEventListener("click", () => {
  // Toggle the "active" class on the menu container, which controls its visibility or appearance
  navBar.classList.toggle("active");
});

// Get the modal
document.addEventListener("DOMContentLoaded", function() {
  // Tu código aquí
  if (document.getElementById("myModal")) {
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
});
  