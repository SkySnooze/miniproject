function checkCredentials(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username === "ceo" && password === "123") {
      window.location.href = "Homecoming.html";
    } 
    
    else if (username === "admin" && password === "321") {
      window.location.href = "Homecoming1.html"
    }

    else if (username === "user01" && password === "123") {
      window.location.href = "#Homecomingfornormaluser" //waiting for normal member page...
    }

    else {
      alert("Incorrect username or password");
    }
  }