<?php
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('services'));
});

Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('services');
    $trail->push($category->name, route('category', $category->slug));
});

Breadcrumbs::for('services.show', function ($trail, $service) {
    $trail->parent('services');
    $trail->push($service->name, route('services.show', $service->id));
});

Breadcrumbs::for('articles', function ($trail) {
    $trail->parent('home');
    $trail->push('Статьи', route('articles'));
});

Breadcrumbs::for('tag', function ($trail, $tag) {
    $trail->parent('articles');
    $trail->push($tag->name, route('tag', $tag->slug));
});

Breadcrumbs::for('articles.show', function ($trail, $article) {
    $trail->parent('articles');
    $trail->push($article->name, route('articles.show', $article->id));
});

Breadcrumbs::for('faq', function ($trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});

Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contact'));
});
?>