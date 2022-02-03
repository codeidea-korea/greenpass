/*
	sidebar-menu.js
*/

$.sidebarMenu = function(menu) {
	var animationSpeed = 250,
	subMenuSelector = '#nav_ul ul';
	
	$(subMenuSelector).css({"display": "none"});
	$(subMenuSelector).parent("li").removeClass("active");
	$(subMenuSelector).parent("li").addClass("opener");
	//$(subMenuSelector).parent("li").find("a").attr("href", "#"); //서브메뉴가 있는 대메뉴 링크값 지우기
	
	$(subMenuSelector).parent("li.active").addClass("open");
	$(subMenuSelector).parent("li.active").children("ul").slideDown(animationSpeed); 
	$(subMenuSelector).parent("li.active").children("ul").addClass("menu-open");

	$(subMenuSelector).children("li.active").parent().parent("li").addClass("open");
	$(subMenuSelector).children("li.active").parent("ul").slideDown(animationSpeed); 
	$(subMenuSelector).children("li.active").parent("ul").addClass("menu-open");	

	$(menu).on('click', 'li a', function(e) {
		var $this = $(this);
		var checkElement = $this.next();
		if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
			checkElement.slideUp(animationSpeed, function() {
				checkElement.removeClass('menu-open');
			});
			checkElement.parent("li").removeClass("open");
		} else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {
			var parent = $this.parents('ul').first();
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('menu-open');
			var parent_li = $this.parent("li");

			checkElement.slideDown(animationSpeed, function() {
				checkElement.addClass('menu-open');
				parent.find('li.open').removeClass('open');
				parent_li.addClass('open');
			});
		}
		if (checkElement.is(subMenuSelector)) {
			e.preventDefault();
		}		
	});


}

$(document).ready(function () {
	$.sidebarMenu($('#nav_ul'));
});
