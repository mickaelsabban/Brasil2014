$( document ).ready(function() {

	$('tbody>tr:last-child>td.blank').prev().addClass('radius-bottom-right');
	$('tbody>tr:last-child>td.blank').next().addClass('radius-bottom-left');
	$('.table>tbody>tr:last-child>td:first-child').addClass('radius-bottom-left');
	$('.table>tbody>tr:last-child>td:last-child').addClass('radius-bottom-right');

	$('.panel-body p').hide();
	$('.panel-body button').on('click', function(){
		$('.panel-body p').slideToggle();
	});

	$('tr.blank').prev().find('td:first-child').addClass('radius-bottom-left');
	$('tr.blank').prev().find('td:last-child').addClass('radius-bottom-right');	
});