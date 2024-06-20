<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Components\FormBuilder;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Date;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

class Query10 extends Page
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
        return $this->title ?: 'Query10';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
        $start_date =  Date::make('Начальная дата')->value();
        $end_date = Date::make('Конечная дата')->value();
            $action = '/admin/page/query10?' . http_build_query([
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
            return [
                Text::make()
                ->readonly()
                ->placeholder('Получить кассовый отчет за определенный период.'),
                Block::make([
                    FormBuilder::make()
                    ->action($action)
                    ->method('POST')
                    ->fields(  [
                        Date::make('start_date'),
                        Date::make('end_date')
                    ])
                    ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
    
                ])
            ];
	}
}
