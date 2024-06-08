<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgendaAcaraResource;
use App\Models\AgendaAcara;
use Illuminate\Http\Request;

class AgendaAcaraController extends Controller
{
    public function index() {
        $agenda = AgendaAcara::all();
        return AgendaAcaraResource::collection($agenda);
    }
}