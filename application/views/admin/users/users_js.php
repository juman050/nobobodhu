<script type="text/javascript">
    
var table;
 
$(document).ready(function() {
    //datatables
    // datatable Intialization
        (function (){
            dataTableObj = $('#user_table').DataTable({ 
        
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "lengthMenu": [ [1, 5, 10, 25, 50, -1], [1, 5, 10, 25, 50, "All"] ],
                "pageLength": 10,
                "pagingType": "full_numbers",
                "filter": false,
                "destroy": true,
                "orderMulti": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": site_url+"siteadmin/user/index",
                    "type": "POST",
                    "data": function ( postData ) { 
                        
                        // delete postData.columns;  // delete column defination information if not needed

                        /* Add Addition search param */
                       postData.advance_searches ={};
                       postData.advance_searches.email = $('#email_name').val();
                        
                    }
                },

            
                //Set column definition initialisation properties.
                "columnDefs": [
                    {  "targets": [ 0 ], "orderable": false, "name": "serial", "className": "column-serial", "visible": true },
                    {  "targets": [ 1 ], "orderable": true,  "name": "user_title", "className": "column-user_title", "visible": true },
                    {  "targets": [ 2 ], "orderable": true,  "name": "user_img", "className": "column-user_img", "visible": true },
                    {  "targets": [ 3 ], "orderable": true,  "name": "email", "className": "column-email", "visible": true },
                    {  "targets": [ 4 ], "orderable": false, "name": "action", "className": "column-action", "visible": true }
                ],

                // Initialisation complete callback.
                "initComplete": function (settings, json){

                },

                // Row draw callback
                "rowCallback": function (row, data, index){

                },
                
                // Function that is called every time DataTables performs a draw.
                "drawCallback": function (settings ){
                     
                },
            
            });  
        })();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {                 
                   $('#user-img').attr('src',e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#user_img").change(function(){
            readURL(this);
        });
});
</script>