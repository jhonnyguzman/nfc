// function to show data's pagination
function setPagination(pag,loader)
{	 
	 $("#" + pag + " a").click(function(e){
    	// stop normal link click
    	e.preventDefault();
    	$('#'+loader).load($(this).attr("href"));
  	 });
}

function deleteRow(url)
{
	if(confirm("¿Estás seguro de eliminar este item?")){
		window.open(url,'_top');
	}

}

function searchData(form,loader)
{    
	$("#"+form).submit(function() 
    {
   	  $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),	
        success: function(data) {
        		$("#"+loader).html(data);
        }
    	})        
      return false;
    });	  
}