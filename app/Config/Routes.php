<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes, ['except' => ['login']]);

$routes->post('login', 'LoginAdd::loginAction');
$routes->get('login', 'LoginAdd::loginView');

$routes->group('admin', ['filter' => 'group:admin'], function ($routes){
    $routes->get('/', 'AdminObat_crudv::index', ['as'=> 'admin.main_view']);
    // =========Obat=============
    $routes->get('obat/create', 'AdminObat_crudv::createView', ['as' => 'admin.obat_create_view']);
    $routes->get('obat/(:any)', 'AdminObat_crudv::detailObat/$1', ['as' => 'admin.obat_detail_view']);
    $routes->post('obat-create', 'AdminObat_crudv::createObat', ['as' => 'admin.obat_create']);


    $routes->get('obat/update/(:any)', 'AdminObat_crudv::updateView/$1', ['as' => 'admin.obat_update_view']);
    $routes->post('obat-update/(:any)', 'AdminObat_crudv::updateObat/$1', ['as' => 'admin.obat_update']);
    

    // =========Kategori==============
    $routes->get('kategori', 'AdminKategori_crudv::index', ['as'=> 'admin.kategori_view']);
    $routes->get('kategori/create', 'AdminKategori_crudv::createView', ['as'=> 'admin.kategori_create_view']);
    $routes->get('kategori-create', 'AdminKategori_crudv::createKategori', ['as'=> 'admin.kategori_create']);
    $routes->post('kategori-delete/(:any)', 'AdminKategori_crudv::deleteKategori/$1', ['as'=> 'admin.kategori_delete']);
});

$routes->group('pelanggan', ['filter' => 'group:pelanggan'], function ($routes){
    $routes->get('/', 'PelangganMainView::index', ['as' => 'pelanggan.main_view']);
});