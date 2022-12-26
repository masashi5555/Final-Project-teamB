<?php
    class applyer{
        private $fname;
        private $lname;
        private $email;
        private $phone;
        private $pass;
        private $age;
        private $role;
        function __construct($fname,$lname,$email,$phone,$pass,$age,$role)
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->phone = $phone;
            $this->pass = $pass;
            $this->age = $age;
            $this->role = $role;
        }  
        function convert_info($idNum){
            return ["id"=>$idNum,"first_name"=>$this->fname,"last_name"=>$this->lname,"email"=>$this->email,"phone"=>$this->phone,"pass"=>$this->pass,"age"=>$this->age,"role"=>$this->role];
        }      
    }
?>