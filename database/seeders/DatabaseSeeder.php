<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Money',
            'email' => 'mymoney@uas.com',
            'type' => 1,
            'password' => bcrypt('12345'),
            ]);

        Pengeluaran::create([
            'name' => 'Money',
            'tanggal_tranksaksi' => '2024-05-28',
            'total_pengeluaran' => 150.00,
            'metode_pembayaran' => 'Kartu Kredit',
            'catatan' => 'Makan malam di restoran',
            'user_id' => '1',
            ]);

        Pengeluaran::create([
            'name' => 'Money',
            'tanggal_tranksaksi' => '2024-05-29',
            'total_pengeluaran' => 100.00,
            'metode_pembayaran' => 'Tunai',
            'catatan' => 'Trakteer Teman-teman',
            'user_id' => '1',
            ]);

        Pengeluaran::create([
            'name' => 'Money',
            'tanggal_tranksaksi' => '2024-05-30',
            'total_pengeluaran' => 500.00,
            'metode_pembayaran' => 'Tunai',
            'catatan' => 'Beliin Pacar Cincin',
            'user_id' => '1',
            ]);
    }
}
