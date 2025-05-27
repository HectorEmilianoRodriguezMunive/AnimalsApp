<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Filament\Resources\QuoteResource;
use Filament\Actions;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use App\Models\Service;

class CreateQuote extends CreateRecord implements HasForms
{
    protected static string $resource = QuoteResource::class;
    protected static string $view = 'filament.resources.quote-resource.pages.create-quote';

 

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('service_id')->label('Servicio')
                ->options(function(){
                    return Service::all()->pluck('name', 'id')->toArray();
                })

            ]);
    }


}
