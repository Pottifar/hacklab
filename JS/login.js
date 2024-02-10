function sendRequest(){
    fetch('http://192.168.140.130/hacklab/PHP/backend.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
    },
    })
    .then(response => response.json())
    .then(data => console.log(data.message))
    .catch((error) => {
    console.error('Error:', error);
    });

    document.getElementById("vuln").innerHTML = data.message;
}