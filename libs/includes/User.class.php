<?php


class user
{
    // use SQLGetterSetter;
    private $conn;
	
    public $room1;
    public $room2;
    public $room3;
	public static $done = null;
    public $table;
    // public $token;



    // magic function with asparitise property

    public function __call($name, $arguments)
    {
        //$name = "getFirstname";

        $property = preg_replace("/[^09_roomabczAZ]/", "", substr($name, 3));

        // echo $property;
        $property = strtolower(preg_replace('/\B([AZ])/', '$1', $property));
        // echo $property;
        // echo $name;
        if (substr($name, 0, 3) == "get") {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) == "set") {
            return $this->_set_data($property, $arguments[0]);
        } else {
            throw new Exception("user::__call() -> $name , function unavailable.");
        }
    }


                    // signup page

    public static function signup($user, $pass, $email_address, $phone)
    {
        $options = [
            'cost' => 9,
        ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
        $conn = Database::getconnection();

        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone number`)
        VALUES ('$user','$pass','$email_address','$phone');";
        // $error = false;
        //for 8.1
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
                  #for 7.4
       // if ($conn->query($sql) === true) {
          //  echo "New record created successfully";
         //   $error = false;
      //  } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
         //   $error = $conn->error;
          // $error = false;
       // }

        // $conn->close();
      //  return $error;
   // }

                    // login form to check a database connection....

   public static function samplelogin($user, $pass)
   {
       $query = "SELECT * FROM `auth` WHERE `email` = '$user'";
       $conn = Database::getconnection();
       $result = $conn->query($query);
       if ($result->num_rows == 1) {
           $row = $result->fetch_assoc();
           if (password_verify($pass, $row['password'])) {
               return $row['username'];
           } else {
               return false;
           }
       } else {
           return false;
       }
   }

                // construction a database for retrive a data in database to php code

    public function __construct($username)
    {
        
        $this->conn = Database::getconnection();
        $this->username = $username;
        $this->id = null;

        $sql = "SELECT `room_a`, `room_b`, `room_c` FROM `$username` WHERE 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->room1 = $row['room_a']; //Updating this from database
            $this->room2 = $row['room_b'];
            $this->room3 = $row['room_c'];
        } else {
            throw new Exception("Username does't exist");

        }
    }


            // To get a data from database........

    private function _get_data($var)
    {

        if (!$this->conn) {
            $this->conn = Database::getconnection();
        }
        $sql = "SELECT `$var` FROM `rooms` LIMIT 50";


        $result = $this->conn->query($sql);

        if ($result and $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            print ($row["$var"]);
            // return $result->fetch_assoc()["$var"];
        } else {
            return null;
        }
    }

                // TO update data to database............

    private function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::getconnection();
        }
        $sql ="UPDATE `rooms` SET `$var`='$data' WHERE 1;";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }




}

