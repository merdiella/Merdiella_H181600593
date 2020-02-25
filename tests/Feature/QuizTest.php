<?php

namespace Tests\Unit;


use Tests\TestCase;

class QuizTest extends TestCase
{
    public function testSoal1()
    {
        $response = $this->json('GET', '/api/soal1');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'nama'=>'Saepe et.'
            ]);
    }

    public function testSoal2()
    {
        $response = $this->json('GET', '/api/soal2');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment([
                "nama"=> "Commodi.",
                "users_id"=>144,
            ]);
    }

    public function testSoal3()
    {
        $response = $this->json('POST', '/api/soal3');

        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertJsonFragment([
                "judul"=> "Dolores et reprehenderit natus est.",
            ])->assertJsonFragment([
                "judul"=> "Enim ratione mollitia ratione vel in quaerat eius.",
            ])->assertJsonFragment([
                "name"=> "Darijan Situmorang S.E.I",
            ]);
    }

    public function testSoal4()
    {
        $response = $this->json('POST', '/api/soal4');

        $response->assertStatus(200)
            ->assertJsonCount(171)
            ->assertJsonFragment([
                "judul"=> "Cum dolorem suscipit non omnis nihil suscipit temporibus.",
            ])->assertJsonFragment([
                "judul"=> "Omnis ab eius dolorem sint nostrum.",
            ])->assertJsonFragment([
                "judul"=> "Voluptatem cum doloremque non debitis modi.",
            ]);
    }

    public function testSoal5()
    {
        $response = $this->json('PUT', '/api/soal5');

        $response->assertStatus(200)
            ->assertJsonCount(78)
            ->assertJsonFragment([
                "judul"=> "Provident officia et odit labore unde.",
            ])->assertJsonFragment([
                "judul"=> "Officiis natus quasi delectus quos consequatur velit delectus.",
            ])->assertJsonFragment([
                "judul"=> "Eum aut deleniti ratione.",
            ]);
    }
}
