<?php
// /**
//  * Konfigurasi basis data
//  */
// $config['db']['server']     = 'localhost';
// $config['db']['username']   = 'root';
// $config['db']['password']   = '';
// $config['db']['database']   = 'db_masjidhub';

  require __DIR__.'/vendor/autoload.php';

  use Kreait\Firebase\Factory;
  use Kreait\Firebase\ServiceAccount;

  // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/masjid-hub-firebase-adminsdk-20ve1-51bddec07e.json');
  // $firebase = (new Factory) 
  //   ->withServiceAccount($serviceAccount)
  //   ->withDatabaseUrl('https://masjid-hub-default-rtdb.firebaseio.com')
  //   ->create();
  
  // $database = $firebase->getDatabase()
  $factory = (new Factory)
    ->withServiceAccount(__DIR__.'/masjid-hub-firebase-adminsdk-20ve1-51bddec07e.json')
    ->withDatabaseUri('https://masjid-hub-default-rtdb.firebaseio.com');

  $database = $factory->createDatabase();
