<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main_route()
    {
        $response = $this->get('/');
        $response->assertViewHas($this->getTitle('Главная'));
        $response->assertStatus(200);
    }
    public function test_news_route()
    {
        $response = $this->get('/news');
        $response->assertViewHas($this->getTitle('Новости'));
        $response->assertStatus(200);
    }
    public function test_admin_route()
    {
        $response = $this->get('/admin');
        $response->assertViewHas($this->getTitle('Панель администратора'));
        $response->assertStatus(200);
    }
    public function test_about_route()
    {
        $response = $this->get('/about');
        $response->assertViewHas($this->getTitle('О нас'));
        $response->assertStatus(200);
    }
    public function test_categories_companies_route()
    {
        $response = $this->get('/categories/companies');
        $response->assertViewHas($this->getTitle('О компаниях'));
        $response->assertStatus(200);
    }
    public function test_categories_job_route()
    {
        $response = $this->get('/categories/job');
        $response->assertViewHas($this->getTitle('Трудовые новости'));
        $response->assertStatus(200);
    }
    public function test_categories_russian_route()
    {
        $response = $this->get('/categories/russian');
        $response->assertViewHas($this->getTitle('Российские новости'));
        $response->assertStatus(200);
    }
    public function test_categories_american_route()
    {
        $response = $this->get('/categories/americanNews');
        $response->assertViewHas($this->getTitle('Американские новости'));
        $response->assertStatus(200);
    }
    public function test_categories_french_route()
    {
        $response = $this->get('/categories/frenchNews');
        $response->assertViewHas($this->getTitle('Французские новости'));
        $response->assertStatus(200);
    }
    public function test_one_news_route()
    {
        $response = $this->get('/news/1');
        $response->assertStatus(200);
    }
    public function test_create_news_route()
    {
        $response = $this->get('/admin/createNews');
        $response->assertViewHas($this->getTitle('создание новости'));
        $response->assertStatus(200);
    }
    public function test_about_review_route()
    {
        $response = $this->get('/about/review');
        $response->assertViewHas($this->getTitle('Отзыв о нас'));
        $response->assertStatus(200);
    }
    public function test_about_data_export_route()
    {
        $response = $this->get('/about/dataExport');
        $response->assertViewHas($this->getTitle('Запрос на выгрузку данных'));
        $response->assertStatus(200);
    }



    private function getTitle(string $titleLast): array
    {
        return  ['title' => $titleLast];
    }
}
