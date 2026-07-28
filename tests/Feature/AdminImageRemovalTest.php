<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Models\Event;
use App\Models\TeamMember;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminImageRemovalTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (!Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('category');
                $table->date('event_date')->nullable();
                $table->string('location')->nullable();
                $table->string('image')->nullable();
                $table->string('status')->default('draft');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('team_members')) {
            Schema::create('team_members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('role');
                $table->text('bio')->nullable();
                $table->string('photo')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function test_event_image_can_be_removed_from_admin(): void
    {
        Storage::fake('public');

        $path = 'events/test.jpg';
        Storage::disk('public')->put($path, 'test');

        $event = Event::create([
            'title' => 'Sample event',
            'description' => 'Hello',
            'category' => 'workshops',
            'event_date' => '2026-01-01',
            'location' => 'Nairobi',
            'image' => $path,
            'status' => 'draft',
        ]);

        $request = new Request([
            'title' => 'Updated event',
            'description' => 'Updated',
            'category' => 'workshops',
            'event_date' => '2026-01-02',
            'location' => 'Nairobi',
            'status' => 'published',
            'remove_image' => '1',
        ]);

        $response = (new EventController())->update($request, $event);

        $event->refresh();

        $this->assertNull($event->image);
        $this->assertFalse(Storage::disk('public')->exists($path));
        $this->assertTrue($response->isRedirect());
    }

    public function test_team_member_photo_can_be_removed_from_admin(): void
    {
        Storage::fake('public');

        $path = 'team/test.jpg';
        Storage::disk('public')->put($path, 'test');

        $member = TeamMember::create([
            'name' => 'Jane Doe',
            'role' => 'Treasurer',
            'bio' => 'A member',
            'photo' => $path,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $request = new Request([
            'name' => 'Jane Doe',
            'role' => 'Treasurer',
            'bio' => 'A member',
            'sort_order' => 1,
            'is_active' => true,
            'remove_photo' => '1',
        ]);

        $response = (new TeamMemberController())->update($request, $member);

        $member->refresh();

        $this->assertNull($member->photo);
        $this->assertFalse(Storage::disk('public')->exists($path));
        $this->assertTrue($response->isRedirect());
    }
}
