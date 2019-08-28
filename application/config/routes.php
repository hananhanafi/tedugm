<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/index';
$route['login']	= 'auth/login';
$route['register/science-project']	= 'auth/register/sp';
$route['register/competition']	= 'auth/register/competition';

$route['live/lf']	= 'live/line_followers';
$route['live/sp']	= 'live/science_projects';
$route['live/sm']	= 'live/sumo_robots';

$route['kompetisi/science-project']	= 'pages/science';
$route['kompetisi/sumo-robot']	= 'pages/sumo';
$route['kompetisi/line-follower']	= 'pages/line';

$route['science-project']					= 'sp/index';
$route['science-project/anggota']			= 'sp/anggota';
$route['science-project/abstrak']			= 'sp/abstrak';
$route['science-project/pembayaran']		= 'sp/pembayaran';
$route['science-project/proposal']		= 'sp/proposal';



$route['competition']					= 'competition/index';
$route['admin/dashboard']					= 'admin/index';
$route['admin/science-project']			= 'admin/sp_peserta';
$route['admin/science-project/peserta']		= 'admin/sp_peserta';
$route['admin/science-project/pembayaran']	= 'admin/sp_payment';
$route['admin/science-project/abstrak']		= 'admin/abstrak';
$route['admin/science-project/proposal']	= 'admin/sp_proposal';
$route['admin/science-project/detail-tim/(:any)']	= 'admin/detail_anggota/$1';

$route['admin/competition/']			= 'admin/cp_peserta';
$route['admin/competition/peserta']		= 'admin/cp_peserta';
$route['admin/competition/pembayaran']	= 'admin/cp_payment';
$route['admin/competition/detail-tim/(:any)']	= 'admin/cp_detail_anggota/$1';


$route['logout']	= 'auth/logout';
$route['register']	= 'auth/register';
$route['404_override'] = 'Errorpage';
$route['translate_uri_dashes'] = FALSE;
