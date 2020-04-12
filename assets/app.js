window.onload=function(){
   
    
};
(function(document) {
    'use strict';

    var mySelect = new Select('#filter');
    
    var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });

})(document);


function edit_product(id,name,presentation,unit,category){
    product_name.value = name;
    product_id.value = id;
    product_presentation.value =presentation;
    product_unit.value = unit;
    product_category.value = category;
    product_controller.value = "update_product";
    product_h2.innerHTML = "Update product: "+name+" "+presentation+" "+unit;
}
function reset_product(){
    product_h2.innerHTML = "Add product";
    product_id.value = null;
    product_controller.value = "add_product";
}
function delete_product(id,name){
    if(confirm('Delete product '+id+' -> ' +name+' ?')){
        product_delete_id.value = id;
        delete_product_form.submit();
    }
}