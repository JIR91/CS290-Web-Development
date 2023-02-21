function toggleDropdown() {
    var dropdownContent = document.querySelector(".dropdown-content");
    dropdownContent.classList.toggle("show");
}

var dropdown = document.querySelector(".dropdown");
dropdown.addEventListener("click", toggleDropdown);

dropdown.addEventListener("mouseleave", function() {
    if (!dropdown.matches(":hover") && !dropdownContent.matches(":hover")) {
        toggleDropdown();
    }
});

var inputs = document.querySelectorAll(".dropdown-content input");

for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("focus", function(event) {
        event.stopPropagation();
    });
}
