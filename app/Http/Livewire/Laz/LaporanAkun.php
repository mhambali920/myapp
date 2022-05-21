<?php

namespace App\Http\Livewire\Laz;

use App\Models\LazTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class LaporanAkun extends Component
{
    use WithFileUploads;
    public $isModalOpen = false;
    public $csv;
    public function render()
    {
        return view('livewire.laz.laporan-akun');
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function uploadCsv()
    {
        // validasi file dulu
        // hapus data sebelumnya
        // kemudian panggil fungsi importCsv
    }
    //proses import csv
    private function importCsv($file)
    {
        if ($file) {
            $i = 0;
            $dataArray = [];
            $handle = fopen($file, "r");
            while ($filedata = fgetcsv($handle, 1000, ";")) {
                if ($i == 0) {
                    continue;
                    $i++;
                }
                $rowArray = [
                    'user_id' => Auth::user()->id,
                    'nama_pembayaran' => $filedata[2],
                    'nama_barang' => $filedata[4],
                    'sku_barang' => $filedata[6],
                    'jumlah_pembayaran' => $filedata[7],
                    'pernyataan' => $filedata[11],
                    'nomor_order' => $filedata[13],
                    'referensi' => $filedata[19]
                ];
                array_push($dataArray, $rowArray);
            }
            fclose($handle);

            try {
                DB::beginTransaction();
                LazTransaction::insert($dataArray);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        } else {
            echo "file tidak valid";
        }
    }
}
