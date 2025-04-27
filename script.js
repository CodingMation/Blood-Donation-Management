
  const menuIcon = document.getElementById('menu-icon');
  const navLinks = document.getElementById('nav-links');
  const navLinkItems = document.querySelectorAll('.nav-link');

  // Toggle menu on click
  menuIcon.addEventListener('click', () => {
    navLinks.classList.toggle('show');
  });

  // Smooth Scroll without changing URL
  navLinkItems.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // Stop normal anchor behavior
      const targetId = this.getAttribute('data-target');
      const targetSection = document.getElementById(targetId);
      
      if (targetSection) {
        window.scrollTo({
          top: targetSection.offsetTop - 50, // Adjust if header sticky
          behavior: 'smooth'
        });
      }

      // Close menu after clicking (for mobile)
      navLinks.classList.remove('show');
    });
  });

const fCopyClaim = document.querySelector('.footer-cClaim');
const currYear = new Date().getFullYear();
fCopyClaim.innerHTML = `&copy; ${currYear} Blood Donation Management. All Rights Reserved.`;