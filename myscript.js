document.getElementById('new_record').addEventListener('click', function(){
	document.getElementById('add_block').classList.toggle('hide_me');
});

var add_selection = document.getElementById('select_new');

add_selection.addEventListener('change', function(){
	if(add_selection.selectedIndex == 1){
		document.getElementById('add_new_name').classList.remove('hide_me');
	} else {
		document.getElementById('add_new_name').classList.add('hide_me');
	}
});

// console.log('hello');
// var eSelect = document.getElementById('select_new');

// eSelect.onchange = function () {
// 	console.log('yo');
// }