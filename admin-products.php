<?php 

use \Ezdev\PageAdmin;
use \Ezdev\Model\User;
use \Ezdev\Model\Product;

use Ezdev\Model\Store;

$app->get("/admin/products", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$qtdproducts = (isset($_GET['qtdproducts']) && $_GET['qtdproducts'] !== '') ? (int)$_GET['qtdproducts'] : 10;
	if($qtdproducts === 0){
		$qtdproducts = 10;
	}

	if ($search != ''){

		$pagination = Product::getPageSearch($search, $page, $qtdproducts);

	} else {

		$pagination = Product::getPage($page, $qtdproducts);

	}

	$pages = [];

	for($x = 0; $x < $pagination['pages']; $x++){

		array_push($pages, [
			'href'=>'/admin/products?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'qtdproducts'=>$qtdproducts
			]),
			'text'=>$x+1
		]);

	}


	$page = new PageAdmin();	

	$page->setTpl("products", [
		"products" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"qtdproducts"=>$qtdproducts
	]);

});

$app->get("/admin/products/create", function(){

	User::verifyLogin();	

	$page = new PageAdmin();	

	$page->setTpl("products-create", [
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/products/create", function(){

    User::verifyLogin();	

    $_POST['desphoto'] = 'product.jpg';    
    $_POST['desurl'] =  str_replace(" ","-", $_POST['desproduct']);  

    $products = new Product();

    $products->setData($_POST);    

    $products->save();

    if($_FILES['file']['name'] != ""){ 
        $products->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/products");
	exit;

});

$app->get("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();	
   
    $product = new Product();

    $product->get((int)$idproduct);

	$page = new PageAdmin();	

	$page->setTpl("products-update", [
        "product"=>$product->getValues(),
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();	    
   
    $product = new Product();

    $product->get((int)$idproduct);

    $product->setData($_POST);

	$_POST['desphoto'] = $product->getdesphoto();

	$product->save();

    if($_FILES['file']['name'] != ""){ 
        $product->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/products");
	exit;

});

$app->get("/admin/products/:idProduct/delete", function($idProduct){

    User::verifyLogin();	
   
    $product = new Product();

    $product->get((int)$idProduct);
   
	$product->delete();

	header("Location: /admin/products");
	exit;

});

?>