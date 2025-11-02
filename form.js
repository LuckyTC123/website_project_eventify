
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission until validation is complete
    
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation
    
    if (name === "") {
        alert("Please enter your name.");
        return;
    }
    
    if (email === "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    
    if (message === "") {
        alert("Please enter your message.");
        return;
    }

    alert("Form submitted successfully!");
    this.submit(); // If all validations pass, submit the form
});

