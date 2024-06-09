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

    public function mount()
    {
        $saw = new MetodeSPK();
        $result = $saw->hitungSPK();

        $this->bansosData = $result['bansosData'];
        $this->datanormalisasi = $result['datanormalisasi'];
        $this->weightedData = $result['weightedData'];
        $this->idealpositif = $result['idealpositif'];
        $this->idealnegatif = $result['idealnegatif'];
        $this->distances = $result['distances'];
        $this->preferences = $result['preferences'];
    }
}
