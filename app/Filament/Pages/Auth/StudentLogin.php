<?php

namespace App\Filament\Pages\Auth;

use App\Models\Student;
use Filament\Pages\Auth\Login as BasePage;

class StudentLogin extends BasePage
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => Student::first()->email,
            'password' => 'password',
            'remember' => true,
        ]);
    }
}
