/**
 * Created by Sahil on 29-10-2015.
 */
var count = 10;
var initialLoaded = false;
var isLast = false;
var isWorking = true;
var type = "recent-questions";
    $.ajax({
        url: '/questions/',
        type: 'GET',
        data: {count: count, type: type},
        success: function (data) {
            data = JSON.parse(data);
            var mainPage = data.mainPage;
            if (data.last) {
                $('a.load-questions').hide();
                isLast = true;
            }
            if (mainPage.length) {
                $('div#' + type).html(mainPage);
            }
            else {
                $('div#' + type).html('<article class="question question-type-normal"><h2>No Questions Asked Yet</h2>');
            }
            initialLoaded = true;
        }
    });
    isWorking = false;
    $("li.tab").click(function (e) {
            isWorking = true;
            type = $(this).attr("id");
            $.ajax({
                url: '/questions/',
                type: 'GET',
                data: {count: count, type: type},
                success: function (data) {
                    data = JSON.parse(data);
                    var mainPage = data.mainPage;
                    if (data.last) {
                        $('a.load-questions').hide();
                        isLast = true;
                    }
                    if (mainPage.length) {
                            $('div#' + type).html(mainPage);
                    }
                    else {
                        $('div#' + type).append('<article class="question question-type-normal"><h2>No Questions Asked Yet</h2>');
                    }
                    isWorking = false;
                }
            });
        e.preventDefault();
    });
$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        var pageNo = $(this).data('link');
        if($(this).parent().hasClass('disabled')==false) {
            $.ajax({
                url: '/questions' + pageNo,
                type: 'GET',
                data: {count: count, type: type},
                success: function (data) {
                    data = JSON.parse(data);
                    var mainPage = data.mainPage;
                    if (data.last) {
                        $('a.load-questions').hide();
                        isLast = true;
                    }
                    if (mainPage.length) {
                        $('div#' + type).html(mainPage);
                    }
                    else {
                        $('div#' + type).append('<article class="question question-type-normal"><h2>No Questions Asked Yet</h2>');
                    }
                    isWorking = false;
                }
            });
            e.preventDefault();
        }
    });
});