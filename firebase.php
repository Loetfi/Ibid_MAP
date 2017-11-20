<html>
<head>
<script src="https://www.gstatic.com/firebasejs/3.0.0/firebase.js"></script>
<title>ZeroToApp</title>
<style>
  #messages { width: 40em; border: 1px solid grey; min-height: 20em; }
  #messages img { max-width: 240px; max-height: 160px; display: block; }
  #header { position: fixed; top: 0; background-color: white; }
  .push { margin-bottom: 2em; }
  @keyframes yellow-fade { 0% {background: #f2f2b8;} 100% {background: none;} }
  .highlight { -webkit-animation: yellow-fade 2s ease-in 1; animation: yellow-fade 2s ease-in 1; }
</style>


<script src="https://www.gstatic.com/firebasejs/3.7.6/firebase.js"></script>
<script>
  // Initialize Firebase
  /*var config = {
    apiKey: "AIzaSyCn1qvXzYEtrN1iLElVIZCBVmoFFD-S6f0",
    authDomain: "serawesome-f67b2.firebaseapp.com",
    databaseURL: "https://serawesome-f67b2.firebaseio.com",
    projectId: "serawesome-f67b2",
    storageBucket: "serawesome-f67b2.appspot.com",
    messagingSenderId: "125515813708"
  };
  firebase.initializeApp(config); */
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Step 0: HTML defined, variables for elements
  var messagesList = document.getElementById('messages'),
      textInput = document.getElementById('text'),
      sendButton = document.getElementById('send'),
      login = document.getElementById('login'),
      googleLogin = document.getElementById('google'),
      facebookLogin = document.getElementById('facebook'),
      signedIn = document.getElementById('loggedin'),
      logout = document.getElementById('logout'),
      usernameElm = document.getElementById('username'),
      password = document.getElementById('password'),
      username = "Web",
      suviKelipatan = 10;
  var config = {
    apiKey: "AIzaSyCn1qvXzYEtrN1iLElVIZCBVmoFFD-S6f0",
    databaseURL: "https://serawesome-f67b2.firebaseio.com",
    storageBucket: "serawesome-f67b2.appspot.com",
    authDomain: 'serawesome-f67b2.firebaseapp.com'
  };
  
  // Get the Firebase app and all primitives we'll use
  var app = firebase.initializeApp(config),
      database = app.database(),
      auth = app.auth(),
      storage = app.storage();
      

      // .child('chats') -> chats diganti sesuai id lelang
  var databaseRef = database.ref().child('Mobil1');
  sendButton.addEventListener('click', function(evt) {
    var chat = { 
      name: username, 
      message: textInput.value
       };
    databaseRef.push().set(chat);
	/* suvi sanusi */
    // textInput.value = '';
    textInput.value = parseInt(textInput.value);
	/* end suvi sanusi */
  });
  // Listen for when child nodes get added to the collection
  databaseRef.on('child_added', function(snapshot) {
    // Get the chat message from the snapshot and add it to the UI
    var chat = snapshot.val();
    addMessage(chat);
  });
  
  // Show a popup when the user asks to sign in with Google
  googleLogin.addEventListener('click', function(e) {
    auth.signInWithPopup(new firebase.auth.GoogleAuthProvider());
  });
  // Allow the user to sign out
  logout.addEventListener('click', function(e) {
    auth.signOut();
  });
  // When the user signs in or out, update the username we keep for them
  auth.onAuthStateChanged(function(user) {
    if (user) {
      setUsername(user.displayName);
    }
    else {
      // User signed out, set a default username
      setUsername("Web");
    }
  });
  
  function handleFileSelect(e) {
    var file = e.target.files[0];
    // Get a reference to the location where we'll store our photos
    var storageRef = storage.ref().child('chat_photos');
    
    // Get a reference to store file at photos/<FILENAME>.jpg
    var photoRef = storageRef.child(file.name);
    // Upload file to Firebase Storage
    var uploadTask = photoRef.put(file);
    uploadTask.on('state_changed', null, null, function() {
      // When the image has successfully uploaded, we get its download URL
      var downloadUrl = uploadTask.snapshot.downloadURL;
      // Set the download URL to the message box, so that the user can send it to the database
      textInput.value = downloadUrl;
    });
  }
  file.addEventListener('change', handleFileSelect, false);
  function setUsername(newUsername) {
    if (newUsername == null) {
        newUsername = "Web";
    }
    console.log(newUsername);
    username = newUsername;
    var isLoggedIn = username != 'Web';
    usernameElm.innerText = newUsername;
    logout.style.display = isLoggedIn ? '' : 'none';
    facebookLogin.style.display = isLoggedIn ? 'none' : '';
    googleLogin.style.display = isLoggedIn ? 'none' : '';
  }
  function addMessage(chat) {
    var li = document.createElement('li');
    var nameElm = document.createElement('h4');
    nameElm.innerText = chat.name;
    li.appendChild(nameElm);
    li.className = 'highlight';
    if ( chat.message.indexOf("https://firebasestorage.googleapis.com/") == 0
      || chat.message.indexOf("https://lh3.googleusercontent.com/") == 0
      || chat.message.indexOf("http://pbs.twimg.com/") == 0
      || chat.message.indexOf("data:image/") == 0) {
      var imgElm = document.createElement("img");
      imgElm.src = chat.message;
      li.appendChild(imgElm);
    }
    else {
      var messageElm = document.createElement("span");
      messageElm.innerText = chat.message;
	  /* suvi sanusi */
	  textInput.value = parseInt(chat.message) + suviKelipatan;
	  /* end suvi sanusi */
      li.appendChild(messageElm);
    }
    messagesList.appendChild(li);
    li.scrollIntoView(false);
    sendButton.scrollIntoView(false);
  }
  //window.app = app; // NOTE: just for debugging
  //for (var i=0; i < 10; i++) addMessage({ name: "Web", message: ''+i });
  setUsername('Web');
});
</script>
</head>
<body>
  <div id='header'>
    <label for='username'><img src="https://www.gstatic.com/images/icons/material/system/1x/account_box_black_24dp.png" width="24"/></label>
    <span id='username'></span>
    <span id='login'>
      <button id='google' class='idp-button'>Sign in with Google</button>
      <button id='facebook' class='idp-button'>Sign in with Facebook</button>
    </span>
    <button id='logout' class='idp-button'>Sign out</button>
  </div>
  <div class="push"></div>
  <ul id='messages'></ul>
  <div id='footer'>
	
	<!-- suvi sanusi -->
	<!--img src="https://www.gstatic.com/images/icons/material/system/1x/add_a_photo_black_24dp.png" width="24"/>
    <input type="file" id="file" name="file" / -->
	<!-- END suvi sanusi -->
	
    <input id='text' type="text"></input>
    <button id='send' >Send</button>
  </div>
</body>
</html>