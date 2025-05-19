<?php

namespace App\Http\Controllers\Landing;

use App\Helpers\PageHelper;
use App\Helpers\ProjectHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get projects page from CMS
        $projectsPage = PageHelper::getProjectsPage();

        // If projects page doesn't exist, create a fallback
        if (!$projectsPage) {
            $projectsPage = PageHelper::createFallbackPage(
                'Our Projects',
                'Explore our completed and ongoing projects.',
                'projects, portfolio, case studies, completed projects'
            );
        }

        // Get active projects
        $projects = Project::where('status', 'active')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Get featured projects
        $featuredProjects = ProjectHelper::getFeatured(3);

        return view('landing.project', compact('projectsPage', 'projects', 'featuredProjects'));
    }

    /**
     * Display the specified project.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Find the project by slug
        $project = Project::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Load SEO settings for the project
        $project->load('seo');

        // Get related projects (excluding the current one)
        $relatedProjects = ProjectHelper::getRelated($project, 4);

        // Get projects page from CMS for breadcrumb
        $projectsPage = PageHelper::getProjectsPage();

        // If projects page doesn't exist, create a fallback
        if (!$projectsPage) {
            $projectsPage = PageHelper::createFallbackPage('Our Projects');
        }

        return view('landing.project-details', compact('project', 'relatedProjects', 'projectsPage'));
    }
}
