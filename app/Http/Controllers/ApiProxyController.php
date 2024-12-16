<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class ApiProxyController extends Controller
{
    protected $apiBaseUrl = 'https://postback-sms.com/api/'; 
    protected $apiToken = "5994c91001f57eea808aff11738d752a"; 
    public function getNumber(Request $request)
    {
        $country = $request->query('country');
        $service = $request->query('service');


        $response = Http::get("{$this->apiBaseUrl}", [
            "action" => "getNumber",
            "country" => $country,
            "service" => $service,
            "token" => "{$this->apiToken}"
        ]);

        return $this->handleResponse($response);
    }

    public function getSms(Request $request)
    {
        $activationId = $request->query('activation');

        $response = Http::get("{$this->apiBaseUrl}", [
            'action' => 'getSms',
            'activation' => $activationId,
            "token" => "{$this->apiToken}"
        ]);

        return $this->handleResponse($response);
    }

    public function cancelNumber(Request $request)
    {
        $activationId = $request->query('activation');

        $response = Http::withToken($this->apiToken)->get("{$this->apiBaseUrl}", [
            'action' => 'cancelNumber',
            'activation' => $activationId,
            "token" => "{$this->apiToken}"
        ]);

        return $this->handleResponse($response);
    }

    public function getStatus(Request $request)
    {
        $activationId = $request->query('activation');

        $response = Http::withToken($this->apiToken)->get("{$this->apiBaseUrl}", [
            'action' => 'getStatus',
            'activation' => $activationId,
            "token" => "{$this->apiToken}"
        ]);

        return $this->handleResponse($response);
    }

    protected function handleResponse($response)
    {   if ($response->failed()) {
        return response()->json(['error' => 'Unable to fetch number'], $response->status());
    }

        return response()->json($response->json(), $response->status());
    }
}