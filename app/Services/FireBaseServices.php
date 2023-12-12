<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Http;

class FireBaseServices
{
    protected $database;

    public function __construct()
    {
        $this->database = (new Factory)
            ->withServiceAccount(base_path('google-services.json'))
            ->withDatabaseUri('https://nourish-fitness-default-rtdb.firebaseio.com')
            ->createDatabase();
    }

    public function push($path, $data)
    {
        $this->database->getReference($path)->push($data);
    }

    public function update($path, $data)
    {
        $this->database->getReference($path)->set($data);
    }

    public function delete($path, $parentObj)
    {

        $this->database->getReference($path)->remove();
    }

    public  function getDeviceData($path)
    {
        $data = $this->database->getReference($path)->getValue();
    }

    public function sendNotification($fcmToken, $data)
    {
         $response = Http::withHeaders([
            'Authorization' => 'key=' . env("CLOUD_MESSAGING_KEY"),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
         ])->post('https://fcm.googleapis.com/fcm/send', [
            "to" => $fcmToken,
            "notification" => $data
        ]);
 
        // Check if the request was successful (status code 2xx)
        if ($response->successful()) {
             $data = $response->json(); 
        } else {
            $statusCode = $response->status(); 
            $errorMessage = $response->body();
        }
    }
}
