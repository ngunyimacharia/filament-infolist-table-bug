<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Component;

class TabbedInfolist extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->state([])
            ->schema([
                Tabs::make("Tabs")->tabs([
                    Tab::make("Equipment")->schema([
                        Livewire::make(ListTable::class),
                    ]),
                    Tab::make("Optical")->schema([]),
                ]),
            ]);
    }

    public function render()
    {
        return view("livewire.tabbed-infolist");
    }
}
