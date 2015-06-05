(function ($) {

	var ONE_PIXEL_TRANSPARENT_IMAGE = "data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";

	var defaultOptions = {
		imageData: "zoom",
		imageListData: "zoom-images",
		navigateData: "zoom-navigate"
	};

	function Zoom(element, options) {
		this.options = $.extend(defaultOptions, options);
		this.$el = $(element);
		this.$el.on("load", $.proxy(function () {
			this.$width = this.$el.width();
			this.$height = this.$el.height();
		}, this));
		this.$el.hover($.proxy(this.enableZoom, this), $.proxy(this.disableZoom, this));
		this.enableNavigation();
	}

	Zoom.prototype.enableZoom = function () {
		this.$el.addClass("onzoom");
		this.thumbnailPath = this.$el.attr("src");
		var imagePath = this.$el.data(this.options.imageData);

		this.getImageSize(imagePath);
		this.$el.attr("src", ONE_PIXEL_TRANSPARENT_IMAGE);
		this.$el.css({
			width: this.$width,
			height: this.$height,
			backgroundImage: "url(" + imagePath + ")",
			backgroundPosition: "0px 0px"
		});
		this.$el.on("mousemove", $.proxy(function (e) {
			this.calculateImagePosition(e.offsetX, e.offsetY);
		}, this));
	};

	Zoom.prototype.followMouse = function (x, y) {
		this.$el.css({backgroundPosition: [-x, -y].join(" ")});
	};

	Zoom.prototype.getImageSize = function (imagePath) {
		var img = new Image();
		img.src = imagePath;
		img.onload = $.proxy(function () {
			this.$widthZoom = img.width;
			this.$heightZoom = img.height;
		}, this);
	};

	Zoom.prototype.calculateImagePosition = function (mouseX, mouseY) {
		var displayX = ((mouseX * (this.$widthZoom - this.$width)) / this.$width);
		var displayY = ((mouseY * (this.$heightZoom - this.$height)) / this.$height);

		this.followMouse(displayX, displayY);
	};

	Zoom.prototype.disableZoom = function () {
		this.$el.unbind("mousemove");
		this.$el.removeClass("onzoom");
		this.$el.attr("src", this.thumbnailPath);
	};

	Zoom.prototype.enableNavigation = function () {
		var self = this;
		var $navigateItems = $(this.$el.data(this.options.imageListData));

		$navigateItems.each(function () {
			var $el = $(this);
			var navigation = $el.data(self.options.navigateData).split(",");
			$el.on("click", function () {
				self.$el.css({width: "auto", height: "auto"});
				self.$el.fadeOut(function () {
					self.$el.attr("src", navigation[0]);
					self.$el.data(self.options.imageData, navigation[1]);
					self.$el.on("load", function () {
						self.$el.fadeIn();
					});
				});
			});
		});
	};

	$.fn.zoom = function (options) {
		$(this).each(function () {
			new Zoom(this, options);
		});
	};

})(jQuery);
