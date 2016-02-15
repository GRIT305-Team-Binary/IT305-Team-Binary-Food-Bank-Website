<?php
$mailSent = false;
// Assume the input contains nothing suspect
$suspect = false;
// Regular expression to search for suspect phrases
$pattern = '/Content-type:|Bcc:|Cc:/i';

// Recursive function that checks for suspect phrases
// Third argument is passed by reference
function isSuspect($value, $pattern, &$suspect) {
    if (is_array($value)) {
        foreach ($value as $item) {
            isSuspect($item, $pattern, $suspect);
        }
    } else {
        if (preg_match($pattern, $value)) {
            $suspect = true;
        }
    }
}

// Check the $_POST array for suspect phrases
isSuspect($_POST, $pattern, $suspect);

// Process the form only if no suspect phrases are found
if (!$suspect) :
    // Check that required fields have been filled in,
    // and reassign expected elements to simple variables
    foreach ($required as $value){
        if (!array_key_exists($value, $_POST)) {
            $missing[] = $value;
            $$value = '';
        }
    }
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value);
        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
        } elseif (in_array($key, $expected)) {
            $$key = $value;
        }
    }
    // Validate user's email
    if (!$missing && !empty($email)) :
        $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($validemail) {
            $headers[] = "Reply-to: $validemail";
        } else {
            $errors['email'] = true;
        }
    endif;
    // If no errors, create headers and message body
    if (!$errors && !$missing) :
        $headers = implode("\r\n", $headers);
        // Initialize message
        $message = '';
        foreach ($expected as $field) :
            if (isset($$field) && !empty($$field)) {
                $val = $$field;
            } else {
                $val = 'Not selected';
            }
            // If an array, expand to a comma-separated string
            if (is_array($val)) {
                $val = implode(', ', $val);
            }
            // Replace underscores in the field names with spaces
            $field = str_replace('_', ' ', $field);
            $message .= ucfirst($field) . ": $val\r\n\r\n";
        endforeach;
        $message = wordwrap($message, 70);
        $mailSent = mail($recipient, $subject, $message, $headers, $authorized);
        if (!$mailSent) {
            $errors['mailfail'] = true;
        }
    endif;
endif;