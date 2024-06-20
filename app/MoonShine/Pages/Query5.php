<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Components\FormBuilder;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;

class Query5 extends Page
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
        return $this->title ?: 'Query5';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
        $specific_date = Date::make('Конкретная дата')->value();
            $action = '/admin/page/query5?' . http_build_query([
                'specific_date' => $specific_date,
            ]);
            return [
                Text::make()
                ->readonly()
                ->placeholder('Получить список, общее количество и стоимость изделия, выпеченного за конкретный день.'),
                Block::make([
                    FormBuilder::make()
                    ->action($action)
                    ->method('POST')
                    ->fields(  [
                        Date::make('specific_date'),
                    ])
                    ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
    
                ])
            ];
	}
}
