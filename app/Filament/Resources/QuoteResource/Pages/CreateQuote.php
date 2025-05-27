<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Quote;
use App\Models\User;

class CreateQuote extends CreateRecord 
{
    
    public array $selectedServices = [];
    public int $Tax;


    protected static string $resource = \App\Filament\Resources\QuoteResource::class;

  
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('Tax')->integer()->required(), 
            Forms\Components\TextInput::make('description')->required(),
            Forms\Components\Select::make('selectedServices')
                ->label('Select services')
                ->multiple()
                ->options(Service::all()->pluck('name', 'id'))
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->selectedServices = $state ?? []),
            Forms\Components\Select::make('selectClient')
                ->label('Select the client')
                ->options(User::all()->pluck('name', 'id'))
        ]);
    }


   
   protected function handleRecordCreation(array $data): Quote
    {
        $services = Service::whereIn('id', $this->selectedServices)->get();

        $subtotal = $services->sum('cost');

        $taxAmount = $subtotal * ($data['Tax'] / 100);
        $total = $subtotal + $taxAmount;

        $quote = Quote::create([
            'IVA' => $data['Tax'],
            'subtotal' => $subtotal,
            'total' => $total,
            'date_quote' => now(),
            'description' => $data['description'],
            'user_id' => $data['selectClient']
        ]);

        if (!empty($this->selectedServices)) {
            $quote->services()->sync($this->selectedServices);
        }

        return $quote;
    }
}
