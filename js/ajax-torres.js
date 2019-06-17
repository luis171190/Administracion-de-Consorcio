$(document).on("change", '#drop_consorcios', function(e) {
            var id_consorcio = $(this).val();
            

            $.ajax({
                type: "POST",
               
                data: ('search='+id_consorcio),
                url: 'info-consorcio.php',
                dataType: 'json',
                success: function(json) {

                    var $el = $("#name");
                    $el.empty(); // remove old options
                    $el.append($("<option></option>")
                            .attr("value", '').text('Please Select'));
                    $.each(json, function(value, key) {
                        $el.append($("<option></option>")
                                .attr("value", value).text(key));
                    });														
	                

                    
                    
                }
            });

        });