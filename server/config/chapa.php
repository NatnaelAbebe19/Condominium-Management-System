<?php

/*
 * This file is part of the Chapa Laravel package.
 *
 * Kidus Yared - @kidus363 <kidusy@chapa.co>
 *
 *
 */
return [

    'publicKey' => env('CHAPA_PUBLIC_KEY'),

    /**
     * Secret Key: Your Chapa secretKey. Sign up on https://dashboard.chapa.co/ to get one from your settings page
     *
     */
    'secretKey' => env('CHAPA_SECRET_KEY'),



    // 'secretKey' => env('CHAPA_WEBHOOK_SECRET')



];
