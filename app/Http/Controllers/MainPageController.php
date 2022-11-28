<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post_tag;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $tagsCollection = Post::select('id','post_tags')->where('comments', '>', 0)->orderBy('comments', 'desc')->take(4)->get();
        $tagsUnique = [];
        foreach ($tagsCollection as $values) {
            $tagsArray = explode(',', $values->post_tags);
            foreach ($tagsArray as $tag) {
                $tagsUnique[] = $tag;
            }
        }
        $tagsUnique = array_unique($tagsUnique);
        return view('post.index', compact('posts', 'tagsUnique'));
    }

    public function show(Post $post)
    {
        $tags = explode(',', $post->post_tags);
        return view('post.show', compact('post', 'tags'));
    }

    public function createPosts(): void
    {
        $posts = [
            [
                'title' => '"КамАЗ" начнет полномасштабный выпуск грузовиков поколения K5 в феврале',
                'text' => 'МОСКВА, 26 ноя - РИА Новости. "Камаз" с февраля начнет полномасштабный выпуск грузовиков поколения K5 с использованием компонентов, не зависящих от поставок из недружественных стран, сообщили в Минпромторге РФ.',
                'comments' => 10,
                'post_tags' => 'политика,в мире',
            ],
            [
                'title' => 'Продажи первых новых моделей автомашин "Соллерс" начнутся в декабре',
                'text' => 'ЕЛАБУГА (Татарстан), 26 ноя - РИА Новости. Продажи первых новых моделей легких коммерческих автомобилей "Соллерс" - "Арго" и "Атлант" - начнутся в декабре 2022 года, сообщил вице-премьер - глава Минпромторга РФ Денис Мантуров.',
                'comments' => 1,
                'post_tags' => 'спорт',
            ],
            [
                'title' => 'Правительство одобрило упрощение процедуры ввоза средств связи',
                'text' => 'МОСКВА, 26 ноя - РИА Новости. Правительство России одобрило упрощение процедуры ввоза радиоэлектронных средств и высокочастотных устройств на территорию РФ, сообщается на сайте кабмина.',
                'post_tags' => 'экономика,культура',
            ],
            [
                'title' => 'Эксперт предположил, сколько продлится экономический кризис в России',
                'text' => 'МОСКВА, 26 ноя - РИА Новости. Экономический кризис, который переживает в настоящее время Россия, продлится примерно полтора года, заявил РИА Новости директор Института народнохозяйственного прогнозирования Российской Академии Наук Александр Широв.',
                'comments' => 2,
                'post_tags' => 'спорт',
            ],
            [
                'title' => 'СМИ: лимит цен на российскую нефть навредит не только Москве, но и ЕС',
                'text' => 'МОСКВА, 26 ноя — РИА Новости. Возможное ограничение цен на нефть из России навредит как Москве, так и Брюсселю и будет выгодно только Вашингтону, пишет китайская газета Global Times.',
                'post_tags' => 'политика,в мире,спорт',
            ],
            [
                'title' => 'Аналитик назвал три страны, которым грозит валютный кризис',
                'text' => 'МОСКВА, 26 ноя — РИА Новости. С валютным кризисом (когда происходит резкая девальвация национальной валюты и наблюдается большая волатильность) обычно сталкиваются развивающиеся страны, однако в современных условиях растут предпосылки для подобных потрясений и в развитых странах, таких как Британия, Япония и США, рассказал агентству "Прайм" ведущий аналитик "Открытие Инвестиции" Андрей Кочетков.',
                'post_tags' => 'в мире',
            ],
            [
                'title' => 'Путин: загрузка заводов на фоне СВО даст толчок развитию высоких технологий',
                'text' => 'МОСКВА, 25 ноя – РИА Новости. Максимально загруженная работа заводов для обеспечения нужд армии даст уникальный толчок для развития высокотехнологичных сфер, заявил президент России Владимир Путин на мероприятии в честь 15-летия "Ростеха".',
                'post_tags' => 'экономика',
            ]
        ];
        $tags = [
            [
                'name' => 'экономика',
            ],
            [
                'name' => 'политика',
            ],
            [
                'name' => 'в мире',
            ],
            [
                'name' => 'спорт',
            ],
            [
                'name' => 'культура',
            ],
        ];
        $post_tag = [
            [
                'post_id' => '1',
                'tag_id' => '2',
            ],
            [
                'post_id' => '1',
                'tag_id' => '3',
            ],
            [
                'post_id' => '2',
                'tag_id' => '4',
            ],
            [
                'post_id' => '3',
                'tag_id' => '1',
            ],
            [
                'post_id' => '3',
                'tag_id' => '5',
            ],
            [
                'post_id' => '4',
                'tag_id' => '4',
            ],
            [
                'post_id' => '5',
                'tag_id' => '2',
            ],
            [
                'post_id' => '5',
                'tag_id' => '3',
            ],
            [
                'post_id' => '5',
                'tag_id' => '4',
            ],
            [
                'post_id' => '6',
                'tag_id' => '3',
            ],
            [
                'post_id' => '7',
                'tag_id' => '1',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
        foreach ($post_tag as $value) {
            Post_tag::create($value);
        }
        dd('ok');
    }

    public function showPosts(Request $request)
    {
//        $posts = Post::latest()->skip(3)->take(3)->get();
        $posts = Post::latest()->paginate(3);
        foreach ($posts as $post) {
            $post->fill(['date' => $post->created_at->format('d.m.Y')]);
        }

        return response()->json([
            'posts' => $posts,
        ]);
    }
}
