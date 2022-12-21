<?php
    include dirname(__FILE__)."/functions/jsonService.php";
    // <?php include dirname(__FILE__)."/data/config.php"; 


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $filePath = './data/customers/customerData.json';

        if (!file_exists($filePath)) {
            if(!is_dir("./data/customers")) {
                mkdir("./data/customers", 0777);
                // chmod("./courses/$class", 0777);
            }
            $existingCustomers = [];
            $newCustomer = [
                'fname' => $fname,
                'lname' => $lname,
                'phone' => $phone,
                'email' => $email
            ];
            $data = new jsonService($filePath);
            $newData = $data -> arraytoFile($data);
            var_dump($data);
            var_dump($newData);
        }

        // header("Location: ./sellsPage.php?msg=done");
    }
?>