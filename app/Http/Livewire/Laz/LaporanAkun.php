<?php

namespace App\Http\Livewire\Laz;

use App\Models\LazTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class LaporanAkun extends Component
{
    use WithFileUploads;
    public $isModalOpen = false;
    public $csv = null;
    public $iteration = 1;
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
        $this->validate([
            'csv' => 'required|mimes:csv,txt|max:6144',
        ]);
        $filename = $this->csv->storeAs('csv', Str::random(40) . '.csv');
        $i = 0;
        $id = Auth::user()->id;
        $dataArray = [];
        $handle = fopen('../storage/app/' . $filename, 'r');
        while ($filedata = fgetcsv($handle, 1000, ";")) {
            $i++;
            if ($i == 1) continue;
            $rowArray = [
                'user_id' => $id,
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
        $chunks = array_chunk($dataArray, 5000);
        LazTransaction::where('user_id', $id)->delete();
        try {
            DB::beginTransaction();
            foreach ($chunks as $chunk) {
                LazTransaction::insert($chunk);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            unlink('../storage/app/' . $filename);
            return $e->getMessage();
        }
        $this->reset(['csv', 'isModalOpen']);
        $this->iteration++;
        session()->flash('message', 'Data updated successfully.');
        session()->flash('tipe', 'success');
        unlink('../storage/app/' . $filename);
    }
    public function hapusData()
    {
        LazTransaction::where('user_id', Auth::user()->id)->delete();
        session()->flash('message', 'Data deleted successfully.');
        session()->flash('tipe', 'danger');
    }
}
