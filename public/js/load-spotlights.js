$.ajax({
    url: '/spotlight/',
    type: 'GET',
    data: {count: 3},
    success: function (data) {
        var spotlights = JSON.parse(data);
        var content = '';
        if ($.isEmptyObject(spotlights)) {
            $('ul.spotlights').html('<li class="related-item"><h3>No Upcoming Entrance Exams</h3></li>');
        }
        else {
            $.each(spotlights, function (index, value) {
                content = content + '<li class="related-item">' +
                    '<h3><a href="/spotlight/' + value.slug + '">' + value.title + '</a></h3>' +
                    '</li>';
            });
            $('ul.spotlights').html(content);
        }
    }
});
