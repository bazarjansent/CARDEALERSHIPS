function validateRegisterForm() {
    const password = document.getElementById('password').value;
    const email = document.querySelector('input[name="email"]').value;
    const phone = document.querySelector('input[name="phone"]').value;

    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return false;
    }
    if (!email.includes('@')) {
        alert('Please enter a valid email address.');
        return false;
    }
    if (!/^\d{10}$/.test(phone)) {
        alert('Please enter a valid 10-digit phone number.');
        return false;
    }
    return true;
}

function validateLoginForm() {
    const email = document.querySelector('input[name="email"]').value;
    if (!email.includes('@')) {
        alert('Please enter a valid email address.');
        return false;
    }
    return true;
}

function searchCars() {
    const query = document.getElementById('search').value.toLowerCase();
    const cars = ['civic', 'accord', 'cr-v'];
    const results = cars.filter(car => car.includes(query));
    if (results.length > 0) {
        alert('Found: ' + results.join(', '));
    } else {
        alert('No cars found.');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const timelineItems = document.querySelectorAll('.timeline-item');
    timelineItems.forEach((item, index) => {
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 300);
    });
});
