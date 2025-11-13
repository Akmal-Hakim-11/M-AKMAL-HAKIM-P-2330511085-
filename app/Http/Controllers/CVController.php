<?php

namespace App\Http\Controllers;

use App\Models\Biodata;

class CVController extends Controller
{
    public function index()
    {
        $biodata = $this->loadBiodata();

        // Filter hanya pendidikan tingkat universitas (bukan SMA/SMK)
        $educations = $biodata?->educations->filter(function ($education) {
            $degree = strtolower($education->degree ?? '');
            // Hanya tampilkan jika mengandung: S1, S2, S3, D3, D4, Sarjana, Magister, Doktor, Bachelor, Master, PhD
            return preg_match('/(s1|s2|s3|d3|d4|sarjana|magister|doktor|bachelor|master|phd)/i', $degree);
        }) ?? collect();

        return view('home', [
            'biodata' => $biodata,
            'educations' => $educations,
            'experiences' => $biodata?->experiences ?? collect(),
            'skills' => $biodata?->skills ?? collect(),
        ]);
    }

    public function education()
    {
        $biodata = $this->loadBiodata(['educations']);

        return view('education', [
            'biodata' => $biodata,
            'educations' => $biodata?->educations ?? collect(),
        ]);
    }

    public function experience()
    {
        $biodata = $this->loadBiodata(['experiences']);

        return view('experience', [
            'biodata' => $biodata,
            'experiences' => $biodata?->experiences ?? collect(),
        ]);
    }

    public function skills()
    {
        $biodata = $this->loadBiodata(['skills']);

        return view('skills', [
            'biodata' => $biodata,
            'skills' => $biodata?->skills ?? collect(),
        ]);
    }

    private function loadBiodata(array $relations = []): ?Biodata
    {
        $defaultRelations = ['educations' => fn ($query) => $query->orderByDesc('start_year')->orderByDesc('end_year'),
            'experiences' => fn ($query) => $query->orderByDesc('start_date')->orderByDesc('end_date'),
            'skills' => fn ($query) => $query->orderBy('display_order')->orderBy('name'),
        ];

        $relationsToLoad = [];

        if (empty($relations)) {
            $relationsToLoad = $defaultRelations;
        } else {
            foreach ($relations as $relation) {
                if (isset($defaultRelations[$relation])) {
                    $relationsToLoad[$relation] = $defaultRelations[$relation];
                } else {
                    $relationsToLoad[] = $relation;
                }
            }
        }

        return Biodata::with($relationsToLoad)->first();
    }
}
