<?php

namespace App\Jobs;

use App\Models\Star;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CheckIfIpIsVpn implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $ip,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $existingIpStar = Star::query()
            ->where('ip', $this->ip)
            ->whereNotNull('is_vpn_ip')
            ->first();

        if ($existingIpStar) {
            Star::query()
                ->where('ip', $this->ip)
                ->update(['is_vpn_ip' => $existingIpStar->is_vpn_ip]);

            return;
        }

        $isVpn = Http::retry(10)
            ->throw()
            ->get('https://vpnapi.io/api/' . $this->ip . '?key=' . config('services.vpn_api.token'))
            ->json('security.vpn');

        if (blank($isVpn)) {
            $this->fail("Failed to check if IP is VPN: {$this->ip}");

            return;
        }

        Star::query()
            ->where('ip', $this->ip)
            ->update(['is_vpn_ip' => $isVpn]);
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array<int, object>
     */
    public function middleware(): array
    {
        return [new RateLimited('vpn_api')];
    }
}
