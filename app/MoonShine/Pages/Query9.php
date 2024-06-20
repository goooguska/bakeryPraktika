<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Components\FormBuilder;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

class Query9 extends Page
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
        return $this->title ?: 'Query9';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
 
        return [
            Text::make()
            ->readonly()
            ->placeholder('Получить среднее число продаж на месяц по любому виду готовой продукции.'),
            Block::make([
                FormBuilder::make()
                ->action('/admin/page/query9')
                ->method('POST')
                ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
                
            ])
        ];
	}
}
