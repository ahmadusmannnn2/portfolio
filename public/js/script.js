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

    /*===== sticky navbar =====*/
    let header = document.querySelector(".header");
    if (header) {
        header.classList.toggle("sticky", window.scrollY > 100);
    }

    /* ===== Ubah Logo Saat Scroll ===== */
    let logo = document.querySelector('.logo');
    if (logo) {
        if (window.scrollY > 100) {
            logo.textContent = 'Ahmad Usman';
        } else {
            logo.textContent = 'Portfolio';
        }
    }

    /*===== remove menu icon navbar when click navbar link (scroll) =====*/
    if (menuIcon) {
        menuIcon.classList.remove("bx-x");
    }
    if (navbar) {
        navbar.classList.remove("active");
    }
};

/*===== dark light mode =====*/
let darkModeIcon = document.querySelector("#darkMode-icon");

if (darkModeIcon) {
    // Cek preferensi tema dari local storage
    if (localStorage.getItem("theme") === "dark") {
        darkModeIcon.classList.add("bx-sun");
        document.body.classList.add("dark-mode");
    }

    darkModeIcon.onclick = () => {
        darkModeIcon.classList.toggle("bx-sun");
        document.body.classList.toggle("dark-mode");

        // Simpan preferensi tema
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    };
}


/*===== scroll reveal =====*/
ScrollReveal({
    distance: "80px",
    duration: 2000,
    delay: 200,
});

ScrollReveal().reveal(".home-content, .heading", { origin: "top" });
ScrollReveal().reveal(".home-img img, .services-container, .portfolio-box, .testimonial-wrapper, .contact form", { origin: "bottom" });
ScrollReveal().reveal(".home-content h1, .about-img img", { origin: "left" });
ScrollReveal().reveal(".home-content h3, .home-content p, .about-content", { origin: "right" });


// =================================================================
// === KODE UNTUK TYPED JS YANG DIPERBAIKI ===
// =================================================================
document.addEventListener('DOMContentLoaded', function() {
    const multipleTextSpan = document.querySelector('.multiple-text');
    if (multipleTextSpan) {
        const rolesString = multipleTextSpan.getAttribute('data-roles');
        // Memastikan ada data sebelum dipecah
        if (rolesString) {
            // Memecah string dari admin menjadi array yang bisa dibaca Typed.js
            const rolesArray = rolesString.split(',').map(role => role.trim());

            new Typed(".multiple-text", {
                strings: rolesArray, // Menggunakan array yang sudah dipecah
                typeSpeed: 100,
                backSpeed: 100,
                backDelay: 1000,
                loop: true,
            });
        }
    }
});