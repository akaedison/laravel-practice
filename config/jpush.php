<?php
return [
    'app_key' => env('JPUSH_APP_KEY',''),
    'master_secret' => env('JPUSH_MASTER_SECRET',''),
    'apns_production' => env('apns_production',true)
];
