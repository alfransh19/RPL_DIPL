<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_pencarian()
    {
        $response = $this->call('GET', '/',[
            'search' => 'Harry Potter'
        ]);

        // dd($response);
        $response->assertStatus($response->status(), 200);
    }
}
