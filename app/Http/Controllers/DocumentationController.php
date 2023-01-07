<?php

namespace App\Http\Controllers;

use App\Models\DocumentationPackage;
use App\Models\DocumentationVersion;
use Illuminate\Database\Eloquent\Builder;

class DocumentationController extends Controller
{
    public function __invoke($versionSlug = null, ?string $packageSlug = null, ?string $pageSlug = null)
    {
        if ($packageSlug === 'admin') {
            $packageSlug = 'app';
        }

        // Get requested version
        $version = DocumentationVersion::where('slug', $versionSlug)->first();

        // If version doesn't exist
        if (! $version) {
            // Check if docs have been requested without a version number
            if ($package = DocumentationPackage::orderByDesc('version_id')->where('slug', $versionSlug)->first()) {
                $newPageSlug = $packageSlug;

                if (filled($pageSlug)) {
                    $newPageSlug .= "/{$pageSlug}";
                }

                return redirect()->route('docs', [
                    'packageSlug' => $package->slug,
                    'pageSlug' => $newPageSlug,
                    'versionSlug' => $package->version,
                ]);
            }

            // Use latest version
            return redirect()->route('docs', [
                'packageSlug' => $packageSlug,
                'pageSlug' => $pageSlug,
                'versionSlug' => DocumentationVersion::orderByDesc('id')->first(),
            ]);
        }

        // Get requested package
        $package = $version->packages()->where('slug', $packageSlug)->first();

        // If package doesn't exist with this version, use latest existing version or another package at this version
        if (! $package) {
            $package = DocumentationPackage::orderByDesc('version_id')->where('slug', $packageSlug)->first() ?? $version->packages()->first();

            return redirect()->route('docs', [
                'packageSlug' => $package->slug,
                'pageSlug' => $pageSlug,
                'versionSlug' => $package->version,
            ]);
        }

        // Get requested page
        $page = $package->getPage($pageSlug);

        // If page doesn't exist in this package, use first page
        if (! $page) {
            $page = $package->getPagesQuery()
                ->when($pageSlug, function (Builder $query) use ($pageSlug): Builder {
                    return $query->where(function (Builder $query) use ($pageSlug): Builder {
                        return $query->where('section_slug', $pageSlug)
                            ->orWhereNull('section_slug');
                    });
                })
                ->where('slug', '!=', 'installation')
                ->first();

            $page ??= $package->getPagesQuery()->first();

            return redirect()->route('docs', [
                'packageSlug' => $package->slug,
                'pageSlug' => $page->slug,
                'versionSlug' => $version,
            ]);
        }

        $seoTitle = $page->title;
        $seoTitle = filled($page->section) ? "{$seoTitle} - {$page->section}" : $seoTitle;
        $seoTitle .= " - {$package->name}";

        seo()
            ->title($seoTitle)
            ->description($package->description);

        return view('docs', [
            'package' => $package,
            'page' => $page,
            'version' => $version,
        ]);
    }
}
