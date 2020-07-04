/**
 * Show the file browse dialog
 */
document.querySelector('#choose-upload-button').addEventListener('click', () => {
    document.querySelector('#upload-file').click();
});

/**
 * When a new file is selected
 */
document.querySelector('#upload-file').addEventListener('change', function () {
    document.querySelector('#error-message').style.display = 'none';

    let file = this.files[0];
    let mime_types = ['image/jpeg', 'image/png'];

    // MIME type validation
    if (mime_types.indexOf(file.type) === -1) {
        document.querySelector('#error-message').style.display = 'block';
        document.querySelector('#error-message').innerText = 'Error: Only JPEG and PNG files allowed';
        return;
    }

    // Max 2 Mb allowed
    if (file.size > 2 * 1024 * 1024) {
        document.querySelector('#error-message').style.display = 'block';
        document.querySelector('#error-message').innerText = 'Error: Exceeded size 2MB';
        return;
    }

    document.querySelector('#upload-choose-container').style.display = 'none';
    document.querySelector('#upload-file-final-container').style.display = 'block';
    document.querySelector('#file-name').innerText = file.name;
});

/**
 * Cancel button event
 */
document.querySelector('#cancel-button').addEventListener('click', () => {
    document.querySelector('#error-message').style.display = 'none';
    document.querySelector('#upload-choose-container').style.display = 'block';
    document.querySelector('#upload-file-final-container').style.display = 'none';
    document.querySelector('#upload-file').setAttribute('value', '');
});

/**
 * Upload via AJAX
 */
document.querySelector('#upload-button').addEventListener('click', () => {

    /**
     * Prepare data for sending to the server
     */
    let data = new FormData();
    data.append("id", id);
    data.append("file", document.querySelector('#upload-file').files[0]);

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/upload`,
        data: data,
        method: 'POST',
        success: (response) => {
            console.log(JSON.parse(response));

            document.querySelector('#cancel-button').click();
            let img = document.getElementById("img");
            img.src = JSON.parse(response);
        }
    });
});
