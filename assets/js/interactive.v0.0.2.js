!function (s) {
    var i = function (t, e) {
        this.$target = t, this.size = e.size, this.options = e;
        var i = this;
        s("html").animate({scrollTop: this.$target.offset().top}, 500, function () {
            i.init()
        }), this.Promise = new Promise(function (t, e) {
            i.resolve = t
        })
    };
    i.prototype = {
        constructor: i, init: function () {
            var t = this;
            this.reset(), this.disableScroll(), this.$el = s('<div class="circle-main"></div>');
            var e = this.$target.width(), i = s(window).width();
            i < s(window).height() && (i = s(window).height()), e < this.$target.height() && (e = this.$target.height()), e < 70 ? e = 70 : e += 10, this.$el.css({
                borderRadius: "50%",
                padding: e / 2 + "px",
                border: this.size + "px rgba(255,25,100,0.9) solid",
                zIndex: 1e5,
                overflow: "hidden",
                opacity: .7,
                transform: "scale(0)",
                transition: "all 700ms",
                boxShadow: "0 0 40px rgb(255,25,100)",
                left: this.$target.offset().left + this.$target.width() / 2 - this.size - e / 2,
                top: this.$target.offset().top + this.$target.height() / 2 - this.size - e / 2 - s(window).scrollTop()
            }), this.$elBack = s('<div class="circle-background"></div>'), this.$elBack.css({
                padding: e / 2 + "px",
                overflow: "hidden",
                borderRadius: "50%",
                border: i + "px rgba(255,255,255,0.9) solid",
                zIndex: 1e4,
                opacity: .7,
                transform: "scale(0)",
                transition: "all 700ms",
                left: this.$target.offset().left + this.$target.width() / 2 - (i + e / 2),
                top: this.$target.offset().top + this.$target.height() / 2 - (i + e / 2) - s(window).scrollTop()
            }), s(document.body).append(this.$el), s(document.body).append(this.$elBack), this.$el.css({
                left: this.$target.offset().left + this.$target.width() / 2 - this.size - e / 2,
                top: this.$target.offset().top + this.$target.height() / 2 - this.size - e / 2 - s(window).scrollTop(),
                position: "fixed",
                opacity: 1,
                transform: "scale(1)"
            }), this.$elBack.css({
                position: "fixed",
                left: this.$target.offset().left + this.$target.width() / 2 - (i + e / 2),
                top: this.$target.offset().top + this.$target.height() / 2 - (i + e / 2) - s(window).scrollTop(),
                opacity: 1,
                transform: "scale(1)"
            }), this.$elText = s('<p class="circle-text"></p>'), this.$elText.html(this.options.text), this.$elText.append('<br><br>'), this.options.author && this.$elText.append('<b style="color:gray;padding:25px;font-size:12px">@' + this.options.author + "</b>"), this.$elText.css({
                position: "fixed",
                left: 0,
                textAlign: "center",
                opacity: 1,
                padding: "10px",
               // background: "rgba(255,255,255,0.9)",
                width: "100%",
                transform: "scale(1)",
                zIndex: 1000100,
                fontSize: 22
            }), this.$elText.css(this.options.textPosition), this.$elText.hide(), s(document.body).append(this.$elText), setTimeout(function () {
                t.$elText.fadeIn()
            }, 100), s(window).on("resize", function () {
                t.active && t.init()
            }), this.$elText.click(function () {
                t.hide()
            }), this.$elBack.click(function () {
                t.hide()
            }), this.$el.click(function () {
                t.hide()
            }), this.active = !0
        }, hide: function () {
            this.active = !1, this.$elText.fadeOut(), this.$el.css({
                opacity: .6,
                transform: "scale(0)"
            }), this.$elBack.css({opacity: .6, transform: "scale(0)"});
            var t = this;
            setTimeout(function () {
                t.destroy(), t.resolve(t)
            }, 500)
        }, reset: function () {
            this.enableScroll(), s(".circle-main").remove(), s(".circle-background").remove(), s(".circle-text").remove()
        }, destroy: function () {
            this.reset()
        }, preventDefault: function (t) {
            (t = t || window.event).preventDefault && t.preventDefault(), t.returnValue = !1
        }, preventDefaultForScrollKeys: function (t) {
            if ({37: 1, 38: 1, 39: 1, 40: 1}[t.keyCode]) return this.preventDefault(t), !1
        }, disableScroll: function () {
        }, enableScroll: function () {
        }
    }, s.fn.interactive = function (t) {
        var e = new i(s(this), t);
        return s(this).data("interactive", e), e.Promise
    }
}($);
