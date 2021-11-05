<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function showTopic($topic) {

        // Haal uit de DB uit de table topcis de topci met naam = $topic
        // $topicUitDB = .....
        echo "Dit is de pagina van topic "  . $topic;
        //return view('layout', ['topic' => $topicUitDB]);
    }
}
