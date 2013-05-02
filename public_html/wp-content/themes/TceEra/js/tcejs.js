
$(function(){
	$('#chklist').hcheckbox();
	$('#radiolist').hradio();
	$('#btnOK').click(function(){
		var checkedValues = new Array();
		$('#chklist :checkbox').each(function(){
			if($(this).is(':checked'))
			{
				checkedValues.push($(this).val());
			}
		});

		alert(checkedValues.join(','));
		alert($('#radiolist :checked').val());
	})
});


	// navi Menu
	$(function() {
		$("#dropmenu ul").css({display: "none"}); // Opera Fix
		$("#dropmenu li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	});
	
	$(function() {
		$("#dropmenu a").addClass("png");
	});
	




// 滚动
jQuery(document).ready(function($){   
$.fn.smartFloat = function() {   
    var position = function(element) {   
        var top = element.position().top, pos = element.css("position");   
        $(window).scroll(function() {   
            var scrolls = $(this).scrollTop();   
            if (scrolls > top) {   
                if (window.XMLHttpRequest) {   
                    element.css({   
                        position: "fixed",   
                        top: 0   
                    });       
                } else {   
                    element.css({   
                        top: scrolls   
                    });       
                }   
            }else {   
                element.css({   
                    position: "absolute",   
                    top: top   
                });       
            }   
        });   
    };   
    return $(this).each(function() {   
        position($(this));                            
    });   
};   
  

//绑定,将引号中的内容替换成你想要下拉的模块的ID或者CLASS名字,如"#ABC",".ABC"   
$("#bookL").smartFloat();   
  
}); 

// 顶部
function toggle(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="block"){
                 target.style.display="none";
             } else {
                 target.style.display="block";
             }
     }
}


// checkbox
;(function($){
	$.fn.hcheckbox=function(options){
		$(':checkbox+label',this).each(function(){
			$(this).addClass('checkbox');
            if($(this).prev().is(':disabled')==false){
                if($(this).prev().is(':checked'))
				    $(this).addClass("checked");
            }else{
                $(this).addClass('disabled');
            }
		}).click(function(event){
				if(!$(this).prev().is(':checked')){
				    $(this).addClass("checked");
                    $(this).prev()[0].checked = true;
                }
                else{
                    $(this).removeClass('checked');			
                    $(this).prev()[0].checked = false;
                }
                event.stopPropagation();
			}
		).prev().hide();
	}

    $.fn.hradio = function(options){
        var self = this;
        return $(':radio+label',this).each(function(){
            $(this).addClass('hRadio');
            if($(this).prev().is("checked"))
                $(this).addClass('hRadio_Checked');
        }).click(function(event){
            $(this).siblings().removeClass("hRadio_Checked");
            if(!$(this).prev().is(':checked')){
				$(this).addClass("hRadio_Checked");
                $(this).prev()[0].checked = true;
            }
               
            event.stopPropagation();
        })
        .prev().hide();
    }

})(jQuery)


// tags
function selectTag(showContent,selfObj){
	// 标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
	tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 标签内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
	j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
