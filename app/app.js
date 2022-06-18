let login_button = document.querySelector('#login_button');
login_button.addEventListener('click', () => {
    let form_data = new FormData();
    form_data.append('email', document.querySelector('#email').value);
    form_data.append('password', document.querySelector('#password').value);

    fetch('/login', {
        method: 'POST',
        body: form_data
    })
    .then(response => response.json())
    .then(data => {
        if (data.status_code !== 200) {
            document.querySelector('#message_field').style.color = "red";
        } else {
            document.querySelector('#message_field').style.color = "green";
        }

        document.querySelector('#message_field').innerHTML = data.data.client_message;
    });
}, false);
