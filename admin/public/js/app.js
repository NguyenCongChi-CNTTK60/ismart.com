$(document).ready(function() {
    $('.nav-link.active .sub-menu').slideDown();
    // $("p").slideUp();

    $('#sidebar-menu .arrow').click(function() {
        $(this).parents('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-angle-right fa-angle-down');
    });

    $("input[name='checkall']").click(function() {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });
});

$(document).ready(function() {
    var input = document.getElementById('show-detail-order');
    input.onclick = function() {
        alert('Xem chi tiết');
    };
});

$(document).ready(function() {
    var input = document.getElementById('hide-detail-order');
    input.onclick = function() {
        alert('Ẩn chi tiết');
    };
});