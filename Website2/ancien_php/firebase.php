<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.3/firebase-app.js"></script>

 

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.3/firebase-analytics.js"></script>

 

<script>
  // Your web app's Firebase configuration
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
<?php

require_once './vendor/autoload.php';



use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;



class Users {

   protected $database;

   protected $dbname = 'users';

   public function __construct(){

       $acc = ServiceAccount::fromJsonFile(__DIR__ . '/secret/php-firebase-7f39e-c654ccd32aba.json');

       $firebase = (new Factory)->withServiceAccount($acc)->create();

       $this->database = $firebase->getDatabase();

   }



   public function get(int $userID = NULL){    

       if (empty($userID) || !isset($userID)) { return FALSE; }

       if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){

           return $this->database->getReference($this->dbname)->getChild($userID)->getValue();

       } else {

           return FALSE;

       }

   }



   public function insert(array $data) {

       if (empty($data) || !isset($data)) { return FALSE; }

       foreach ($data as $key => $value){

           $this->database->getReference()->getChild($this->dbname)->getChild($key)->set($value);

       }

       return TRUE;

   }



   public function delete(int $userID) {

       if (empty($userID) || !isset($userID)) { return FALSE; }

       if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){

           $this->database->getReference($this->dbname)->getChild($userID)->remove();

           return TRUE;

       } else {

           return FALSE;

       }

   }

}



?>