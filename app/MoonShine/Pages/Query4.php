<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Ingredient;
use MoonShine\Components\FormBuilder;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Date;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

class Query4 extends Page
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
        return $this->title ?: 'Query4';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
        $name = Select::make('Ингредиент', 'name');
        $start_date = Date::make('Начальная дата')->value();
        $end_date = Date::make('Конечная дата')->value();

        $action = '/admin/page/query4?' . http_build_query([
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
        return [
            Text::make()
            ->readonly()
            ->placeholder('Получить список и общее число изделий, сделанных в определенный период времени, состоящих из определенных ингредиентов.'),
            Block::make([
                FormBuilder::make()
                ->action($action)
                ->method('POST')
                ->fields(  [
                    Select::make('Название изделие', 'name')
                    ->options(
                        Ingredient::pluck('name', 'id')
                            ->all()
                    )->nullable()->searchable(),
                    Date::make('start_date'),
                    Date::make('end_date'),

                ])
                ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 

            ])
        ];
	}
}
