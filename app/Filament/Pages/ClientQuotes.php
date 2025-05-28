<?php

namespace App\Filament\Pages\Client;

use App\Filament\Resources\ClientQuoteResource\Pages\ViewClientQuote;
use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\Action;

class ClientQuotes extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $view = 'filament.resources.client-quote-resource.pages.view-client-quote';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Quote::where('user_id', Auth::id())
            )
            ->columns([
                TextColumn::make('date_quote')->label('Date'),
                TextColumn::make('subtotal'),
                TextColumn::make('IVA'),
                TextColumn::make('total'),
                TextColumn::make('description'),
            ]);
            
    }

    

    
}
