<?php

namespace App\Providers;

use League\OAuth2\Client\Provider\GenericProvider;

class ImgurService
{
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->clientId = env('IMGUR_CLIENT_ID');
        $this->clientSecret = env('IMGUR_CLIENT_SECRET');
    }

    public function uploadImage(string $imagePath): string
    {
        $provider = new GenericProvider([
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'auth_uri' => 'https://api.imgur.com/oauth2/authorize',
            'token_uri' => 'https://api.imgur.com/oauth2/token',
            'user_agent' => 'My Laravel Application',
        ]);

        $token = $provider->getAccessToken('client_credentials');

        $response = Http::post('https://api.imgur.com/3/upload', [
            'image' => Http::attach('image', $imagePath),
            'type' => 'url',
        ], [
            'Authorization' => 'Bearer ' . $token->accessToken,
        ]);

        $imgurData = $response->json();

        return $imgurData['data']['link'];
    }
}
