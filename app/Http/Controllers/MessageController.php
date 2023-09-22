<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public  function index()
    {
        $messages = Message::all();
        return inertia('Message/Index', compact('messages'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);
        Log::info($request);
        return MessageResource::make($message)->resolve();
    }
    public  function test(){
        $a = Message::create(['body' => 'asb']);
        dd($a);
    }
}
