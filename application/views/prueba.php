<h2 align="center">Arrastra los pacientes de un bloque a otro y presiona Guardar</h2>
<p align="center"></p>
<div id="pagina" >
	<div id="contratados" class="seccion" style="float:left;width:150px;" />
		<h3 class="arrastrar">Citados</h3>
		<?php
			$contador = 0;
			foreach ($contratados->result() as $contrato) :
				echo "<div id='empleados_" . $contrato->nombre."'>".(++$contador)." ".$contrato->nombre. "</div> \n";
			endforeach;
		?>
	</div>
	<div id="despedidos" class="seccion" style="float:left;width:150px;">
		<h3 class="arrastrar">Propuestos</h3>
		<?php
			$contador = 0;
			foreach ($despedidos->result() as $despedido):
				if($despedido->estatus == 2)
					$colorEstatus = 'grey';
				else if($despedido->estatus == 3)
					$colorEstatus = 'green';
				else
					$colorEstatus = 'pink';
				echo "<div id='despedidos_".$despedido->nombre."' style='border: solid $colorEstatus' >".(++$contador)." ".$despedido->nombre. "</div>";
			endforeach;
		
		?>
	</div>
	
<p align="center"/>
	<input type="submit" name="butonbs" value="Guardar en la base de datos" onclick="obtenerElementos()"/>
</p>

</div>

<script src="assets/js/moverElementos.js" type="text/javascript" ></script>
