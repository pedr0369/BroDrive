<div class="col-sm-12 boxAside bg-primary"><!-- meus arquivos -->
        <h4>Meus arquivos</h4>
        <img src="<?= base_url() ?>/img/icons/folder.png"><br><br>
        <table class="table table-responsive table-condensed"> 
            
        <?php foreach($myFile as $file): ?>
                <?php $total += (int) $file['size']; $cont++; ?>
        <tr>
            
            <?php $user = explode('@', $usuario['email']); ?>
            
            <td class="transparencia">
            <a href="<?= base_url() . "Diretorio/{$user[0]}/{$file['name']}{$file['extension']}";  ?>" class="text_file" target="_blank" style="color: white;"><?=  substr($file['name'], 0, 12) . "{$file['extension']}" ?></a></td>

            <td class="transparencia"><a href="<?= base_url() . "Diretorio/{$user[0]}/{$file['name']}{$file['extension']}";  ?>" download style="color:white;"><span class="glyphicon glyphicon-download"></span></a></td>            
            <td class="transparencia"><?= anchor("Painel/fileRemove/" . $file['id'], '<span class="glyphicon glyphicon-trash" style="color:white;">'); ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
        <p><b>Espaço Usado: <?= substr($total / 1000, 0, 3); ?> / 40 MB</b><br>
        <b>Arquivos mantidos: <?= $cont; ?></b><br>
        <b>** Arquivos de até 10MB **</b></p> 
</div><!-- end meus arquivos -->