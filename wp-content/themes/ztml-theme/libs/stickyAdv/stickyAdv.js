const StickySidebar = (() => {
    const t = ".stickySidebar", i = {
        topSpacing: 0,
        bottomSpacing: 0,
        containerSelector: !1,
        innerWrapperSelector: ".inner-wrapper-sticky",
        stickyClass: "is-affixed",
        resizeSensor: !0,
        minWidth: !1
    };

    class e {
        constructor(t, s = {}) {
            if (this.options = e.extend(i, s), this.sidebar = "string" == typeof t ? document.querySelector(t) : t, void 0 === this.sidebar) throw new Error("There is no specific sidebar element.");
            this.sidebarInner = !1, this.container = this.sidebar.parentElement, this.affixedType = "STATIC", this.direction = "down", this.support = {
                transform: !1, transform3d: !1
            }, this._initialized = !1, this._reStyle = !1, this._breakpoint = !1, this.dimensions = {
                translateY: 0,
                maxTranslateY: 0,
                topSpacing: 0,
                lastTopSpacing: 0,
                bottomSpacing: 0,
                lastBottomSpacing: 0,
                sidebarHeight: 0,
                sidebarWidth: 0,
                containerTop: 0,
                containerHeight: 0,
                viewportHeight: 0,
                viewportTop: 0,
                lastViewportTop: 0
            }, ["handleEvent"].forEach(t => {
                this[t] = this[t].bind(this)
            }), this.initialize()
        }

        initialize() {
            if (this._setSupportFeatures(), this.options.innerWrapperSelector && (this.sidebarInner = this.sidebar.querySelector(this.options.innerWrapperSelector), null === this.sidebarInner && (this.sidebarInner = !1)), !this.sidebarInner) {
                let t = document.createElement("div");
                for (t.setAttribute("class", "inner-wrapper-sticky"), this.sidebar.appendChild(t); this.sidebar.firstChild != t;) t.appendChild(this.sidebar.firstChild);
                this.sidebarInner = this.sidebar.querySelector(".inner-wrapper-sticky")
            }
            if (this.options.containerSelector) {
                let t = document.querySelectorAll(this.options.containerSelector);
                if ((t = Array.prototype.slice.call(t)).forEach((t, i) => {
                    t.contains(this.sidebar) && (this.container = t)
                }), !t.length) throw new Error("The container does not contains on the sidebar.")
            }
            "function" != typeof this.options.topSpacing && (this.options.topSpacing = parseInt(this.options.topSpacing) || 0), "function" != typeof this.options.bottomSpacing && (this.options.bottomSpacing = parseInt(this.options.bottomSpacing) || 0), this._widthBreakpoint(), this.calcDimensions(), this.stickyPosition(), this.bindEvents(), this._initialized = !0
        }

        bindEvents() {
            window.addEventListener("resize", this, {
                passive: !0, capture: !1
            }), window.addEventListener("scroll", this, {
                passive: !0, capture: !1
            }), this.sidebar.addEventListener("update" + t, this), this.options.resizeSensor && "undefined" != typeof ResizeSensor && (new ResizeSensor(this.sidebarInner, this.handleEvent), new ResizeSensor(this.container, this.handleEvent))
        }

        handleEvent(t) {
            this.updateSticky(t)
        }

        calcDimensions() {
            if (!this._breakpoint) {
                var t = this.dimensions;
                t.containerTop = e.offsetRelative(this.container).top, t.containerHeight = this.container.clientHeight, t.containerBottom = t.containerTop + t.containerHeight, t.sidebarHeight = this.sidebarInner.offsetHeight, t.sidebarWidth = this.sidebarInner.offsetWidth, t.viewportHeight = window.innerHeight, t.maxTranslateY = t.containerHeight - t.sidebarHeight, this._calcDimensionsWithScroll()
            }
        }

        _calcDimensionsWithScroll() {
            var t = this.dimensions;
            t.sidebarLeft = e.offsetRelative(this.sidebar).left, t.sidebarRight = 1190 + (document.body.clientWidth - 1190) / 2 + "px", t.viewportTop = document.documentElement.scrollTop || document.body.scrollTop, t.viewportBottom = t.viewportTop + t.viewportHeight, t.viewportLeft = document.documentElement.scrollLeft || document.body.scrollLeft, t.topSpacing = this.options.topSpacing, t.bottomSpacing = this.options.bottomSpacing, "function" == typeof t.topSpacing && (t.topSpacing = parseInt(t.topSpacing(this.sidebar)) || 0), "function" == typeof t.bottomSpacing && (t.bottomSpacing = parseInt(t.bottomSpacing(this.sidebar)) || 0), "VIEWPORT-TOP" === this.affixedType ? t.topSpacing < t.lastTopSpacing && (t.translateY += t.lastTopSpacing - t.topSpacing, this._reStyle = !0) : "VIEWPORT-BOTTOM" === this.affixedType && t.bottomSpacing < t.lastBottomSpacing && (t.translateY += t.lastBottomSpacing - t.bottomSpacing, this._reStyle = !0), t.lastTopSpacing = t.topSpacing, t.lastBottomSpacing = t.bottomSpacing
        }

        isSidebarFitsViewport() {
            let t = this.dimensions, i = "down" === this.scrollDirection ? t.lastBottomSpacing : t.lastTopSpacing;
            return this.dimensions.sidebarHeight + i < this.dimensions.viewportHeight
        }

        observeScrollDir() {
            var t = this.dimensions;
            if (t.lastViewportTop !== t.viewportTop) {
                var i = "down" === this.direction ? Math.min : Math.max;
                t.viewportTop === i(t.viewportTop, t.lastViewportTop) && (this.direction = "down" === this.direction ? "up" : "down")
            }
        }

        getAffixType() {
            this._calcDimensionsWithScroll();
            var t = this.dimensions, i = t.viewportTop + t.topSpacing, e = this.affixedType;
            return i <= t.containerTop || t.containerHeight <= t.sidebarHeight ? (t.translateY = 0, e = "STATIC") : e = "up" === this.direction ? this._getAffixTypeScrollingUp() : this._getAffixTypeScrollingDown(), t.translateY = Math.max(0, t.translateY), t.translateY = Math.min(t.containerHeight, t.translateY), t.translateY = Math.round(t.translateY), t.lastViewportTop = t.viewportTop, e
        }

        _getAffixTypeScrollingDown() {
            var t = this.dimensions, i = t.sidebarHeight + t.containerTop, e = t.viewportTop + t.topSpacing,
                s = t.viewportBottom - t.bottomSpacing, n = this.affixedType;
            return this.isSidebarFitsViewport() ? t.sidebarHeight + e >= t.containerBottom ? (t.translateY = t.containerBottom - i, n = "CONTAINER-BOTTOM") : e >= t.containerTop && (t.translateY = e - t.containerTop, n = "VIEWPORT-TOP") : t.containerBottom <= s ? (t.translateY = t.containerBottom - i, n = "CONTAINER-BOTTOM") : i + t.translateY <= s ? (t.translateY = s - i, n = "VIEWPORT-BOTTOM") : t.containerTop + t.translateY <= e && 0 !== t.translateY && t.maxTranslateY !== t.translateY && (n = "VIEWPORT-UNBOTTOM"), n
        }

        _getAffixTypeScrollingUp() {
            var t = this.dimensions, i = t.sidebarHeight + t.containerTop, e = t.viewportTop + t.topSpacing,
                s = t.viewportBottom - t.bottomSpacing, n = this.affixedType;
            return e <= t.translateY + t.containerTop ? (t.translateY = e - t.containerTop, n = "VIEWPORT-TOP") : t.containerBottom <= s ? (t.translateY = t.containerBottom - i, n = "CONTAINER-BOTTOM") : this.isSidebarFitsViewport() || t.containerTop <= e && 0 !== t.translateY && t.maxTranslateY !== t.translateY && (n = "VIEWPORT-UNBOTTOM"), n
        }

        _getStyle(t) {
            if (void 0 !== t) {
                var i = {inner: {}, outer: {}}, s = this.dimensions;
                switch (t) {
                    case"VIEWPORT-TOP":
                        i.inner = {
                            position: "fixed",
                            top: s.topSpacing,
                            left: s.sidebarLeft - s.viewportLeft,
                            right: s.sidebarRight,
                            width: s.sidebarWidth
                        };
                        break;
                    case"VIEWPORT-BOTTOM":
                        i.inner = {
                            position: "fixed",
                            top: "auto",
                            left: s.sidebarLeft,
                            right: s.sidebarRight,
                            bottom: s.bottomSpacing,
                            width: s.sidebarWidth
                        };
                        break;
                    case"CONTAINER-BOTTOM":
                    case"VIEWPORT-UNBOTTOM":
                        let e = this._getTranslate(0, s.translateY + "px");
                        i.inner = e ? {transform: e} : {position: "absolute", top: s.translateY, width: s.sidebarWidth}
                }
                switch (t) {
                    case"VIEWPORT-TOP":
                    case"VIEWPORT-BOTTOM":
                    case"VIEWPORT-UNBOTTOM":
                    case"CONTAINER-BOTTOM":
                        i.outer = {height: s.sidebarHeight, position: "absolute"}
                }
                return i.outer = e.extend({
                    height: "", position: ""
                }, i.outer), i.inner = e.extend({
                    position: "absolute", top: "", left: "", right: "", bottom: "", width: "", transform: ""
                }, i.inner), i
            }
        }

        stickyPosition(i) {
            if (!this._breakpoint) {
                i = this._reStyle || i || !1;
                this.options.topSpacing, this.options.bottomSpacing;
                var s = this.getAffixType(), n = this._getStyle(s);
                if ((this.affixedType != s || i) && s) {
                    let i = "affix." + s.toLowerCase().replace("viewport-", "") + t;
                    e.eventTrigger(this.sidebar, i), "STATIC" === s ? e.removeClass(this.sidebar, this.options.stickyClass) : e.addClass(this.sidebar, this.options.stickyClass);
                    for (let t in n.outer) {
                        let i = "number" == typeof n.outer[t] ? "px" : "";
                        this.sidebar.style[t] = n.outer[t] + i
                    }
                    for (let t in n.inner) {
                        let i = "number" == typeof n.inner[t] ? "px" : "";
                        this.sidebarInner.style[t] = n.inner[t] + i
                    }
                    let o = "affixed." + s.toLowerCase().replace("viewport-", "") + t;
                    e.eventTrigger(this.sidebar, o)
                } else this._initialized && (this.sidebarInner.style.left = n.inner.left, this.sidebarInner.style.right = n.inner.right);
                this.affixedType = s
            }
        }

        _widthBreakpoint() {
            window.innerWidth <= this.options.minWidth ? (this._breakpoint = !0, this.affixedType = "STATIC", this.sidebar.removeAttribute("style"), e.removeClass(this.sidebar, this.options.stickyClass), this.sidebarInner.removeAttribute("style")) : this._breakpoint = !1
        }

        updateSticky(t = {}) {
            this._running || (this._running = !0, (t => {
                requestAnimationFrame(() => {
                    switch (t) {
                        case"scroll":
                            this._calcDimensionsWithScroll(), this.observeScrollDir(), this.stickyPosition();
                            break;
                        case"resize":
                        default:
                            this._widthBreakpoint(), this.calcDimensions(), this.stickyPosition(!0)
                    }
                    this._running = !1
                })
            })(t.type))
        }

        _setSupportFeatures() {
            var t = this.support;
            t.transform = e.supportTransform(), t.transform3d = e.supportTransform(!0)
        }

        _getTranslate(t = 0, i = 0, e = 0) {
            return this.support.transform3d ? "translate3d(" + t + ", " + i + ", " + e + ")" : !!this.support.translate && "translate(" + t + ", " + i + ")"
        }

        destroy() {
            window.removeEventListener("resize", this, {capture: !1}), window.removeEventListener("scroll", this, {capture: !1}), this.sidebar.classList.remove(this.options.stickyClass), this.sidebar.style.minHeight = "", this.sidebar.removeEventListener("update" + t, this);
            var i = {inner: {}, outer: {}};
            i.inner = {
                position: "", top: "", left: "", right: "", bottom: "", width: "", transform: ""
            }, i.outer = {height: "", position: ""};
            for (let t in i.outer) this.sidebar.style[t] = i.outer[t];
            for (let t in i.inner) this.sidebarInner.style[t] = i.inner[t];
            this.options.resizeSensor && "undefined" != typeof ResizeSensor && (ResizeSensor.detach(this.sidebarInner, this.handleEvent), ResizeSensor.detach(this.container, this.handleEvent))
        }

        static supportTransform(t) {
            var i = !1, e = t ? "perspective" : "transform", s = e.charAt(0).toUpperCase() + e.slice(1),
                n = document.createElement("support").style;
            return (e + " " + ["Webkit", "Moz", "O", "ms"].join(s + " ") + s).split(" ").forEach(function (t, e) {
                if (void 0 !== n[t]) return i = t, !1
            }), i
        }

        static eventTrigger(t, i, e) {
            try {
                var s = new CustomEvent(i, {detail: e})
            } catch (t) {
                (s = document.createEvent("CustomEvent")).initCustomEvent(i, !0, !0, e)
            }
            t.dispatchEvent(s)
        }

        static extend(t, i) {
            var e = {};
            for (let s in t) void 0 !== i[s] ? e[s] = i[s] : e[s] = t[s];
            return e
        }

        static offsetRelative(t) {
            var i = {left: 0, top: 0};
            do {
                let e = t.offsetTop, s = t.offsetLeft;
                isNaN(e) || (i.top += e), isNaN(s) || (i.left += s), t = "BODY" === t.tagName ? t.parentElement : t.offsetParent
            } while (t);
            return i
        }

        static addClass(t, i) {
            e.hasClass(t, i) || (t.classList ? t.classList.add(i) : t.className += " " + i)
        }

        static removeClass(t, i) {
            e.hasClass(t, i) && (t.classList ? t.classList.remove(i) : t.className = t.className.replace(new RegExp("(^|\\b)" + i.split(" ").join("|") + "(\\b|$)", "gi"), " "))
        }

        static hasClass(t, i) {
            return t.classList ? t.classList.contains(i) : new RegExp("(^| )" + i + "( |$)", "gi").test(t.className)
        }

        static get defaults() {
            return i
        }
    }

    return e
})();
window.StickySidebar = StickySidebar;