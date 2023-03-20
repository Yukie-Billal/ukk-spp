<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nisn' => $row[0],
            'nis' => $row[1],
            'nama' => $row[2],
            'kelas_id' => $row[3],
        ]);
    }
}
