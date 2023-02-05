<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData()
    {
        $data = [
            'title' => \fake()->jobTitle(),
            'short_description' => \fake()->text(10),
            'full_description' => \fake() ->text(100)
        ];
        $response = $this->get(route('admin.news.index'), $data);

        $response->assertStatus(200)->json($data);
    }
}
