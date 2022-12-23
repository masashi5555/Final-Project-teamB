<?php
    class applier{
        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $phone;
        private $pass;
        private $age;
        private $role;
        function __construct($id,$first_name,$last_name,$email,$phone,$pass,$age,$role)
        {
            $this->$id = $id;
            $this->$first_name = $first_name;
            $this->$last_name = $last_name;
            $this->$email = $email;
            $this->$phone = $phone;
            $this->$pass = $pass;
            $this->$age = $age;
            $this->$role = $role;
        }
        function convert_info(){
            return ["id"=>$this->id,"first_name"=>$this->first_name,"lname"=>$this->pass,"last_name"=>$this->last_name,"email"=>$this->email,"phone"=>$this->phone,"pass"=>$this->pass,"age"=>$this->age,"role"=>$this->role,];
        }
    }
?>  