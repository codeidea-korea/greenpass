<?php

namespace Tests\Feature\Admin\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_file_upload_test()
    {
        $this->artisan('migrate');
        $user = User::factory()->create();
        Storage::fake('local');

        $file = UploadedFile::fake()->image('test.png');

        $response = $this->actingAs($user)->postJson(route('admin.file.store'), ['file' => $file]);
        $data     = $response->getOriginalContent();

        Storage::disk('local')->assertExists('uploads/'.$data['filename']);
    }
}
