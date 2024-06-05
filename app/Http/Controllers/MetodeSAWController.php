<?php

namespace App\Http\Controllers;

use App\SPK\MetodeSAW;
use Illuminate\Http\Request;

class MetodeSAWController extends Controller
{
    protected $saw;

    public function __construct(MetodeSAW $saw)
    {
        $this->saw = $saw;
    }

    public function index()
    {
        $result = $this->saw->calculateSAW();
        return view('saw.index', $result);
    }
}
