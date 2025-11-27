<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JenisPenggunaanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Mapping kategori -> keterangan yang cocok
        $deskripsi = [
            'Perkantoran'   => 'Digunakan untuk kegiatan administrasi dan perkantoran.',
            'Industri'      => 'Area untuk kegiatan produksi dan industri.',
            'Pertanian'     => 'Dimanfaatkan sebagai lahan pertanian dan budidaya tanaman.',
            'Komersial'     => 'Zona untuk kegiatan usaha komersial.',
            'Kesehatan'     => 'Digunakan sebagai fasilitas layanan kesehatan.',
            'Rumah Tangga'  => 'Dipakai sebagai tempat tinggal keluarga.',
            'Perumahan'     => 'Kawasan hunian penduduk.',
            'Perdagangan'   => 'Area untuk kegiatan jual beli dan usaha toko.',
            'Pendidikan'    => 'Tempat kegiatan pendidikan dan pembelajaran.',
            'Perhotelan'    => 'Area hotel, penginapan, atau akomodasi.',
            'Transportasi'  => 'Fasilitas penunjang transportasi.',
            'Gudang'        => 'Digunakan sebagai tempat penyimpanan barang.',
            'Rekreasi'      => 'Area untuk kegiatan rekreasi dan hiburan.',
            'Keagamaan'     => 'Tempat ibadah dan kegiatan keagamaan.',
            'Sosial'        => 'Fasilitas pelayanan sosial masyarakat.',
            'Olahraga'      => 'Area untuk kegiatan dan fasilitas olahraga.',
            'Pariwisata'    => 'Kawasan destinasi wisata.',
        ];

        $kategori = array_keys($deskripsi);

        $data = [];

        for ($i = 1; $i <= 100; $i++) {

            $jenis = $faker->randomElement($kategori);

            $data[] = [
                'nama_penggunaan' => $jenis . ' ' . $i,
                'keterangan'      => $deskripsi[$jenis], // keterangan sesuai jenis
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        }

        DB::table('jenis_penggunaan')->insert($data);
    }
}
