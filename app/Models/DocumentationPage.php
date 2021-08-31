<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Lorisleiva\Lody\Lody;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Sushi\Sushi;

class DocumentationPage extends Model
{
    use Sushi;

    public function version(): BelongsTo
    {
        return $this->belongsTo(DocumentationVersion::class, 'version_id');
    }

    public function getRows(): array
    {
        $pages = [];

        foreach (config('documentation') as $versionNumber => $version) {
            foreach ($version['packages'] as $packageSlug => $package) {
                foreach (Lody::files($package['path']) as $file) {
                    $page = YamlFrontMatter::parseFile($file->getRealPath());

                    $pages[] = [
                        'content' => $page->body(),
                        'order' => (string) Str::of($file->getFilename())->before('-'),
                        'package_slug' => $packageSlug,
                        'slug' => (string) Str::of($file->getFilename())->after('-')->beforeLast('.'),
                        'title' => $page->matter('title'),
                        'version_id' => $versionNumber,
                    ];
                }
            }
        }

        return $pages;
    }

    public function getSections(): array
    {
        $matches = [];

        // Extract ## headings from page content
        preg_match_all('/(?m)^## (.*)/', $this->content, $matches);

        $sections = [];

        foreach ($matches[1] as $heading) {
            $sections[(string) Str::of($heading)->kebab()] = $heading;
        }

        return $sections;
    }

    public function getUrl(): string
    {
        return route('docs', [
            'versionSlug' => $this->version,
            'packageSlug' => $this->package_slug,
            'pageSlug' => $this->slug,
        ]);
    }
}
