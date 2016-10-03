<div class="col-sm-12 boxAside  bg-primary" ng-if="dados.usuario.id_categories != ''">            
    <h4>Categorias Favoritas</h4>
    <img src="<?= base_url() ?>/img/icons/category.png"><br><br>        
    <span class="label label-default cat_boxAside" ng-repeat="category in dados.my_Categories" ng-bind="category.name"></span>
</div>