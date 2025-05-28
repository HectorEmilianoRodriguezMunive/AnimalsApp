<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{

    protected static string $resource = UserResource::class;
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

        protected function handleRecordCreation(array $data): Model
    {
        $role = $data['role'];
        unset($data['role']); // quitar el role para crear usuario

        $user = User::create($data);
        $user->assignRole($role);

        return $user;
    }

}
