<ul>
    <li><a href="<?php echo BASE; ?>">Ínicio</a></li>
    <?php
    $menus = listar("menus","where menus_visivel = 'habilitado'");
    $m = new ArrayIterator($menus);
    while ($m->valid()):
        ?>
        <li><a href="<?php echo BASE . "/" . $m->current()->menus_slug; ?>"><?php echo $m->current()->menus_nome; ?></a></li>
        <?php
        $m->next();
    endwhile;
    ?>
    <li id="pedido_link">
        
		&nbsp;&nbsp;
        <?php echo isset($_SESSION['locar']) ? "(" . count($_SESSION['locar']) . ") filme(s)" : '(0) filme(s)'; ?>
        
		
		<!--
		<a href="<?php echo BASE . "/"; ?>" rel="/modulos/listar/listar_filmes_locados.php">
            Ver Pedido - <?php echo isset($_SESSION['locar']) ? "(" . count($_SESSION['locar']) . ") filmes" : '(0) filmes'; ?>
		</a>
		-->

		<!--
		<a href="<?php echo BASE; ?>/modulos/listar/listar_filmes_locados" rel="/modulos/listar/listar_filmes_locados.php">
            Ver Pedido - <?php echo isset($_SESSION['locar']) ? "(" . count($_SESSION['locar']) . ") filmes" : '(0) filmes'; ?>
		</a>
		-->
		
    </li>
</ul>