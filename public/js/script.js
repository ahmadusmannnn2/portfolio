/*===== menu icon navbar =====*/
let menuIcon = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

if (menuIcon) {
    menuIcon.onclick = () => {
        menuIcon.classList.toggle("bx-x");
        navbar.classList.toggle("active");
    };
}

/*===== scroll sections active link =====*/
let sections = document.querySelectorAll("section");
let navLinks = document.querySelectorAll("header nav a");

window.onscroll = () => {
    sections.forEach((sec) => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute("id");

        if (top >= offset && top < offset + height) {
            navLinks.forEach((links) => {
                links.classList.remove("active");
                if (document.querySelector("header nav a[href*=" + id + "]")) {
                    document.querySelector("header nav a[href*=" + id + "]").classList.add("active");
                }
            });
        }
    });

    let header = document.querySelector(".header");
    if (header) {
        header.classList.toggle("sticky", window.scrollY > 100);
    }

    let logo = document.querySelector('.logo');
    if (logo) {
        if (window.scrollY > 100) {
            logo.textContent = 'Ahmad Usman';
        } else {
            logo.textContent = 'Portfolio';
        }
    }

    if (menuIcon) {
        menuIcon.classList.remove("bx-x");
    }
    if (navbar) {
        navbar.classList.remove("active");
    }
};

/*===== scroll reveal =====*/
ScrollReveal({
    distance: "80px",
    duration: 2000,
    delay: 200,
});
ScrollReveal().reveal(".home-content, .heading", { origin: "top" });
ScrollReveal().reveal(".home-img img, .services-container, .portfolio-box, .contact form", { origin: "bottom" });
ScrollReveal().reveal(".home-content h1, .about-img img", { origin: "left" });
ScrollReveal().reveal(".home-content h3, .home-content p, .about-content", { origin: "right", });

/*===== typed js & filter js =====*/
document.addEventListener('DOMContentLoaded', function() {
    // Logika Typed.js
    const multipleTextSpan = document.querySelector('.multiple-text');
    if (multipleTextSpan) {
        const rolesString = multipleTextSpan.getAttribute('data-roles');
        if (rolesString) {
            const rolesArray = rolesString.split(',').map(role => role.trim());
            new Typed(".multiple-text", {
                strings: rolesArray,
                typeSpeed: 100,
                backSpeed: 100,
                backDelay: 1000,
                loop: true,
            });
        }
    }

    // === LOGIKA FILTER SEDERHANA (KEMBALI KE VERSI AWAL) ===
    const filterButtons = document.querySelectorAll('.portfolio-filter .btn');
    const portfolioItems = document.querySelectorAll('.portfolio-container .portfolio-box');

    if (filterButtons.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                const filterValue = button.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                        // Jika cocok, tampilkan
                        item.style.display = 'flex'; 
                    } else {
                        // Jika tidak cocok, sembunyikan
                        item.style.display = 'none'; 
                    }
                });
            });
        });
    }
});