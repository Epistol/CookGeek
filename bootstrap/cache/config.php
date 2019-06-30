<?php return array (
  'app' => 
  array (
    'name' => 'CDG',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'timezone' => 'UTC',
    'locale' => 'fr',
    'fallback_locale' => 'fr',
    'key' => 'base64:eti5nDuCCiYD0TbtXMYB66BZe1kUM8we9JGdmWpddTU=',
    'cipher' => 'AES-256-CBC',
    'log' => 'daily',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Clockwork\\Support\\Laravel\\ClockworkServiceProvider',
      23 => 'Askedio\\Laravel5ProfanityFilter\\Providers\\ProfanityFilterServiceProvider',
      24 => 'MartinLindhe\\VueInternationalizationGenerator\\GeneratorProvider',
      25 => 'SocialiteProviders\\Manager\\ServiceProvider',
      26 => 'Dimsav\\Translatable\\TranslatableServiceProvider',
      27 => 'Bugsnag\\BugsnagLaravel\\BugsnagServiceProvider',
      28 => 'App\\Providers\\AppServiceProvider',
      29 => 'App\\Providers\\AuthServiceProvider',
      30 => 'App\\Providers\\EventServiceProvider',
      31 => 'App\\Providers\\HorizonServiceProvider',
      32 => 'App\\Providers\\TelescopeServiceProvider',
      33 => 'App\\Providers\\RouteServiceProvider',
      34 => 'App\\Providers\\UniverseProvider',
      35 => 'PragmaRX\\Firewall\\Vendor\\Laravel\\ServiceProvider',
      36 => 'Dimsav\\Translatable\\TranslatableServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Clockwork' => 'Clockwork\\Support\\Laravel\\Facade',
      'Firewall' => 'PragmaRX\\Firewall\\Vendor\\Laravel\\Facade',
      'HTMLMin' => 'HTMLMin\\HTMLMin\\Facades\\HTMLMin',
      'Hashids' => 'Vinkla\\Hashids\\Facades\\Hashids',
      'Sanitizer' => 'Waavi\\Sanitizer\\Laravel\\Facade',
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
    'socialite' => 
    array (
      'drivers' => 
      array (
        0 => 'google',
        1 => 'facebook',
        2 => 'twitter',
        3 => 'instagram',
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'array',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/epistol/Documents/Sites/CookGeek/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel',
  ),
  'clockwork' => 
  array (
    'enable' => false,
    'web' => true,
    'collect_data_always' => false,
    'storage' => 'files',
    'storage_files_path' => '/home/epistol/Documents/Sites/CookGeek/storage/clockwork',
    'storage_sql_database' => '/home/epistol/Documents/Sites/CookGeek/storage/clockwork.sqlite',
    'storage_sql_table' => 'clockwork',
    'storage_expiration' => 10080,
    'filter' => 
    array (
      0 => 'cacheQueries',
      1 => 'routes',
      2 => 'viewsData',
    ),
    'filter_uris' => 
    array (
      0 => '/__clockwork/.*',
    ),
    'ignored_events' => 
    array (
    ),
    'register_helpers' => true,
    'headers' => 
    array (
    ),
    'server_timing' => 10,
  ),
  'commands' => 
  array (
    'settings' => 
    array (
      'route' => 'niceartisan',
    ),
    'commands' => 
    array (
      'make' => 
      array (
        0 => 'make:auth',
        1 => 'make:command',
        2 => 'make:controller',
        3 => 'make:event',
        4 => 'make:exception',
        5 => 'make:factory',
        6 => 'make:job',
        7 => 'make:listener',
        8 => 'make:mail',
        9 => 'make:middleware',
        10 => 'make:migration',
        11 => 'make:model',
        12 => 'make:notification',
        13 => 'make:policy',
        14 => 'make:provider',
        15 => 'make:request',
        16 => 'make:resource',
        17 => 'make:rule',
        18 => 'make:seeder',
        19 => 'make:test',
      ),
      'migrate' => 
      array (
        0 => 'migrate',
        1 => 'migrate:fresh',
        2 => 'migrate:install',
        3 => 'migrate:rollback',
        4 => 'migrate:reset',
        5 => 'migrate:refresh',
        6 => 'migrate:status',
      ),
      'route' => 
      array (
        0 => 'route:cache',
        1 => 'route:clear',
        2 => 'route:list',
      ),
      'queue' => 
      array (
        0 => 'queue:table',
        1 => 'queue:failed',
        2 => 'queue:retry',
        3 => 'queue:forget',
        4 => 'queue:flush',
        5 => 'queue:failed-table',
        6 => 'queue:work',
        7 => 'queue:restart',
        8 => 'queue:subscribe',
        9 => 'queue:table',
      ),
      'config' => 
      array (
        0 => 'config:cache',
        1 => 'config:clear',
      ),
      'cache' => 
      array (
        0 => 'cache:clear',
        1 => 'cache:table',
      ),
      'miscellaneous' => 
      array (
        0 => 'app:name',
        1 => 'auth:clear-resets',
        2 => 'clear-compiled',
        3 => 'db:seed',
        4 => 'event:generate',
        5 => 'down',
        6 => 'env',
        7 => 'key:generate',
        8 => 'optimize',
        9 => 'package:discover',
        10 => 'preset',
        11 => 'schedule:run',
        12 => 'serve',
        13 => 'session:table',
        14 => 'storage:link',
        15 => 'vendor:publish',
        16 => 'view:clear',
      ),
    ),
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'cdg_wait',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'cdg_wait',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'cdg_wait',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'mongodb' => 
      array (
        'driver' => 'mongodb',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'cdg_wait',
        'username' => 'root',
        'password' => '',
        'options' => 
        array (
          'database' => 'admin',
        ),
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'cdg_wait',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'horizon' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
        'options' => 
        array (
          'prefix' => 'horizon:',
        ),
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => true,
    'except' => 
    array (
    ),
    'storage' => 
    array (
      'enabled' => true,
      'driver' => 'file',
      'path' => '/home/epistol/Documents/Sites/CookGeek/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
    ),
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'auth' => true,
      'gate' => true,
      'session' => true,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'backtrace' => true,
        'timeline' => false,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => true,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'data' => false,
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_domain' => NULL,
  ),
  'feed' => 
  array (
    'feeds' => 
    array (
      'main' => 
      array (
        'items' => 'App\\Recipes@getAllFeedItems',
        'url' => '/rss',
        'title' => 'All recipes on CuisineDeGeek.com',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/epistol/Documents/Sites/CookGeek/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/epistol/Documents/Sites/CookGeek/storage/app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
      ),
    ),
  ),
  'firewall' => 
  array (
    'enabled' => true,
    'blacklist' => 
    array (
      0 => '88.190.117.61',
      1 => '92.154.25.112',
      2 => '176.175.92.189',
      3 => '85.190.75.27',
    ),
    'whitelist' => 
    array (
    ),
    'responses' => 
    array (
      'blacklist' => 
      array (
        'code' => 403,
        'message' => NULL,
        'view' => NULL,
        'redirect_to' => NULL,
        'abort' => false,
      ),
      'whitelist' => 
      array (
        'code' => 403,
        'message' => NULL,
        'view' => NULL,
        'redirect_to' => NULL,
        'abort' => false,
      ),
    ),
    'redirect_non_whitelisted_to' => NULL,
    'cache_expire_time' => 60,
    'ip_list_cache_expire_time' => 0,
    'enable_log' => true,
    'enable_range_search' => true,
    'enable_country_search' => false,
    'use_database' => false,
    'firewall_model' => 'PragmaRX\\Firewall\\Vendor\\Laravel\\Models\\Firewall',
    'session_binding' => 'session',
    'geoip_database_path' => '/home/epistol/Documents/Sites/CookGeek/config/geoip',
    'attack_blocker' => 
    array (
      'enabled' => 
      array (
        'ip' => true,
        'country' => false,
      ),
      'cache_key_prefix' => 'firewall-attack-blocker',
      'allowed_frequency' => 
      array (
        'ip' => 
        array (
          'requests' => 50,
          'seconds' => 60,
        ),
        'country' => 
        array (
          'requests' => 3000,
          'seconds' => 120,
        ),
      ),
      'action' => 
      array (
        'ip' => 
        array (
          'blacklist_unknown' => true,
          'blacklist_whitelisted' => false,
        ),
        'country' => 
        array (
          'blacklist_unknown' => false,
          'blacklist_whitelisted' => false,
        ),
      ),
      'response' => 
      array (
        'code' => 403,
        'message' => NULL,
        'view' => NULL,
        'redirect_to' => NULL,
        'abort' => false,
      ),
    ),
    'notifications' => 
    array (
      'enabled' => true,
      'message' => 
      array (
        'title' => 'User agent',
        'message' => 'A possible attack on \'%s\' has been detected from %s',
        'request_count' => 
        array (
          'title' => 'Request count',
          'message' => 'Received %s requests in the last %s seconds. Timestamp of first request: %s',
        ),
        'uri' => 
        array (
          'title' => 'First URI offended',
        ),
        'blacklisted' => 
        array (
          'title' => 'Was it blacklisted?',
        ),
        'user_agent' => 
        array (
          'title' => 'User agent',
        ),
        'geolocation' => 
        array (
          'title' => 'Geolocation',
          'field_latitude' => 'Latitude',
          'field_longitude' => 'Longitude',
          'field_country_code' => 'Country code',
          'field_country_name' => 'Country name',
          'field_city' => 'City',
        ),
      ),
      'route' => '',
      'from' => 
      array (
        'name' => 'Laravel Firewall',
        'address' => 'firewall@mydomain.com',
        'icon_emoji' => ':fire:',
      ),
      'users' => 
      array (
        'model' => 'PragmaRX\\Firewall\\Vendor\\Laravel\\Models\\User',
        'emails' => 
        array (
          0 => 'admin@mydomain.com',
        ),
      ),
      'channels' => 
      array (
        'slack' => 
        array (
          'enabled' => true,
          'sender' => 'PragmaRX\\Firewall\\Notifications\\Channels\\Slack',
        ),
        'mail' => 
        array (
          'enabled' => true,
          'sender' => 'PragmaRX\\Firewall\\Notifications\\Channels\\Mail',
        ),
      ),
    ),
  ),
  'geoip' => 
  array (
    'log_failures' => true,
    'include_currency' => true,
    'service' => 'ipapi',
    'services' => 
    array (
      'maxmind_database' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindDatabase',
        'database_path' => '/home/epistol/Documents/Sites/CookGeek/storage/app/geoip.mmdb',
        'update_url' => 'https://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz',
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'maxmind_api' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindWebService',
        'user_id' => NULL,
        'license_key' => NULL,
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'ipapi' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPApi',
        'secure' => true,
        'key' => NULL,
        'continent_path' => '/home/epistol/Documents/Sites/CookGeek/storage/app/continents.json',
      ),
    ),
    'cache' => 'all',
    'cache_tags' => 
    array (
      0 => 'torann-geoip-location',
    ),
    'cache_expires' => 30,
    'default_location' => 
    array (
      'ip' => '127.0.0.0',
      'iso_code' => 'US',
      'country' => 'United States',
      'city' => 'New Haven',
      'state' => 'CT',
      'state_name' => 'Connecticut',
      'postal_code' => '06510',
      'lat' => 41.31,
      'lon' => -72.92,
      'timezone' => 'America/New_York',
      'continent' => 'NA',
      'default' => true,
      'currency' => 'USD',
    ),
  ),
  'hashids' => 
  array (
    'default' => 'main',
    'connections' => 
    array (
      'main' => 
      array (
        'salt' => 'le-Sel-de-Cuisine-dG',
        'length' => '7',
      ),
      'alternative' => 
      array (
        'salt' => 'CuisineDeGeekSaltyed',
        'length' => '7',
      ),
    ),
  ),
  'hooks' => 
  array (
    'enabled' => true,
  ),
  'horizon' => 
  array (
    'domain' => NULL,
    'path' => 'horizon',
    'use' => 'default',
    'prefix' => 'horizon:',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'waits' => 
    array (
      'redis:default' => 60,
    ),
    'trim' => 
    array (
      'recent' => 60,
      'failed' => 10080,
    ),
    'fast_termination' => false,
    'memory_limit' => 64,
    'environments' => 
    array (
      'production' => 
      array (
        'supervisor-1' => 
        array (
          'connection' => 'redis',
          'queue' => 
          array (
            0 => 'default',
          ),
          'balance' => 'simple',
          'processes' => 10,
          'tries' => 3,
        ),
      ),
      'local' => 
      array (
        'supervisor-1' => 
        array (
          'connection' => 'redis',
          'queue' => 
          array (
            0 => 'default',
          ),
          'balance' => 'simple',
          'processes' => 3,
          'tries' => 3,
        ),
      ),
    ),
  ),
  'htmlmin' => 
  array (
    'blade' => false,
    'force' => false,
    'ignore' => 
    array (
      0 => 'resources/views/emails',
      1 => 'resources/views/html',
      2 => 'resources/views/notifications',
      3 => 'resources/views/markdown',
      4 => 'resources/views/vendor/emails',
      5 => 'resources/views/vendor/html',
      6 => 'resources/views/vendor/notifications',
      7 => 'resources/views/vendor/markdown',
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'insights' => 
  array (
    'preset' => 'laravel',
    'exclude' => 
    array (
    ),
    'add' => 
    array (
      'NunoMaduro\\PhpInsights\\Domain\\Metrics\\Architecture\\Classes' => 
      array (
        0 => 'NunoMaduro\\PhpInsights\\Domain\\Insights\\ForbiddenFinalClasses',
      ),
    ),
    'remove' => 
    array (
      0 => 'SlevomatCodingStandard\\Sniffs\\Namespaces\\AlphabeticallySortedUsesSniff',
      1 => 'SlevomatCodingStandard\\Sniffs\\TypeHints\\DeclareStrictTypesSniff',
      2 => 'SlevomatCodingStandard\\Sniffs\\TypeHints\\DisallowMixedTypeHintSniff',
      3 => 'NunoMaduro\\PhpInsights\\Domain\\Insights\\ForbiddenDefineFunctions',
      4 => 'NunoMaduro\\PhpInsights\\Domain\\Insights\\ForbiddenNormalClasses',
      5 => 'NunoMaduro\\PhpInsights\\Domain\\Insights\\ForbiddenTraits',
      6 => 'SlevomatCodingStandard\\Sniffs\\TypeHints\\TypeHintDeclarationSniff',
    ),
    'config' => 
    array (
      'NunoMaduro\\PhpInsights\\Domain\\Insights\\ForbiddenPrivateMethods' => 
      array (
        'title' => 'The usage of private methods is not idiomatic in Laravel.',
      ),
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
          1 => 'bugsnag',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/epistol/Documents/Sites/CookGeek/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/epistol/Documents/Sites/CookGeek/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'bugsnag' => 
      array (
        'driver' => 'bugsnag',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'mail.cuisinedegeek.com',
    'port' => '587',
    'from' => 
    array (
      'address' => 'admin@cuisinedegeek.com',
      'name' => 'Cuisine De Geek',
    ),
    'encryption' => 'tls',
    'username' => 'admin@cuisinedegeek.com',
    'password' => '',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/home/epistol/Documents/Sites/CookGeek/resources/views/vendor/mail',
      ),
    ),
    'stream' => 
    array (
      'ssl' => 
      array (
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
      ),
    ),
  ),
  'medialibrary' => 
  array (
    'disk_name' => 'public',
    'max_file_size' => 10485760,
    'queue_name' => '',
    'media_model' => 'App\\Models\\Media',
    's3' => 
    array (
      'domain' => 'https://.s3.amazonaws.com',
    ),
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'url_generator' => NULL,
    'path_generator' => NULL,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '--strip-all',
        1 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Image',
      1 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Webp',
      2 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Pdf',
      3 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Svg',
      4 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Video',
    ),
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'temporary_directory_path' => NULL,
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Jobs\\PerformConversions',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\Jobs\\GenerateResponsiveImages',
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'cache' => 
    array (
      'expiration_time' => 1440,
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
  ),
  'profanity' => 
  array (
    'replaceFullWords' => true,
    'replaceWith' => '*',
    'strReplace' => 
    array (
      'a' => '(a|a\\.|a\\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α|Δ|Λ|λ)',
      'b' => '(b|b\\.|b\\-|8|\\|3|ß|Β|β)',
      'c' => '(c|c\\.|c\\-|Ç|ç|¢|€|<|\\(|{|©)',
      'd' => '(d|d\\.|d\\-|&part;|\\|\\)|Þ|þ|Ð|ð)',
      'e' => '(e|e\\.|e\\-|3|€|È|è|É|é|Ê|ê|∑)',
      'f' => '(f|f\\.|f\\-|ƒ)',
      'g' => '(g|g\\.|g\\-|6|9)',
      'h' => '(h|h\\.|h\\-|Η)',
      'i' => '(i|i\\.|i\\-|!|\\||\\]\\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï)',
      'j' => '(j|j\\.|j\\-)',
      'k' => '(k|k\\.|k\\-|Κ|κ)',
      'l' => '(l|1\\.|l\\-|!|\\||\\]\\[|]|£|∫|Ì|Í|Î|Ï)',
      'm' => '(m|m\\.|m\\-)',
      'n' => '(n|n\\.|n\\-|η|Ν|Π)',
      'o' => '(o|o\\.|o\\-|0|Ο|ο|Φ|¤|°|ø)',
      'p' => '(p|p\\.|p\\-|ρ|Ρ|¶|þ)',
      'q' => '(q|q\\.|q\\-)',
      'r' => '(r|r\\.|r\\-|®)',
      's' => '(s|s\\.|s\\-|5|\\$|§)',
      't' => '(t|t\\.|t\\-|Τ|τ)',
      'u' => '(u|u\\.|u\\-|υ|µ)',
      'v' => '(v|v\\.|v\\-|υ|ν)',
      'w' => '(w|w\\.|w\\-|ω|ψ|Ψ)',
      'x' => '(x|x\\.|x\\-|Χ|χ)',
      'y' => '(y|y\\.|y\\-|¥|γ|ÿ|ý|Ÿ|Ý)',
      'z' => '(z|z\\.|z\\-|Ζ)',
    ),
    'defaults' => 
    array (
      0 => 'fuck',
      1 => 'shit',
    ),
  ),
  'purifier' => 
  array (
    'encoding' => 'UTF-8',
    'finalize' => true,
    'cachePath' => '/home/epistol/Documents/Sites/CookGeek/storage/app/purifier',
    'cacheFileMode' => 493,
    'settings' => 
    array (
      'default' => 
      array (
        'HTML.Doctype' => 'HTML 4.01 Transitional',
        'HTML.Allowed' => 'div,b,strong,i,em,u,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
        'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
        'AutoFormat.AutoParagraph' => true,
        'AutoFormat.RemoveEmpty' => true,
      ),
      'test' => 
      array (
        'Attr.EnableID' => 'true',
      ),
      'youtube' => 
      array (
        'HTML.SafeIframe' => 'true',
        'URI.SafeIframeRegexp' => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%',
      ),
      'custom_definition' => 
      array (
        'id' => 'html5-definitions',
        'rev' => 1,
        'debug' => false,
        'elements' => 
        array (
          0 => 
          array (
            0 => 'section',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          1 => 
          array (
            0 => 'nav',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          2 => 
          array (
            0 => 'article',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          3 => 
          array (
            0 => 'aside',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          4 => 
          array (
            0 => 'header',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          5 => 
          array (
            0 => 'footer',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          6 => 
          array (
            0 => 'address',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          7 => 
          array (
            0 => 'hgroup',
            1 => 'Block',
            2 => 'Required: h1 | h2 | h3 | h4 | h5 | h6',
            3 => 'Common',
          ),
          8 => 
          array (
            0 => 'figure',
            1 => 'Block',
            2 => 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow',
            3 => 'Common',
          ),
          9 => 
          array (
            0 => 'figcaption',
            1 => 'Inline',
            2 => 'Flow',
            3 => 'Common',
          ),
          10 => 
          array (
            0 => 'video',
            1 => 'Block',
            2 => 'Optional: (source, Flow) | (Flow, source) | Flow',
            3 => 'Common',
            4 => 
            array (
              'src' => 'URI',
              'type' => 'Text',
              'width' => 'Length',
              'height' => 'Length',
              'poster' => 'URI',
              'preload' => 'Enum#auto,metadata,none',
              'controls' => 'Bool',
            ),
          ),
          11 => 
          array (
            0 => 'source',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'src' => 'URI',
              'type' => 'Text',
            ),
          ),
          12 => 
          array (
            0 => 's',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          13 => 
          array (
            0 => 'var',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          14 => 
          array (
            0 => 'sub',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          15 => 
          array (
            0 => 'sup',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          16 => 
          array (
            0 => 'mark',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          17 => 
          array (
            0 => 'wbr',
            1 => 'Inline',
            2 => 'Empty',
            3 => 'Core',
          ),
          18 => 
          array (
            0 => 'ins',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'cite' => 'URI',
              'datetime' => 'CDATA',
            ),
          ),
          19 => 
          array (
            0 => 'del',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'cite' => 'URI',
              'datetime' => 'CDATA',
            ),
          ),
        ),
        'attributes' => 
        array (
          0 => 
          array (
            0 => 'iframe',
            1 => 'allowfullscreen',
            2 => 'Bool',
          ),
          1 => 
          array (
            0 => 'table',
            1 => 'height',
            2 => 'Text',
          ),
          2 => 
          array (
            0 => 'td',
            1 => 'border',
            2 => 'Text',
          ),
          3 => 
          array (
            0 => 'th',
            1 => 'border',
            2 => 'Text',
          ),
          4 => 
          array (
            0 => 'tr',
            1 => 'width',
            2 => 'Text',
          ),
          5 => 
          array (
            0 => 'tr',
            1 => 'height',
            2 => 'Text',
          ),
          6 => 
          array (
            0 => 'tr',
            1 => 'border',
            2 => 'Text',
          ),
        ),
      ),
      'custom_attributes' => 
      array (
        0 => 
        array (
          0 => 'a',
          1 => 'target',
          2 => 'Enum#_blank,_self,_target,_top',
        ),
      ),
      'custom_elements' => 
      array (
        0 => 
        array (
          0 => 'u',
          1 => 'Inline',
          2 => 'Inline',
          3 => 'Common',
        ),
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'redis',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'responsecache' => 
  array (
    'enabled' => false,
    'cache_profile' => 'Spatie\\ResponseCache\\CacheProfiles\\CacheAllSuccessfulGetRequests',
    'cache_lifetime_in_minutes' => 10080,
    'add_cache_time_header' => true,
    'cache_store' => 'file',
    'cache_tag' => '',
  ),
  'scout' => 
  array (
    'driver' => 'algolia',
    'prefix' => '',
    'queue' => true,
    'chunk' => 
    array (
      'searchable' => 500,
      'unsearchable' => 500,
    ),
    'algolia' => 
    array (
      'id' => '8070QSGSHF',
      'secret' => '502a5bab5448d851af793f214c27bf67',
    ),
    'mysql' => 
    array (
      'mode' => 'NATURAL_LANGUAGE',
      'model_directories' => 
      array (
        0 => '/home/epistol/Documents/Sites/CookGeek/app',
      ),
      'min_search_length' => 0,
      'min_fulltext_search_length' => 4,
      'min_fulltext_search_fallback' => 'LIKE',
      'query_expansion' => false,
    ),
  ),
  'scout-categunivers' => 
  array (
    'searchableAttributes' => 
    array (
      0 => 'name',
    ),
    'customRanking' => NULL,
    'removeStopWords' => NULL,
    'disableTypoToleranceOnAttributes' => NULL,
    'attributesForFaceting' => NULL,
    'unretrievableAttributes' => NULL,
    'ignorePlurals' => NULL,
    'queryLanguages' => 
    array (
      0 => 'fr',
    ),
    'distinct' => NULL,
    'attributeForDistinct' => NULL,
  ),
  'scout-univers' => 
  array (
    'searchableAttributes' => 
    array (
      0 => 'name',
      1 => 'picture',
      2 => 'description',
    ),
    'customRanking' => 
    array (
      0 => 'desc(created_at)',
      1 => 'desc(updated_at)',
    ),
    'removeStopWords' => NULL,
    'disableTypoToleranceOnAttributes' => NULL,
    'attributesForFaceting' => NULL,
    'unretrievableAttributes' => NULL,
    'ignorePlurals' => NULL,
    'queryLanguages' => 
    array (
      0 => 'fr',
    ),
    'distinct' => NULL,
    'attributeForDistinct' => NULL,
  ),
  'sentry' => 
  array (
    'dsn' => '',
    'breadcrumbs' => 
    array (
      'sql_bindings' => true,
    ),
    'breadcrumbs.sql_bindings' => true,
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'sightengine' => 
    array (
      'user' => '',
      'key' => '',
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'google' => 
    array (
      'client_id' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX.apps.googleusercontent.com',
      'client_secret' => 'XXXXXXXXXXXXXXXXXXXXXXXX',
      'redirect' => '/google/callback',
    ),
    'twitter' => 
    array (
      'client_id' => '',
      'client_secret' => '',
      'redirect' => '/twitter/callback',
    ),
    'facebook' => 
    array (
      'client_id' => '',
      'client_secret' => '',
      'redirect' => '/facebook/callback',
    ),
    'instagram' => 
    array (
      'client_id' => '',
      'client_secret' => '',
      'redirect' => 'https://cuisinedegeek.com/instagram/callback',
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 10080,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/epistol/Documents/Sites/CookGeek/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'cdg_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'telescope' => 
  array (
    'domain' => NULL,
    'path' => 'telescope',
    'driver' => 'database',
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
      ),
    ),
    'enabled' => true,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Laravel\\Telescope\\Http\\Middleware\\Authorize',
    ),
    'ignore_paths' => 
    array (
    ),
    'ignore_commands' => 
    array (
    ),
    'watchers' => 
    array (
      'Laravel\\Telescope\\Watchers\\CacheWatcher' => true,
      'Laravel\\Telescope\\Watchers\\CommandWatcher' => true,
      'Laravel\\Telescope\\Watchers\\DumpWatcher' => true,
      'Laravel\\Telescope\\Watchers\\EventWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ExceptionWatcher' => true,
      'Laravel\\Telescope\\Watchers\\JobWatcher' => true,
      'Laravel\\Telescope\\Watchers\\LogWatcher' => true,
      'Laravel\\Telescope\\Watchers\\MailWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ModelWatcher' => true,
      'Laravel\\Telescope\\Watchers\\NotificationWatcher' => true,
      'Laravel\\Telescope\\Watchers\\QueryWatcher' => 
      array (
        'enabled' => true,
        'slow' => 100,
      ),
      'Laravel\\Telescope\\Watchers\\RedisWatcher' => true,
      'Laravel\\Telescope\\Watchers\\RequestWatcher' => 
      array (
        'enabled' => true,
        'size_limit' => 64,
      ),
      'Laravel\\Telescope\\Watchers\\ScheduleWatcher' => true,
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
    ),
  ),
  'translatable' => 
  array (
    'locales' => 
    array (
      0 => 'en',
      1 => 'fr',
      'es' => 
      array (
        0 => 'MX',
        1 => 'CO',
      ),
    ),
    'locale_separator' => '-',
    'locale' => NULL,
    'use_fallback' => false,
    'use_property_fallback' => true,
    'fallback_locale' => 'en',
    'translation_model_namespace' => NULL,
    'translation_suffix' => 'Translation',
    'locale_key' => 'locale',
    'to_array_always_loads_translations' => true,
  ),
  'trustedproxy' => 
  array (
    'proxies' => 
    array (
      0 => '192.168.1.10',
    ),
    'headers' => 
    array (
      1 => 'FORWARDED',
      2 => 'X_FORWARDED_FOR',
      4 => 'X_FORWARDED_HOST',
      8 => 'X_FORWARDED_PROTO',
      16 => 'X_FORWARDED_PORT',
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/epistol/Documents/Sites/CookGeek/resources/views',
    ),
    'compiled' => '/home/epistol/Documents/Sites/CookGeek/storage/framework/views',
  ),
  'voyager' => 
  array (
    'user' => 
    array (
      'add_default_role_on_register' => true,
      'default_role' => 'user',
      'namespace' => NULL,
      'default_avatar' => 'users/default.png',
      'redirect' => '/admin',
    ),
    'controllers' => 
    array (
      'namespace' => 'TCG\\Voyager\\Http\\Controllers',
    ),
    'models' => 
    array (
    ),
    'storage' => 
    array (
      'disk' => 'public',
    ),
    'hidden_files' => false,
    'database' => 
    array (
      'tables' => 
      array (
        'hidden' => 
        array (
          0 => 'migrations',
          1 => 'data_rows',
          2 => 'data_types',
          3 => 'menu_items',
          4 => 'password_resets',
          5 => 'permission_role',
          6 => 'settings',
        ),
      ),
      'autoload_migrations' => false,
    ),
    'multilingual' => 
    array (
      'enabled' => false,
      'default' => 'en',
      'locales' => 
      array (
        0 => 'en',
      ),
    ),
    'dashboard' => 
    array (
      'navbar_items' => 
      array (
        'voyager::generic.profile' => 
        array (
          'route' => 'voyager.profile',
          'classes' => 'class-full-of-rum',
          'icon_class' => 'voyager-person',
        ),
        'voyager::generic.home' => 
        array (
          'route' => '/',
          'icon_class' => 'voyager-home',
          'target_blank' => true,
        ),
        'voyager::generic.logout' => 
        array (
          'route' => 'voyager.logout',
          'icon_class' => 'voyager-power',
        ),
      ),
      'widgets' => 
      array (
      ),
    ),
    'bread' => 
    array (
      'add_menu_item' => true,
      'default_menu' => 'admin',
      'add_permission' => true,
      'default_role' => 'admin',
    ),
    'primary_color' => '#22A7F0',
    'show_dev_tips' => true,
    'additional_css' => 
    array (
    ),
    'additional_js' => 
    array (
    ),
    'googlemaps' => 
    array (
      'key' => '',
      'center' => 
      array (
        'lat' => '32.715738',
        'lng' => '-117.161084',
      ),
      'zoom' => 11,
    ),
    'settings' => 
    array (
      'cache' => false,
    ),
    'compass_in_production' => false,
    'media' => 
    array (
      'allowed_mimetypes' => '*',
      'path' => '/',
      'show_folders' => true,
      'allow_upload' => true,
      'allow_move' => true,
      'allow_delete' => true,
      'allow_create_folder' => true,
      'allow_rename' => true,
    ),
  ),
  'voyager-hooks' => 
  array (
    'enabled' => true,
    'add-route' => true,
    'add-hook-menu-item' => true,
    'add-hook-permissions' => true,
    'publish-vendor-files' => true,
  ),
  'vue-i18n-generator' => 
  array (
    'langPath' => '/resources/lang',
    'langFiles' => 
    array (
    ),
    'excludes' => 
    array (
    ),
    'jsPath' => '/resources/assets/js/langs/',
    'jsFile' => '/resources/assets/js/vue-i18n-locales.generated.js',
    'i18nLib' => 'vue-i18n',
    'showOutputMessages' => false,
  ),
  'cors' => 
  array (
    'supportsCredentials' => false,
    'allowedOrigins' => 
    array (
      0 => '*',
    ),
    'allowedOriginsPatterns' => 
    array (
    ),
    'allowedHeaders' => 
    array (
      0 => '*',
    ),
    'allowedMethods' => 
    array (
      0 => '*',
    ),
    'exposedHeaders' => 
    array (
    ),
    'maxAge' => 0,
  ),
  'sitemap' => 
  array (
    'guzzle_options' => 
    array (
      'cookies' => true,
      'connect_timeout' => 10,
      'timeout' => 10,
      'allow_redirects' => false,
    ),
    'execute_javascript' => false,
    'chrome_binary_path' => NULL,
    'crawl_profile' => 'Spatie\\Sitemap\\Crawler\\Profile',
  ),
  'bugsnag' => 
  array (
    'api_key' => '1690164e4e6016f5484b56c7f9bb9523',
    'app_type' => NULL,
    'app_version' => NULL,
    'batch_sending' => NULL,
    'endpoint' => NULL,
    'filters' => 
    array (
      0 => 'password',
    ),
    'hostname' => NULL,
    'proxy' => 
    array (
    ),
    'project_root' => NULL,
    'strip_path' => NULL,
    'query' => true,
    'bindings' => false,
    'release_stage' => NULL,
    'notify_release_stages' => NULL,
    'send_code' => true,
    'callbacks' => true,
    'user' => true,
    'logger_notify_level' => NULL,
    'auto_capture_sessions' => false,
    'session_endpoint' => NULL,
    'build_endpoint' => NULL,
  ),
);
