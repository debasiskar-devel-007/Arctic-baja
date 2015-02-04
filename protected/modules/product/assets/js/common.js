$(function(){

  jQuery('div[rel="tooltip"]').tooltip();

    $('#chk_bill_ship').click(function(){
        if($(this).is(':checked')){

            bootbox.alert("Please wait until we coping your shipping data into billing data ! ");

            $('#TransactionOrderDetails_billing_fname').val($('#TransactionOrderDetails_shipping_fname').val());
            $('#TransactionOrderDetails_billing_lname').val($('#TransactionOrderDetails_shipping_lname').val());
            $('#TransactionOrderDetails_billing_add').val($('#TransactionOrderDetails_shipping_add').val());
            $('#TransactionOrderDetails_billing_country').val($('#TransactionOrderDetails_shipping_country').val());
            changestate1();
            setTimeout(function()

            {
                $('#TransactionOrderDetails_billing_state').val($('#TransactionOrderDetails_shipping_state').val());
                $('#TransactionOrderDetails_billing_city').val($('#TransactionOrderDetails_shipping_city').val());
                $('#TransactionOrderDetails_billing_zip').val($('#TransactionOrderDetails_shipping_zip').val());
                $('#TransactionOrderDetails_billing_phone').val($('#TransactionOrderDetails_shipping_phone').val());
                bootbox.hideAll();  

            },3000);
              
        }
    });

    /*To manage css of cart */

    /*To manage the inner-wraper width for adding buttons like continue shopping and checkout */

    if(controllerid=='shopping_cart' && actionid=='index') 
        { var divwidth=($('.inner-wrapper').height());
        $('.inner-wrapper').height(parseInt(divwidth+15));
    }
    /*end of inner - wrapper modification code block*/
    /*to manage the button css of cart page  */
    $('.btn2').find('a').css('color','#ffffff');
    $('.btn2').css('width','auto');
    $('.btn2').find('a').css('padding','0 10px 0 10px');


    $('a#coderefresh').click(function(){
        $.post(base_url+'/product/admin/promocode/refcode',{},function(res){
            $('#PromoCodeDetails_code_text').val(res);
        });
    });



});


$(function(){
    
    
    

    $( "#user-grid" ).find( "tbody").find('.empty').hide();
    $('#refresh').click(function(e)
    {
        //alert(9);
        var id='user-grid';
        var inputSelector='#'+id+' .filters input, '+'#'+id+' .filters select';
        $(inputSelector).each( function(i,o) {
            $(o).val('');
        });
        var data=$.param($(inputSelector));
        $.fn.yiiGridView.update(id, {data: data});
        return false;
    });
});

function addstock(obj){
    var id = $(obj).attr('id');
    window.location.href = base_url+'/product/admin/stock/add/id/'+id;
}

function checklogin(id){
    if(id != 0){
        window.location.href = base_url+'/product/checkout';
    }else{
        $("#showchecklogin").modal('show');
    }
}

function chk_promo_code(obj,total){
    $(obj).parent().children('div#err').text('');
    var promocode = $(obj).parent().children('input[type="text"]').val();
    if(promocode == ''){
        $(obj).parent().children('div#err').text('Please Enter Your Promocode');
    }else{
        $.post(base_url+'/product/checkout/checkpromo',{promocode:promocode,total:total},function(res){
            if(res == 1){
                $(obj).parent().children('div#err').text('This is Invalid Promocode');
            }
            if(res == 3){
                $(obj).parent().children('div#err').text('This Promocode is not valid in this purchase');
            }
            if(res == 2){
                window.location.reload();
            }
        });
    }
}

function hav_pcode(obj){

    saveformdata();
    if($(obj).is(":checked")){
        //$(obj).parent().parent().next('tr').show();
    }else{
        // $(obj).parent().parent().next('tr').hide();
        $.post(base_url+'/product/checkout/uncheckpromo',{},function(res){
            window.location.reload();
        });
    }
}
var attrarray= new Array();
var attrarrayvalue= new Array();
var val;
function saveformdata()
{
    $('#horizontalForm').find('input').each(function()
    {
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });

    $('#horizontalForm').find('select').each(function()
    {
        //alert(9);
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });

    $('#horizontalForm').find('textarea').each(function()
    {
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });
    //alert(attrarray);
    $.post(base_url+'/product/checkout/saveformdata',{val:attrarray,value:attrarrayvalue},function(res){
        //window.location.reload();
        //alert(res);
    });
}


$(function()
{
   // alert($('#TransactionOrderDetails_shipping_country').val());
});


function changeType(obj){
    var typeval2 = $(obj).val();
    var divobj = $('#PromoCodeDetails_dis_value').parent().parent();
    $('#PromoCodeDetails_dis_value').val('0.00');
    if(typeval2 == 2){
        divobj.hide();
    }else{
        divobj.show();
    }
}

function autoship(obj,total){
    if($(obj).is(":checked")){

        $('#autoship_').find('input#totalval').val(total);
        $('#autoship_').modal('show');
        //        $.post(base_url+'/product/checkout/addautodis',{total:total},function(res){
        //            window.location.reload();
        //        });
    }else{
        $.post(base_url+'/product/checkout/removeautodis',{total:total},function(res){
            window.location.reload();
        });
    }
}

function settotalocc(obj){
    var total = $(obj).parent().find('input#totalval').val();
    var total_occ = $(obj).parent().find('select#total_occurrences').val();
    var occ_interval = $(obj).parent().find('select#occ_interval').val();
    $.post(base_url+'/product/checkout/addautodis',{total:total,total_occ:total_occ,occ_interval:occ_interval},function(res){
        window.location.reload();
    });
}

function cancel_subscription(obj){
    var autoship_id = $(obj).attr('id');
    $.post(base_url+'/product/checkout/canSubscription',{autoship_id:autoship_id},function(res){
        window.location.reload();
    });
}

function buynow(pro_id){
    
    if($('#autoship_chk').is(':checked')){
        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val(),'autoship':1},function(res){
            if(res > 0){
                            //window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    }
    else{
        $('#myModal').modal('show');
    }
}

function buynow1(pro_id){
    //alert(1);
    
    if($('#autoship_chk'+pro_id).is(':checked')){
        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val(),'autoship':1},function(res){
            if(res > 0){
                            window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    }
    else{
        $('#myModal').find('.btn_isauto').attr('product_id',pro_id);
        $('#myModal').find('.btn_isauto1').attr('product_id',pro_id);
        $('#myModal').modal('show');
    }
}

//new function to buy a product

function buypro(pro_id,user_id,obj){

    var productname = $(obj).attr('product-name');
    $('#anindiv').text(productname);

    $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val()},function(res){
            if(res > 0){

                $('#anindiv').show();
                $('#anindiv').css({position:'absolute',top:$(obj).offset().top,left:$(obj).offset().left})
                    .animate({top:$('#nocart').offset().top,left:$('#nocart').offset().left,scrollTop:$('#nocart').offset().top},2000,
                    function()
                    {
                        $('#anindiv').hide();
                    }
                );

                $('html,body').animate({ scrollTop: $("#nocart").offset().top},2000);

                setTimeout(function(){
                    $('#nocart').text('('+res+')');
                    $('#myModal').modal('show');
                },2000);
            }
        });
        
        
       // $('#myModal').modal('show');
 
    
}
function buypro1(pro_id,user_id,obj){

        var productname = $(obj).attr('product-name');
        $('#anindiv').text(productname);

        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':1},function(res){
            if(res > 0){

                $('#anindiv').show();
                $('#anindiv').css({position:'absolute',top:$(obj).offset().top,left:$(obj).offset().left})
                    .animate({top:$('#nocart').offset().top,left:$('#nocart').offset().left,scrollTo:$('#nocart').offset().top},2000,
                    function()
                    {
                        $('#anindiv').hide();
                    }
                );

                $('html,body').animate({ scrollTop: $("#nocart").offset().top},2000);

                setTimeout(function(){
                    $('#nocart').text('('+res+')');
                    $('#myModal').modal('show');
                },2000);
            }
        });
        
        

        
}

function buywish(pro_id,user_id){
    if(user_id != 0){
           $.post(base_url+'/product/wishlist/add',{'id':pro_id,'user':user_id},function(res){
             if(res==0)
             {
                alert('item is already added'); 
                 
             }
             else
             {
                 
                 $('#nowish').text('('+res+')');  
             }
        });
        
        }
    
    else
    {
        $("#showcheckinglogin").modal('show');
    }
 
   
}
function delwish(obj,pro_id,user_id,wishlistid){
    var w_div = $(obj).parent().parent().parent();
    if(user_id != 0){
           $.post(base_url+'/product/wishlist/del',{'id':pro_id,'user':user_id,wishlistid:wishlistid},function(res){
               w_div.slideUp('slow');
             $('#nowish').text('('+res+')');  
        });
        
        }
    
    else
    {
        $("#showcheckinglogin").modal('show');
    }
 
   
}
//end of this
//cart edit

$(function(){
   
   $('.cart_quan').blur(function(){
      var quan = parseInt($(this).val());
      var pro_id = $(this).attr('product_id');
      if(!isNaN(quan)){
          if(quan > 0){
            $.post(base_url+'/product/shopping-cart/update',{'id':pro_id,'quan':quan},function(res){
                if(res !=0){
                    window.location.reload();
                }else{
                    outofstockmsg();
                    window.location.reload();
                }
            });              
          }else{
            $.post(base_url+'/product/shopping-cart/del',{'id':pro_id},function(res){
                window.location.reload();
            }); 
          }             
      }else{
          window.location.reload();
      }
   });
   
    $(".cart_quan").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.keyCode < 48 || event.keyCode > 57 ) {
                event.preventDefault();    
            }    
        }
    });
    
});


$(function(){
    $('#myModal').find('.btn_isauto').click(function(){
       // var autoship = $(this).attr('autoval');
        var product_id = $(this).attr('product_id');
        $.post(base_url+'/product/shopping-cart/add',{'id':product_id,'quan':$('#quan').val(),'autoship':autoship},function(res){
            if(res > 0){
                   
                            //window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
        
        $('#myModal').modal('hide'); 
    })
    
    
    //for checkout
        $('#myModal').find('.btn_isauto1').click(function(){
       // var autoship = $(this).attr('autoval');
        var product_id = $(this).attr('product_id');
        $.post(base_url+'/product/shopping-cart/add',{'id':product_id,'quan':$('#quan').val(),'autoship':autoship},function(res){
            if(res > 0){
                //alert(res);
                 $('#myModal').modal('hide');   
                            window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    })
    
    
});

function setunsetauto(obj){
    saveformdata();
    var pro_id = $(obj).attr('product_id');
    if($(obj).is(':checked'))
        var status = 1;
    else
        var status=0;
    $.post(base_url+'/product/checkout/setunsetauto',{'id':pro_id,'type':status},function(res){
             window.location.reload();
             //$('#chk_promo_btn').click();
        });
}


function view_subscription(obj){
    var transcation_id = $(obj).attr('id');
    
        $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/viewautoshipdet',{transcation_id:transcation_id},function(res){
        $('#autoshipModal').find('.modal-body').html(res);
//        $('#autoshipModal').modal('show');
    });
}

function print_invoice(obj){
    var orderid = $(obj).attr('id');
    
    
        $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/printinvoice',{orderid:orderid},function(res){
        var url = base_url+'/images/pdf/'+res;
        $('#autoshipModal').modal('hide');
        window.open(url,'_blank');
    });
}

function send_duplicate(obj){
    var orderid = $(obj).attr('id');
    
    $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;">Sending Mail <img src="'+base_url+'/images/ajax_loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/duplicatesend',{orderid:orderid},function(res){
        $('#autoshipModal').modal('hide');
    });
}

function update_subscription_form(obj){
    var autoship_id = $(obj).attr('id');
     $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    $.post(base_url+'/product/admin/order/autoshipdetupform',{autoship_id:autoship_id},function(res){
         $('#autoshipModal').find('.modal-body').html(res);
    });
}

function send(){

   var data=$("#autoupForm").serialize();
 
 
  $.ajax({
   type: 'POST',
    url: base_url+'/product/admin/order/autoshipupdate',
   data:data,
success:function(data){
                alert(data); 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },
 
  dataType:'html'
  });
 
}


function updategrid()
    {
        var id='user-grid';
        var inputSelector=' input,  select';
        $(inputSelector).each( function(i,o) {
            //$(o).val('');
             //alert($(this).attr('name'));

        });
        var data=$.param($(inputSelector));
        $.fn.yiiGridView.update(id, {data: data});
      

        return false;

    }


function outofstockmsg(){
    bootbox.dialog('This product is out of stock');
    setTimeout(function(){bootbox.hideAll();},2000);
}


$(function(){
    $('.notifyme').click(function(){
        $('#notifyemailModal').find('#notifyemail_em_').text('');
        $('#notifyemailModal').find('#notifyemail_em_').hide();
        $('#notifyemailModal').find('#proid_text').val(0);
        $('#notifyemailModal').find('#notifyemail').val('');

        var product_id = $(this).attr('product-id');
        var user_email = $(this).attr('user-email');

        if(user_email != ''){
            addnotify(user_email,product_id);
        }else{
            $('#notifyemailModal').find('#proid_text').val(product_id);
            $('#notifyemailModal').modal('show');
        }

    });
    $('#submitbtn').click(function(){
        var n_email = $('#notifyemailModal').find('#notifyemail').val();

        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        if(n_email == ''){
            $('#notifyemailModal').find('#notifyemail_em_').text('Email cannot be blank.');
            $('#notifyemailModal').find('#notifyemail_em_').show();
        }else if(!filter.test(n_email)){
            $('#notifyemailModal').find('#notifyemail_em_').text('The email is not valid.');
            $('#notifyemailModal').find('#notifyemail_em_').show();
        }else{
            var n_proid = $('#notifyemailModal').find('#proid_text').val();

            addnotify(n_email,n_proid);

        }
    });
});

function addnotify(n_email,n_proid){
    $('.modal').modal('hide');
    bootbox.dialog('Sending...<img src="'+theme_url+'/images/ajax_loading.gif" alt="" />');
    $.post(base_url+'/product/default/addnotify',{email:n_email,product_id:n_proid},function(res){
        bootbox.dialog('You will be notified soon when stock arise.');
        setTimeout(function(){ bootbox.hideAll(); },2000);
    });
}



$(document).ready(function() {
    
    if($('#colordiv').find('.colorhid').length > 0){
         $("#Product_is_color").attr("checked",true);
         $("#colordiv").show();
    }
    
    if($('#sizedivList').children('div').length > 0 && $('#sizedivList').children('div:first').find('input[name="size[]"]').val() != ''){
         $("#Product_is_size").attr("checked",true);
         $("#sizediv").show();
    }
    
    if($("#Product_is_color").is(":checked")==true){
                $("#colordiv").show();                                                                                    
            }
            else{
                $("#colordiv").hide();
            }
            
            if($("#Product_is_size").is(":checked")==true){
                $("#sizediv").show();                                                                                    
            }
            else{
                $("#sizediv").hide();
            }


    
        $('#picker').colpick({
            onSubmit:function(hsb,hex,rgb,el) {
                //$(el).css('background-color', '#'+hex);
                $(el).colpickHide();
                $('#picker').next('#colorlist').find('.clrs').before('<div style="height:30px; width:30px; border:#000 1px solid; background-color: #'+hex+'; margin:5px; float:left; cursor:pointer;" title="Click To Delete This Color" onclick="delcol(this,\''+hex+'\')">&nbsp;</div><input type="hidden" name="color[]" class="colorhid" value="'+hex+'" />');
            }
        });
    });

    function delcol(obj,col){
        $('input.colorhid[value="'+col+'"]').remove();
        $(obj).remove();
    }
    
    function addsizediv(obj){
       var divhtm = $(obj).parent().html();
          $('#sizedivList').append('<div>'+divhtm+'</div>'); 
    }
    
    
    function delsizediv(obj){
        if($('#sizedivList').children('div').length > 1){
            $(obj).parent().remove();
        }else{
            alert('Enter atleast 1 size.');
        }
    }
    
    $(function(){
        $('.sizesel').change(function(){
            var product_id = $(this).attr('product_id');
            var price =$(this).val();
            var size =$(this).find('option:selected').text();
            $.post(base_url+'/product/shopping_cart/addsize',{product_id:product_id,price:price,size:size},function(res){
                window.location.reload();
            });
        });
    });