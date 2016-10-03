<div class="col-md-8 col-md-offset-1 content">

    <div class="row jumbotron ladoS">
        <h2 class="text-center">SOBRE MIM</h2>
        <p class="text-justify">Atualmente venho cursando o tecnólogo de Análise e Desenvolvimento de Sistemas na Universidade Estácio de Sá, cursei Ciência
        da Computação na Faculdade Pitágoras até o segundo período, porém cancelei para voltar ao tecnólogo que se encontrava trancado.
        Atualmente trabalho na empresa M.Bottaro trabalhando com o desenvolvimento de sites em Wordpress, criando sites, hotsites, portais,
        blogs, e até sistemas. </p>
        <p class="text-justify">Em meus estudos na linguagem PHP criei o projeto <a href="http://brodrive.com.br" target="_blank">BroDrive</a>
         utilizando o framework CodeIgniter, em meu curso técnico de Informática criei o projeto <a href="https://github.com/pedr0369/ProjetoPizzariaEureka" target="_blank">Pizzaria Eureka</a>
          que foi um projeto utilizando Java Web(JSP, JSTL e Servlet). Atualmente venho me aventurando a estudar MEAN Stack (MongoDB,
          Express, AngularJS, NodeJS) e suas tecnologias. 
        </p>
    </div>

    <div class="row jumbotron ladoN">
        <h2 class="text-center">SKILLS</h2>
        
        <div class="row" style="margin-top:10px;" ng-repeat="icones in skills">
            <div class="col-sm-10 col-sm-offset-1">
                <h4 class="text-center" ng-repeat="tit in icones">{{tit.titulo}}</h4>
                <img ng-repeat="ico in icones" src="{{ico.src}}" class="col-sm-2" alt="{{ico.title}}" width="64px" height="54px" style="margin: 10px 0 20px" />
            </div>
        </div>
    </div>
    
    <div class="row jumbotron ladoS">
        <h2 class="text-center">MEUS PROJETOS</h2>
        
        <h4 class="text-center">ProjetoPizzariaEureka</h4>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-7">
                <p>Projeto de TCC curso técnico, Pizzaria Eureka, feito em JSP, JSTL, MYSQL. Com recursos Servlet e tudo baseado na linguagem Java para JavaWEB.</p>

                <p>Utilizamos Bootstrap3, alguns recursos Javascript, HTML5, CSS3 e etc... Para torna o projeto funcional precisa-se ter instalado o Apache TomCat na máquina.</p>
            </div>
        
            <div class="col-sm-5">
                <a href="<?= base_url('vendor/img/eureka/atendimento'); ?>" target="_blank"><img src="<?= base_url('vendor/img/eureka/atendimento'); ?>" width="100%" height="170px"></a>
            </div>
        </div>
        
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-5">
                <a href="<?= base_url('vendor/img/eureka/gerente'); ?>" target="_blank"><img src="<?= base_url('vendor/img/eureka/gerente'); ?>" width="100%" height="200px"></a>
            </div>

            <div class="col-sm-7">
                <p>E uma IDE Java é imprescíndivel, utilizamos o Eclipse na produção. Neste projeto conseguimos conquistar o primeiro lugar de projeto TCC na instituição UTRAMIG em Belo Horizonte.</p>

                <p>O projeto consta de um sistema completo e modulado de pizzaria. Onde possui um sistema de delivery, sistema de atendimento, sistema de gerenciamento e o site com venda online e demonstração dos produtos. Onde todos os dados se completam e entrelaçam. </p>
            </div>
        </div>
        
        <h4 class="text-center">BroDrive</h4>
        
        <div class="row">
            <iframe src="http://www.brodrive.com.br" class="col-sm-12" width="100%" frameborder=0 height="400px" style="margin-bottom: 20px;"></iframe>
            <br><br><p style="padding: 20px;">BroDrive foi construído em PHP com o framework CodeIgniter, é um projeto idealizado no período em que cursava Ciência da Computação na Faculdade Pitágoras com o intuito de que cada um que for membro do site, pudesse compartilhar arquivos com os outros membros. O site possui um sistema de aprovação para manter a seriedade do compartilhamento de informação. O compartilhamento pode ser categorizado, para quem deseja compartilhar documentos e informações de um assunto em comum possa facilmente achar. Porém, o projeto não está concluído e está apenas basicamente funcional. </p>
        </div>        
    </div>
    
    <div class="row jumbotron ladoN">
        <h2 class="text-center">PROJETOS QUE PARTICIPEI</h2>
        <div class="row">
            <div class="col-sm-6 sites_Projects" ng-repeat="project in otherProjects">
                <h4 ng-bind="project.nome" class="text-center"></h4>
                <a href="{{project.url}}" target="_blank"><img src="{{project.src}}" style="width:100%;" height="200px"></a>
            </div>
        </div>
        
        <div class="row">
            <?= anchor('Contato/index', 'Quer conhecer mais serviços? Deixe seu contato. Clique aqui.', array('class' => 'btn btn-block', 'id' => 'botao_mais')); ?>
        </div>
    </div>

</div>
