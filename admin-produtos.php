<?php 

use \Ezdev\PageAdmin;
use \Ezdev\Model\User;
use \Ezdev\Model\Product;

use Ezdev\Model\Store;

$app->get("/admin/produtos", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$qtdprodutos = (isset($_GET['qtdprodutos']) && $_GET['qtdprodutos'] !== '') ? (int)$_GET['qtdprodutos'] : 10;
	if($qtdprodutos === 0){
		$qtdprodutos = 10;
	}

	if ($search != ''){

		$pagination = Product::getPageSearch($search, $page, $qtdprodutos);

	} else {

		$pagination = Product::getPage($page, $qtdprodutos);

	}

	$pages = [];

	for($x = 0; $x < $pagination['pages']; $x++){

		array_push($pages, [
			'href'=>'/admin/produtos?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'qtdprodutos'=>$qtdprodutos
			]),
			'text'=>$x+1
		]);

	}


	$page = new PageAdmin();	

	$page->setTpl("produtos", [
		"produtos" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"qtdprodutos"=>$qtdprodutos
	]);

});

$app->get("/admin/produtos/create", function(){

	User::verifyLogin();	

	$page = new PageAdmin();	

	$page->setTpl("produtos-create", [
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/produtos/create", function(){

    User::verifyLogin();	

    $_POST['desphoto'] = 'product.jpg';    
    $_POST['desurl'] =  str_replace(" ","-", $_POST['desProduct']);  

    $produtos = new Product();

    $produtos->setData($_POST);    

    $produtos->save();

    if($_FILES['file']['name'] != ""){ 
        $produtos->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/produtos");
	exit;

});

$app->get("/admin/produtos/:idProduct", function($idProduct){

    User::verifyLogin();	
   
    $Product = new Product();

    $Product->get((int)$idProduct);

	$page = new PageAdmin();	

	$page->setTpl("produtos-update", [
        "Product"=>$Product->getValues(),
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/produtos/:idProduct", function($idProduct){

    User::verifyLogin();	    
   
    $Product = new Product();

    $Product->get((int)$idProduct);

    $Product->setData($_POST);

    $_POST['desphoto'] = $Product->getdesphoto();

	$Product->save();

    if($_FILES['file']['name'] != ""){ 
        $Product->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/produtos");
	exit;

});

$app->get("/admin/produtos/:idProduct/delete", function($idProduct){

    User::verifyLogin();	
   
    $product = new Product();

    $product->get((int)$idProduct);
   
	$product->delete();

	header("Location: /admin/produtos");
	exit;

});

?>