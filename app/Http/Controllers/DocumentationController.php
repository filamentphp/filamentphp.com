<?php

namespace App\Http\Controllers;

use App\Models\DocumentationPackage;
use App\Models\DocumentationVersion;

class DocumentationController extends Controller
{
    public function __invoke($versionSlug = null, ?string $packageSlug = null, ?string $pageSlug = null)
    {
        // Get requested version
        $version = DocumentationVersion::where('slug', $versionSlug)->first();

        // If version doesn't exist
        if (! $version) {
            // Check if docs have been requested without a version number
            if ($package = DocumentationPackage::orderByDesc('version_id')->where('slug', $versionSlug)->first()) {
                return redirect()->route('docs', [
                    'packageSlug' => $package->slug,
                    'pageSlug' => $packageSlug,
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
            return redirect()->route('docs', [
                'packageSlug' => $package->slug,
                'pageSlug' => $package->getPages()->first()->slug,
                'versionSlug' => $version,
            ]);
        }

        seo()
            ->title("{$page->title} - {$package->name}")
            ->description($package->description);

        return view('docs', [
            'package' => $package,
            'page' => $page,
            'version' => $version,
        ]);
    }
}
