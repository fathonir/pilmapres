<?php

namespace App\Console\Commands;

use App\Group;
use App\Peserta;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GenerateUserPesertaApproved extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-user-peserta-approved';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat user untuk peserta yang sudah di approve';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::beginTransaction();

        // Group Login Peserta (Mahasiswa)
        $pesertaGroup = Group::where('name', 'Peserta')->first();

        // Peserta Approve yang belum ada user
        $pesertas = Peserta::with(['mahasiswa', 'mahasiswa.perguruanTinggi'])
            ->whereNotNull('is_approved')
            ->get();

        foreach ($pesertas as $peserta) {
            $this->line(
                'Username: '.$peserta->mahasiswa->perguruanTinggi->kode_pt.'-'.$peserta->mahasiswa->nim.' '.
                'Password: '.date('dmy', strtotime($peserta->mahasiswa->tgl_lahir))
            );

            /** @var User $userMahasiswa */
            $userMahasiswa = User::where('mahasiswa_id', $peserta->mahasiswa_id)->first();

            if ($userMahasiswa == null) {

                // Buat User Baru
                $userMahasiswa = new User();
                $userMahasiswa->username =
                    trim($peserta->mahasiswa->perguruanTinggi->kode_pt) . '-' .
                    trim($peserta->mahasiswa->nim);
                $userMahasiswa->mahasiswa_id = $peserta->mahasiswa_id;
                $userMahasiswa->name = $peserta->mahasiswa->nama;
                $userMahasiswa->email = $peserta->mahasiswa->email;
                $userMahasiswa->is_mail_verified = true;
                $userMahasiswa->email_verified_at = date('Y-m-d H:i:s');
                $userMahasiswa->password_plain = date('dmy', strtotime($peserta->mahasiswa->tgl_lahir));
                $userMahasiswa->password = Hash::make($userMahasiswa->password_plain);
                $userMahasiswa->is_active = true;
                $userMahasiswa->save();

                // Attach group peserta
                $userMahasiswa->groups()->attach($pesertaGroup);
            }
        }

        DB::commit();
    }
}
