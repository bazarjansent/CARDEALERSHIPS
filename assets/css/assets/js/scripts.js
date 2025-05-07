/**
 * Honda Dealership Website - JavaScript Functions
 * This file contains all client-side functionality for the Honda Dealership website
 */

// Form Validation Functions
function validateLoginForm() {
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    
    if (!isValidEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }
    
    if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
        return false;
    }
    
    return true;
}

function validateRegisterForm() {
    const fullname = document.querySelector('input[name="fullname"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const phone = document.querySelector('input[name="phone"]').value;
    
    if (fullname.trim().length < 2) {
        alert('Please enter your full name.');
        return false;
    }
    
    if (!isValidEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }
    
    if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
        return false;
    }
    
    if (!isValidPhone(phone)) {
        alert('Please enter a valid phone number.');
        return false;
    }
    
    return true;
}

// Helper Functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^\d{10,15}$/;
    return phoneRegex.test(phone.replace(/[^0-9]/g, ''));
}

// Search Functionality
function searchCars() {
    const searchTerm = document.getElementById('search').value.trim().toLowerCase();
    
    if (searchTerm.length < 2) {
        alert('Please enter at least 2 characters to search.');
        return;
    }
    
    // In a real application, this would likely make an AJAX request to a server endpoint
    // For demonstration purposes, we'll just redirect to a URL with a query parameter
    window.location.href = `services.php?search=${encodeURIComponent(searchTerm)}`;
}

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener for search input (Enter key)
    const searchInput = document.getElementById('search');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                searchCars();
            }
        });
    }
    
    // Initialize timeline animation if it exists on the page
    const timeline = document.querySelector('.timeline');
    if (timeline) {
        initializeTimeline();
    }
});

// Timeline Animation for About Page
function initializeTimeline() {
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    timelineItems.forEach(item => {
        // When the item becomes visible in the viewport, add a class to animate it
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    item.classList.add('visible');
                    observer.unobserve(item);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(item);
    });
}

// Mobile Navigation Toggle
const mobileMenuButton = document.querySelector('.mobile-menu-button');
if (mobileMenuButton) {
    mobileMenuButton.addEventListener('click', function() {
        const nav = document.querySelector('nav ul');
        nav.classList.toggle('show');
    });
}
