<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::all();

        // Bobot kriteria (disesuaikan)
        $weights = [
            'harga' => 0.2,
            'penyimpanan' => 0.15,
            'kualitas_kamera' => 0.15,
            'kecepatan_prosesor' => 0.15,
            'waktu_pengisian' => 0.1,
            'berat' => 0.1,
            'garansi' => 0.15
        ];

        // Normalisasi dan perhitungan SAW
        $data = [];
        foreach ($smartphones as $smartphone) {
            $nilai = [
                'harga' => $smartphone->harga,
                'penyimpanan' => $smartphone->penyimpanan,
                'kualitas_kamera' => $smartphone->kualitas_kamera,
                'kecepatan_prosesor' => $smartphone->kecepatan_prosesor,
                'waktu_pengisian' => $smartphone->waktu_pengisian,
                'berat' => $smartphone->berat,
                'garansi' => $smartphone->garansi,
            ];

            $max_values = [
                'harga' => $smartphones->max('harga'),
                'penyimpanan' => $smartphones->max('penyimpanan'),
                'kualitas_kamera' => $smartphones->max('kualitas_kamera'),
                'kecepatan_prosesor' => $smartphones->max('kecepatan_prosesor'),
                'waktu_pengisian' => $smartphones->max('waktu_pengisian'),
                'berat' => $smartphones->max('berat'),
                'garansi' => $smartphones->max('garansi')
            ];

            $min_values = [
                'harga' => $smartphones->min('harga'),
                'penyimpanan' => $smartphones->min('penyimpanan'),
                'kualitas_kamera' => $smartphones->min('kualitas_kamera'),
                'kecepatan_prosesor' => $smartphones->min('kecepatan_prosesor'),
                'waktu_pengisian' => $smartphones->min('waktu_pengisian'),
                'berat' => $smartphones->min('berat'),
                'garansi' => $smartphones->min('garansi')
            ];

            // Normalisasi
            $normalized = [];
            foreach ($nilai as $k => $v) {
                if (in_array($k, ['harga', 'berat'])) { // Cost
                    $normalized[$k] = $min_values[$k] / $v;
                } else { // Benefit
                    $normalized[$k] = $v / $max_values[$k];
                }
            }

            // Hitung nilai akhir dengan bobot
            $score = 0;
            foreach ($normalized as $k => $v) {
                $score += $v * $weights[$k];
            }

            $data[] = [
                'nama_smartphone' => $smartphone->nama_smartphone,
                'score' => $score
            ];
        }

        // Urutkan berdasarkan skor tertinggi
        usort($data, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return view('smartphones.index', compact('data'));
    }
}
