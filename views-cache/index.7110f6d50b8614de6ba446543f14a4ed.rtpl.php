<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Preços</title>
    <link rel="stylesheet" href="/res/acougue/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="/res/acougue/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body style="margin: 0px !important;">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
      body{
        background-image: url('/res/site/img/4.jpg');
        /*background-position: center;*/
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
      }
        #products td{
            font-size: 50px ;
            line-height: 55px;
            font-weight: bolder;
            font-family: 'Poppins', sans-serif;
            color: #FFF;
        }
        #products .price{
           background-color: rgba(0, 0, 0, 0.7) !important;
           text-align:center;
           color: #FFF;
        }
        #products .first{
          font-family: 'Poppins', sans-serif;
          width: 90%;
          font-size: 50px;
          background-color: rgba(0, 0, 0, 0.7) !important;
          color:rgb(255, 196, 86);
        }
    </style>

<div class="container-fluid">
    <div class="row">

      <div class="col-md-6" >
        <h5 class="card-title promo-title" style="margin-top:45px;background-color: rgba(0, 0, 0, 0.7) !important;
        text-align:center;border-radius: 5px;">PROMOÇÃO DO DIA</h5>
        <div class="card" style="width: 100%;margin-top: 0px;">
          <div class="card-body" id="card-animation">
            <h5 class="card-title" id="promo-title">PROMOÇÕES</h5><hr>
            <img class="card-img-top" id="promo-img" src="res/site/img/product.jpg" onerror="this.onerror=null; this.src='/res/site/img/product.jpg'"><br>
            <h5 class="card-price" id="promo-price"></h5>
          </div>
        </div>
      </div> 
      
        <div class="col-md-6">
          <h5 class="card-title promo-title" id="table-cat" style="margin-top:45px;background-color: rgba(0, 0, 0, 0.7) !important;
          text-align:center;border-radius: 5px;">TABELA DE PREÇOS</h5>
            <table class="table table-borderless" id="products" style="border-collapse:separate; 
            border-spacing:10px 15px;background-color: rgba(0, 0, 0, 0.5);border-radius: 5px;">
                <tbody>
                    
                  <tr> 
                    <td>Display itens</td>
                    <td class="price">00.00</td>
                  </tr>                             

                </tbody>
              </table>
            
        </div>
        <style>
          .music{
            position:absolute;
            bottom:0;
            width:100%;
            height:60px;
          }
        </style>
        <div class="col-md-12" class="music">
          <p >
            <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              JOVEM PAN FM <i class="fa fa-music" aria-hidden="true"></i>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            
              
              <script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
              <script type="text/javascript">
              MRP.insert({
              'url':'https://playerservices.streamtheworld.com/api/livestream-redirect/JP_SP_FMAAC.aac',
              'lang':'pt',
              'codec':'aac',
              'volume':65,
              'autoplay':true,
              'forceHTML5':true,
              'jsevents':true,
              'buffering':1,
              'title':'Rádio Jovem Pan FM',
              'welcome':'Seja Bem Vindo',
              'wmode':'transparent',
              'skin':'mcclean',
              'width':180,
              'height':60
              });
              </script>              

            
          </div>

          <!-- Início Do Código Do Player-->
<!-- Final-->
        </div>
        <style>
          .card-title{
            font-size: 70px;
            font-family: 'Poppins', sans-serif;
            color: rgb(228, 123, 48);
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
          }
          .card-price{
            font-size: 70px;
            font-family: 'Poppins', sans-serif;
            color: rgb(228, 123, 48);
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
          }
          .card-body img{
            height: 50%;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          .card{
            border-image: url('/res/site/img/table.jpg') 27 23 / 10px 10px  round ;
            height: 590px;
          }
          .card-body{
            transition:  1s;
          }
          .promo-title{
            font-size: 55px;
            font-family: 'Poppins', sans-serif;
            border-image: url('/res/site/img/table.jpg') 27 23 / 10px 10px  round ;
            color: rgb(255, 255, 255);
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
            padding: 4px;
          }
        </style>        

    </div>

</div>

<?php if( isset($products) ){ ?>
    <?php $json = json_encode($products); ?> 
<?php } ?>
<?php if( isset($promotion) ){ ?>
    <?php $promot = json_encode($promotion); ?> 
<?php } ?>
<?php if( isset($categories) ){ ?>
    <?php $categories = json_encode($categories); ?> 
<?php } ?>
<script>

  var tmp = "<?php echo htmlspecialchars( $json, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
  tmp = tmp.replace(/&quot;/g, "\"");
  var tmp1 = "<?php echo htmlspecialchars( $promot, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
  tmp1 = tmp1.replace(/&quot;/g, "\"");
  var catjs = "<?php echo htmlspecialchars( $categories, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
  catjs = catjs.replace(/&quot;/g, "\"");

  var carnes = JSON.parse(tmp);
  var carnes1 = JSON.parse(tmp1);
  var categorias = JSON.parse(catjs);

  var final = [];
  var promo = [];
  var catfinal = [];

  for(var i = 0; i < carnes.length; i++){
    final.push(
      {name:carnes[i]['desproduct'], price:carnes[i]['vlprice'], cat:carnes[i]['idcategory']}
    )
  }

  for(var i = 0; i < categorias.length; i++){
    catfinal.push(
      {name:categorias[i]['descategory'], id:categorias[i]['idcategory']}
    )
  }
  for(var i = 0; i < carnes1.length; i++){
    promo.push(
      {name:carnes1[i]['desproduct'], price:carnes1[i]['vlprice'], category:carnes1[i]['idcategory'], desphoto:carnes1[i]['desphoto'], vlprice:carnes1[i]['vlprice']}
    )
  }

    var cont = 0;
    const quant = promo.length;
    const title = document.getElementById("promo-title");
    const img = document.getElementById("promo-img");
    const price = document.getElementById("promo-price");
    
    //promocoes
    intertest = setInterval(function(){
      if(cont < quant){  
        if(promo[cont]['category'] == 1){
          title.innerText = promo[cont]['name'];// "cont + '-' +quant";
          img.src = "/res/site/img/" + promo[cont]['desphoto'];
          price.innerText = 'R$ ' + promo[cont]['vlprice'];
        }   
        cont++;    
      }else{
        cont = 0;
        if(promo[cont]['category'] == 1){
          title.innerText = promo[cont]['name'];// "cont + '-' +quant";
          img.src = "/res/site/img/" + promo[cont]['desphoto'];
          price.innerText = 'R$ ' + promo[cont]['vlprice'];
        }   
        cont++;
      }
    }, 5000);

  // var filtrado = final.filter(function(obj) { return obj.cat == 5; });
  // console.log(filtrado)
  

  //categorias
  const idcattemp = catfinal.map(({id}) => id);
  const idcat = idcattemp.slice(1);
  var menoridcat = Math.min(...idcat);
  //menoridcat = (menoridcat == 1 ) ? menoridcat + 1 : menoridcat;
  const maioridcat = Math.max(...idcat);
  

  //produtos por categoria
  const idcategorias = final.map(({cat}) => cat)
  var menorcategoria = Math.min(...idcategorias);
  const maiorcategoria = Math.max(...idcategorias);
  var filtrado = final.filter(function(obj) { return obj.cat == menorcategoria; });
  var maxItems = 6;
  var table = document.getElementsByTagName('tbody')[0];
  var tableContainer = document.getElementById('products');
  var tablecat = document.getElementById('table-cat');
  var activePage = 1;
  var totalPages = Math.ceil(filtrado.length / maxItems);
  var myInterval;
  catnome();

  // insert right arrow
  var rightArrow = document.createElement('BUTTON');
  var rightArrowContent = document.createTextNode('NEXT');

  rightArrow.addEventListener('click', function(){

    // check if we got to the last page
    if (activePage === totalPages) {
      //automatizar isso
      var codcat = categoria();
      filtrado = final.filter(function(obj) { return obj.cat == codcat; });
      totalPages = Math.ceil(filtrado.length / maxItems);
      activePage = 1;
    } else {
      activePage++;
    }
    insertTable();   
    clearInterval(myInterval);
    myInterval = setInterval(function(){
      rightArrow.click();
    }, 5000);
  });
  
  // automate the switch interval
  myInterval = setInterval(function(){
    rightArrow.click();
  }, 5000);

function categoria(){

  if(menorcategoria < maioridcat){

    for(let cont = 0; idcat.length; cont++){

      if(idcat[cont] > menorcategoria){
          menorcategoria = idcat[cont];
          catnome();
          return menorcategoria;
      }

    }

  }else if(menorcategoria == maioridcat){

    menorcategoria = menoridcat;
    catnome();
    return menorcategoria;

  }

}

function catnome(){

  for(let cont = 0; cont < catfinal.length; cont++){

    if(menorcategoria == catfinal[cont]['id']){
      tablecat.innerText = catfinal[cont]['name'];
    }

  }

}
  
  function insertTable() {

      var slicedData = filtrado.slice((activePage - 1) * maxItems, activePage * maxItems);
  
      // empty the previous table
      table.innerHTML = '';
  
      // insert tr/td's
      for (var index = 0; index < slicedData.length; index++) {
      var tableTr = document.createElement('TR'); 
      tableTr.setAttribute("style", "line-height: 20px;");
          table.appendChild(tableTr);
  
      
       for (var key in slicedData[index]) {

         if(key != 'cat'){
         
          var tableTd = document.createElement('TD');
          var tdContent = document.createTextNode(slicedData[index][key]);    
          if(index == 0) {
            tableTd.className = "first";
          }
          if(key == "price"){
            tableTd.className = "price";
          }
              tableTd.appendChild(tdContent);
              tableTr.appendChild(tableTd);
         }
      }
      
      }
  

  }
  
  insertTable(filtrado);
  
  
  </script>