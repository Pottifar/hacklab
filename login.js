function login() {
    let password = document.getElementById("passwordInput").value;
    let username = document.getElementById("usernameInput").value;
    console.log("Username is: " + username + " and password is " + password);
    document.cookie = "sessionid=testid"
}

function sendRequest(){
    fetch('http://192.168.140.130//backend.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
    },
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch((error) => {
    console.error('Error:', error);
    });
}