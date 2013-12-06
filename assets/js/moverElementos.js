Sortable.create('contratados', {
	tag : 'div',
	dropOnEmpty : true,
	containment : ["contratados", "despedidos"],
	constraint : false
});
Sortable.create('despedidos', {
	tag : 'div',
	dropOnEmpty : true,
	containment : ["contratados", "despedidos"],
	constraint : false
});

Sortable.create('pagina', {
	tag : 'div',
	only : 'seccion',
	handle : 'arrastrar'
});

