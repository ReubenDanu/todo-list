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

    // logic first idea
    public static function get_default_table(){
        $table_field = array(
            array("nik","message" ,"date_created" ,"date_edited" ,"date_goals" ,"header"),
            array("todo_list")
        );
        sort($table_field);
        return $table_field;
    }

    // logic for both idea
    public function create_table(object &$conn){
        var_dump()
        var_dump($conn);
        if($conn instanceof mysqli){
            throw new Error("Not instance of mysqli class");
        } else {
        // second idea
        $sql = "CREATE DATABASE IF NOT EXISTS todolist;";
        $sql .= "USE todolist;";
        $sql .= "CREATE TABLE IF NOT EXISTS USER(
                `id_user` int(11) NOT NULL,
                `username` varchar(30) NOT NULL,
                `author` varchar(30) NOT NULL,
                `first_name` varchar(50) NOT NULL,
                `last_name` varchar(50) NOT NULL
                `password` varchar(30) NOT NULL,
                `email` varchar(30) NOT NULL,
                PRIMARY KEY (`id_user`)
                );";
        $sql .= "CREATE TABLE IF NOT EXISTS TODOLIST(
                `id_todo` int(11) NOT NULL,
                `message` varchar(255) NOT NULL,
                `date_created` date NOT NULL DEFAULT CURRENT_DATE(),
                `date_edited` date NOT NULL,
                `date_goals` date NOT NULL,
                `title` varchar(25) NOT NULL,
                `author` varchar(30) NOT NULL
                PRIMARY KEY (`id_todo`),
                FOREIGN KEY (`author`) REFERENCES USER(`author`)
                );";
        }
        // $conn->multi_query($sql);    
        // do {
            
        //     if($row = $result->store_result()){
        //         while($row= $result->fetch_row()){
        //             printf("$s\n", $row[0]);
        //         }
        //     }

        //     if($result->more_results()){
        //         printf("------------\n");
        //     }

        // } while ($result->next_result()){
            
        // }
    }

    public function Scheme(){
        
    }

    public function setup()
    {
        try {
            $conn = new mysqli($this->host, $this->username, $this->password, "", $this->port);

            if ($conn->connect_error) {
                throw new Exception("Connection failed due to :" . $conn->connect_error);
            }

            $this->create_table($conn);

            // start second idea

            // end second ida

            // start first idea
            // $list_database = $conn->query("SHOW DATABASES");
            // $is_present = false;

            // while($row = $list_database->fetch_row()){
            //     if($row[0] == $this->database){
            //         $is_present = true;
            //     }
            // }
           
            // if ($is_present) {
            //     $conn->select_db($this->database);
            //     $result = $conn->query("SHOW TABLE");
            //     $is_table_present = false;
            //     $table_col_count = 0;
            //     $default_table = $this->get_default_table();
            //     $i = 0;
            //     echo(is_object($conn));

            //     while ($row = $result->fetch_array(MYSQLI_NUM)) {
            //         if($row[0] == $default_table[1][0]){
            //             $is_table_present = true;
            //         }

            //         $i++;
            //     }
            //     if($is_table_present){
            //         while ($row = $result->fetch_array(MYSQLI_NUM)) {
            //             if($row= $result->fetch)
            //                 if(in_array($row[0], $default_table)){
        
            //                         print("yes -> ($row[0] == $default_table[$i]) \n")  ; 
            //                 } else {    
            //                     $table_col_count = 0;   
            //                     break;
            //                 }

            //             $i++;
            //         }                    
            //     }

            //     if($table_col_count != 6){
            //        try{
            //             $this->create_table($conn);
            //        } catch (\Throwable $th){
            //             print_r($th);
            //        }
            //     } else {
            //         // do operation
            //     }


            //     var_dump($table_col_count);

            // } else {
            //     // database does not exist
            //     echo "no";
            //     $conn->query("CREATE DATABASE $this->database");
                
            // }
            // end first idea

        } catch (\Throwable $th) {
            //throw $th;
            print_r($th);
        }
    }
}
?>