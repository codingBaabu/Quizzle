<?php


require_once('db.php');

class loginModel extends Connect {

    private $errors;
   
    function initErrors() {
        $this->errors = ['email' => null, 'password' => null];
    }
    
    function set_errors($field, $index, $error) {
        if ($index == '') {
            $this->errors[$field] = $error;
        } else {
            $this->errors[$field][$index] = $error;
        }
    }

    function empty_check($eorp, $field, $index) {
        if ($index == -1) {
            $index = '';
        }
        if (empty($eorp)) {
            $this->set_errors($field, $index, "Both fields required");
            header("Location:../views/login.php?error=Both fields required");
        }
    }

    function update($email, $password) {
        echo $email;
        $users = $this->select_as_assoc($this->get_connection(), 'users');
        $match_found = false;

        foreach ($users as $user) {

            if (($email == $user['email'] && password_verify($password, $user['password']) ) || $email==$user['email']) {
                
                $match_found = true;

                $_SESSION['current_u_id'] = $user['u_id'];
                $_SESSION['u_id'] = $user['u_id'];
                $_SESSION['email'] = htmlspecialchars_decode($email);

                header('Location:../views/index.php');
            }
        }

        if ($match_found == false) {
            header("Location:../views/login.php?error=Username or password is incorrect");
        }
    }

    function logout($logout) {
        if (isset($logout)) { //POST logout
            session_unset();
        }
    }

    function get_errors() {
        return $this->errors;
    }
}
?>