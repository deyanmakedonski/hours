$(document).ready(function () {

    $.each(users,function(key,user){
        $('.team [data-key="'+key+'"]').qtip({ // Grab some elements to apply the tooltip to
            content: {
                text: user.name
            },
            style: {
                classes: 'qtip-blue qtip-shadow qtip-rounded '
            },
            position: {
                my: 'bottom center',  // Position my top left...
                at: 'top center', // at the bottom right of...
            }
        })
    });

    $('.avatar-settings').mouseenter(function(e){
        $('.change-avatar').fadeIn(100);
    });
    $('.avatar-settings').mouseleave(function(e){
        $('.change-avatar').fadeOut(100);
    });
    //
    //$('.avatar-settings').on('click','.change-avatar',function(e){
    //    upload();
    //});


    var uploader = new plupload.Uploader({
        runtimes: 'html5',
        browse_button: 'change-avatar',
        chunk_size: '200kb',
        url: '/settings/avatar',
        multi_selection: false,
        flash_swf_url: '/assets/plugins/plupload-2.1.7/js/Moxie.swf',
        silverlight_xap_url: '/assets/plugins/plupload-2.1.7/js/Moxie.xap',
        multipart_params:{_token:Globals._token},
        filters: {
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png,jpeg"}
            ]
        }
    });
    uploader.init();

    uploader.bind('FilesAdded', function (up, files) {
        if($('.avatar-settings').find('img').length){
            $('.avatar-settings').find('img').remove();
           // console.log('in');
        }else{
            //console.log('out');
            $('.change-avatar').next().next().remove();
        }


        $.each(files, function () {

            var img = new mOxie.Image();

            img.onload = function () {
                this.embed($('.avatar-settings').get(0), {
                    width: 100,
                    height: 100,
                    crop: true
                });
            };

            img.onembedded = function () {
                this.destroy();
            };

            img.onerror = function () {
                this.destroy();
            };

            img.load(this.getSource());

        });
        up.start();

    });

    uploader.bind('UploadComplete',function(up, files){
        var customModal = $('<div class="modal fade bs-example-modal-sm in" id="uploaded-avatar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: block; padding-right: 17px;"> <div class="modal-dialog modal-sm"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close cancle-upavatar" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="mySmallModalLabel">Информация</h4> </div> <div class="modal-body">Снимката е качена ! </div> <div class="modal-footer"> <button type="button" class="btn btn-default cancle-upavatar" data-dismiss="modal">Добре</button></div> </div> </div> </div>');
        $('body').append(customModal);
        $('#uploaded-avatar').modal({
            backdrop    : 'static',
            keyboard    : false,
        });
        $('#uploaded-avatar').modal('show');
        $('.cancle-upavatar').click(function(e){

            $('#uploaded-avatar').on('hide.bs.modal', function () {
                $(this).remove();
            });

        });
    });

    $('.user-event-color').colorpicker().on('hidePicker', function(event){
        $.post('/settings/colorpick',{_token:Globals._token,eventcolor:event.color.toHex()}).error(function(er){
            console.log(er);
        }).success(function(e){
            toastr["info"]("Вие успешно сменихте цвета!");
        });
    });

});
