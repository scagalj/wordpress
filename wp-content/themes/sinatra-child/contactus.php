<?php


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $ime = $_POST['ime'];
    $mobitel = $_POST['mobitel'];
    $naslov = $_POST['naslov'];
    $poruka = $_POST['poruka'];

    $email_from = 'info@framesforyou.hr';

    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";



    $from = 'cagalj95@gmail.com';
    $to = 'stjepan_12@hotmail.com';


//    echo 'MAIL: ' . $email . ' - ' . $poruka . 'RESULT: ' . $result;
//    if (IsInjected($email)) {
//        echo "Bad email value!";
//        exit;
//    }
    mail($email_from, $naslov, $poruka, $headers);
//    return 'Test';
}

function IsInjected($str) {
    $injections = array('(\n+)',
        '(\r+)',
        '(\t+)',
        '(%0A+)',
        '(%0D+)',
        '(%08+)',
        '(%09+)'
    );

    $inject = join('|', $injections);
    $inject = "/$inject/i";

    if (preg_match($inject, $str)) {
        return true;
    } else {
        return false;
    }
}

?>