<?php 

use \Ezdev\PageAdmin;
use \Ezdev\Model\User;
use \Ezdev\Model\Product;
use \Ezdev\Model\Menu;
use Ezdev\Model\Store;

$app->get("/admin/menus", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$qtdmenus = (isset($_GET['qtdmenus']) && $_GET['qtdmenus'] !== '') ? (int)$_GET['qtdmenus'] : 10;
	if($qtdmenus === 0){
		$qtdmenus = 10;
	}

	if ($search != ''){

		$pagination = Menu::getPageSearch($search, $page, $qtdmenus);

	} else {

		$pagination = Menu::getPage($page, $qtdmenus);

	}

	$pages = [];

	for($x = 0; $x < $pagination['pages']; $x++){

		array_push($pages, [
			'href'=>'/admin/menus?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'qtdmenus'=>$qtdmenus
			]),
			'text'=>$x+1
		]);

	}


	$page = new PageAdmin();	

	$page->setTpl("menus", [
		"menus" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"qtdmenus"=>$qtdmenus
	]);

});

$app->get("/admin/menus/create", function(){

	User::verifyLogin();	

	$page = new PageAdmin();	

	$page->setTpl("menus-create", [
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/menus/create", function(){

    User::verifyLogin();	

    $_POST['desphoto'] = 'product.jpg';    
    $_POST['desurl'] =  str_replace(" ","-", $_POST['desmenu']);  

    $menus = new Menu();

    $menus->setData($_POST);    

    $menus->save();

    if($_FILES['file']['name'] != ""){ 
        $menus->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/menus");
	exit;

});

$app->get("/admin/menus/:idmenu", function($idmenu){

    User::verifyLogin();	
   
    $menu = new Menu();

    $menu->get((int)$idmenu);

	$page = new PageAdmin();	

	$page->setTpl("menus-update", [
        "menu"=>$menu->getValues(),
        "stores"=>Store::listAll()
    ]);

});

$app->post("/admin/menus/:idmenu", function($idmenu){

    User::verifyLogin();	    
   
    $menu = new Menu();

    $menu->get((int)$idmenu);

    $menu->setData($_POST);

    $_POST['desphoto'] = $menu->getdesphoto();

	$menu->save();

    if($_FILES['file']['name'] != ""){ 
        $menu->setPhoto($_FILES["file"]);
    }

	header("Location: /admin/menus");
	exit;

});

$app->get("/admin/menus/:idmenu/delete", function($idmenu){

    User::verifyLogin();	
   
    $product = new Menu();

    $product->get((int)$idmenu);
   
	$product->delete();

	header("Location: /admin/menus");
	exit;

});

?>