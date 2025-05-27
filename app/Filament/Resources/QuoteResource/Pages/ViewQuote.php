<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Filament\Resources\QuoteResource;
use Filament\Resources\Pages\Page;
use App\Models\Quote;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ViewQuote extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = QuoteResource::class;

    protected static string $view = 'filament.resources.quote-resource.pages.view-quote';

    public Quote $record;

    protected function getTableQuery()
    {
        return $this->record->services()->getQuery(); // Consulta de servicios relacionados
    }


    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Nombre del servicio'),
            TextColumn::make('cost')->money('MXN')
        ];
    }

}
