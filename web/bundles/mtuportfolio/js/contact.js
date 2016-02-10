    function postForm( $form, send, callback ){
        var values = {};
        $.each( $form.serializeArray(), function(i, field) {
          values[field.name] = field.value;
        });
        $.ajax({
          type        : $form.attr( 'method' ),
          url         : $form.attr( 'action' ),
          data        : values,
          beforeSend  : function() {
            send();
          },
          success     : function(data) {
            callback( data );
          }
        });
    };
    function FormElement(elem,def){
        var element=$(elem);
        var init=def;
        element.on('focus',function(){
           var that=$(this);
           if(that.val()==init){
               that.val(''); 
            }
        });
        element.on('blur',function(){
           var that=$(this);
           if(that.val()==''){
               that.val(init); 
            }
        });
    }
    
$(document).ready(function(){
    var nameDef=$('#contact_name').val();
    var emailDef=$('#contact_email').val();
    var titleDef=$('#contact_title').val();
    var messageDef=$('#contact_message').val();
    $('.error').hide();
    $('.output').hide();

    FormElement('#contact_name',nameDef);
    FormElement('#contact_email',emailDef);
    FormElement('#contact_title',titleDef);
    FormElement('#contact_message',messageDef);
    
    $('.form').submit(function(e){
        e.preventDefault();
        $('.error').hide();    
        var nameVal=$('#contact_name').val();
        var emailVal=$('#contact_email').val();
        var titleVal=$('#contact_title').val();
        var messageVal=$('#contact_message').val();
        var error=false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //WALIDACJA
        if(nameVal == '' || nameVal == nameDef){
            $('#contact_name').parents('.group').prev('.group_er').find('.error').fadeIn();
            error=true;
        }
        if(emailVal == '' || emailVal == emailDef || (!emailReg.test(emailVal))){
            $('#contact_email').parents('.group').prev('.group_er').find('.error').fadeIn();
            error=true;
        }
        if(titleVal == '' || titleVal == titleDef){
            $('#contact_title').parents('.group').prev('.group_er').find('.error').fadeIn();
            error=true;
        }
        if(messageVal == '' || messageVal == messageDef){
            $('#contact_message').parents('.group').prev('.group_er').find('.error').fadeIn();
            error=true;
        }

        if(error==false){

            postForm($(this),function(){
                 $('.button').prop( "disabled", true );
                 $('.button').html('Wysyłam');
                 $('.button').addClass('hovered');
                 $('.button').css('border','1px dashed #959595');

            },function(response){
                //console.log(response.message);
                $('.output').fadeIn();
                $('.form')[0].reset();
                setTimeout(function(){
                    $('.output').fadeOut();
                },5000);
                $('.button').prop( "disabled", false);
                $('.button').html('Wyślij');
                $('.button').removeClass('hovered');
                $('.button').css('border','0');
            });
        };

        return false;
    });
});
