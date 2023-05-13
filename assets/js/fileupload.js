/*!function (n) {
    "use strict";

    function t() {
        this.$body = n("body")
    }

    t.prototype.init = function () {
        Dropzone.autoDiscover = false, n('[data-plugin="dropzone"]').each(function () {
            var t = n(this).attr("action"), i = n(this).data("previewsContainer"), e = {url: t};
            i && (e.previewsContainer = i);
            var o = n(this).data("uploadPreviewTemplate");
            o && (e.previewTemplate = n(o).html());
            n(this).dropzone(e)
        })
    }, n.FileUpload = new t, n.FileUpload.Constructor = t
}(window.jQuery), function () {
    "use strict";
    window.jQuery.FileUpload.init()
}();*/


Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;
Dropzone.options.myAwesomeDropzone = {
    acceptedFiles: 'image/*',
    autoDiscover:false
};
$(function() {
    // Now that the DOM is fully loaded, create the dropzone, and setup the
    // event listeners

    $('[data-plugin="dropzone"]').each(function () {
        $(this).dropzone({
            url: '/xls/default/upload-image',
            //maxFiles:1,
            acceptedFiles:'image/jpeg',
            uploadMultiple:true,
            previewsContainer:'#file-previews',
            previewTemplate:$('#uploadPreviewTemplate').html(),
           // renameFile:function(file){
           //     console.log('rename',file);
           // },
            accept:function(file, done){
                if(file.type === 'image/jpeg'){
                    done();
                }
console.log(file);
                //
            }
        });
    })


   // $.FileUpload = new t, n.FileUpload.Constructor = t
   // window.jQuery.FileUpload.init()
})
