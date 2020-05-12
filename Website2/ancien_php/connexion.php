<html>
<head>
  <title>Firebase Login</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <div id="login_div" class="main-div">
    <h3>Firebase Web login Example</h3>
    <input type="email" placeholder="Email..." id="email_field" />
    <input type="password" placeholder="Password..." id="password_field" />

    <button onclick="login()">Login to Account</button>
  </div>

  <div id="user_div" class="loggedin-div">
    <h3>Welcome User</h3>
    <p id="user_para">Welcome to Firebase web login Example. You're currently logged in.</p>
    <a href="login.php">click here to be redirected</a>
    <button onclick="logout()">Logout</button>
  </div>



  <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyD-7vOzhnNarVC0G9cwxwaiZpLzVPZiN_E",
        authDomain: "locknest-test01.firebaseapp.com",
        databaseURL: "https://locknest-test01.firebaseio.com",
        projectId: "locknest-test01",
        storageBucket: "locknest-test01.appspot.com",
        messagingSenderId: "127344607699",
        appId: "1:127344607699:web:99736f6b2f47cef111af26",
        measurementId: "G-Q5TB7NS6R5"
      };
    
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();
  </script>
  <script src="index.js"></script>

</body>
</html>
<style>
body {
  background: #fff;
  padding: 0px;
  margin: 0px;
  font-family: 'Nunito', sans-serif;
  font-size: 16px;
}

input, button {
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
}

.main-div, .loggedin-div {
  width: 20%;
  margin: 0px auto;
  margin-top: 150px;
  padding: 20px;
  display: none;
}

.main-div input {
  display: block;
  border: 1px solid #ccc;
  border-radius: 5px;
  background: #fff;
  padding: 15px;
  outline: none;
  width: 100%;
  margin-bottom: 20px;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
}

.main-div input:focus {
  border: 1px solid #777;
}

.main-div button, .loggedin-div button {
  background: #5d8ffc;
  color: #fff;
  border: 1px solid #5d8ffc;
  border-radius: 5px;
  padding: 15px;
  display: block;
  width: 100%;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
}

.main-div button:hover, .loggedin-div button:hover {
  background: #fff;
  color: #5d8ffc;
  border: 1px solid #5d8ffc;
  cursor: pointer;
}
</style>
<script>
    firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.

    document.getElementById("user_div").style.display = "block";
    document.getElementById("login_div").style.display = "none";

    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      document.getElementById("user_para").innerHTML = "Welcome User : " + email_id;

    }

  } else {
    // No user is signed in.

    document.getElementById("user_div").style.display = "none";
    document.getElementById("login_div").style.display = "block";

  }
});

function login(){

  var userEmail = document.getElementById("email_field").value;
  var userPass = document.getElementById("password_field").value;

  firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
    // Handle Errors here.
    
    var errorCode = error.code;
    var errorMessage = error.message;

    window.alert("Error : " + errorMessage);

   
  });
}

function logout(){
  firebase.auth().signOut();
}
    </script>