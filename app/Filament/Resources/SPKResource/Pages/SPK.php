<?php

namespace App\Filament\Resources\SPKResource\Pages;

use App\Filament\Resources\SPKResource;
use App\SPK\MetodeSAW;
use Filament\Resources\Pages\Page;

class SPK extends Page
{
    protected static string $resource = SPKResource::class;

    protected static string $view = 'filament.resources.s-p-k-resource.pages.spk';

    public static ?string $title = 'SPK';
    public $bansosData;
    public $normalizedData;
    public $weightedData;
    public $idealPositive;
    public $idealNegative;
    public $distances;
    public $preferences;

    public function mount()
    {
        $saw = new MetodeSAW();
        $result = $saw->calculateSAW();

        $this->bansosData = $result['bansosData'];
        $this->normalizedData = $result['normalizedData'];
        $this->weightedData = $result['weightedData'];
        $this->idealPositive = $result['idealPositive'];
        $this->idealNegative = $result['idealNegative'];
        $this->distances = $result['distances'];
        $this->preferences = $result['preferences'];
    }
}
