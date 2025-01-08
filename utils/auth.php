<?php

require 'config.php';

function loginWithEmailAndPassword(string $email, string $password, string $type) : string {
    return $type === 'user' ? userLogin($email, $password) : mechLogin($email, $password);
}

function userLogin(string $email, string $password) : string {
    global $connect;

    $msg = '';
    $sql = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
    $dataset = $connect->query($sql);

    if (mysqli_num_rows($dataset) > 0) {
        while ($data = $dataset->fetch_assoc()) {
            $id = $data['user_id'];
            $fname = $data['first_name'];
            $lname = $data['last_name'];
            $pfp = $data['profile_pic'];

            if ($data['deleted_at']) {
                $msg = "Your account has been disabled.";
            }

            $_SESSION['user_id'] = $id;
            $_SESSION['fname'] = $fname;
            $_SESSION['user_type'] = 'user';
            $_SESSION['lname'] = $lname;
            $_SESSION['pfp'] = $pfp;
        }
    } else {
        $msg = "You have entered an incorrect username/password.";
    }

    return $msg;
}

function mechLogin(string $email, string $password) : string {
    global $connect;

    $sql = "SELECT * FROM `mechanics` WHERE mechEmail='$email' and mechpwd='$password'";

    $dataset = $connect->query($sql);
    $msg = '';

    if (mysqli_num_rows($dataset) > 0) {
        while ($data = $dataset->fetch_assoc()) {
            $id = $data['mechid'];
            $mname = $data['mechName'];
            $memail = $data['mechEmail'];
            $maddr = $data['mechaddr'];
            $mechno1 = $data['mechno'];
            $mechpfp = $data['mech_pfp'];
            $mechserv = $data['mech_services'];
            $mechcover = $data['mech_cover'];
            $status = $data['acc_status'];

            if (strtolower($status) === "approved") {

                $_SESSION['mechanicid'] = $id;
                $_SESSION['mechname'] = $mname;
                $_SESSION['mechemail'] = $memail;
                $_SESSION['mechaddr'] = $maddr;
                $_SESSION['user_type'] = 'mechanic';
                $_SESSION['mechnum'] = $mechno1;
                $_SESSION['mechpfp'] = $mechpfp;
                $_SESSION['mech_services'] = $mechserv;
                $_SESSION['mech_cover'] = $mechcover;

            } else {
                $msg = "Account is currently being reviewed.";
            } 

        }
    } else {
        $msg = "You have entered an incorrect username/password.";
    }

    return $msg;
}
