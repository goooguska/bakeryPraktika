<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;
use MoonShine\Components\FormBuilder;
use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Query3 extends Page
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
        return $this->title ?: 'Query3';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            Text::make()
            ->readonly()
            ->placeholder('Получить сведения об ингредиентах: какими поставщиками поставляется, их расценки, время поставки.'),
            Block::make([
                FormBuilder::make()
                ->action('/admin/page/query3')
                ->method('POST')
                ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 
                
            ])
        ];
	}
}
