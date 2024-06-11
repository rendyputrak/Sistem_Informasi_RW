<?php

namespace App\Filament\Resources\SPKResource\Pages;

use App\Filament\Resources\SPKResource;
use App\SPK\MetodeSPK;
use Filament\Resources\Pages\Page;

class SPK extends Page
{
    protected static string $resource = SPKResource::class;

    protected static string $view = 'filament.resources.s-p-k-resource.pages.spk';

    public static ?string $title = 'SPK';
    public $bansosData;
    public $datanormalisasi;
    public $weightedData;
    public $idealpositif;
    public $idealnegatif;
    public $distances;
    public $preferences;
    public $bobot;
    public $kriteria;
    public $penghasilan;
    public $pengeluaran;
    public $status_rumah;
    public $luas_rumah;
    public $tanggungan;

    public function mount()
    {
        $spk = new MetodeSPK();
        $result = $spk->hitungSPK();

        $this->bansosData = $result['bansosData'];
        $this->datanormalisasi = $result['datanormalisasi'];
        $this->weightedData = $result['weightedData'];
        $this->idealpositif = $result['idealpositif'];
        $this->idealnegatif = $result['idealnegatif'];
        $this->distances = $result['distances'];
        $this->preferences = $result['preferences'];
        $this->bobot = $spk->getBobot();
        $this->kriteria = $spk->getKriteria();
        $this->penghasilan = $spk->getPenghasilan();
        $this->pengeluaran = $spk->getpengeluaran();
        $this->status_rumah = $spk->getStatusRumah();
        $this->luas_rumah = $spk->getLuasRumah();
        $this->tanggungan = $spk->getTanggungan();
    }
}
