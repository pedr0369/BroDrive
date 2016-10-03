<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/nav'); ?>

<div class="col-md-8 content col-md-offset-2" style="margin-bottom: 20px;">
    
    <div ng-if="msg.estado" ng-show="msg">
        <div class="alert alert-success"><span ng-bind="msg.mensagem"></span></div>
    </div>
    <div ng-if="!msg.estado" ng-show="msg">
        <div class="alert alert-danger"><span ng-bind="msg.mensagem"></span></div>
    </div>
    
    <form ng-submit="criarPost()" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titulo">Título: </label>
            <input type="text" class="form-control" placeholder="Insira o título do post" ng-model="formPost.titulo" required>
        </div>
    
        <div class="form-group">
            <label for="texto">Texto do post: </label>
            <textarea class="form-control" ng-model="formPost.texto" required></textarea>
        </div>
        
        <div class="form-group col-sm-6">
            <label for="autor">Autor do post: </label>
            <input type="text" class="form-control" ng-model="formPost.autor" required>
        </div>
        
        <div class="form-group col-sm-6">
            <label for="chamada">Imagem de chamada: </label>
            <input type="file" class="form-control" name="chamada" ng-model="formPost.chamada">
        </div>
        
        <div class="form-group col-sm-8 col-sm-offset-2">
            <input type="submit" value="Cadastrar Post" class="btn btn-block" id="botao_mais">
        </div>
        
    </form>
</div>

<?php $this->load->view('template/footer'); ?>