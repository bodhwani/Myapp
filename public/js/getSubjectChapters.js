/**
 * Created by Sahil on 23-12-2015.
 */
var subject= $('#subject_id');
getChapter(subject.val());


subject.change(function (e) {
    getChapter($(this).val());
});

function getChapter(subjectID){
    var chapters = $('#chapter_id');

    chapters.empty();
    if(subjectID!="All") {
        $.ajax(
            {
                url: '/subjectsChapters',
                method: 'get',
                data: {'id': subjectID},
                success: function (data) {
                    $.each(data, function (key, value) {
                        /**
                         * To select question's chapter in edit view
                         */
                        if ($('#chapter').length) {
                            $('#chapter_id').find('option[value="' + $('#chapter').text() + '"]').prop('selected', true)
                        }

                        /**
                         * To select question's subject in edit view
                         */
                        if ($('#subject').length) {
                            $('#subject_id').find('option[value="' + $('#subject').text() + '"]').prop('selected', true)
                        }
                        chapters.append($("<option></option>").attr("value", key).text(value));
                    });
                }
            }
        );
    }
}