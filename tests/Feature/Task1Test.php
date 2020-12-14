<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class Task1Test extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTask1()
    {
        $this->withoutExceptionHandling();
        $request = factory(\App\Models\Student::class)->make();

        $response = $this->postJson(route("students.store"), $request->toArray());

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonStructure([
            'data'=>[
                'id',
                'name',
            ]
        ]);
        $this->assertDatabaseHas('students', ['name'=>$request->name]);

    }
    public function testTask2()
    {

        $response = $this->postJson(route("students.store"),[]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
