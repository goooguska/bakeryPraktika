<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

class Dashboard extends Page
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
        return $this->title ?: 'Добро пожаловать!';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
       
		return [
            Text::make()
            ->readonly()
            ->placeholder('Приветствуем вас в административной панели компании Пышка!'),
        ];
	}
}
