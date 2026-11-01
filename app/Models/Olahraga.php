<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Olahraga extends Model
{
    use HasFactory;

    protected $table = 'olahragas';

    protected $fillable = [
        'jenis_olahraga',
        'durasi_menit',
        'tanggal',
    ];

    protected $casts = [
        'durasi_menit' => 'integer',
        'tanggal' => 'date',
    ];

    public function getFormattedDurasiAttribute()
    {
        $jam = floor($this->durasi_menit / 60);
        $menit = $this->durasi_menit % 60;
        
        if ($jam > 0 && $menit > 0) {
            return $jam . ' jam ' . $menit . ' menit';
        } elseif ($jam > 0) {
            return $jam . ' jam';
        } else {
            return $menit . ' menit';
        }
    }

    public function getDeskripsiOlahragaAttribute()
    {
        $deskripsi = [
            'lari' => 'Aktivitas kardio untuk meningkatkan daya tahan jantung dan paru-paru.',
            'jalan' => 'Olahraga ringan yang baik untuk kesehatan jantung dan pembakaran kalori.',
            'bersepeda' => 'Latihan kardio yang ramah sendi dan efektif untuk kebugaran.',
            'renang' => 'Olahraga menyeluruh yang melatih hampir seluruh otot tubuh.',
            'push up' => 'Latihan kekuatan untuk membangun otot dada, bahu, dan triceps.',
            'sit up' => 'Latihan untuk menguatkan otot perut dan core tubuh.',
            'gym' => 'Latihan beban untuk meningkatkan kekuatan dan massa otot.',
            'yoga' => 'Aktivitas yang menggabungkan gerakan, pernapasan, dan relaksasi.',
            'badminton' => 'Olahraga raket yang melatih kecepatan, refleks, dan koordinasi.',
            'futsal' => 'Permainan bola yang melatih daya tahan, kecepatan, dan kerja sama tim.',
        ];

        $key = strtolower($this->jenis_olahraga);
        foreach ($deskripsi as $kunci => $penjelasan) {
            if (strpos($key, $kunci) !== false) {
                return $penjelasan;
            }
        }

        return 'Aktivitas fisik terencana untuk meningkatkan kesehatan dan kebugaran tubuh.';
    }
}