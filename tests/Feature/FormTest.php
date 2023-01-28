<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_review()
    {
        $response = $this->post('api/createReview', [
            'name' => 'test',
            'text' => 'test'
        ]);
        $response->assertStatus(302);
    }
    public function test_data_export_on_error()
    {
        $response = $this->post('api/createDataExportRequest', [
            'name'=> 'test',
            'phone' => '01234567890',
            'email' => 'ddsads@dasds.com',
            'text' => 'dsa'
        ]);
        $response->assertRedirectToRoute('about/dataExport', [
            'errorMessage' => 'Текст запроса должен содержать не менее 20 символов!'
        ]);
        $response->assertStatus(302);
    }
    public function test_data_export()
    {
        $response = $this->post('api/createDataExportRequest', [
            'name'=> 'test',
            'phone' => '01234567890',
            'email' => 'ddsads@dasds.com',
            'text' => 'dsafsdgfdsfsfsfsfsdfsedgaffga erfes resa rae w ra rew e s'
        ]);
        $response->assertStatus(302);
    }
    public function test_create_news()
    {
        $response = $this->post('api/createNews', [
            'category' => 'companies',
            'header' => \fake()->text(50),
            'description' => \fake()->text(),
            'text' => \fake()->text(1200)
        ]);
        $response->assertViewHas(['title' => 'Успешно']);
    }
    public function test_create_news_missing_text()
    {
        $response = $this->post('api/createNews', [
            'category' => 'companies',
            'header' => \fake()->text(50),
            'description' => \fake()->text(),
        ]);
        $response->assertServerError();
    }
}
