<div class="col-md-12" ng-if="dados.lastFile.length > 0">	<!-- arquivos enviados -->	
    <div class="bg_bro">
        <h4 class="tit_box text-center">Últimos arquivos enviados</h4><br>
        <table class="table table-responsive">
            
            <label for="pesquisa">Filtre sua busca</label>
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                <input type="search" ng-model="arquivos" class="form-control">
            </div>
            <hr>
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Arquivo</th>
                    <th>Categoria</th>
                    <th></th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>            
                <tr ng-repeat="files in dados.lastFile | limitTo:15 | filter:arquivos" ng-if="dados.usuario.email != files.email" ng-init="user = files.email.split('@')[0]">
                    <td class="text_file" ng-bind="user"></td>
                    <td class="text_file"><a target="_blank" href="<?= base_url() . 'Diretorio/{{user}}' . '/{{files.name}}' . '{{files.extension}}'; ?>">{{files.name | limitTo: 15}}{{files.extension}}</a></td>
                    <td class="text_file" ng-bind="files.nameCat"></td>
                    <td><a href="<?= base_url() . 'Diretorio/{{user}}' . '/{{files.name}}' . '{{files.extension}}'; ?>" download><span class="glyphicon glyphicon-download"></span></a></td>
                    <td ng-bind="files.dt_create | date: 'dd/MM/yyyy'" class="text_file"></td>
                </tr>
            </tbody>
</table>
    </div>		
</div><!-- fim arquivos enviados -->