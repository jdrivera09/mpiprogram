<html>

    <head>
        <link rel="stylesheet" href="bootstrap.min.css">          
    </head>

    <body>
        <div class="container">
            <h1>My Sample</h1>
            <input type="text" name="me" id="me">
            <button type="button" id="save">Save</button>          
            <p id="remarks">Remarks: None</p>
            <table id="results" class="table"></table>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Record Successfully Added!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            getRecord();
        });
                   
        $('#save').click(function(){
            var a = $('#me').val();    
            $.ajax({
                url: "add.php", 
                type: 'get',
                data: {me : a},
                success: function(result){
                    $('#remarks').html("Remarks: " + result);
                    getRecord();
                    $('#myModal').modal({show: true});
                }   
            });
        });

        function isEmpty(str){
            return str == null ? false : true;
        }
        
        function getRecord(){
            $.ajax({
                url: "view.php",
                success: function(result){
                    $('#results').html(result);
                }
            });
        }
    </script>
</html>
