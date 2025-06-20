// Dark mode toggle function
function toggleDarkMode() {
    fetch('/beeklplus/toggle-dark-mode', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Toggle dark mode class on body
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');

            // Update dark mode icon and text in dropdown menu
            const darkModeIcon = document.querySelector('#dropdownDarkModeToggle i');
            if (darkModeIcon) {
                darkModeIcon.className = `fas fa-${isDarkMode ? 'sun' : 'moon'} me-2`;
            }

            // Update dark mode text
            const darkModeText = document.querySelector('#dropdownDarkModeToggle span');
            if (darkModeText) {
                darkModeText.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error toggling dark mode');
    });
}

// Avatar frame selection function
function setAvatarFrame(frame) {
    fetch(`/beeklplus/set-avatar-frame/${frame}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Update all avatar frames on the page
            const avatarFrames = document.querySelectorAll('.avatar-frame');
            avatarFrames.forEach(frameElement => {
                // Remove existing frame classes
                frameElement.classList.remove('frame-gold', 'frame-diamond', 'frame-rainbow');
                // Add new frame class
                frameElement.classList.add(`frame-${frame}`);
            });

            // Hide frame submenu after selection
            const frameSubmenu = document.querySelector('.frame-submenu');
            if (frameSubmenu) {
                frameSubmenu.classList.add('d-none');
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error setting avatar frame');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Dark mode toggle click handler
    const darkModeToggle = document.getElementById('dropdownDarkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleDarkMode();
        });
    }

    // Frame toggle click handler
    const frameToggle = document.getElementById('dropdownFrameToggle');
    const frameSubmenu = document.getElementById('frameSubmenu');
    if (frameToggle && frameSubmenu) {
        frameToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (frameSubmenu.style.display === 'block') {
                frameSubmenu.style.display = 'none';
            } else {
                frameSubmenu.style.display = 'block';
            }
        });
    }

    // Close frame submenu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#dropdownFrameToggle') && !e.target.closest('#frameSubmenu')) {
            const frameSubmenu = document.getElementById('frameSubmenu');
            if (frameSubmenu && frameSubmenu.style.display === 'block') {
                frameSubmenu.style.display = 'none';
            }
        }
    });

    // Initialize dark mode state
    const isDarkMode = document.body.classList.contains('dark-mode');
    const darkModeIcon = document.querySelector('#dropdownDarkModeToggle i');
    const darkModeText = document.querySelector('#dropdownDarkModeToggle span');
    if (darkModeIcon && darkModeText) {
        darkModeIcon.className = isDarkMode ? 'fas fa-sun me-2' : 'fas fa-moon me-2';
        darkModeText.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';
    }
});
