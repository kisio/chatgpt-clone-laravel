<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatGPTIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id=null): Response
    {
        return Inertia::render('Chat/ChatIndex');
    }
}
