<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;
use MoonShine\Fields\Text; 
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use MoonShine\Fields\Date; 
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image; 
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<News>
 */
class NewsResource extends ModelResource
{
    protected string $model = News::class;

    protected string $title = 'News';

    protected string $sortDirection = 'ASC';

    protected int $itemsPerPage = 10;



    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Название'), 'name')
                ->required()
                ->showOnExport(),
                Date::make(__('Дата публикации'), 'date_news')
                ->format('d.m.Y') 
                ->required()
                ->showOnExport(),
                Text::make(__('Описание'), 'info')
                ->required()
                ->showOnExport(),
                Image::make('Превью','image') 
            ]),
        ];
    }

    /**
     * @param News $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required',
            'date_news' => 'required',

        ];
    }
 
}
