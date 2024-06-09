<?php

namespace App\Http\Controllers;

use App\SPK\MetodeSPK;
use Illuminate\Http\Request;

class MetodeSPKController extends Controller
{
    protected $saw;

    public function __construct(MetodeSPK $saw)
    {
        $this->saw = $saw;
    }

    public function index()
    {
        $result = $this->saw->hitungSPK();
        return view('saw.index', $result);
    }
}
