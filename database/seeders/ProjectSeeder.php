<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample projects
        $projects = Project::factory()->count(10)->create();

        // Create SEO settings for each project
        foreach ($projects as $project) {
            $project->seo()->create([
                'title' => $project->project_name,
                'description' => substr(strip_tags($project->project_description), 0, 160),
                'keywords' => implode(',', [
                    $project->project_name,
                    'project',
                    'portfolio',
                    $project->client_name,
                    'case study'
                ]),
                'og_title' => $project->project_name,
                'og_description' => substr(strip_tags($project->project_description), 0, 160),
                'og_image' => $project->project_main_image
            ]);
        }
    }
}
