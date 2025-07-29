<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        Content::truncate();
        $contents = [
            // Home Section
            ['key' => 'home_greeting', 'value' => 'Hello, It\'s Me', 'type' => 'text'],
            ['key' => 'home_name', 'value' => 'Ahmad Usman', 'type' => 'text'],
            ['key' => 'home_roles', 'value' => 'UI/UX Designer,Graphic Designer,Frontend Developer', 'type' => 'text'],
            ['key' => 'home_paragraph', 'value' => 'I am passionate about creating user-centered digital experiences that are not only visually appealing but also highly functional. My portfolio showcases a selection of my best work, highlighting my skills in user interface (UI) and user experience (UX) design.', 'type' => 'textarea'],
            ['key' => 'home_cv', 'value' => 'file/resume.pdf', 'type' => 'file'],
            ['key' => 'home_image', 'value' => 'images/home.png', 'type' => 'image'],
            
            // About Section
            ['key' => 'about_heading', 'value' => 'About <span>Me</span>', 'type' => 'text'],
            ['key' => 'about_subheading', 'value' => 'UX Designer', 'type' => 'text'],
            ['key' => 'about_paragraph', 'value' => 'I am a professional in the field of UX Designer, with 2 year of experience. My education includes an Associate Degree in Computer Science, which gave me a strong foundation in Information Management. Outside of work, I have an interest in music and art.', 'type' => 'textarea'],
            ['key' => 'about_certificate', 'value' => 'file/sertifikat.pdf', 'type' => 'file'],
            ['key' => 'about_image', 'value' => 'images/about.png', 'type' => 'image'],

            ['key' => 'footer_text', 'value' => 'by Ahmad Usman | All Rights Reserved.', 'type' => 'text'],

        ];

        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}