<?php

namespace App\Filament\Pages\Auth;

use App\Models\Guardian;
use Filament\Pages\Auth\Login as BasePage;

class GuardianLogin extends BasePage
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => Guardian::first()->email,
            'password' => 'password',
            'remember' => true,
        ]);
    }
}
