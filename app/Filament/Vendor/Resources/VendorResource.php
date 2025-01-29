<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\VendorResource\Pages;
use App\Filament\Vendor\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;
    protected static ?string $modelLabel = "Profile";
    protected static ?string $pluralModelLabel = "Profile";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
    
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Repeater::make('shop')
                    ->relationship('shop')
                    ->columnSpan('full')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->label('Shop-Name')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                        ->maxLength(255),
                        Forms\Components\Textarea::make('map')
                        ->maxLength(255),
                        Forms\Components\FileUpload::make('logo')
                        ->required(),
                    ])
                    ->addable(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(self::getEloquentQuery()->where('id', Auth::guard('vendor')->user()->id))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('balance')
                    ->numeric()
                    ->sortable(),
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
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVendors::route('/'),
            // 'create' => Pages\CreateVendor::route('/create'),
            // 'view' => Pages\ViewVendor::route('/{record}'),
            // 'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
