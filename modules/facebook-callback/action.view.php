<?php

if(!defined('_ROOT')) {
    exit('Access Denied');
}

$tpl->reset();

$fb = new Facebook\Facebook([
    'app_id' => $cfg['facebook_appid'],
    'app_secret' => $cfg['facebook_appsecret'],
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
    $response = $fb->get('/me?fields=id,name,email,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified', $accessToken);
    $user = $response->getGraphUser();
    $id = $user->getId();
    $name = $user->getName();
    $email = $user->getEmail();
    $firstName = $user->getFirstName();
    $lastName = $user->getLastName();
    $link = $user->getLink();
    $gender = $user->getGender();
    $ageRange = $user->getBirthday();
    $picture = $user->getPicture();
    $locale = $user->getLocation();
    $timezone = $user->getHometown();

    $userInfo = array(
        'fb_id' => $id,
        'fb_name' => $name,
        'fb_email' => $email,
        'fb_first_name' => $firstName,
        'fb_last_name' => $lastName,
        'fb_age_range' => $ageRange,
        'fb_gender' => $gender,
        'fb_locale' => $locale,
        'fb_timezone' => $timezone,
        'created' => date('Y-m-d H:i:s')
    );

    $checkUser = $oClass->get_member("fb_id = '$id' ", 0, 1)->fetch();
    if($checkUser['id'] <= 0) {

        $userId = $oClass->insert_table('member', $userInfo);
        if($userId > 0) {
            $userInfo['id'] = $userId;
        } else {
            echo 'System error: ' . '1x001';
            exit;
        }
    } else {
        $userInfo = $checkUser;
    }

    $_SESSION['userInfo'] = $userInfo;

    if($userInfo['played'] == 1 && ! TESTING_MODE) {
        header('Location: ' . $system->domain . $system->project);
    } else {
        header('Location: ' . $system->domain . $system->project . 'bi-kip-tha-thinh/');
    }

} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}