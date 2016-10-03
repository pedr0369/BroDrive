<div class="col-md-12" ng-if="dados.lastFile.length > 0">	<!-- arquivos enviados por categoria favorita -->	
    <div class="bg_bro">
        <h4 class="tit_box text-center">Arquivos de sua preferência</h4><br>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Arquivo</th>
                    <th></th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>            
                <tr ng-repeat="files in dados.lastFile | limitTo:10 | filter:arquivos" ng-if="dados.usuario.email != files.email" ng-init="user = files.email.split('@')[0]">
                    <td class="text_file"><a target="_blank" href="<?= base_url() . 'Diretorio/{{user}}' . '/{{files.name}}' . '{{files.extension}}'; ?>">{{files.name | limitTo: 15}}{{files.extension}}</a></td>
                    <td><a href="<?= base_url() . 'Diretorio/{{user}}' . '/{{files.name}}' . '{{files.extension}}'; ?>" download><span class="glyphicon glyphicon-download"></span></a></td>
                    <td class="text_file" ng-bind="files.nameCat"></td>
                </tr>
            </tbody>
        </table>
    </div>		
</div><!-- fim arquivos enviados por categoria favorita -->