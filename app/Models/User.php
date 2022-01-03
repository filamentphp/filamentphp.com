<?php

namespace App\Models;

use App\Services\StripeService;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Stripe\Account;
use Stripe\AccountLink;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'immutable_datetime',
        'is_admin' => 'boolean',
    ];

    public function storeProducts(): HasMany
    {
        return $this->hasMany(StoreProduct::class, 'owner_id');
    }

    public function storePurchases(): BelongsToMany
    {
        return $this->belongsToMany(StoreProduct::class, relatedPivotKey: 'product_id');
    }

    public function canAccessFilament(): bool
    {
        return $this->is_admin;
    }

    public function getStripeConnectAccount(): Account
    {
        $stripe = StripeService::make();

        if (filled($this->stripe_connect_id)) {
            return $stripe->accounts->retrieve($this->stripe_connect_id, []);
        }

        $account = $stripe->accounts->create([
            'type' => 'standard',
            'email' => $this->email,
            'country' => $this->country_id ?? 'us',
        ]);

        $this->stripe_connect_id = $account->id;
        $this->save();

        return $account;
    }

    public function getStripeConnectLink(string $refreshUrl, string $returnUrl): AccountLink
    {
        $this->getStripeConnectAccount();

        return StripeService::make()->accountLinks->create([
            'account' => $this->stripe_connect_id,
            'refresh_url' => $refreshUrl,
            'return_url' => $returnUrl,
            'type' => 'account_onboarding',
        ]);
    }
}
