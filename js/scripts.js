// JavaScript Document
$(document).ready(function(){	
    $('#Search').submit(function(){
		//jQuery.removeData();	
		var Search = $('#search').val();
		var DateStart = $('#date-start').val();
		var DateEnd = $('#date-end').val();
		if(Search == '' || DateStart == '' || DateEnd == ''){
			$('.err').html('*All fields are mandatory.');
			return false;
			}
		$('#roundone').hide();
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
			
			var Places = getPlaces();	
			console.log(Places);
			var html = null;
			var num = 0;
			var length = data.length;
			$('.dragger').html('');	
		for(var x = 0;x < length; x++){			
				if(jQuery.inArray(data[x]['Tag'].trim() , Places) !== -1){
					console.log(data[x]['Tag'].trim() + ' --> ' + Places);
			html = '<div class="ss-active-child '+data[x]['Tag']+'" style="left: 10px; top: 10px;">'
			html += '<div class="ptitle">' + data[x]['Title'] + '</div><br/>';
			html += '<span class="label label-info"> Total Reviews: </span>' + data[x]['Review']+ '<br/>';
			html += '<span class="label label-info"> Rating: </span>' + data[x]['Rating']+ ' of 5<br/>';
			html += '<span class="label label-info"> Tag: </span>' + data[x]['Tag']+ '';
			html += '</div>';
			$('.dragger').append(html);
			num = num+1;
				}
			}
						
			var count;
			$('.subs').attr('id',Difference);
		for(var i=1; i<= Difference;i++){			
			$('#dropper').append('<div class="col-md-12" id="child_'+i+'"><div class="alert alert-minimal alert-info nomargin"><p><i class="fa fa-info"></i> Tourist point to be covered on day '+i+' : </p></div><div class="dragger shapeshifted_container_'+i+' ui-droppable" style="height:122px;min-height:122px;"></div></div>');			
			}
			$('#res_msg').html('<div class="col-md-3"><img src="../Img/DragAndDrop.gif" style="width:200px;height:120px;" /></div><div class="col-md-9"><div class="alert alert-minimal alert-success nomargin">You have '+Difference+' days and you must visit these '+num+' places in '+Search+'. We have created an organizer, simply drag the place cards and drop to days section. </div><br/><br/><a href="http://www.rimtrip.com/Hackathon2016/Planner/" class="btn btn-success pull-right"> Refresh for another search </a></div>');
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
function getLiveData(){
		var val = [];	
		var i;
		var v;	
        $(':checkbox:checked').each(function(){
			i = $(this).prop('id').trim();
			v = $(this).val().trim();
          val.push([i , v]) ;		  
        });
		return val;
	}
//
function getPlaces(){	
	var Places = [];	
	var P;	
        $(':checkbox:checked').each(function(){
			P = $(this).val().trim();
          Places.push(P) ;		  
        });
		return Places;
	}
//
$(function(){
      $('.livedata').click(function(){        
		var value = getLiveData();
		console.log(value);
		 $.ajax({
            type: 'POST',
            url: '../Data.php',
			dataType: 'json',
			data: { LiveData: JSON.stringify(value) }          
        })
      });
    });
//Under Progress

       
	  
	