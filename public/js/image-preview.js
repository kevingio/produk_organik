$(document).ready(function () {
    $('.instagram-image').on('click', function () {
        $('.navbar').css('position', 'static');
        $('#myModal').css('display', 'block');
        $('#image-preview').attr('src', $(this).attr('src'));
        $('#caption').text($(this).attr('alt'));
    });
    $('.close').on('click', function () {
        $('.navbar').css('position', 'sticky');
        $('#myModal').css('display', 'none');
    });
});
