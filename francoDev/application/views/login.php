<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/nav'); ?>

<div class="col-md-4 content col-md-offset-4" style="margin-bottom: 80px; margin-top: 80px;">
    
    <div ng-if="msg.estado" ng-show="msg">
        <div class="alert alert-success"><span ng-bind="msg.mensagem"></span></div>
    </div>
    <div ng-if="!msg.estado" ng-show="msg">
        <div class="alert alert-danger"><span ng-bind="msg.mensagem"></span></div>
    </div>
    
    <h4 class="text-center">Entrar como editor</h4>
    
    <form ng-submit="criarPost()">
        <div class="form-group">
            <label for="usuario">Usuario: </label>
            <input type="text" class="form-control" placeholder="Insira seu usuario" ng-model="formPost.usuario" required>
        </div>
    
        <div class="form-group">
            <label for="senha">Senha: </label>
            <input type="password" class="form-control" ng-model="formPost.texto" required>
        </div>
        
        <div class="form-group col-sm-8 col-sm-offset-2">
            <input type="submit" value="Logar" class="btn btn-block" id="botao_mais">
        </div>
        
    </form>
</div>

<?php $this->load->view('template/footer'); ?>