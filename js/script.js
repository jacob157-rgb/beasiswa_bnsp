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
