<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ComproCmsSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compro:setup {--fresh : Whether to refresh the database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the Company Profile CMS';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up Company Profile CMS...');
        
        // Create storage link
        $this->info('Creating storage link...');
        Artisan::call('storage:link');
        $this->info('Storage link created.');
        
        // Create directories
        $this->createDirectories();
        
        // Run migrations
        $this->runMigrations();
        
        // Optimize
        $this->info('Optimizing application...');
        Artisan::call('optimize:clear');
        $this->info('Application optimized.');
        
        $this->info('Company Profile CMS setup completed successfully!');
        $this->info('You can now log in with the following credentials:');
        $this->info('Superadmin: superadmin@example.com / password');
        $this->info('Admin: admin@example.com / password');
        
        return Command::SUCCESS;
    }
    
    /**
     * Create necessary directories.
     */
    protected function createDirectories()
    {
        $this->info('Creating necessary directories...');
        
        $directories = [
            public_path('storage/settings'),
            public_path('storage/media'),
            public_path('storage/uploads'),
        ];
        
        foreach ($directories as $directory) {
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
                $this->info("Created directory: $directory");
            }
        }
        
        $this->info('Directories created.');
    }
    
    /**
     * Run migrations.
     */
    protected function runMigrations()
    {
        $this->info('Running migrations...');
        
        if ($this->option('fresh')) {
            $this->warn('Refreshing database...');
            Artisan::call('migrate:fresh', ['--seed' => true]);
            $this->info('Database refreshed and seeded.');
        } else {
            Artisan::call('migrate', ['--seed' => true]);
            $this->info('Migrations and seeders completed.');
        }
    }
}
