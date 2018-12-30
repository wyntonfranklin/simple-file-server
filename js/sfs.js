(function($){
    var settings = $("#js-settings").data('value');
    var baseUrl = settings.baseUrl;
    var clipboard;
    console.log(settings);
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
        maxFilesize: settings.maxUploadSize, // MB
        init: function () {
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0
                    && this.getQueuedFiles().length === 0) {
                    // do something here
                    this.removeAllFiles();
                    successMessage("File uploaded successfully.");
                    updateTable();
                }
            });
        }
    };

    function updateTable(){
        $.get(baseUrl + "/table.php", function(results){
            filesTableBody.empty();
            filesTableBody.append(results);
           // jTable.search("").data();
            //attachCopyFunction();
        });
    }

    function attachImageOpenListeners(){
        $('.files-layout').on("click",".image-link",function(){
            var img = $(this).attr("href");
            $.magnificPopup.open({
                items: {
                    src: img
                },
                type: 'image'
            });
            return false;
        });
    }

    function successMessage(msg){
        $.notify(msg, "success",{position:"center"});
    }

    function errorMessage(msg){
        $.notify(msg, "error",{position:"center"})
    }

    function attachCopyFunction(){
        new ClipboardJS(".files-layout .copy-file", {
            text: function(trigger) {
                successMessage("Linked copied");
                return $(trigger).data("clipboard-text");
            }
        });
    }

    $(document).ready(function(){
        testButton.on("click",function(){
            $.get(baseUrl + "/table.php", function(results){
                filesTableBody.empty();
                filesTableBody.append(results);
                jTable.search("").data();
            });
        });

        $("#max-size-text").text("Maximum Upload Size: "+settings.maxUploadSize+"mb");

        attachImageOpenListeners();


        $('.files-layout').on("click",'.delete-file',function(){
            var fileId = $(this).data("id");
            $.post(baseUrl+"/delete.php",{fid:fileId}, function(){
                successMessage("File deleted successfully.");
                updateTable();
            });
        });

        attachCopyFunction();


    });
})(jQuery);