var notifies = [];
var notifiesCompletes = [];
let audio = new Audio('/uploads/that-was-quick-606.ogg');
queue();

setInterval(function () {
    queue();
}, 4000);



function notifiesComplete(key,complete) {

    if (notifiesCompletes[key] === undefined) {
        notifiesCompletes[key] = $.notify({
            icon: 'fad fa-check-double',
            title: complete.title,
            message: complete.message
        }, {
            type: complete.type,
            timer: 0, //if else result progress "100" enable closing
            // template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>',
            template: '<div data-notify="container" class="modal fade show" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-modal="true">\n' +
                '<div class="modal-dialog modal-dialog-centered modal-sm">\n' +
                '<div class="modal-content modal-filled bg-{0}">\n' +
                '<div class="modal-body p-4">\n' +
                '<div class="text-center">\n' +
                '<span data-notify="icon" class=" fa-3x"></span><i class="fad2 fa2-check-double fa-3x"></i>\n' +
                '<h4 class="mt-2">{1}</h4><p>{2}</p>\n' +
            '<button type="button" aria-hidden="true" class="btn btn-light my-2" data-notify="dismiss">Продолжить</button>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>',
            allow_dismiss: true,
            allow_duplicates: false,
            onShow: function () {
                //  $.playSound('/uploads/that-was-quick-606.ogg');

            },
            onClose: function () {
                // $.stopSound();

            },
            placement: {
                from: "center",
                align: "center"
            },
        });
    }
}

function queue() {

    $.ajax({
        url: '/dashboard/queue-counter',
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function (response) {
           //console.log(response);
            $.each(response, function (key, toast) {
                console.log(key,toast);
                //    $('#toast-'+key+' .progress-bar').css({width:channel.percent+'%'});

                //add toast if undefined
                if (notifies[key] === undefined) {
                    notifies[key] = $.notify({
                        icon: 'fad fa-spinner fa-spin fa-lg',
                        title: toast.data.title,
                        message: toast.data.message
                    }, {
                        type: "danger",
                        timer: (toast.progress === 100) ? 100 : 0, //if else result progress "100" enable closing
                        delay: (toast.progress === 100) ? 100 : 0, //if else result progress "100" enable closing
                        progress: toast.progress,
                        // template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>',
                        template: '<div id="toast-das" class="toast show" data-bs-autohide="false" role="alert"\n' +
                            '                 aria-live="assertive" aria-atomic="true">\n' +
                            '                <div class="toast-header">\n' +
                            '                    <strong class="me-auto"><span data-notify="icon"></span> {1}</strong>\n' +
                            '                    <small>sadasd</small>\n' +
                            '                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" data-notify="dismiss"></button>\n' +
                            '                </div>\n' +
                            '                <div class="toast-body">\n' +
                            '                    <h4 data-notify="message">{2}</h4>\n' +
                            '<div class="progress" data-notify="progressbar" style="height:10px"><div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>\n' +
                            '                </div>\n' +
                            '            </div>',
                        showProgressbar: true,
                        allow_dismiss: true,
                        allow_duplicates: false,
                        onShow: function () {
                            //  $.playSound('/uploads/that-was-quick-606.ogg');

                        },
                        onClose: function () {
                            // $.stopSound();
                            delete notifies[key];

                        },
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                    });
                    if(toast.progress === 100){
                        notifiesComplete(key,toast.complete);
                        if(toast.action){
                            if(toast.action['pjax-update']){
                                console.log('update -pjax');
                                $.pjax.reload(toast.action['pjax-update'], {timeout : false});
                            }
                        }

                        audio.play();
                    }
                }else{

                    if (notifies[key]) {
                        notifies[key].update({progress: toast.progress});
                    }
                    if (toast.progress === 100) {

                        audio.play();
                        notifiesComplete(key,toast.complete);
                        if(toast.action){
                            if(toast.action['pjax-update']){
                                console.log('update -pjax');
                                $.pjax.reload(toast.action['pjax-update'], {timeout : false});
                            }
                        }
                        if(notifies[key])
                            notifies[key].close();
                    }
                }


            });

        }
    });
}
