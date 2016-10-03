<?php if(isset($filesCategories)): ?>
<div class="col-md-12"><!-- upload de arquivo -->
    <div class="bg_bro">
            <h4 class="tit_box text-center">Upload de arquivo</h4><br>                
            <?php echo form_open_multipart('painel/load_arquivo');?>
            <div class="col-md-12"><input type="text" size="100" id="file-falso" readonly="readonly" class="form-control" placeholder="Diretorio do arquivo..."></div>

                    <div id="div-file" class="col-md-10 col-sm-offset-1">
                        <input type="file" name="arquivo" onchange="document.getElementById('file-falso').value = this.value;" required="required" />
                    <div><input type="button" value="Procurar arquivo..." class="btn btn-block"></div>
                    </div>

                <div class="col-sm-12">
                    <?php
                        $select = array();
                        foreach($my_Categories as $my){
                            array_push($select[$my['id']] = $my['name']);
                        }

                        echo form_label("<br>Categoria: ", "categoria");
                        echo form_dropdown('categoria', $select, '', 'class="form-control"');
                    ?>
                </div>

                <div class="col-sm-12">
                    <?php echo form_label("<br>Descrição:", "descricao"); ?>
                    <textarea name="descricao" rows="3" placeholder="Descreva seu arquivo em poucas palavras" maxlength="140" class="form-control"></textarea><br>
                </div>

                <?php echo form_button(array(
                    "class" => "btn btn-block",
                    "content" => "Enviar arquivo",
                    "type" => "submit"
                 )); ?>
                <br>
            <?php echo form_close(); ?>
    </div>
</div><!-- end upload de arquivo -->
<?php endif; ?>