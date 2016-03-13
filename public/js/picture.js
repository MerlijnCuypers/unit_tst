
$(document).ready(function () {
    $("input#picture").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('div#picUploadBox').find('img#examplePic').remove();
                $('div#picUploadBox').append($('<img class="col-xs-3" id="examplePic" src="' + e.target.result + '" />'));
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
});
