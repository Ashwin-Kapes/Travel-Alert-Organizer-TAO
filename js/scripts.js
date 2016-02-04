// JavaScript Document
$(document).ready(function(){	
    $('#Search').submit(function(){
		//jQuery.removeData();
		$('#roundone').hide();
	
		var Search = $('#search').val();
		var DateStart = $('#date-start').val();
		var DateEnd = $('#date-end').val();
		if(Search == '' || DateStart == '' || DateEnd == ''){
			$('.err').html('*All fields are mandatory.');
			return false;
			}
		$('.err').html('');	
		$('#res_msg').html('');
		$('.dragger').html('');
		$('#dropper').html('');	
		var Difference = daydiff(parseDate(DateStart), parseDate(DateEnd));
        $('#Response').html("<b>Fetching Data ...</b>");
		//console.log(Search);
		//console.log(Difference);
		
			$('#js-handle').html('<script type="text/javascript" src="../js/scripts.js"></script>');
			$('#res_msg').html('<img src="../Img/loading.gif" id="load" style="display:block; margin-left:auto; margin-right:auto;"/>');		
        $.ajax({
            type: 'POST',
            url: '../Data.php',
			dataType: 'json',
			data: { FormData: Search }          
        })
        .success(function(data){			
			//console.log(data);
			var html = null;
			var length = data.length;
			$('.dragger').html('');	
		for(var x = 0;x < length; x++){
			html = '<div class="ss-active-child '+data[x]['Tag']+'" style="left: 10px; top: 10px;">'
			html += '<strong>' + data[x]['Title'] + '</strong><br/>';
			html += '<span class="label label-info"> Total Reviews: </span>' + data[x]['Review']+ '<br/>';
			html += '<span class="label label-info"> Rating: </span>' + data[x]['Rating']+ ' of 5<br/>';
			html += '<span class="label label-info"> Tag: </span>' + data[x]['Tag']+ '';
			html += '</div>';
			$('.dragger').append(html);			
			}
						
			var count;
		for(var i=1; i<= Difference;i++){			
			$('#dropper').append('<div class="col-md-6" id="child_'+i+'"><div class="alert alert-minimal alert-info nomargin"><p><i class="fa fa-info"></i> Day '+i+' Target: </p></div><div class="dragger shapeshifted_container_'+i+' ui-droppable" style="height:122px;min-height:122px;"></div></div>');			
			}
			$('#res_msg').html('<div class="col-md-4"><img src="../Img/DragAndDrop.gif" style="width:300px;height:200px;" /></div><div class="col-md-8"><div class="alert alert-minimal alert-success nomargin">You have '+Difference+' days and you must visit these '+length+' places in '+Search+'. We have created an organiser, simply drag the place cards and drop to days section. </div><br/><a href="http://localhost/Travel-Alert-Organiser-TAO/Planner/" class="btn btn-success pull-right"> Refresh for another search </a></div>');
			$('#js-handle').html('<script type="text/javascript" src="../js/scripts.js"></script>');
		                     
        })
        .fail(function() {
            $('#Response').html('Failed!');  
             
        });
        return false;
 
    });
	
	//
	function parseDate(str) {
    var mdy = str.split('/')
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function daydiff(first, second) {
    return Math.round((second-first)/(1000*60*60*24));
}
	//
});
//
$(document).ready(function(){

	(function($) {

		$('#header__icon').click(function(e){
			e.preventDefault();
			$('body').toggleClass('with--sidebar');
		});
    
    $('#site-cache').click(function(e){
      $('body').removeClass('with--sidebar');
    });

	})(jQuery);

});
//
$(document).ready(function()
		{
			$('#date-end').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'MM/DD/YYYY',
				time: false
			});
			$('#date-start').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'MM/DD/YYYY', 
				shortTime : true,
				time: false
			}).on('change', function(e, date)
			{
				$('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
			});

			//$('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

			$.material.init()
		});
$(document).ready(function() {
      $(".dragger").shapeshift();
	  
    })
//
$(function(){
      $('.livedata').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).attr('id');
		  
        });
		var value = $(this).val();

		//console.log(val);
		 $.ajax({
            type: 'POST',
            url: '../Data.php',
			dataType: 'json',
			data: { LiveData: JSON.stringify(val) }          
        })
      });
    });
//Under Progress

       
	  
	