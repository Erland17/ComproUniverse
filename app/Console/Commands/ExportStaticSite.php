<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportStaticSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-static';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the dynamic Laravel Blade views & assets into a clean static HTML distribution folder for Vercel deployment.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Generating static website for Vercel...');

        $distDir = base_path('dist');

        // 1. Clean & recreate dist directory
        if (File::exists($distDir)) {
            File::deleteDirectory($distDir);
        }
        File::makeDirectory($distDir, 0755, true);

        // 2. Render root route (HTML)
        $request = Request::create('/', 'GET');
        $response = app()->handle($request);
        $html = $response->getContent();

        // 3. Convert absolute localhost/app.url to domain-agnostic root paths (/build/..., /images/...)
        $appUrl = config('app.url', 'http://localhost');
        $html = str_replace([
            rtrim($appUrl, '/') . '/build/',
            'http://localhost/build/',
            'http://127.0.0.1:8000/build/',
            'http://comprouniverse.test/build/',
            rtrim($appUrl, '/') . '/images/',
            'http://localhost/images/',
            'http://127.0.0.1:8000/images/',
            'http://comprouniverse.test/images/',
        ], [
            '/build/',
            '/build/',
            '/build/',
            '/build/',
            '/images/',
            '/images/',
            '/images/',
            '/images/',
        ], $html);

        // General regex fallback for any remaining scheme+host before /build/ or /images/
        $html = preg_replace('#https?://[^/\"\']+/build/#', '/build/', $html);
        $html = preg_replace('#https?://[^/\"\']+/images/#', '/images/', $html);

        // 4. Write index.html
        File::put($distDir . '/index.html', $html);
        $this->info('✅ Generated dist/index.html with clean relative assets');

        // 5. Copy Vite compiled assets (build folder)
        $buildSrc = public_path('build');
        if (File::exists($buildSrc)) {
            File::copyDirectory($buildSrc, $distDir . '/build');
            $this->info('✅ Copied public/build -> dist/build');
        } else {
            $this->warn('⚠️ public/build not found. Run "npm run build" first.');
        }

        // 6. Copy images
        $imagesSrc = public_path('images');
        if (File::exists($imagesSrc)) {
            File::copyDirectory($imagesSrc, $distDir . '/images');
            $this->info('✅ Copied public/images -> dist/images');
        }

        // 7. Copy favicon if exists
        $favicon = public_path('favicon.ico');
        if (File::exists($favicon)) {
            File::copy($favicon, $distDir . '/favicon.ico');
        }

        // 8. Write vercel.json inside dist
        $vercelConfig = [
            'cleanUrls' => true,
            'headers' => [
                [
                    'source' => '/build/(.*)',
                    'headers' => [
                        [
                            'key' => 'Cache-Control',
                            'value' => 'public, max-age=31536000, immutable'
                        ]
                    ]
                ],
                [
                    'source' => '/images/(.*)',
                    'headers' => [
                        [
                            'key' => 'Cache-Control',
                            'value' => 'public, max-age=86400, stale-while-revalidate=604800'
                        ]
                    ]
                ]
            ]
        ];

        File::put($distDir . '/vercel.json', json_encode($vercelConfig, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $this->info('✅ Created dist/vercel.json configuration');

        $this->newLine();
        $this->info('🎉 Export complete! The "dist" folder is 100% static & ready for Vercel deployment.');
        $this->line('👉 Option A (CLI): npx vercel dist --prod');
        $this->line('👉 Option B (Git): Set "Root Directory" or "Output Directory" to "dist" in Vercel Dashboard.');

        return Command::SUCCESS;
    }
}
