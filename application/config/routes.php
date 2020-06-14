<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['print'] = 'guest/print';


$route['hapus/semua/(:any)'] = 'admin/hapus_semua/$1';

$route['tambah_kursi'] = 'admin/tambah_kursi';
$route['PilihGerbong'] = 'guest/PilihGerbong';
$route['verifikasi/(:num)'] = 'admin/verifikasi/$1';
$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';

$route['pembayaran'] = 'guest/halaman_pembayaran';
$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';

$route['admin/dashboard/berangkat_jadwal/(:any)'] = 'admin/berangkat_jadwal/$1';
$route['edit_jadwal'] = 'admin/editJadwal';
$route['admin/dashboard/edit_jadwal/(:any)'] = 'admin/edit_jadwal/$1';
$route['hapus_jadwal/(:any)'] = 'admin/hapus_jadwal/$1';
$route['tambah_jadwal'] = 'admin/tambah_jadwal';
$route['admin/dashboard/kelola_jadwal'] = 'admin/kelola_jadwal';
$route['admin/kelola_gerbong'] = 'admin/kelola_gerbong';
$route['admin/konfirmasi_pembayaran'] = 'admin/konfirmasi_pembayaran';

$route['cari_tiket'] = 'guest/cari_tiket';
$route['edit_stasiun'] = 'admin/edit';
$route['tambah_stasiun'] = 'admin/tambah_stasiun';
$route['hapus_stasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['admin/dashboard/edit/(:any)'] = 'admin/edit_stasiun/$1';
$route['admin/dashboard'] = 'admin/kehalaman_dashboard';
$route['admin/logout'] = 'admin/logout';
$route['proses_login'] = 'admin/login';

$route['login'] = 'admin/kehalaman_login';

$route['konfirmasi'] = 'guest/kehalaman_konfirmasi';
$route['default_controller'] = 'guest/kehalamandepan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
