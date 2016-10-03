<?php if($usuario['id_categories'] == ""): ?><!-- categorias preferidas -->
<div class="row col-md-12">
    <div class="bg_bro">
        <h4 class="tit_box text-center">Categorias preferidas</h4><br>			

        <?php
            echo form_open('Painel/cadastraCategories');
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
                        "content" => "Cadastrar categorias",
                        "type" => "submit",
                        "style" => "width: 50%; margin-left: 25%;"
                    ));        

            echo form_close();
        ?>
    </div>
</div>
<?php endif; ?><!-- end categorias preferidas -->