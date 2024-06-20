<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Ingredient;
use App\MoonShine\Resources\Query1Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\FormBuilder;
use MoonShine\Components\Modal;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Components\TableBuilder;
use MoonShine\Fields\Date;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Contracts\MoonShineRenderable;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Textarea;
use MoonShine\Pages\PageComponents;

class Query1 extends Page
{
    /**
     * @return array<string, string>
     */
    protected string $ingredient = Ingredient::class;

    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Query1';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function fields(): array
    {
       
        return [
        ];
    }

   
    public function components(): array
	{
        $name = Text::make('Название')->value();
        $start_date =  Number::make('Количество')->value();
        $end_date = Date::make('начальная дата')->value();
        $quantity= Date::make('конечная дата')->value();
        $action = '/admin/page/query1?' . http_build_query([
            'name' => $name,
            'quantity' => $quantity,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
 
		return [
            Block::make([
                FormBuilder::make()
                ->action($action)
                ->method('POST')
                ->fields(  [
                    Text::make('name'),
                    Number::make('quantity'),
                    Date::make('start_date'),
                    Date::make('end_date')
                ])
                // ->name('query-form')
                // ->async(asyncEvents:['table-updated-query-table','form-reset-query-form']),
         
                // TableBuilder::make()
                // ->fields(fn()=>[
                //     ID::make('userId'),
                //     Text::make('title')
                // ])
                // ->items($this->fetch())
                // ->name('query-table')
                // ->async(),
                 
            ])
        
          
        ];
	}
  
}
