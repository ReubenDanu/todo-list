<?php
// create a class that create model for database
class database
{
    public $host;
    public $port;
    public $username;
    public $password;
    public $database;


    public function __construct(string $host, string $username, string $password, string $database, int $port)
    {
        $this->port = $port;
        $this->username = $username;
        $this->database = $database;
        $this->host = $host;
        $this->password = $password;
    }

    public function display()
    {
        // for debugging only remove once fully developed
        return $this->port;
    }

    public static function get_default_table(){
        $table = array("nik","message" ,"date created" ,"date edited" ,"date goals" ,"header");
        return $table;
    }

    public function setup()
    {
        try {
            $conn = new mysqli($this->host, $this->username, $this->password, "", $this->port);

            if ($conn->connect_error) {
                throw new Exception("Connection failed due to :" . $conn->connect_error);
            }

            $list_database = $conn->query("SHOW DATABASES");
            $is_present = false;

            while($row = $list_database->fetch_row()){
                if($row[0] == $this->database){
                    $is_present = true;
                }
            }
           
            if ($is_present) {
                //if database are exist
                $conn->select_db($this->database);
                $conn->select_db("dbtokobuku");
                $table = $conn->query("SHOW TABLES");
                $table_count = 0;
                $default_table = $this->get_default_table();

                for($i = 0; $i < count($default_table); $i++){
                    $row = $table->fetch_row();
                    
                    // if($row[0] == $default_table[$i] and $default_table[$i] != null){
                    //     $table_count += 1;
                    // }

                    if($row[0] == null){
                        echo "yes";
                    }
                }

                echo $table_count;
            } else {
                // database does not exist
                echo "no";
                $conn->query("CREATE DATABASE $this->database");
                
            }

            //code...
        } catch (\Throwable $th) {
            //throw $th;
            print_r($th);
        }
    }
}
?>