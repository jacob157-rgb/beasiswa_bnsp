$(document).ready(function() {
    $('.nav-link').on('click', function(e) {
        e.preventDefault(); // Mencegah aksi default link
        $('.nav-link').removeClass('active'); // Menghapus class 'active' dari semua tab link
        $(this).addClass('active'); // Menambah class 'active' pada tab link yang diklik

        let target = $(this).attr('href');

        // Menghapus class 'd-none' hanya dari elemen div target
        $('.' + target).removeClass('d-none').addClass('active');

        // Menghilangkan class 'd-none' dari elemen div lainnya
        $('.tab-content > div').not('.' + target).addClass('d-none');
    });
});

function validatePassword() {
    const password = document.getElementById("registerPassword").value;
    const repeatPassword = document.getElementById("registerRepeatPassword").value;
    
    if (password !== repeatPassword) {
        alert("Passwords do not match. Please make sure passwords match.");
        return false;
    }
    return true;
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form[name='signupForm']").addEventListener("submit", function(event) {
        if (!validatePassword()) {
            event.preventDefault();
        }
    });
});