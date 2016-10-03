//angular front-end
var meuSite = angular.module('meuSite', []);

//carrega
meuSite.controller('meuController', function($scope, $http){

    data = new Date();
    var baseUrl = 'http://localhost/francoDevCI/';

    //dados para o site
    $scope.dados = {
        "autor": "Pedro Franco",
        "copyright": "@" + data.getFullYear() + " todos os direitos reservados.",
        "nomeSite": "FrancoDev",
    };

    $scope.skills = {
       web: [
            {src: baseUrl + "vendor/img/icons/html.svg", title: "HTML5", titulo: "WEB"},
            {src: baseUrl + "vendor/img/icons/css.svg", title: "CSS3"},
            {src: baseUrl + "vendor/img/icons/bootstrap.svg", title: "Bootstrap"},
            {src: baseUrl + "vendor/img/icons/mysql.svg", title: "MYSQL"},
            {src: baseUrl + "vendor/img/icons/javascript.svg", title: "Javascript"},
            {src: baseUrl + "vendor/img/icons/mongodb.png", title: "MongoDB"},
            {src: baseUrl + "vendor/img/icons/node.png", title: "NodejS"},
            {src: baseUrl + "vendor/img/icons/jquery.svg", title: "Jquery"},
            {src: baseUrl + "vendor/img/icons/angular.svg", title: "AngularJS"},
            {src: baseUrl + "vendor/img/icons/php.svg", title: "PHP"},
            {src: baseUrl + "vendor/img/icons/codeigniter.png", title: "CodeIgniter"},
            {src: baseUrl + "vendor/img/icons/wordpress.png", title: "Wordpress"},
       ],
        academica: [
            {src: baseUrl + "vendor/img/icons/c.svg", title: "C++", titulo: "Linguagens que utilizei academicamente"},
            {src: baseUrl + "vendor/img/icons/csharp.svg", title: "C#"},
            {src: baseUrl + "vendor/img/icons/java.svg", title: "Java"},
            {src: baseUrl + "vendor/img/icons/jsp.png", title: "JSP"}
        ],
        so: [
            {src: baseUrl + "vendor/img/icons/linux.svg", title: "Linux", titulo: "Sistemas Operacionais e ferramentas utilizadas"},
            {src: baseUrl + "vendor/img/icons/windows.svg", title: "Windows"},
        ],
        metodologias: [
            {src: baseUrl + "vendor/img/icons/scrum.svg", title: "SCRUM", titulo: "Metodologias Ágeis"},
            {src: baseUrl + "vendor/img/icons/mvc.svg", title: "MVC"}
        ],
        versionamento: [
            {src: baseUrl + "vendor/img/icons/git.svg", title: "GIT", titulo: "Controle de versão"},
            {src: baseUrl + "vendor/img/icons/github.png", title: "GitHub"},
            {src: baseUrl + "vendor/img/icons/bitbucket.png", title: "BitBucket"},
        ],
    };

    $scope.otherProjects = [
        {src: baseUrl + "vendor/img/Particip_sites/artico.jpg", url: "http://articoturismo.com", nome: "Artico Turismo"},
        {src: baseUrl + "vendor/img/Particip_sites/bruna.jpg", url: "http://brunabittar.com", nome: "Bruna Bittar"},
        {src: baseUrl + "vendor/img/Particip_sites/casamentopratico.jpg", url: "http://casamentopratico.com.br", nome: "Casamento Prático"},
        {src: baseUrl + "vendor/img/Particip_sites/estevam.jpg", url: "http://estevamodamasculina.com.br", nome: "Estevam Moda"},
        {src: baseUrl + "vendor/img/Particip_sites/mariasonhou.jpg", url: "http://mariasonhou.com.br", nome: "Maria Sonhou"},
        {src: baseUrl + "vendor/img/Particip_sites/nocs.jpg", url: "http://nocs.com.br", nome: "NOCS"},
        {src: baseUrl + "vendor/img/Particip_sites/nutriri.jpg", url: "http://nutriri.com.br", nome: "Nutriri"},
        {src: baseUrl + "vendor/img/Particip_sites/seminovo.jpg", url: "http://seminovo.com.br", nome: "Semi Novo Certo"},
    ];

});
