function menuPlusMinus() {
    $('.plusMinus').click(function () {
        $(this).children().toggleClass("fa fa-plus-square").toggleClass("fa fa-minus-square");
    });
}