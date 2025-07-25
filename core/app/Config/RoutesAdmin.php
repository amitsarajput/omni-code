<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('login', 'User::login');
$routes->post('login', 'User::login');
$routes->get('logout', 'User::logout');

$routes->get('admin', 'Admin::tire');
$routes->get('admin/tire', 'Admin::tire');
$routes->get('admin/tire-deleted', 'Admin::tire_deleted');
$routes->get('admin/tire/new', 'Admin::tire_new');
$routes->get('admin/tire/save', 'Admin::tire_save');
$routes->get('admin/tire/edit/(:num)', 'Admin::tire_edit/$1');
$routes->post('admin/tire/update/(:num)', 'Admin::tire_update/$1');
$routes->get('admin/tire/images/(:num)', 'Admin::tire_images/$1');
$routes->post('admin/tire/images/(:num)', 'Admin::tire_images/$1');
$routes->match(['GET', 'POST'],'admin/tire/features/(:num)', 'Admin::tire_features/$1');
$routes->get('admin/tire/sizes/(:num)', 'Admin::tire_sizes/$1');
$routes->get('admin/tire/reviews/(:num)', 'Admin::tire_reviews/$1');
$routes->get('admin/tire/clone/(:num)', 'Admin::tire_clone/$1');
$routes->get('admin/tire/export/(:num)', 'Admin::tire_export/$1');
$routes->get('admin/tire/import/(:num)', 'Admin::tire_import/$1');

$routes->get('admin/tire/tire-reorder','Admin::tire_reorder');
$routes->get('admin/tire/video-section/(:num)','Admin::tire_video_section/$1');
$routes->post('admin/tire/tire-order-save','Ajax_Functions::tire_reorder');
$routes->post('admin/tire-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/tire-delete-force', 'Ajax_Functions::item_delete_force');
$routes->post('admin/tire-restore', 'Ajax_Functions::item_restore');
$routes->post('admin/tire-status', 'Ajax_Functions::item_updatestatus');
$routes->post('admin/tire/images-reorder','Ajax_Functions::item_reorder');
$routes->post('admin/tire/image-delete','Ajax_Functions::image_delete');

$routes->get('admin/brand', 'Admin::brands');
$route['admin/brand/add'] = 'Admin/brand_add';
$route['admin/brand/save'] = 'Admin/brand_save';
$route['admin/brand/edit/(:num)'] = 'Admin/brand_edit/$1';
$route['admin/brand/update/(:num)'] = 'Admin/brand_update/$1';
$route['admin/brand/brand-delete']['POST'] = 'Ajax_Functions::item_delete';
$route['admin/brand/brand-status']['POST'] = 'Ajax_Functions::item_updatestatus';

$routes->get('admin/tire-category','Admin::tyre_category');
$route['admin/tire-category/add'] = 'Admin/tyre_category_add';
$route['admin/tire-category/save'] = 'Admin/tyre_category_save';
$route['admin/tire-category/edit/(:num)'] = 'Admin/tyre_category_edit/$1';
$route['admin/tire-category/update/(:num)'] = 'Admin/tyre_category_update/$1';
$route['admin/tire-category/tc-delete']['POST'] = 'Ajax_Functions::item_delete';
$route['admin/tire-category/tc-status']['POST'] = 'Ajax_Functions::item_updatestatus';

$routes->get('admin/icons', 'Admin::icons');
$route['admin/icons/add'] = 'Admin/icons_add';
$route['admin/icons/save'] = 'Admin/icons_save';
$route['admin/icons/edit/(:num)'] = 'Admin/icons_edit/$1';
$route['admin/icons/update/(:num)'] = 'Admin/icons_update/$1';
$route['admin/icons/icon-delete']['POST'] = 'Ajax_Functions::item_delete';
$route['admin/icons/icon-status']['POST'] = 'Ajax_Functions::item_updatestatus';

$routes->get('admin/pr', 'Admin::pr');
$route['admin/pr/add'] = 'Admin/pr_add';
$route['admin/pr/save'] = 'Admin/pr_save';
$route['admin/pr/edit/(:num)'] = 'Admin/pr_edit/$1';
$route['admin/pr/update/(:num)'] = 'Admin/pr_update/$1';
$route['admin/pr/pr-delete']['POST'] = 'Ajax_Functions::item_delete';
$route['admin/pr/pr-status']['POST'] = 'Ajax_Functions::item_updatestatus';

$route['admin/cat'] = 'Admin/cat';
$route['admin/cat/add'] = 'Admin/cat_add';
$route['admin/cat/edit/(:num)'] = 'Admin/cat_edit/$1';
$route['admin/cat/cat-delete']['POST'] = 'Ajax_Functions::item_delete';

$routes->get('admin/mc', 'Admin::mc');
$route['admin/mc/add'] = 'Admin/mc_add';
$route['admin/mc/edit/(:num)'] = 'Admin/mc_edit/$1';
$route['admin/mc/mc-delete']['POST'] = 'Ajax_Functions::item_delete';
$route['admin/mc/mc-status']['POST'] = 'Ajax_Functions::item_updatestatus';

$route['admin/terrain'] = 'Admin/terrain';
$route['admin/terrain/add'] = 'Admin/terrain_add';
$route['admin/terrain/edit/(:num)'] = 'Admin/terrain_edit/$1';
$route['admin/terrain/terrain-delete']['POST'] = 'Ajax_Functions::item_delete';

$routes->get('admin/golf-tournaments', 'Admin::golf_tournaments');
$routes->get('admin/golf-tournament/add',  'Admin::golf_tournament_add');
$routes->get('admin/golf-tournament/edit/(:num)',  'Admin::golf_tournament_edit/$1');

$routes->get('admin/golf-highlights',  'Admin::golf_highlights');
$routes->get('admin/golf-highlight/add',  'Admin::golf_highlight_add');
$routes->get('admin/golf-highlight/edit/(:num)',  'Admin::golf_highlight_edit/$1');

$routes->post('admin/golf-delete',  'Ajax_Functions::item_delete');
$routes->post('admin/golf-status',  'Ajax_Functions::item_updatestatus');


$routes->get('admin/races', 'Admin::races');
$routes->get('admin/race/add', 'Admin::race_add');
$routes->get('admin/race/edit/(:num)', 'Admin::race_edit/$1');

$routes->post('admin/motersport-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/motersport-status', 'Ajax_Functions::item_updatestatus');

$routes->get('admin/wins', 'Admin::wins');
$routes->get('admin/win/add', 'Admin::win_add');
$routes->get('admin/win/edit/(:num)', 'Admin::win_edit/$1');

$routes->post('admin/motersport-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/motersport-status', 'Ajax_Functions::item_updatestatus');

//admin/wins

$routes->get('admin/carousels', 'Admin::carousels');
$routes->get('admin/carousel/add', 'Admin::carousel_add');
$routes->get('admin/carousel/edit/(:num)', 'Admin::carousel_edit/$1');

$routes->post('admin/carousel-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/carousel-status', 'Ajax_Functions::item_updatestatus');

$routes->get('admin/tire-registrations', 'Admin::form_tire_registrations');
$routes->get('admin/tire-registrations/download', 'Admin::form_tire_registrations_download');
$routes->post('admin/tire-registration-delete', 'Ajax_Functions::item_delete');

$routes->get('admin/subscribers', 'Admin::form_subscibers');
$routes->get('admin/subscribers/download', 'Admin::subscribers_download');
$routes->post('admin/subscriber-delete', 'Ajax_Functions::item_delete');

$routes->get('admin/subscribers-tnt', 'Admin::form_subscibers_tnt');
$routes->get('admin/subscribers-tnt/download', 'Admin::subscribers_tnt_download');
$routes->post('admin/subscriber-tnt-delete', 'Ajax_Functions::item_delete');

$routes->get('admin/orderinquiry', 'Admin::form_order_inquiry');
$routes->get('admin/orderinquiry/download', 'Admin::order_inquiry_download');
$routes->post('admin/orderinquiry-delete', 'Ajax_Functions::item_delete');

$routes->get('admin/contactinquiry', 'Admin::form_contact_inquiry');
$routes->get('admin/contactinquiry/download', 'Admin::contact_inquiry_download');
$routes->post('admin/contactinquiry-delete', 'Ajax_Functions::item_delete');

$routes->get('admin/dealerinquiry',  'Admin::form_dealer_locator_inquiry');
$routes->get('admin/dealerinquiry/download',  'Admin::dealer_locator_inquiry_download');
$routes->post('admin/dealerinquiry-delete',  'Ajax_Functions::item_delete');

$routes->get('admin/radaruspremium-enquiry',  'Admin::form_radaruspremium_enquiry');
$routes->get('admin/radaruspremium-enquiry/download',  'Admin::form_radaruspremium_enquiry_download');

$routes->get('admin/news', 'Admin::news');
$routes->get('admin/news/add', 'Admin::news_add');
$routes->get('admin/news/edit/(:num)', 'Admin::news_edit/$1');
$routes->post('admin/news/news-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/news/news-status', 'Ajax_Functions::item_updatestatus');

$routes->get('admin/dealers', 'Admin::dealers');
$routes->get('admin/dealers/deleted', 'Admin::dealers_deleted');
$routes->get('admin/dealers/add', 'Admin::dealers_add');
$routes->get('admin/dealers/add-bulk', 'Admin::dealers_add_bulk');
$routes->get('admin/dealers/edit/(:num)', 'Admin::dealers_edit/$1');
$routes->post('admin/dealers/dealer-delete', 'Ajax_Functions::item_delete');
$routes->post('admin/dealers/dealer-status', 'Ajax_Functions::item_updatestatus');
$routes->post('admin/dealers/dealer-delete-force', 'Ajax_Functions::item_delete_force');
$routes->post('admin/dealers/dealer-restore', 'Ajax_Functions::item_restore');

//$route['register'] = 'User/register';