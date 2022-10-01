<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use League\CommonMark\Normalizer\SlugNormalizer;
use Lorisleiva\Lody\Lody;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Sushi\Sushi;
use Symfony\Component\Finder\SplFileInfo;

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
                    /** @var SplFileInfo $file */

                    $page = YamlFrontMatter::parseFile($file->getRealPath());
                    $pageOrder = (string) Str::of($file->getFilename())->before('-');

                    $sectionOrder = (string) Str::of($file->getRelativePath())->before('-');
                    $sectionSlug = (string) Str::of($file->getRelativePath())->after('-')->beforeLast('.')->replace('-', ' ');
                    $section = Str::title($sectionSlug);

                    $slug = Str::of($file->getFilename())->after('-')->beforeLast('.');
                    $slug = filled($sectionSlug) ? ("{$sectionSlug}/{$slug}") : $slug;

                    $pages[] = [
                        'content' => $page->body(),
                        'order' => filled($sectionOrder) ? "{$sectionOrder}{$pageOrder}" : "{$pageOrder}00",
                        'package_slug' => $packageSlug,
                        'section' => filled($section) ? $section : null,
                        'section_slug' => $sectionSlug,
                        'slug' => $slug,
                        'title' => $page->matter('title'),
                        'version_id' => $versionNumber,
                        // https://github.com/filamentphp/filament/blob/2.x/packages/forms/docs/03-fields.md
                        'github_link' => Str::of($package['path'])
                            ->after('/packages/')
                            ->prepend("https://github.com/filamentphp/filament/blob/{$version}/packages/{$packageSlug}/{$file->getFilename()}"),
                    ];
                }
            }
        }

        return $pages;
    }

    public function getContentSections(): array
    {
        $matches = [];

        // Extract ## headings from page content
        preg_match_all('/(?m)^## (.*)/', $this->content, $matches);

        $sections = [];

        foreach ($matches[1] as $heading) {
            $slugNormalizer = new SlugNormalizer();

            $sections[$slugNormalizer->normalize($heading)] = $heading;
        }

        return $sections;
    }

    public function getSectionUrl(): ?string
    {
        if (blank($this->section_slug)) {
            return null;
        }

        return route('docs', [
            'versionSlug' => $this->version,
            'packageSlug' => $this->package_slug,
            'pageSlug' => $this->section_slug,
        ]);
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
