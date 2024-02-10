function getUserData(){
    fetch('http://192.168.140.130/hacklab/PHP/userIsLoggedIn.php', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
    },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let myData = data; // assign the data to a variable
        document.getElementById("welcomeUser").innerHTML = myData;
        // you can now use myData variable within this scope
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}