$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#aset_tetap').select2({
	  	placeholder: 'Pilih Aset Tetap',
	  	language: "id"
	});
	$('#aset_item').select2({
	  	placeholder: 'Pilih Aset Item',
	  	language: "id"
	});
	
	$('#kategori').select2({
	  	placeholder: 'Pilih Kategori',
	  	language: "id"
	});

	//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#aset_tetap").change(function(){
	      $("img#load1").show();
	      var id_aset_tetap = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data.php?jenis=aset_item",
	         data: "id_aset_tetap="+id_aset_tetap,
	         success: function(msg){
				 console.log(msg);
	            $("select#aset_item").html(msg);                                                       
	            $("img#load1").hide();
	            getAjaxKota();                                                        
	         }
	      });                    
     });  

	$("#aset_item").change(getAjaxKota);
     function getAjaxKota(){
          //$("img#load2").show();
          var id_aset_item = $("#aset_item").val();
     }

});