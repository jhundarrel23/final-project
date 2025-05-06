<?php

return [

    /*
    |----------------------------------------------------------------------
    | Laravel CORS Configuration
    |----------------------------------------------------------------------
    |
    | The settings below control the Cross-Origin Resource Sharing (CORS)
    | behavior of your application. You can adjust these values based on
    | the needs of your application and the specific environments you're
    | working with.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    /*
    |----------------------------------------------------------------------
    | Allowed Origins
    |----------------------------------------------------------------------
    |
    | You can specify which domains are allowed to access your application.
    | For security reasons, you may want to restrict this to trusted
    | origins. You can use "*" to allow all domains.
    |
    | Example: ['https://example.com', 'http://localhost:3000']
    */
    'allowed_origins' => ['*'],  // '*' allows all origins, or specify specific ones.

    /*
    |----------------------------------------------------------------------
    | Allowed Origins Patterns
    |----------------------------------------------------------------------
    |
    | You can also use regular expressions to allow origins dynamically.
    | This is useful when you need to allow subdomains or other variations.
    |
    | Example: ['/^https:\/\/.*\.example\.com$/']
    */
    'allowed_origins_patterns' => [],

    /*
    |----------------------------------------------------------------------
    | Allowed HTTP Methods
    |----------------------------------------------------------------------
    |
    | You can specify which HTTP methods (GET, POST, PUT, DELETE, etc.) are
    | allowed when making cross-origin requests.
    |
    | Example: ['GET', 'POST', 'PUT', 'DELETE']
    */
    'allowed_methods' => ['*'], // '*' allows all methods, or specify ['GET', 'POST'].

    /*
    |----------------------------------------------------------------------
    | Allowed Headers
    |----------------------------------------------------------------------
    |
    | This determines which headers are allowed when making a request to your
    | application. You can specify individual headers or use '*' to allow all.
    |
    | Example: ['Content-Type', 'Authorization']
    */
    'allowed_headers' => ['*'], // '*' allows all headers, or specify custom ones.

    /*
    |----------------------------------------------------------------------
    | Exposed Headers
    |----------------------------------------------------------------------
    |
    | This allows you to specify which headers are exposed to the browser.
    | If you don't need to expose any special headers, you can leave it empty.
    |
    | Example: ['X-Custom-Header']
    */
    'exposed_headers' => [], // Specify any custom exposed headers.

    /*
    |----------------------------------------------------------------------
    | Max Age
    |----------------------------------------------------------------------
    |
    | The number of seconds the browser should cache the CORS preflight request
    | response. Set to false to disable caching.
    |
    | Example: 3600 (1 hour)
    */
    'max_age' => 0, // In seconds, or false to disable caching.

    /*
    |----------------------------------------------------------------------
    | Supports Credentials
    |----------------------------------------------------------------------
    |
    | Indicates whether or not the application supports credentials (cookies, HTTP
    | authentication, and client-side SSL certificates). Set to true if needed.
    |
    | Example: true or false
    */
    'supports_credentials' => true, // Set this to true if you need to allow credentials (cookies, HTTP auth).

    /*
    |----------------------------------------------------------------------
    | Hosts
    |----------------------------------------------------------------------
    |
    | A list of hosts that are allowed to make CORS requests. For example, you can
    | restrict the CORS requests to only a set of trusted hosts.
    |
    | Example: ['example.com', 'sub.example.com']
    */
    'hosts' => [],



return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | The settings below control the Cross-Origin Resource Sharing (CORS)
    | behavior of your application. You can adjust these values based on
    | the needs of your application and the specific environments you're
    | working with.
    |
    */

    'allowed_origins' => ['http://localhost:3000'], // Front-end origin (React app)
    'allowed_origins_patterns' => [],
    'allowed_methods' => ['*'], // Allow all methods (GET, POST, etc.)
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Allow credentials (e.g., cookies)
    'hosts' => [],

];



