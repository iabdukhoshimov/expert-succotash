<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentsResource\Pages;
use App\Models\Documents;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;

class DocumentsResource extends Resource
{
    protected static ?string $model = Documents::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                    ->relationship('customer', 'first_name')
                    ->required()
                    ->label('Customer'),
                Select::make('car_id')
                    ->relationship('car', 'car_number')
                    ->required()
                    ->label('Car'),
                Select::make('document_type')
                    ->options([
                        'passport' => 'Passport',
                        'license' => 'License',
                        'tech_passport' => 'Technical Passport',
                    ])
                    ->required()
                    ->label('Document Type'),
                FileUpload::make('front_side')
                    ->label('Front Side'),
                FileUpload::make('reverse_side')
                    ->label('Reverse Side'),
                FileUpload::make('full_photo')
                    ->label('Full Photo'),
                FileUpload::make('back_side')
                    ->label('Back Side'),
                FileUpload::make('selfie_with_license')
                    ->label('Selfie with License'),
                FileUpload::make('license')
                    ->label('License'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required()
                    ->label('Status'),
                TextInput::make('rejection_reason')
                    ->label('Rejection Reason'),
                DateTimePicker::make('approved_at')
                    ->label('Approved At'),
                DateTimePicker::make('rejected_at')
                    ->label('Rejected At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.first_name')->label('Customer'),
                Tables\Columns\TextColumn::make('car.car_number')->label('Car'),
                Tables\Columns\TextColumn::make('document_type')->label('Document Type'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('approved_at')->dateTime()->label('Approved At'),
                Tables\Columns\TextColumn::make('rejected_at')->dateTime()->label('Rejected At'),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocuments::route('/create'),
            'view' => Pages\ViewDocuments::route('/{record}'),
            'edit' => Pages\EditDocuments::route('/{record}/edit'),
        ];
    }
}
