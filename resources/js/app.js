import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// === KODE JAVASCRIPT FINAL UNTUK ANIMASI (SUDAH DIPERBAIKI) ===

document.addEventListener('DOMContentLoaded', () => {

    // --- Fungsi untuk mengontrol animasi monster & ikon mata ---
    const setupPasswordAnimation = (formId) => {
        const form = document.querySelector(formId);
        if (!form) return;

        const passwordInput = form.querySelector('input[type="password"]');
        const toggleButton = form.querySelector('[id^="togglePassword"]');
        const eyeIcon = form.querySelector('[id^="eye-icon"]');
        // Monster berada di luar form, jadi kita cari di seluruh dokumen
        const monster = document.getElementById('monster') || document.getElementById('monster-reg');
        
        if (!passwordInput || !toggleButton || !eyeIcon || !monster) return;

        const hands = monster.querySelector('#hands') || monster.querySelector('#hands-reg');

        // Fungsi untuk menggerakkan tangan monster
        const openMonsterEyes = () => { if (hands) hands.style.transform = 'translateY(0px)'; };
        const closeMonsterEyes = () => { if (hands) hands.style.transform = 'translateY(-50px)'; };

        // Atur posisi awal monster: mata terbuka
        openMonsterEyes();

        // Saat ikon mata di-klik
        toggleButton.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.type === 'password';

            if (isPasswordHidden) {
                // Jika password akan ditampilkan:
                passwordInput.type = 'text';
                eyeIcon.classList.replace('bx-show', 'bx-hide');
                // Monster menutup mata
                closeMonsterEyes();
            } else {
                // Jika password akan disembunyikan:
                passwordInput.type = 'password';
                eyeIcon.classList.replace('bx-hide', 'bx-show');
                // Monster membuka mata
                openMonsterEyes();
            }
        });
    };

    // Terapkan fungsi pada form login dan register
    // Kita gunakan ID form untuk memastikan tidak ada konflik
    setupPasswordAnimation('form[action*="login"]');
    setupPasswordAnimation('form[action*="register"]');
});