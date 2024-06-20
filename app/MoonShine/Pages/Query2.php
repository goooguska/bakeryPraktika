<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;
use MoonShine\Components\FormBuilder;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Query2 extends Page
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
        return $this->title ?: 'Query2';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            Text::make()
            ->readonly()
            ->placeholder('Получить список и общее число поставленных изделий на склад готовой продукции.'),
            Block::make([
                FormBuilder::make()
                ->action('/admin/page/query2')
                ->method('POST')
                ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
                
            ])
        ];
	}
}
