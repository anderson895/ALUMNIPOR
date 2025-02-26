$(document).ready(function () {
    $('.campus-description').each(function () {
        var fullText = $(this).text();
        var maxLength = 150;

        if (fullText.length > maxLength) {
            var truncatedText = fullText.substring(0, maxLength) + '... ';
            var seeMore = $('<a href="#" class="see-more text-blue-500">See more</a>');

            $(this).html(truncatedText).append(seeMore);

            seeMore.on('click', function (e) {
                e.preventDefault();
                $(this).parent().text(fullText);
            });
        }
    });
});