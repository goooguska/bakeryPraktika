<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
 









    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'День багета: где в Москве пекут самый вкусный хлеб',
            'Что надеть в ресторан на Патриках',
            'От шести и старше: 13 старых и любимых ресторанов Москвы',
            'На хлебе и воде: московские рестораны, где их подают бесплатно',
            'Где позавтракать в 8 утра? И даже раньше!',
        ];
        $info = [
            'Французскому багету исполняется 30 лет — 13 сентября 1993-го был официально зарегистрирован его рецепт.',
            'Ресторан ресторану рознь. В одно заведение не пускают в кроссовках, а в другом привечают ребят в бермудах и гавайских рубашках.',
            'Если ресторан на Патриках пережил свой первый день рождения, то по местным меркам его можно считать долгожителем.',
            'Согласись, комплимент от ресторана в качестве бесплатного хлеба и воды – это всегда приятный бонус.',
            'Ранние завтраки, несмотря на быстрый темп города, — все еще редкость для Москвы.',
        ];
        $images = [
            'news1.png',
            'news2.png',
            'news3.png',
            'news4.png',
            'news5.png',
        ];
        return [
            // 'name' => $this->faker->unique()->sentence(3),
            // 'info' => $this->faker->sentence(30),
            // 'image' => $this->faker->imageUrl


            'name' => $this->faker->randomElement($names),
            'date_news' => $this->faker->date(),
            'info' => $this->faker->randomElement($info),
            'image' => '/assets/images/' . $this->faker->randomElement($images),
        ];

    }
}
