<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Baker;
use MoonShine\Components\FormBuilder;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Select;

class Query6 extends Page
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
        return $this->title ?: 'Query6';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{

        $name = Select::make('Ингредиент', 'name');
        $action = '/admin/page/query6?' . http_build_query([
            'name' => $name,
        ]);
		return [
            Text::make()
            ->readonly()
            ->placeholder('Получить список изделий, выпеченных определенным пекарем за последнюю неделю.'),
            Block::make([
                FormBuilder::make()
                ->action($action)
                ->method('POST')
                ->fields(  [
                    Select::make('Пекарь', 'name')
                    ->options(
                        Baker::pluck('name', 'id')
                            ->all()
                    )->nullable()->searchable(),
                ])
                ->submit(label: 'Сделать запрос', attributes: ['class' => 'btn-success']) 

            ])
        ];
	}
}
