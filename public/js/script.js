// Menunggu seluruh halaman HTML selesai dimuat sebelum menjalankan JavaScript
document.addEventListener('DOMContentLoaded', function() {

    /*===== menu icon navbar =====*/
    let menuIcon = document.querySelector("#menu-icon");
    let navbar = document.querySelector(".navbar");

    if (menuIcon) {
        menuIcon.onclick = () => {
            menuIcon.classList.toggle("bx-x");
            navbar.classList.toggle("active");
        };
    }

    /*===== scroll sections active link & sticky header =====*/
    let sections = document.querySelectorAll("section");
    let navLinks = document.querySelectorAll("header nav a");

    window.onscroll = () => {
        // Logika untuk menandai link navbar yang aktif
        let foundActive = false;
        sections.forEach((sec) => {
            let top = window.scrollY;
            let offset = sec.offsetTop - 150;
            let height = sec.offsetHeight;
            let id = sec.getAttribute("id");

            if (top >= offset && top < offset + height) {
                foundActive = true;
                navLinks.forEach((links) => {
                    links.classList.remove("active");
                    if (document.querySelector("header nav a[href*=" + id + "]")) {
                        document.querySelector("header nav a[href*=" + id + "]").classList.add("active");
                    }
                });
            }
        });

        // Jika tidak ada section yang aktif (misal di halaman sertifikat), aktifkan menu "Home"
        if (!foundActive && window.location.pathname === '/') {
             navLinks.forEach(link => link.classList.remove('active'));
             const homeLink = document.querySelector("header nav a[href*='#home']");
             if(homeLink) homeLink.classList.add('active');
        }


        // Logika untuk membuat header "sticky"
        let header = document.querySelector(".header");
        if (header) {
            header.classList.toggle("sticky", window.scrollY > 100);
        }

        // Logika untuk mengubah teks logo saat scroll
        let logo = document.querySelector('.logo');
        if (logo) {
            if (window.scrollY > 100) {
                logo.textContent = 'Ahmad Usman';
            } else {
                logo.textContent = 'Portfolio';
            }
        }

        // Logika untuk menutup menu mobile saat di-scroll
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

    /*===== typed js =====*/
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

    /*===== logika filter portfolio =====*/
    const filterButtons = document.querySelectorAll('.portfolio-filter .btn');
    const portfolioItems = document.querySelectorAll('.portfolio-container .portfolio-box');

    if (filterButtons.length > 0 && portfolioItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                const filterValue = button.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                        item.style.display = 'flex'; 
                    } else {
                        item.style.display = 'none'; 
                    }
                });
            });
        });
    }
});