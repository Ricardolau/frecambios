// Only define the Gesbuque namespace if not defined.
Frecambios= window.Frecambios || {};

(function( Frecambios, document ) {
    "use strict";
    
    var jq = null;
    
    /**
     * Fill a select getting options from ajax request
     * @param sourceSelect The id of the select to get the id of the foreign key in destinationSelect
     * @param destinationSelect The id of the select to fill
     * @param viewName The name of the view/controller for make the request
     * @returns {undefined}
     */
    Frecambios.updateSelect = function (sourceSelect, destinationSelect, viewName) {

        Frecambios.jq = jQuery.noConflict();
        
        var data = null;
        var parentId = Frecambios.jq(sourceSelect).val();
        var url = 'index.php?option=com_frecambios&task=' + viewName + '.options&parent_id=' + parentId;
        
        // Ajax request
        Frecambios.jq.ajax({
            dataType: "json",
            url: url,
            data: data,
            success: function (rows) {    
                // Clear all options with value != 0
                Frecambios.jq("#" + destinationSelect + " option[value!='']").remove(); 
                                                                
                // Add received options to the original select
                Frecambios.jq(rows).each (function (idx) {
                    var row = rows[idx];
                    var opt = document.createElement('option');
                    opt.value = row.value;
                    opt.innerHTML = row.text;
                    document.getElementById (destinationSelect).appendChild(opt);
                });
                
                // Refresh the chosen object
                Frecambios.jq('#' + destinationSelect).trigger("liszt:updated"); 
            }
        });                 
        
        return true;
        
    };              

}( Frecambios, document ));

