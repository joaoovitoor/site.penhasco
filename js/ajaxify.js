!function(t,e){var a=null,n=t.History,r=t.jQuery,o=t.document;return n.enabled?void r(function(){var e,i="#inner-container",l=r(i).filter(":first"),c=(l.get(0),r(".top-menu,.left-menu")),s="current-menu-item",m=".current-menu-item",u="li,a",d="statechangecomplete",f=!1,p=!1,h=parseInt(r("#header").attr("data-header-height")),g=r(t),v=r(o.body),y=n.getRootUrl();0===l.length&&(l=v),r.expr[":"].internal=function(t,e,a,n){var o,i=r(t),l=i.attr("href")||"";return o=l.substring(0,y.length)===y||-1===l.indexOf(":")};var _=function(t){var e=String(t).replace(/<\!DOCTYPE[^>]*>/i,"").replace(/<(html|head|body|title|meta|script)([\s\>])/gi,'<div class="document-$1"$2').replace(/<\/(html|head|body|title|meta|script)\>/gi,"</div>");return r.trim(e)};r.fn.ajaxify=function(){var t=r(this);return t.find("a:internal:not(:contains(checkout),:contains(Checkout),:contains(Cart),:contains(cart),:contains(Account),:contains(account), .no-ajaxy, #left-nav .menu-link-parent,.widget_icl_lang_sel_widget a, #lang_sel_footer a, .menu-item-language a, .stars a, .chosen-single, .widget_shopping_cart .buttons a, .product-img-wrap .add_to_cart_button.product_type_simple, .product-remove a, .yith-wcwl-add-to-wishlist a, .wishlist_table a, .cart-collaterals .wc-proceed-to-checkout a, a.showlogin, a.showcoupon, .no-ajaxy.menu-item a)").click(function(t){var a=r(this),o=a.attr("href")||null,i=a.attr("title")||null;if(2==t.which||t.metaKey)return!0;if(-1!=o.indexOf("#comment-")){if(e=o.split("#comment-").pop(),o=o.replace("#comment-"+e,""),r(location).attr("href").replace("#comment-"+e,"")!=o)f=!0;else if(r(".comment-list").length){var l=r("#div-comment-"+e).offset().top;r("html, body").animate({scrollTop:l-h-20+"px"},500)}}else if(-1!=o.indexOf("#comments"))if(o=o.replace("#comments",""),r(location).attr("href")!=o)p=!0;else if(r(".comment-list").length){var l=r("#comments").offset().top;r("html, body").animate({scrollTop:l-h-30+"px"},500)}return n.pushState(null,i,o),t.preventDefault(),!1}),t},v.ajaxify(),g.bind("statechange",function(){var v=n.getState(),b=v.url,x=b.replace(y,"");a&&a.abort(),a=r.ajax({url:b,beforeSend:function(){r("#header-container, #header").removeClass("light dark trans"),r("body").addClass("ajax-load"),setTimeout(function(){r("html, body").animate({scrollTop:0},200)},300)},success:function(a,n,v){r("html, body").animate({scrollTop:0},0);var y,w,j=r(_(a)),T=j.find(".document-body:first"),C=T.find(i).filter(":first");if(w=C.html()||j.html(),!w)return o.location.href=b,!1;y=c.find(u),y.filter(m).removeClass(s),y.removeClass("current-menu-item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor"),c.find('a[href="'+b+'"],a[href="'+b+'/"]').parents("li").addClass(s),l.html(w).ajaxify(),r("body").removeClass("ajax-load"),o.title=j.find(".document-title:first").text();try{o.getElementsByTagName("title")[0].innerHTML=o.title.replace("<","&lt;").replace(">","&gt;").replace(" & "," &amp; ")}catch(k){}r(".loading-container").removeClass("ajax-load"),g.trigger(d),r("#header").attr("style",""),p===!0?(r(".comment-list li").length&&setTimeout(function(){var t=r("#comments").offset().top;r("html, body").animate({scrollTop:t-h-30+"px"},1e3)},500),p=!1):f===!0&&(setTimeout(function(){if(r(".comment-list").length){var t=r("#div-comment-"+e).offset().top;r("html, body").animate({scrollTop:t-h-20+"px"},1e3)}},500),f=!1),"undefined"!=typeof t._gaq&&t._gaq.push(["_trackPageview",x]),"undefined"!=typeof t.reinvigorate&&"undefined"!=typeof t.reinvigorate.ajax_track&&reinvigorate.ajax_track(b)},error:function(t,e,a){return"abort"!=e?(o.location.href=b,!1):void 0}})})}):!1}(window);