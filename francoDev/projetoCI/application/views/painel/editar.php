<div class="row-fluid">

	<ol class="breadcrumb">
	  <li><?= anchor('login/index', 'Página Inicial') ?></li>
	  <li class="active">Editar Dados</li>
	</ol>
    
    <div class="col-sm-4">
		<div style="margin-top: 20px;" class="bg_bro">
			<h4 class="text-center tit_box">Trocar Categoria</h4><br>
            
            <?php
            echo form_open('Painel/editaCategories');
                foreach($categories as $category): 

                    echo "<div class='col-xs-4' style='border-right: 1px solid #333; margin-bottom: 5px; font-size: 10px;'>";
                    echo form_label($category["name"], "category");
                    echo form_checkbox(array(
                        "name" => "category[]",
                        "id" => "category",
                        "type" => "checkbox",
                        "value" => $category['id'],
                        "style" => "float:right; margin-right: 5%;"
                    ));
                    echo "</div>";

                endforeach;

                    echo "<br>" . form_button(array(
                        "class" => "btn",
                        "content" => "Atualizar categorias",
                        "type" => "submit",
                        "style" => "width: 50%; margin-left: 25%;"
                    ));        
            echo form_close();
        ?>
            
        </div>
    </div>
    
    <div class="col-sm-4">
		<div style="margin-top: 20px;" class="bg_bro">
			<h4 class="text-center tit_box">Trocar Avatar</h4>
            <?php
                echo form_open('Painel/editaAvatar');
					for($i = 1; $i <= 8; $i++){
						echo "<span class='avatar'>";
						echo form_radio(array(
							'name' => 'avatar',
							'id' => 'avatar',
							'value' => $i,
							'required' => 'required'
						));
						echo "<img src='" . base_url() . "img/avatar/{$i}.png'>";
						echo "</span>";
					}
                echo form_close();
                ?>
        </div>
    </div>
    
    <div class="col-sm-4">
		<div style="margin-top: 20px;" class="bg_bro">
			<h4 class="text-center tit_box">Trocar Senha</h4><br>
        </div>
    </div>
    
</div>