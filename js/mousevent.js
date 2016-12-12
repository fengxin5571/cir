$(document).ready(function(){
    /* 购物车展开收起 */
    $(".settle").mouseover(function(){
        $(".settledown").show();
        $(".settle").css('border-bottom','none');
    });

    $(".settle").mouseout(function(){
        $(".settledown").hide();
        $(".settle").css('border-bottom','1px solid #d3d3d3');
    });

    /* nav */
    $(".navitems li").mouseover(function(){
        $(this).find('.nav-hover').show();
    })
 
    $(".navitems li").mouseout(function(){
        $(this).find('.nav-hover').hide();
    })

    /* category list */
    $(".catelist li").mouseover(function(){
        $(this).find('.catebox').show();
    })
 
    $(".catelist li").mouseout(function(){
        $(this).find('.catebox').hide();
    })
    
    /*分类*/
	var mgCate=$(".mg-cate");
	if(mgCate.length!=0){
		mgCate.hide();
		$(".category").mouseenter(function(){
			mgCate.show();
			cateCss="";
			$(".category .cate-ico").attr('id','cate-ico-hover');
			$(".category .cateup").removeClass('cateDown');
			$(".category").attr('id','cate-bg');
		})
		$(".catelist").mouseleave(function(){
			mgCate.hide();
			$(".category .cate-ico").attr('id','cate-ico');
			$(".category .cateup").addClass('cateDown');
			$(".category").attr('id','cate-bg-mg');
		})
		
		$(".category").attr('id','cate-bg-mg');
		$(".category .cate-ico").attr('id','cate-ico');
		$(".category .cateup").addClass('cateDown');
	}
	
    /*列表*/
    var mgItems=$(".mg-items li");
    var mgSp=$("#splist");
    mgItems.bind("click",function(){
        $(this).addClass("listhover").siblings().removeClass("listhover");
        if($(this).attr("class")=="mg-blockcon listhover"){
            mgSp.attr("class","mg-splist");
        }else {
            mgSp.attr("class","mg-splist2");
        }
    })
});