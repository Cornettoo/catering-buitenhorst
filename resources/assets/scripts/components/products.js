jQuery(function ($) {
	var notification = document.querySelector('.notifications__succes');

	$('body').on('added_to_cart',function(){
		notification.classList.add('show');
		
		setTimeout(() => {
			notification.classList.remove('show');
		}, 4500);
	});

	let addVariant = document.querySelector('#add-variant');
	if (addVariant) {
		let select = addVariant.querySelector('select'),
			button = addVariant.querySelector('a');

		select.addEventListener('change', () => {
			button.dataset.product_id = select.value;
		})
	}
});