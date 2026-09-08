<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    // ===== Frontend: Show About Page =====
    public function index()
    {
        $about = AboutPage::getActive();
        return view('about.index', compact('about'));
    }

    // ===== Admin: Show Edit Form =====
    public function edit()
    {
        $about = AboutPage::getActive();
        return view('admin.about.edit', compact('about'));
    }

    // ===== Admin: Update About Page =====
    public function update(Request $request)
    {
        $about = AboutPage::getActive();

        $validated = $request->validate([
            // Hero Section
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_image' => 'nullable|image|max:2048',

            // Mission Section
            'mission_title' => 'required|string|max:255',
            'mission_description' => 'nullable|string',
            'mission_image' => 'nullable|image|max:2048',

            // Vision Section
            'vision_title' => 'required|string|max:255',
            'vision_description' => 'nullable|string',

            // Story Section
            'story_title' => 'required|string|max:255',
            'story_content' => 'nullable|string',
            'story_image' => 'nullable|image|max:2048',

            // Values Section
            'values_title' => 'required|string|max:255',
            'values' => 'nullable|array',
            'values.*.icon' => 'nullable|string',
            'values.*.title' => 'nullable|string',
            'values.*.description' => 'nullable|string',

            // Team Section
            'team_title' => 'nullable|string|max:255',
            'team_members' => 'nullable|array',
            'team_members.*.name' => 'nullable|string',
            'team_members.*.designation' => 'nullable|string',
            'team_members.*.bio' => 'nullable|string',
            'team_members.*.image' => 'nullable|image|max:2048',

            // Stats Section
            'stats' => 'nullable|array',
            'stats.*.number' => 'nullable|string',
            'stats.*.label' => 'nullable|string',
            'stats.*.icon' => 'nullable|string',

            // Contact
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string|max:255',

            // SEO
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            if ($about->hero_image) {
                Storage::delete('public/' . $about->hero_image);
            }
            $path = $request->file('hero_image')->store('about', 'public');
            $validated['hero_image'] = $path;
        }

        // Handle mission image upload
        if ($request->hasFile('mission_image')) {
            if ($about->mission_image) {
                Storage::delete('public/' . $about->mission_image);
            }
            $path = $request->file('mission_image')->store('about', 'public');
            $validated['mission_image'] = $path;
        }

        // Handle story image upload
        if ($request->hasFile('story_image')) {
            if ($about->story_image) {
                Storage::delete('public/' . $about->story_image);
            }
            $path = $request->file('story_image')->store('about', 'public');
            $validated['story_image'] = $path;
        }

        // Handle team member images
        if ($request->has('team_members')) {
            $teamMembers = $request->team_members;
            foreach ($teamMembers as $key => &$member) {
                if ($request->hasFile("team_members.{$key}.image")) {
                    $path = $request->file("team_members.{$key}.image")->store('about/team', 'public');
                    $member['image'] = $path;
                }
            }
            $validated['team_members'] = $teamMembers;
        }

        $about->update($validated);

        return redirect()->route('admin.about.edit')
            ->with('success', 'About page updated successfully!');
    }

    // ===== Admin: Add Team Member =====
    public function addTeamMember(Request $request)
    {
        $about = AboutPage::getActive();
        $teamMembers = $about->team_members ?? [];

        $newMember = [
            'name' => $request->name,
            'designation' => $request->designation,
            'bio' => $request->bio,
            'image' => null,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('about/team', 'public');
            $newMember['image'] = $path;
        }

        $teamMembers[] = $newMember;
        $about->update(['team_members' => $teamMembers]);

        return back()->with('success', 'Team member added successfully!');
    }

    // ===== Admin: Remove Team Member =====
    public function removeTeamMember($index)
    {
        $about = AboutPage::getActive();
        $teamMembers = $about->team_members ?? [];

        if (isset($teamMembers[$index])) {
            if (isset($teamMembers[$index]['image'])) {
                Storage::delete('public/' . $teamMembers[$index]['image']);
            }
            unset($teamMembers[$index]);
            $about->update(['team_members' => array_values($teamMembers)]);
        }

        return back()->with('success', 'Team member removed successfully!');
    }
}