<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Recipe;
use MoonShine\Components\FormBuilder;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

class Query7 extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Query7';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{

            $name = Select::make('Рецепт', 'name');
            $action = '/admin/page/query7?' . http_build_query([
                'name' => $name,
            ]);
            return [
                Text::make()
                ->readonly()
                ->placeholder('Получить сведения о рецептах: какой ингредиент в каком количестве необходим для выпечки определенного изделия.'),
                Block::make([
                    FormBuilder::make()
                    ->action($action)
                    ->method('POST')
                    ->fields(  [
                        Select::make('Рецепт', 'name')
                        ->options(
                            Recipe::pluck('name', 'id')
                                ->all()
                        )->nullable()->searchable(),
                    ])
                    ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
    
                ])
            ];
	}
}
