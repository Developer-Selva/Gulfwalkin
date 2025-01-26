<?php

class WebService {

     public function __construct() {
        print_r($_REQUEST);die();
        if (!empty($_REQUEST['action'])) {
            $action = $_REQUEST['action'];

            $this->connect();
            $this->$action();
        }
        
    }

    public function connect() {

//$servername = "localhost";
//$username = "download_backup";
//$password = "backup@2017";

        $servername = "localhost";
        $username = "glufjb9wkin17";
        $password = "G2u1Lf#J6b!R%wAL";
        try {
            $dbcon = mysql_connect($servername, $username, $password);
            mysql_select_db("gulfathjbwlaink", $dbcon);
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
            die();
        }
    }

    public function setHeader($type) {
        header("Content-type:" . $type);
    }

    public function setTesponseCode($code) {
        header("HTTP/1.1 " . $code . " OK");
    }

    public function output($json) {
        $this->setHeader('application/json');
        echo json_encode($json);
    }

    public function getRequestParams() {
        unset($_REQUEST['action']);
        return $_REQUEST;
    }

    public function getPost(){
        unset($_POST['action']);
        return $_POST;
    }

    public function mysql_bind($sql, $values = array()) {
        foreach ($values as &$value)
            $value = mysql_real_escape_string($value);
        $sql = vsprintf(str_replace('?', "'%s'", $sql), $values);
        return $sql;
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
     public function mail($mail, $password) {

        $to = $mail;
        $subject = "Forgot Password";

        $message = "
                    <html>
                    <head>
                    <title>Random Password</title>
                    </head>
                    <body>
                    <p>Use this random password login   : " . $password . "</p>

                    </body>
                    </html>
                    ";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <admin@downloadbackupapp.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
    }


}

?>
