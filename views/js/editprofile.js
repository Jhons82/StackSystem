

function init() {

}

$(document).ready(function () {
    $.ajax({
        url: '../../controllers/usuario.php?op=show_user',
        type: 'GET',
        contentType: false,
        proccessData: false,
        success: function (response) {
            try {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    $('#usernameprofile').val(data.data.username);
                    $('#emailprofile').val(data.data.email);
                    $('#image').attr('src', data.data.image);
                    $('#country'). val(data.data.country);
                    $('#description').val(data.data.description);
                    $('#website').val(data.data.website);
                    $('#twitter').val(data.data.twitter);
                    $('#facebook').val(data.data.facebook);
                    $('#instagram').val(data.data.instagram);
                    $('#youtube').val(data.data.youtube);
                    $('#vimeo').val(data.data.vimeo);
                    $('#github').val(data.data.github);
                } else {
                    alert('Error: ' + data.message);
                }
            } catch (e) {
                alert('Error parsing response: ' + e.message);
            }
        },
        error: function (xhr, status, error) {
            alert('Error: ' + error);
        }

    });
});

init();