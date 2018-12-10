<?php

return array(
/** set your paypal credential **/
'client_id' =>'AQKYIGouU5aq3ctqJHrktzKA4D7dqxAKyXOETc-ZNuH_0UC4VSnLx8MiNbbupENhpBrRfXYK3Td7HjwB',
'secret' => 'EH4kE7c_EF9Ty18IdSNYDAxU9UvZ38jxsN3-Dj-jULzFsz_ANPde7VQp8khQ5iLZgqfNiW_dr980FdMV',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);