<?php

namespace App\Actions;

use App\Jobs\CheckIfIpIsVpn;
use App\Models\Contracts\Starrable;
use App\Models\Star as StarModel;
use Illuminate\Support\Facades\RateLimiter;

class Star
{
    public function __invoke(Starrable $starrable): void
    {
        if (RateLimiter::tooManyAttempts('star:' . request()->ip(), 3)) {
            return;
        }

        RateLimiter::hit('star:' . request()->ip());

        if ($starrable->stars()->where('ip', request()->ip())->exists()) {
            return;
        }

        $existingIpStar = StarModel::query()
            ->where('ip', request()->ip())
            ->whereNotNull('is_vpn_ip')
            ->first();

        $starrable->stars()->create([
            'ip' => request()->ip(),
            'is_vpn_ip' => $existingIpStar?->is_vpn_ip,
        ]);

        if ($existingIpStar?->is_vpn_ip !== true) {
            $starrable->cacheStarsCount();
            $starrable->getAuthor()->cacheStarsCount();
        }

        if (! $existingIpStar) {
            dispatch(new CheckIfIpIsVpn(request()->ip()));
        }
    }
}
