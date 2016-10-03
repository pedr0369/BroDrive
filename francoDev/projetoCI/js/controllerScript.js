var app = angular.module('brodrive', []);

app.controller('codAtivacao', function($scope, $http) {
    $http.get('http://www.brodrive.com.br/index.php/Painel/meusDados')
    .then(function(response){
        $scope.dados = response.data;
        console.log(response.data);
    }, function(err){
        if(err)
            console.log('Deu um erro complicado');
    });
    
});