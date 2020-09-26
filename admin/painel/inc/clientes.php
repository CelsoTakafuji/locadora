<h2>Clientes</h2>
<div class="table">
    <div class="head"><h5 class="iFrames">Lista de clientes cadastrados</h5></div>
    <h5><a href="#" id="cadastrarCliente">Cadastrar Cliente</a></h5>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>telefone</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clientes = listar("clientes", $parametros = null);

            $params = array(
                'mode' => 'Sliding',
                'perPage' => 10,
                'delta' => 2,
                'itemData' => $clientes
            );
            $pager = & Pager::factory($params);
            $data = $pager->getPageData();

            $a = new ArrayIterator($data);
            while ($a->valid()):
                ?>
                <tr class="gradeX">
                    <td><a href="?p=dados_cliente&id=<?php echo $a->current()->clientes_id; ?>"><?php echo $a->current()->clientes_nome; ?></a></td>
                    <td><?php echo $a->current()->clientes_email; ?></td>
                    <td><?php echo $a->current()->clientes_telefone; ?></td>
                    <td class="center"><a href="#" onclick="janelaAlterar(<?php echo $a->current()->clientes_id; ?>,'cliente')" ><img src="imagens/edit.png" /></a></td>
                    <?php
                    /* VERIFICAR SE TEM FILME LOCADOS PARA O CLIENTE */
                    $dados = pegarPeloId("locados", "locados_cliente", $a->current()->clientes_id);
                    if (count($dados) <= 0):
                        ?>
                        <td class="center"><a href="#" onclick="deletar(<?php echo $a->current()->clientes_id; ?>,'cliente')"><img src="imagens/delete.png" /></a></td>
                   <?php endif; ?>
                </tr>
                <?php
                $a->next();
            endwhile;
            ?>
            <tr>
                <td colspan="3" align="center">
                    <?php
                    $links = $pager->getLinks();
                    echo $links['all'];
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>