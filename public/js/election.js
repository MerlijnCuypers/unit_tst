$(document).ready(function () {
    initPics();
});

function initPics() {
    var pic1Id = $('input#pic1Id').val();
    var pic2Id = $('input#pic2Id').val();
    $('#pic1Box').on('click', function () {
        saveInput(pic1Id, pic2Id);
    });
    $('#pic2Box').on('click', function () {
        saveInput(pic2Id, pic1Id);
    });
}

function saveInput(wonPicId, lostPicId) {
    var token = $('input#_token').val();
    $.ajax({
        url: "election",
        type: 'POST',
        cache: false,
        data: {
            _token: token,
            wonPicId: wonPicId,
            lostPicId: lostPicId
        },
        success: function (response) {
            $('.pictureContainer').html($(response));
            initPics();
        },
        // error handling
        error: function (response, textStatus, errorThrown) {

        }
    });
}