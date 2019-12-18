// Show the file browse dialog
document.querySelector('#choose-upload-button').addEventListener('click', function () {
    document.querySelector('#upload-file').click();
});

// When a new file is selected
document.querySelector('#upload-file').addEventListener('change', function () {
    let file = this.files[0];
    let mime_types = ['image/jpeg', 'image/png'];

    document.querySelector('#error-message').style.display = 'none';

    // Validate MIME type
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

// Cancel button event
document.querySelector('#cancel-button').addEventListener('click', function () {
    document.querySelector('#error-message').style.display = 'none';
    document.querySelector('#upload-choose-container').style.display = 'block';
    document.querySelector('#upload-file-final-container').style.display = 'none';
    document.querySelector('#upload-file').setAttribute('value', '');
});

// Upload via AJAX
document.querySelector('#upload-button').addEventListener('click', function () {
    let data = new FormData();
    data.append("file", document.querySelector('#upload-file').files[0]);

    ajax({
        method: 'POST',
        url: 'uploadData.php',
        data : id,
        success: (response) => {
            let image = JSON.parse(response);

            console.log('Server got: ', image);
            document.querySelector('#cancel-button').click();

            let img = document.getElementById("img");
            img.src = image['dataUrl'];
        }
    });
});






