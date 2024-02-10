function sendRequest(){
    let username = document.getElementById("usernameInput").value;
    fetch('http://192.168.140.130/hacklab/PHP/backend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
    },
    body: JSON.stringify({message: username})
    })
    .then(response => response.json())
    .then(data => {

        console.log(data);
        let username = data.message;
        document.getElementById("vuln").innerHTML = username;
    
    })
    .catch((error) => {
    console.error('Error:', error);
    });

    
}