<div class="col-md-8 col-md-offset-1 content">
    <div ng-repeat="post in posts | limitTo: 10 | orderBy: '-data'">
        <div class="col-sm-6 chamadaPost">
            <h3 ng-bind="post.titulo" class="text-center"></h3>
            <img src="img/Particip_sites/bruna.jpg" width="100%" height="200px">
            <p><i><small ng-bind="post.autor" class="pull-left"></small><small ng-bind="post.data | date:'dd/MM/yyyy'" class="pull-right"></small></i></p><hr> 
            <p ng-bind="post.texto.substr(0, 180) + '...'"></p><a>Continue lendo...</a>
        </div>
    </div>
</div>