let header = document.querySelector("header");

window.addEventListener("scroll", () => {
    header.classList.toggle("shadow", window.scrollY > 0)
})

//Filter
$(document).ready(function() {
    $(".filter-item").click(function() {
        const value = $(this).attr("data-filter");
        if (value == "all") {
            $(".post-box").show("1000")
        } else {
            $(".post-box")
                .not("." + value)
                .hide(1000);
            $(".post-box")
                .filter("." + value)
                .show("1000")
        }
    });
    $(".filter-item").click(function() {
        $(this).addClass("active-filter").siblings().removeClass("active-filter")
    });
    $(".invisible-content").hide();
    $(document).on('click', ".btn", function() {
        var moreLessButton = $(".invisible-content").is(":visible") ? 'Read More' : 'Read Less';
        $(this).text(moreLessButton);
        $(this).parent(".post-box").find(".invisible-content").toggle();
        $(this).parent(".post-box").find(".visible-content").toggle();
    });
});