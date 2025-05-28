<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public  function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required(),
                Select::make('role')
                    ->label('Rol')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->required(),
            ]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
{
    $role = $data['role'];
    unset($data['role']); 

    $record->update($data);

    $record->syncRoles([$role]);

    return $record;
}
}
