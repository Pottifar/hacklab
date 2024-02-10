function login() {
    let password = document.getElementById("passwordInput").value;
    let username = document.getElementById("usernameInput").value;
    console.log("Username is: " + username + " and password is " + password);
    document.cookie = "sessionid=testid"
}