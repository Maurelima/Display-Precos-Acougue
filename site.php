<?php 

use \Ezdev\Page;
use \Ezdev\Model\Category;
use Ezdev\Model\Product;
use Ezdev\Model\Store;

$app->get('/', function () {

	//header('Location: /admin');
	//exit;

	$page = new Page([
		"header"=>null
	]);

	 // var_dump(Product::listAll());
	 // exit;

	$page->setTpl("index", [
		"categories"=>Category::listAll(),
		"products"=>Product::listAll(),
		"promotion"=>Product::listPromotion()
	]);
});


$app->get('/loja/:idstore', function ($idstore) {

	if(Store::getStore($idstore) != null){
		$store = Store::getStore($idstore);
	}else{
		header("Location: /"); 
		exit;
	}

	$page = new Page([
		"header"=>null
	]);

	$page->setTpl("index", [
		"categories"=>Category::listByStore($idstore),
		"Products"=>Product::listByStore($idstore),
		"store"=>$store,
		"stores"=>Store::listAll($idstore)
	]);

});


$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)($idcategory));

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/'.$category->getidcategory().'?page='.$i,
			'page'=>$i
		]);
	}

	$page = new Page();	

	$page->setTpl("category", [
		"category"=>$category->getValues(),
		"products"=>$pagination["data"],
		'pages'=>$pages
	]);

});

$app->notFound(function () {

	header("Location: /");
	exit;
    
});

?>