<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Starter extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        //Check if the application has been installed or not
        $database_file = APPPATH.'config/database.php';
        if(file_exists($database_file)){
            $this->load->database();
                     
            $tb = $this->db->list_tables();
           
            if (sizeof($tb) > 0) {
                                
                if (count($this->db->get('users')->num_rows()) >=  1) {
                       # code...
                    redirect('dashboard');
                }
            }else {
                   # code...
                $this->load->library('migration');
                $this->migration->migrate_all_modules();
                
               }
            }         
    }
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
           # code...
            $data['req'] = 1;
            $this->load->view('index',$data);  
    }
      
    /**
     * install
     * run to create database and admin user
     * @return void
     */
    public function install(){
      $req = $this->input->post('step');
      if ($req == 1) {
          # code...
          $server = $this->input->post('server');
          $mysql_username = $this->input->post('username');;
          $mysql_password = $this->input->post('password');;
          $dbname =$this->input->post('dbname');;
          
          
          // Edit config/database.php file 
          $sample_database_file = "application/config/sample-database.php";
          $database_file = "application/config/database.php";
          rename($sample_database_file,$database_file);
          
          $line_array = file($database_file);

          for ($i = 0; $i < count($line_array); $i++) {

              if (strstr($line_array[$i], "'hostname' => ")) {
                  $line_array[$i] = '	   \'hostname\' => \'' . $server . '\',' . "\r\n";
              }
              if (strstr($line_array[$i], "'username' =>")) {
                  $line_array[$i] = '    \'username\' => \'' . $mysql_username . '\',' . "\r\n";
              }
              if (strstr($line_array[$i], "'password' => ")) {
                  $line_array[$i] = '    \'password\' => \'' . $mysql_password . '\',' . "\r\n";
              }														
          }
          file_put_contents($database_file, $line_array);
          //create db
          $this->create_database($server,$mysql_username,$mysql_password,$dbname);
          
                  //update dbname
         $line_array = file($database_file);

         for ($i = 0; $i < count($line_array); $i++) {

            if (strstr($line_array[$i], "'database' => ")) {
            $line_array[$i] = '	   \'database\' => \'' . $dbname . '\',' . "\r\n";
            }																			
         }
        file_put_contents($database_file, $line_array);       
          $data['req'] = 2;
          $this->load->view('index',$data);      
      }elseif ($req == 2) {
       
        $pwd = $this->input->post('password');
        $pwd_confirm =$this->input->post('confirm_password');
        
        if ($pwd == $pwd_confirm) {
            $username = $this->input->post('username');
            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $company = $this->input->post('company');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            
            
           
            $timestamp = time();
            //create user
            $hash = password_hash($pwd, PASSWORD_BCRYPT,array('cost'=>12));
                            //add admin user
            $user = [
                'ip_address'              => '127.0.0.1',
                'username'                => $username,
                'password'                => $hash,
                'email'                   => 'admin@admin.com',
                'activation_code'         => '',
                'forgotten_password_code' => NULL,
                'created_on'              => $timestamp,
                'last_login'              => $timestamp,
                'active'                  => '1',
                'first_name'              => $first_name,
                'last_name'               => $last_name,
                'company'                 => $company,
                'phone'                   => $phone
                ];
                $done = $this->db->insert('users', $user);
                $ug = [
                    [
                        'user_id'  => '1',
                        'group_id' => '1',
                    ],
                    [
                        'user_id'  => '1',
                        'group_id' => '2',
                    ]
                        ];
                $this->db->insert_batch('users_groups', $ug);
                $data['req'] = 3;
                $this->load->view('index', $data);
        }else {
            echo "not match";
        }
            
      }
    }
    function get_database() {
        $database_file = "application/config/database.php";
        $line_array = file($database_file);

        for ($i = 0; $i < count($line_array); $i++) {
            if (strstr($line_array[$i], "'database' => ")) {
                $database = str_replace("'database' => ", "", $line_array[$i]);
                $database = str_replace("'", "", $database);
                $database = str_replace(",", "", $database);
                $database = trim($database);
                return $database;
            }
        }
    }
    function create_database($server,$mysql_username,$mysql_password,$dbname){
        $conn = New Database;
          $conn->Connection($server,$mysql_username,$mysql_password);
          $con = $conn->get_Connection();
          
          // Create Database
         
          //Does the database exists?							
          $conn->CreateDatabase($dbname);
                  //correct the file and rename
          $conn->Close();
                 
    }

}
class Database {

    var $db_connection = null;        // Database connection string
    var $db_server = null;            // Database server
    var $db_database = null;          // The database being connected to
    var $db_username = null;          // The database username
    var $db_password = null;          // The database password

    /** NewConnection Method
     * This method establishes a new connection to the database. */

    public function Connection($server, $username, $password) {

        // Assign variables
        global $db_connection, $db_server, $db_username, $db_password;
        $db_server = $server;
        $db_username = $username;
        $db_password = $password;

        // Attempt connection
        $db_connection = mysqli_connect($server, $username, $password);
        if (!$db_connection) {
            return 'MySQL Connection Database Error: ' . mysqli_error($db_connection);
        }
    }

    /** Open Method
     * This method opens the database connection (only call if closed!) */
    public function Open() {
        global $db_connection, $db_server, $db_database, $db_username, $db_password;
        if (!$CONNECTED) {
            try {
                $db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
                if (!$db_connection) {
                    throw new Exception('MySQL Connection Database Error: ' . mysqli_error($db_connection));
                }
            } catch (Exception $e) {
                display_error($e->getMessage());
            }
        } else {
            $message = "No connection has been established to the database. Cannot open connection.";
            display_error($message());
        }
    }

    /** Close Method
     * This method closes the connection to the MySQL Database */
    public function Close() {
        global $db_connection;
        if ($db_connection) {
            mysqli_close($db_connection);
        } else {
            $message = "No connection has been established to the database. Cannot close connection.";
            display_error($message());
        }
    }

    public function get_Connection() {
        global $db_connection;
        return $db_connection;
    }

    /** Create Database Method
     * This method creates database */
    public function CreateDatabase($database) {
        global $db_connection;
        if ($db_connection) {
            if (!mysqli_query($db_connection,"CREATE DATABASE $database")) {
                $message = "Cannot create database." . mysqli_error($db_connection);
                display_error($message);
            }
        } else {
            $message = "No connection has been established to the database. Cannot create database.";
            display_error($message);
        }
    }

}
/* End of file Starter.php */
