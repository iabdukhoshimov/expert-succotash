<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarsResource\Pages;
use App\Filament\Resources\CarsResource\RelationManagers;
use App\Models\Cars;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarsResource extends Resource
{
    protected static ?string $model = Cars::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('customer_id')
                    ->numeric(),
                Forms\Components\TextInput::make('car_model_id')
                    ->numeric(),
                Forms\Components\TextInput::make('fuel_id')
                    ->numeric(),
                Forms\Components\Select::make('car_colour_id')
                    ->relationship('carColour', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                    ])
                    ->createOptionAction(fn ($action) => $action->slideOver()),
                Forms\Components\TextInput::make('car_number'),
                Forms\Components\TextInput::make('manufacture_year')
                    ->numeric(),
                Forms\Components\Toggle::make('main_car')
                    ->required(),
                Forms\Components\Toggle::make('can_deliver')
                    ->required(),
                Forms\Components\TextInput::make('status'),
                Forms\Components\TextInput::make('technical_passport_front'),
                Forms\Components\TextInput::make('technical_passport_back'),
                Forms\Components\TextInput::make('car_photo_left'),
                Forms\Components\TextInput::make('car_photo_right'),
                Forms\Components\TextInput::make('car_photo_front'),
                Forms\Components\TextInput::make('car_photo_back'),
                Forms\Components\TextInput::make('car_photo_trunk'),
                Forms\Components\TextInput::make('car_photo_seats_back'),
                Forms\Components\TextInput::make('car_photo_seats_front'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car_model_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fuel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car_colour_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('manufacture_year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('main_car')
                    ->boolean(),
                Tables\Columns\IconColumn::make('can_deliver')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('technical_passport_front')
                    ->searchable(),
                Tables\Columns\TextColumn::make('technical_passport_back')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_left')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_right')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_front')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_back')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_trunk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_seats_back')
                    ->searchable(),
                Tables\Columns\TextColumn::make('car_photo_seats_front')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCars::route('/create'),
            'view' => Pages\ViewCars::route('/{record}'),
            'edit' => Pages\EditCars::route('/{record}/edit'),
        ];
    }
}
