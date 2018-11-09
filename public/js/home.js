$(document).ready(function() {
    $('.green-panel').addClass('hidden').viewportChecker({
        classToAdd: 'visible animated slideInLeft',
        offset: 100
    });

    $('.benefit-box').addClass('hidden').viewportChecker({
        classToAdd: 'visible animated fadeInUpBig',
        offset: 100
    });

    $('.fadeIn').addClass('hidden').viewportChecker({
        classToAdd: 'visible animated fadeIn',
        offset: 100
    });

    $('.main').addClass('hidden').viewportChecker({
        classToAdd: 'visible animated zoomIn',
        offset: 100
    });

});
