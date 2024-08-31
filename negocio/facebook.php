<?php
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v20.0/PAGE-ID/chat_plugin");
    curl_setopt($ch, CURLOPT_POST, 1);

    $data = [
        'welcome_screen_greeting' => 'Bienvenidos compañeros Empresarios',
        'theme_color' => '553399',
        'entry_point_icon' => 'MESSENGER-ICON',
        'entry_point_label' => 'CHAT',
        'access_token' => 'PAGE-ACCESS-TOKEN'
    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    //echo $response;
?>