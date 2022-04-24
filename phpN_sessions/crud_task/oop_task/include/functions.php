<?php
session_start();

class validation
{

    function clean($input)
    {
        return trim(stripslashes(strip_tags($input)));
    }


    function validator($input, $validat_type, $length = 15)
    {
        $errors = [];
        switch ($validat_type) {
            case 'required':
                if (empty($input)) {
                    $errors['required'] = "the feild is empty ,please enter data";
                }
                break;
            case 'string':
                if (filter_var($input, FILTER_VALIDATE_INT)) {
                    $errors['string'] = 'enter string data';
                }
                break;


            case 'minlength':
                if (strlen($input) < $length) {
                    $errors['length'] = 'your input is lessthan ' . $length . 'charcters enter more charcter';
                }
                break;
            case 'maxlength':
                if (strlen($input) > $length) {
                    $errors['length'] = 'your input is greaterthan ' . $length . 'charcters enter simple data';
                }
                break;

            case 'image':
                if (!in_array($input, ['jpg', 'jpeg', 'png'])) {
                    $errors['extention_image'] = 'the extention of image is not avelable ';
                }
                break;
        }

        if (count($errors) > 0) {
            return $_SESSION['message'] = $errors;
        }
    }

    function validat_image($extention , $disPath , $temPath)
    {
        if (!in_array($extention, ['jpg', 'jpeg', 'png'])) {
            $errors['extention_image'] = 'the extention of image is not avelable ';
        }

        if (!isset($_SESSION['message'])  ){
            move_uploaded_file($temPath, $disPath);

        }
    }

    function displayMessage($text)
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            foreach ($message as $index => $errorMassage) {
                echo  $index . ' :--> ' . $errorMassage . '**<br>';
            }
            
        } else {
            echo '<li class="breadcrumb-item active"> ' . $text . ' </li> ';
        }

        unset($_SESSION['message']);
    }
}
