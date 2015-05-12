/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

setInterval('menu()',10000);

function menu(){
    var url = Routing.generate('solicitud_n');
    
    $.ajax({
            url: url,
            type: 'GET',
            success: function(data){
                if(data.responseCode==200 || data.responseCode==400 ){
                    $('#contador').html(data.datos[0][1]);
                }else{
                    $('#contador').html('?');
                }
            }
        }
    );
}
