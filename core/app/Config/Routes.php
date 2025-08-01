<?php

use CodeIgniter\Router\RouteCollection;



$routes->get('send-test-email', 'EmailTestController::sendEmail');


//$routes->get('contact-us', 'Pages::contact_us');
/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Pages::index');

// Old Omni routes
$routes->get('search', 'Seach::index');
//$route['search'] = 'Seach';

//$media_cov_uri='media-coverage';
$media_cov_uri='media-coverage';
$media_cov_class='Media_Coverages';
$routes->get($media_cov_uri, $media_cov_class.'::index');
$routes->get($media_cov_uri.'/staging', $media_cov_class.'::index_staging');
$routes->get($media_cov_uri.'/(:num)' , $media_cov_class.'::index/$1');
$routes->get($media_cov_uri.'/(:any)' , $media_cov_class.'::single/$1');


//$press_releases_uri='press-releases';
$press_releases_uri='press-releases';
$press_releases_class='Press_Releases';
$routes->get($press_releases_uri, $press_releases_class.'::index');
$routes->get($press_releases_uri.'/(:num)', $press_releases_class.'::index/$1');
$routes->get($press_releases_uri.'/staging/(:any)', $press_releases_class.'::single_staging/$1');
$routes->get($press_releases_uri.'/(:any)', $press_releases_class.'::single/$1');


$climate_change_uri = 'climate-change';
$climate_change_class = 'News';
$routes->get($climate_change_uri,  $climate_change_class.'::index');
$routes->get($climate_change_uri.'/(:num)',  $climate_change_class.'::index/$1');
$routes->get($climate_change_uri.'/(:any)',  $climate_change_class.'::single/$1');

$routes->get('climate-change-staging', 'News::staging');

//$route['press-releases/category/(:any)'] = 'Press_Releases/category/$1';
//$route['press-releases/category/(:any)/(:num)'] = 'Press_Releases/category/$1/$2';




$routes->get('radar', 'Tyres::radar');

$routes->get('radar-eu-staging', 'Tyres::radar_eu_staging');
$routes->get('radar-eu-staging/(:any)', 'Tyres::radar_eu_staging/$1');

$routes->get('radar-eu', 'Tyres::radar_eu');
$routes->get('radar-eu/limited-warranty','Pages::limited_warranty_radar_eu');
$routes->get('radar-eu/limited-warranty-staging','Pages::limited_warranty_radar_eu_staging');

$routes->get('radar-us','Tyres::radar_us');
$routes->get('radar-us/limited-warranty','Pages::limited_warranty_radar_us');

$routes->get('radar-us/limited-warranty/staging', 'Pages::limited_warranty_radar_us_staging');

$routes->get('radarttires/premium', 'LandingPages::radar_tires_premium');
$routes->get('radarttires/premium/([a-zA-Z-]+)', 'LandingPages::radar_tires_premium/$1');
$routes->get('radartyres/premium', 'LandingPages::radar_tyres_premium');

$routes->get('radar-tbr', 'Tyres::radar_tbr');
$routes->get('radar-tbr/staging', 'Tyres::radar_tbr_staging');

$landingpage3slug='radar-us/campaign';
$routes->get($landingpage3slug, 'LandingPages::radar_landing_three');

$landingpage4slug_proxy='radar-us/campaign/us-renegade-x-ft';
$routes->get($landingpage4slug_proxy, 'LandingPages::renegade_x');

$routes->get($landingpage3slug.'/(:any)', 'LandingPages::radar_landing_three/$1');
$routes->get('admin/preview/radar-us-landing/(:any)', 'LandingPages::radar_landing_three/$1');

$landingpage4slug='radar-us/us-renegade-x';
$routes->get($landingpage4slug, 'LandingPages::renegade_x');

$landingpage4flyer='radar-us/us-renegade-x/([a-zA-Z-]+)';
$routes->get($landingpage4flyer, 'LandingPages::renegade_x/$1');

// $landingpage4staging='radar-us/us-renegade-x/staging';
// $routes->get($landingpage4staging]='LandingPages/renegade_x/staging');

$landingpage5staging='radar-us/us-renegade-at-pro/staging';
$routes->get($landingpage5staging, 'LandingPages::renegade_at_pro/staging');

$landingpage6staging='radar-us/us-renegade-at-5/staging';
$routes->get($landingpage6staging, 'LandingPages::renegade_at_5/staging');

$landingpage7staging='radar-us/us-renegade-r-7/staging';
$routes->get($landingpage7staging, 'LandingPages::renegade_r_7/staging');

$landingpage8staging='radar-us/us-renegade-rt/staging';
$routes->get($landingpage8staging, 'LandingPages::renegade_rt/staging');




$renegade_x_europe='radar-eu/eu-renegade-x';
$routes->get($renegade_x_europe, 'LandingPages::renegade_x_eu');

$renegade_x_europe='radar-eu/eu-renegade-x/([a-zA-Z-]+)';
$routes->get($renegade_x_europe, 'LandingPages::renegade_x_eu/$1');

$renegade_x_canada='radar-ca/ca-renegade-x';
$routes->get($renegade_x_canada, 'LandingPages::renegade_x_ca');

$renegade_x_canada='radar-ca/ca-renegade-x/([a-zA-Z-]+)';
$routes->get($renegade_x_canada, 'LandingPages::renegade_x_ca/$1');

$renegade_x_row='radar/renegade-x';
$routes->get($renegade_x_row, 'LandingPages::renegade_x_row');

$renegade_x_row='radar/renegade-x/([a-zA-Z-]+)';
$routes->get($renegade_x_row, 'LandingPages::renegade_x_row/$1');

$radar_test_results='radar/rpx-800-test-results';
$routes->get($radar_test_results,'Pages::view/radar-rpx-800-test-results');

$USRadarREDLandingPage='radartires/red';
$routes->get($USRadarREDLandingPage, 'LandingPages::radartires_red');

$USRadarREDLandingPage='radartires/red/staging';
$routes->get($USRadarREDLandingPage,'LandingPages:radartires_red_staging');


//Brand Page Staging

$radarus_staging='radar-us-staging';

$routes->get($radarus_staging,'Tyres::radar_us_staging');

$routes->get($radarus_staging.'/(:any)', 'Tyres::radar_us_staging/$1');

$routes->get('radar-staging', 'Tyres::radar_staging');

$routes->get('radar-staging/(:any)', 'Tyres::radar_staging/$1');

$routes->get('radar/(:any)', 'Tyres::radar/$1');

$routes->get('radar-us/(:any)',  'Tyres::radar_us/$1');

$routes->get('radar-eu/(:any)',  'Tyres::radar_eu/$1');

$routes->get('radar-ca',  'Tyres::radar_ca');

$routes->get('radar-ca/(:any)',  'Tyres::radar_ca/$1');

// Radar CA Staging
$routes->get('radar-ca-staging',  'Tyres::radar_ca_staging');
$routes->get('radar-ca-staging/(:any)',  'Tyres::radar_ca_staging/$1');

//$route['test-brand'] = 'Tyres/radar_test';
//$route['test-brand/(:any)'] = 'Tyres/radar_test/$1';

$routes->get('patriot','Tyres::patriot');
$routes->get('patriot-us/limited-warranty','Pages::view/limited-warranty-patriot-us');
$routes->get('patriot/(:any)','Tyres::patriot/$1');

$routes->get('american-tourer', 'Tyres::american_tourer');
$routes->get('american-tourer-us/limited-warranty','Pages::view/limited-warranty-american-tourer-us');
$routes->get('american-tourer/(:any)', 'Tyres::american_tourer/$1');

//$route['agora'] = 'Tyres/agora';
//$route['agora/(:any)'] = 'Tyres/agora/$1';
//$route['admin/preview/agora/(:any)'] = 'Tyres/preview/$1';

$routes->get('tecnica', 'Tyres::tecnica');
$routes->get('tecnica/(:any)', 'Tyres::tecnica/$1');

$routes->get('roadlux', 'Tyres::roadlux');
$routes->get('roadlux/(:any)', 'Tyres::roadlux/$1');

$routes->post('contact/submit', 'Form_Submit::contact_form');
$routes->post('sponsorship/submit', 'Form_Submit::sponsorship_form');
$routes->post('tire-registration/submit', 'Form_Submit::tire_registration');
$routes->post('dealerlocatorform/submit', 'Form_Submit::dealerlocatorform');
$routes->post('dealerlocatorformeurope/submit', 'Form_Submit::dealerlocatorformeurope');
$routes->post('subscribe/submit', 'Form_Submit::subscribe');
$routes->post('subscription-tnt/submit', 'Form_Submit::subscribe_tnt');
$routes->post('order-inquiry/submit', 'Form_Submit::order_inquiry');
$routes->post('ranegadex-inquiry/submit', 'Form_Submit::renegade_x_inquiry');
$routes->post('redartires-premium/submit', 'Form_Submit::radartires_premium_inquiry');
$routes->post('radartires-red/submit', 'Form_Submit::radartires_red_inquiry');

$routes->get('radarlanding', 'LandingPages::radar_us');
$routes->get('radar_usa/why_not_buy_radar/dealer_locator', 'LandingPages::radar_us_two');

//dealers routes
$routes->get('dealer-login', 'Distributer::login');
$routes->post('dealer-login/submit', 'Distributer::login');
$routes->get('dealer/logout', 'Distributer::logout');

//Tires Preview

$routes->get('admin/preview/radar-eu/(:any)', 'Tyres::radar_eu/$1');
$routes->get('admin/preview/radar-us/(:any)', 'Tyres::radar_us/$1');
$routes->get('admin/preview/radar-ca/(:any)', 'Tyres::radar_ca/$1');
$routes->get('admin/preview/radar/(:any)', 'Tyres::radar/$1');
$routes->get('admin/preview/patriot/(:any)', 'Tyres::preview/$1');

$routes->get('staging', 'Pages::home_staging');

$routes->get('/', 'Pages::index');
$routes->get('(:any)','Pages::view/$1');
$routes->get('newsletter/(:any)', 'Pages/newsletter/$1');
$route['default_controller'] = 'Pages';


