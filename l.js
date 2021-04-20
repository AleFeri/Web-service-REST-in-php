$(document).ready(function() {
    var datiDaInviare = {
		id: 1699,
		name: "Mario",
		surname: "Rossi",
		sidi_code: "169916991699",
		tax_code: "Mario_Rossi",
	};

    $.ajax({
        url: 'http://localhost/TPSIT/api/studenti/',
        type: 'put',
        contentType: 'application/json',
        accept: "*/*",
        data: JSON.stringify(datiDaInviare),
        success: function(data, textStatus, jQxhr) {
            console.log(data);
        },
        error: function(jqXhr, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });
});