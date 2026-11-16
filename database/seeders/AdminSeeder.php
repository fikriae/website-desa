<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@desamanyar.id',
        ]);

        $admin->name = 'Administrator Desa Manyar';
        $admin->password = Hash::make('11111111');
        $admin->role = 'admin';

        $admin->save();
    }
}
