<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Produtos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/products">Pratos</a></li>
        <li class="active"><a href="/admin/products/create">Cadastrar</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/products/create" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                      <label for="desproduct">Nome do Produto</label>
                      <input type="text" class="form-control" id="desproduct" name="desproduct" placeholder="Digite o nome do produto" >
                    </div>
                    <div class="form-group">
                        <label>Loja</label>
                        <select class="form-control" name="idstore">
                          <?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>               
                                <option value="<?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                          <?php } ?>                     
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="vlprice">Preço</label>
                      <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00">
                    </div>
                    <div class="form-group">
                      <label>Unidade</label>
                      <select class="form-control" name="desunity">  
                              <option value="KG">KG</option>                    
                              <option value="UN">UN</option>                    
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file">Foto</label>
                      <input type="file" class="form-control" id="file" name="file" value="/res/site/img/produto.jpg">
                      <div class="box box-widget">
                        <div class="box-body" style="width: 300px;height: 300px;">
                          <img class="img-responsive" id="image-preview" src="/res/site/img/produto.jpg" alt="Photo" onerror="this.onerror=null; this.src='/res/site/img/product.jpg'">
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->