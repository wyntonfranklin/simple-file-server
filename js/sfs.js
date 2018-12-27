(function($){

    var filesTableBody = $("#files-body");
    var testButton = $("#test-button");
    var jTable = $('#files-table').DataTable({
        "order": [],
        "bLengthChange": false,
        "bFilter": false,
        "searching": true,
        sDom: 'ltipr',
    });
    Dropzone.options.fileUploader = {
        maxFilesize: 500, // MB
        init: function () {
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    // do something here
                    this.removeAllFiles();
                    updateTable();
                }
            });
        }
    };

    function updateTable(){
        $.get("/src/table.php", function(results){
            filesTableBody.empty();
            filesTableBody.append(results);
            console.log(results);
            jTable.search("").data();
        });
    }
    $(document).ready(function(){
        testButton.on("click",function(){
            $.get("/src/table.php", function(results){
                filesTableBody.empty();
                filesTableBody.append(results);
                console.log(results);
                jTable.search("").data();
            });
        });
        $('.files-layout .image-link').magnificPopup({type:'image'});


    });
})(jQuery);