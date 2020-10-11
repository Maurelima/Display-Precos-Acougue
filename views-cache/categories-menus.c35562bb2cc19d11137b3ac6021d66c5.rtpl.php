<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pratos da Categoria <?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/categories">Pratos</a></li>
        <li><a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <li class="active"><a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/menus">Pratos</a></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Todos os Pratos</h3>
                        <div class="box-tools">
                              <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search" onkeyup="searchTableLeft()" id="tableLeft">
                                <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                          </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-striped" id="productsTableLeft">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome do Prato</th>
                                <th style="width: 240px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter1=-1;  if( isset($menusNotRelated) && ( is_array($menusNotRelated) || $menusNotRelated instanceof Traversable ) && sizeof($menusNotRelated) ) foreach( $menusNotRelated as $key1 => $value1 ){ $counter1++; ?>
                                <tr>
                                <td><?php echo htmlspecialchars( $value1["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["desmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/menus/<?php echo htmlspecialchars( $value1["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pratos na Categoria <?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                              <input type="text" name="search" class="form-control pull-right" placeholder="Search" onkeyup="searchTableRight()" id="tableRight">
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-striped" id="productsTableRight">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome do Prato</th>
                                <th style="width: 240px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter1=-1;  if( isset($menusRelated) && ( is_array($menusRelated) || $menusRelated instanceof Traversable ) && sizeof($menusRelated) ) foreach( $menusRelated as $key1 => $value1 ){ $counter1++; ?>
                                <tr>
                                <td><?php echo htmlspecialchars( $value1["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["desmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/menus/<?php echo htmlspecialchars( $value1["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script src="/res/site/js/sortTable.js"></script>