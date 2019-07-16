<?php
/**
 * secret servers.
 */

class DATABASE{

    public $con;

    public function __construct()
    {

        $this->con=mysqli_connect("localhost","root","","mobile_payment")or die(mysqli_error($this->con));

        if(!$this->con)
        {
            echo "failed to connect";
        }

    }

}

    $obj=new DATABASE();