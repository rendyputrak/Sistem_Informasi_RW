<?php

namespace App\Http\Controllers;

use App\SPK\MetodeSPK;
use Illuminate\Http\Request;

class MetodeSPKController extends Controller
{
    protected $spk;

    public function __construct(MetodeSPK $spk)
    {
        $this->spk = $spk;
    }

    public function index()
    {
        $spk = new MetodeSPK();
        $result = $spk->hitungSPK();
        $result['bobot'] = $spk->getBobot();
        $result['kriteria'] = $spk->getKriteria();
        
    }
}
