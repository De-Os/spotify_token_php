# spotify-token-php

Small class to get Spotify's web player access token through Spotify API

##Usage 
####Get cookies:
1. Open https://accounts.spotify.com/en/login?continue=https://open.spotify.com/ in **new incognito window**
2. Open DevTools
3. Login to Spotify using your login and password
4. Go to cookies in DevTools (Application -> Cookies in Chrome)
5. Find Spotify's cookies and copy values of sp_key and sp_dc

####Obtain token:
```php
<?php

require_once('spotify_token.php');

$sp_key = "aaa111bbb222ccc";
$sp_dc = "aaa-111-bbb-222";

$token = spotify_token::get($sp_dc, $sp_key, spotify_token::RETURN_TOKEN);
```

#####or you can get expiration time

```php
<?php

require_once('spotify_token.php');

$sp_key = "aaa111bbb222ccc";
$sp_dc = "aaa-111-bbb-222";

$token = spotify_token::get($sp_dc, $sp_key, spotify_token::RETURN_EXPIRATION);
```

######...or all data as array
```php
<?php

require_once('spotify_token.php');

$sp_key = "aaa111bbb222ccc";
$sp_dc = "aaa-111-bbb-222";

$token = spotify_token::get($sp_dc, $sp_key);
```

