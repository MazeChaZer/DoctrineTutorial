<?php

require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach($products as $product) {
	printf("-%s\n", $product->getName());
}