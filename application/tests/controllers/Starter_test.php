<?php

/**
 * starter_test
 * @author  Cedric Mataso
 * this is to Test the Starter class
 */
class starter_test extends TestCase
{

    public function test_index(){
        
        $database_file = APPPATH.'config/database.php';
        if (!file_exists($database_file)) {
           $output = $this->request('GET','starter');
          // $this->assertContains('<h2>Webase Installation</h2>',$output);
        }
    }
}
