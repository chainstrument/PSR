<?php 

include '../../vendor/autoload.php';


use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter();

// create a new item by trying to get it from the cache
$productsCount = $cache->getItem('stats.products_count');

// assign a value to the item and save it
$productsCount->set(4711);
$cache->save($productsCount);

// retrieve the cache item
$productsCount = $cache->getItem('stats.products_count');
if (!$productsCount->isHit()) {
    // ... item does not exist in the cache
}
// retrieve the value stored by the item
$total = $productsCount->get();

var_dump($total);

// remove the cache item
$cache->deleteItem('stats.products_count');