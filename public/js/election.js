$(document).ready(function () {
    initPics();
});

function initPics() {
    var pic1Id = $('input#pic1Id').val();
    var pic2Id = $('input#pic2Id').val();
    // var loader = $('<div class="col-sm-12 text-center"><img id="loader" src="img/loading.GIF" /></div>');
    $('.pictureContainer').find("img#loader").remove();
    $('.pictureBox').fadeIn();
    $('#pic1Box').on('click', function (event) {
        event.preventDefault()
        // $('.pictureContainer').prepend(loader);
        $('.pictureBox').fadeOut(function () {
            saveInput(pic1Id, pic2Id);
        });
    });
    $('#pic2Box').on('click', function (event) {
        event.preventDefault()
        // $('.pictureContainer').append(loader);
        $('.pictureBox').fadeOut(function () {
            saveInput(pic2Id, pic1Id);
        });
    });
}

function saveInput(wonPicId, lostPicId) {
    var token = $('input[name="_token"]').val();

    $.ajax({
        url: "ajax/election",
        type: 'POST',
        cache: false,
        data: {
            _token: token,
            wonPicId: wonPicId,
            lostPicId: lostPicId
        },
        success: function (response) {
            $('.pictureBox').html($(response));

            initPics();
        },
        // error handling
        error: function (response, textStatus, errorThrown) {

        }
    });
}