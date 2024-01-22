<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\Modal\Actions\Action;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ListTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(User::query())->headerActions([
            CreateAction::make()
                ->model(Post::class)
                ->form([
                    TextInput::make("title")
                        ->required()
                        ->maxLength(255),
                ])
                ->using(fn(array $data) => dd($data)),
        ]);
    }

    public function render()
    {
        return view("livewire.list-table");
    }
}
