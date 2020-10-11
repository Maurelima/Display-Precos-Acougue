<?php 

use \Ezdev\PageAdmin;
use \Ezdev\Model\User;
use \Ezdev\Model\Store;

$app->get('/admin/stores', function () {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$qtdstores = (isset($_GET['qtdstores']) && $_GET['qtdstores'] !== '') ? (int)$_GET['qtdstores'] : 10;
	if($qtdstores === 0){
		$qtdstores = 10;
	}

	if ($search != ''){

		$pagination = Store::getPageSearch($search, $page, $qtdstores);

	} else {

		$pagination = Store::getPage($page, $qtdstores);

    }
        
	$pages = [];

	for($x = 0; $x < $pagination['pages']; $x++){

		array_push($pages, [
			'href'=>'/admin/stores?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'qtdstores'=>$qtdstores
			]),
			'text'=>$x+1
		]);

    }

	$page = new PageAdmin();	

	$page->setTpl("stores", [
		"stores" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"qtdstores"=>$qtdstores
	]);

});

$app->get("/admin/stores/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();	

	$page->setTpl("stores-create");

});

$app->post("/admin/stores/create", function(){

	User::verifyLogin();

	$_POST['desphoto'] = 'logo.jpg';    

	$store = new Store();

	$store->setData($_POST);

	$store->save();

	if($_FILES['file']['name'] != ""){ 
        $store->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/stores");
	exit;

});

$app->get("/admin/stores/:idstore/delete", function($idstore){

	User::verifyLogin();

	$store = new Store();

	$store->get((int)$idstore);

	$store->delete();

	header("Location: /admin/stores");
	exit;

});


$app->get("/admin/stores/:idstore", function($idstore){

	User::verifyLogin();

	$store = new Store();

    $store->get((int)($idstore));    

	$page = new PageAdmin();	

	$page->setTpl("stores-update", [
		"store"=>$store->getValues()
	]);

});

$app->post("/admin/stores/:idstore", function($idstore){

	User::verifyLogin();

	$store = new Store();

	$store->get((int)$idstore);

	$store->setData($_POST);

	$_POST['desphoto'] = $store->getdesphoto();

	$store->save();

	if($_FILES['file']['name'] != ""){ 
        $store->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/stores");

	exit;

});

?>