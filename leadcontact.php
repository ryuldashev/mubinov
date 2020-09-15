<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

function sendMessage($token, $chatid, $message) {
    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&text=";
    $url .= urlencode($message);
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$token = '1380866539:AAGJ5_X4qUtyL51oJ8BE36UV1aP_bN6OeNg';
$chatid = '-466208885';
$message = '📳 Новая заявка на сайте \n' .
            '\nИмя: ' . $_POST['name'] .
            '\nКомпания: ' . $_POST['company'] .
            '\nТелефон: ' . $_POST['phone'];
$response;

// now execute it:
$result = json_decode(sendMessage($token, $chatid, $message));
if(isset($result->ok) && $result->ok) {
    $response['body'] = $_POST['success_msg'];
} elseif (!$result->ok) {
    print_r($result);
    $response['error'] = true;
    $response['body'] = $result->error_code . ': ' . $result->description;
} else {
    $response['error'] = true;
    $response['body'] = 'Unknown error. Sorry :(';
};

printf(json_encode($response));

?>