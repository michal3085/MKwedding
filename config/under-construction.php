<?php

return [

    /*
     * Activate under construction mode.
     */
    'enabled' => env('UNDER_CONSTRUCTION_ENABLED', true),

    /*
     * Hash for the current pin code
     */
    'hash' => env('UNDER_CONSTRUCTION_HASH', null),

    /*
     * Under construction title.
     */
    'title' => 'Karolina & Maciek',

    /*
     * Custom Route Prefix
     * */
    'route-prefix' => env('UNDER_CONSTRUCTION_ROUTE_PREFIX', 'under'),

    /*
     * Custom Endpoint if you don't want to use 'construction'
     * e.g. if you change to 'checkpoint', the route prefix
     * above will be appended giving you 'under/checkpoint'
     * */
    'custom-endpoint' => env('UNDER_CONSTRUCTION_CUSTOM_ENDPOINT', 'construction'),

    /*
     * Back button translation.
     */
    'back-button' => 'wróć',

    /*
    * Show button translation.
    */
    'show-button' => 'pokaż',

    /*
     * Hide button translation.
     */
    'hide-button' => 'ukryj',

    /*
     * Show loader.
     */
    'show-loader' => true,

    /*
     * Redirect url after a successful login.
     */
    'redirect-url' => '/',

    /*
     * Enable throttle (max login attempts).
     */
    'throttle' => true,

    /*
    |--------------------------------------------------------------------------
    | Throttle settings (only when throttle is true).
    |--------------------------------------------------------------------------
    |
    */

    /*
    * Set the amount of digits (max 6).
    */
    'total_digits' => 4,

    /*
     * Set the maximum number of attempts to allow.
     */
    'max_attempts' => 3,

    /*
     * Show attempts left.
     */
    'show_attempts_left' => true,

    /*
     * Attempts left message.
     */
    'attempts_message' => 'Pozostało prób: %i',

    /*
     * Too many attempts message.
     */
    'seconds_message' => 'Zbyt wiele nieudanych prób spróbuj za %i sekund.',

    /*
     * Set the number of minutes to disable login.
     */
    'decay_minutes' => 5,

    /*
     * Prevent the site from being indexed by Robots when locked
     */
    'lock_robots' => true,
];
