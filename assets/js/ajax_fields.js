/* http://www.gnu.org/licenses/gpl.html GNU/GPL */
jQuery(function($) {
		
	// handle control groups and choose by field
	$('.control-group').each( function(id){		
		var label_id = $(this).find('label').attr('for');
		var controls = $(this).find('.controls');
		var app_id = $('.app-ajax-on-change :selected').val();		
		var choose_by = $('.choose_by').val();		
		var cats = [];
		$('.choose_categories :selected').each(function(i, selected){
			cats[i] = $(selected).val();
		});
		
		// add data-getwhat and data-getby attr to choose by
		$('.choose_by').attr('data-getwhat', '');		
		
		if(label_id == 'jform_params_zoocategories'){			 
			controls.addClass('params_zoocategories_controls');
			$(this).addClass('params_zoocategories');
			(!app_id || !choose_by) ? $(this).addClass('nodisplay') :'';
			
		} else if(label_id == 'jform_params_zootypes'){
			controls.addClass('params_zootypes_controls');
			$(this).addClass('params_zootypes');
			(!app_id) ? $(this).addClass('nodisplay') :'';
			
		} else if(label_id == 'jform_params_zooitems'){
			controls.addClass('params_zooitems_controls');
			$(this).addClass('params_zooitems');
			(!app_id || !cats || !choose_by) ? $(this).addClass('nodisplay') :'';			
		}
	});
	
	// show/hide/clear, on app change	
	$('.app-ajax-on-change').on('change', function(evt){		
		evt.preventDefault();
		var app_id = $(this).val();
		
		$('.params_zootypes').removeClass('nodisplay');
		
		//reset choose_by on application change
		$('.choose_by').chosen('destroy');		
		$('.choose_by').val('').chosen().trigger('chosen:updated');		
		
		// clear items on application change		
		$('.choose_items').chosen('destroy');
		$('.choose_items option').each(function() {
			if($(this).val() != ''){
				$(this).remove();
			}
		});
		$('.choose_items').val('').chosen().trigger('chosen:updated');	
		
		// clear categories on application change
		$('.choose_categories').chosen('destroy');
		$('.choose_categories option').each(function() {
			if($(this).val() != ''){
				$(this).remove();
			}
		});
		$('.choose_categories').val('').chosen().trigger('chosen:updated');	
		
		// hide sections on application change			
		$('.params_zooitems, .params_zoocategories').addClass('nodisplay');		
		(app_id == '') ? $('.params_zootypes').addClass('nodisplay') : '';		
	});
	
	// get categories on application change	
	$('.choose_by').on('change', function(evt){
		evt.preventDefault();
		var jpath_root = $('#jpath_root').val();		
		var app_id = $('.app-ajax-on-change :selected').val();
		var choose_by = $(this).val();
		
		//assign value to data-getwhat and get switch_case
		$('.choose_by').attr('data-getwhat', choose_by);
		var switch_case = $(this).attr('data-getwhat');
		
		var values = {
			'jpath_root' : jpath_root,
			'switch_case' : switch_case,
			'app_id' : app_id
		}
		
		// clear items on choose_by change
		$('.choose_items').chosen('destroy');
		$('.choose_items option').each(function() {
			if($(this).val() != ''){
				$(this).remove();
			}
		});
		$('.choose_items').val('').chosen().trigger('chosen:updated');	
		
		// clear categories on choose_by change if none selected
		if(choose_by == ''){				
			$('.choose_categories').chosen('destroy');
			$('.choose_categories option').each(function() {
				if($(this).val() != ''){
					$(this).remove();
				}
			});
			$('.choose_categories').val('').chosen().trigger('chosen:updated');	
			
			// hide sections on application change			
			$('.params_zooitems, .params_zoocategories').addClass('nodisplay');	
			
		// make ajax call 	
		} else{				 			
			$.ajax({
				type: 'POST',
				url: '../modules/mod_zooitems/fields/html/ajax_fields.php',
				data: values,
				cache: false,
				success: function(data)	{				
					data=$.parseJSON(data);					
					$('.choose_categories').chosen('destroy').remove();
					$('#zoocategories').append(data);
				}	
			}).done(function() {				
					$('.params_zoocategories').removeClass('nodisplay');
					$('.choose_categories').chosen().trigger('chosen:updated');					
				}); // end ajax//*/
		}
	});	
	
	// get items on category/type change	
	$('body').on('change','.choose_categories', function(evt){
		evt.preventDefault();
		var jpath_root = $('#jpath_root').val();
		var switch_case = $(this).attr('data-getwhat');
		var choose_by = $('.choose_by').val();
		var app_id = $('.app-ajax-on-change :selected').val();
		var cats = [''];
		$('.choose_categories :selected').each(function(i, selected){
			cats[i] = $(selected).val() ? $(selected).val():'';
		});
		
		var itms = [''];
		$('.choose_items :selected').each(function(i, selected){
			itms[i] =  $(selected).val() ? $(selected).val():'';
		});

		var values = {
			'jpath_root' : jpath_root,
			'switch_case' : switch_case,
			'choose_by' : choose_by,
			'app_id' : app_id,
			'sitms' : itms,
			'scats' : cats
		}
			
		// clear items on category change change if none selected
		if( cats[0] == '' & cats.length == 1 ){			
			$('.choose_items').chosen('destroy');
			$('.choose_items option').each(function() {
				if($(this).val() != ''){
					$(this).remove();
				}
			});
			$('.choose_items').val('').chosen().trigger('chosen:updated');	
			
		// make ajax call		
		} else{			
			$.ajax({
				type: 'POST',
				url: '../modules/mod_zooitems/fields/html/ajax_fields.php',
				data: values,
				cache: false,
				success: function(data)	{				
					data=$.parseJSON(data);					
					//$('.params_zooitems_controls').html(data);
					$('.choose_items').chosen('destroy').remove();
					$('#zooitems').append(data);
				}	
			}).done(function() {
					$('.params_zooitems').removeClass('nodisplay');
					$('.choose_items').chosen().trigger('chosen:updated');				
				}); // end ajax//
		}
	});		
});