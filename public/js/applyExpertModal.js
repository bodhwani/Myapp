function wrap_pop(){jQuery(".wrap-pop").click(function(){jQuery(".panel-pop").animate({top:"-100%"},500).hide(function(){jQuery(this).animate({top:"-100%"},500)}),jQuery(this).remove()})}function hasKey(e,i){return void 0!=e[i]}$(window).on("load",function(){$(document).on("click","#becomeExpert",function(){return jQuery(".panel-pop").animate({top:"-100%"},10).hide(),jQuery("#ExpertPopUp").show().animate({top:"50%"},500),jQuery("body").prepend("<div class='wrap-pop'></div>"),wrap_pop(),!1})}),$(document).on("submit","#applyExpertForm",function(e){var i={};$("form#applyExpertForm :input[type!=submit]").each(function(){i[$(this).prop("name")]=$(this).val()}),$.ajax({url:"/apply/expert",method:"POST",data:i,success:function(e){$('[id="alert"]').remove(),e=JSON.parse(e);var i="";if(200==e.status)i='<div class="alert alert-success" id="alert"><strong>Congrats!</strong> You have applied to become an expert at Winuall.</div>',$(i).insertBefore($("#applyExpertForm")),setTimeout(function(){$('[id="alert"]').remove(),$("#applyExpertForm").trigger("reset"),$("#ExpertPopUp").hide(),$(".wrap-pop").hide()},3e3);else{if(i='<div class="ul_list" id="alert"><ol class="alert alert-danger">',hasKey(e,"id1")&&hasKey(e,"user_id"))i+="<li>An expert with same mobile number and email exists</li>";else if(hasKey(e,"id1")||hasKey(e,"user_id")){var a=hasKey(e,"id1")?"mobile number":"email";i=i+"<li>An expert with same "+a+" exists</li>"}hasKey(e,"phone")&&hasKey(e,"email")?i+="<li>Someone has requested with same mobile number and email</li>":(hasKey(e,"phone")||hasKey(e,"email"))&&(a=hasKey(e,"phone")?"mobile number":"email",i=i+"<li>Someone has requested with same "+a+"</li>"),$.each(e,function(e,a){"id1"!=e&&"user_id"!=e&&"phone"!=e&&"email"!=e&&(i=i+"<li>"+a[0]+"</li>")}),i+="</ol></div>",$(i).insertBefore($("#applyExpertForm"))}}}),e.preventDefault(),e.stopImmediatePropagation()});