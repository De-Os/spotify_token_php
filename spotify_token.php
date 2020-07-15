<?php


class spotify_token
{
    const RETURN_TOKEN = 'accessToken';
    const RETURN_CLIENTID = 'clientId';
    const RETURN_EXPIRATION = 'accessTokenExpirationTimestampMs';
    const RETURN_ANONYMOUS = 'isAnonymous';

    /**
     * Returns authorization data
     *
     * @param string $sp_dc sp_dc cookie
     * @param string $sp_key sp_key cookie
     * @param false|string use RETURN_... to get special value or set to false if you need array with all values
     *
     * @return array|string|int|boolean
     */
    public static function get($sp_dc, $sp_key, $return_value = false){
        $curl = curl_init("https://open.spotify.com/get_access_token?reason=transport&productType=web_player");

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIE => "sp_dc=" . $sp_dc  . ";sp_key=" . $sp_key,
            CURLOPT_HTTPHEADER => [
                'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) \ AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'
            ]
        ]);

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $return_value ? $response[$return_value] : $response;
    }
}