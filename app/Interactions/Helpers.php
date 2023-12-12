<?php
if (!function_exists('getLocalTime')) {
    /**
     * Get local timezone for user
     *
     * @return string
     */
    function getLocalTimezone($ip)
    {
        if (env('APP_ENV') == 'local')
            return 'Asia/Amman';

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://ipapi.co/' . $ip . '/json');
            $location = json_decode($response->getBody()->getContents(), true);
            if (empty($location['timezone'])) {
                return 'Asia/Amman';
            }
            return $location['timezone'];
        } catch (\Exception $e) {
            return 'Asia/Amman';
        }
    }
}