/*!
  * Bootstrap v4.0.0-beta.2 (https://getbootstrap.com)
  * Copyright 2011-2017 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
var bootstrap = (function (exports,$,Popper) ***REMOVED***
'use strict';

$ = $ && $.hasOwnProperty('default') ? $['default'] : $;
Popper = Popper && Popper.hasOwnProperty('default') ? Popper['default'] : Popper;

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): util.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Util = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Private TransitionEnd Helpers
   * ------------------------------------------------------------------------
   */
  var transition = false;
  var MAX_UID = 1000000;
  var TransitionEndEvent = ***REMOVED***
    WebkitTransition: 'webkitTransitionEnd',
    MozTransition: 'transitionend',
    OTransition: 'oTransitionEnd otransitionend',
    transition: 'transitionend' // shoutout AngusCroll (https://goo.gl/pxwQGp)

  ***REMOVED***;

  function toType(obj) ***REMOVED***
    return ***REMOVED******REMOVED***.toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
  ***REMOVED***

  function getSpecialTransitionEndEvent() ***REMOVED***
    return ***REMOVED***
      bindType: transition.end,
      delegateType: transition.end,
      handle: function handle(event) ***REMOVED***
        if ($(event.target).is(this)) ***REMOVED***
          return event.handleObj.handler.apply(this, arguments); // eslint-disable-line prefer-rest-params
    ***REMOVED***

        return undefined; // eslint-disable-line no-undefined
  ***REMOVED***
***REMOVED***;
  ***REMOVED***

  function transitionEndTest() ***REMOVED***
    if (window.QUnit) ***REMOVED***
      return false;
***REMOVED***

    var el = document.createElement('bootstrap');

    for (var name in TransitionEndEvent) ***REMOVED***
      if (typeof el.style[name] !== 'undefined') ***REMOVED***
        return ***REMOVED***
          end: TransitionEndEvent[name]
    ***REMOVED***;
  ***REMOVED***
***REMOVED***

    return false;
  ***REMOVED***

  function transitionEndEmulator(duration) ***REMOVED***
    var _this = this;

    var called = false;
    $(this).one(Util.TRANSITION_END, function () ***REMOVED***
      called = true;
***REMOVED***);
    setTimeout(function () ***REMOVED***
      if (!called) ***REMOVED***
        Util.triggerTransitionEnd(_this);
  ***REMOVED***
***REMOVED***, duration);
    return this;
  ***REMOVED***

  function setTransitionEndSupport() ***REMOVED***
    transition = transitionEndTest();
    $.fn.emulateTransitionEnd = transitionEndEmulator;

    if (Util.supportsTransitionEnd()) ***REMOVED***
      $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
***REMOVED***
  ***REMOVED***
  /**
   * --------------------------------------------------------------------------
   * Public Util Api
   * --------------------------------------------------------------------------
   */


  var Util = ***REMOVED***
    TRANSITION_END: 'bsTransitionEnd',
    getUID: function getUID(prefix) ***REMOVED***
      do ***REMOVED***
        // eslint-disable-next-line no-bitwise
        prefix += ~~(Math.random() * MAX_UID); // "~~" acts like a faster Math.floor() here
  ***REMOVED*** while (document.getElementById(prefix));

      return prefix;
***REMOVED***,
    getSelectorFromElement: function getSelectorFromElement(element) ***REMOVED***
      var selector = element.getAttribute('data-target');

      if (!selector || selector === '#') ***REMOVED***
        selector = element.getAttribute('href') || '';
  ***REMOVED***

      try ***REMOVED***
        var $selector = $(document).find(selector);
        return $selector.length > 0 ? selector : null;
  ***REMOVED*** catch (error) ***REMOVED***
        return null;
  ***REMOVED***
***REMOVED***,
    reflow: function reflow(element) ***REMOVED***
      return element.offsetHeight;
***REMOVED***,
    triggerTransitionEnd: function triggerTransitionEnd(element) ***REMOVED***
      $(element).trigger(transition.end);
***REMOVED***,
    supportsTransitionEnd: function supportsTransitionEnd() ***REMOVED***
      return Boolean(transition);
***REMOVED***,
    isElement: function isElement(obj) ***REMOVED***
      return (obj[0] || obj).nodeType;
***REMOVED***,
    typeCheckConfig: function typeCheckConfig(componentName, config, configTypes) ***REMOVED***
      for (var property in configTypes) ***REMOVED***
        if (Object.prototype.hasOwnProperty.call(configTypes, property)) ***REMOVED***
          var expectedTypes = configTypes[property];
          var value = config[property];
          var valueType = value && Util.isElement(value) ? 'element' : toType(value);

          if (!new RegExp(expectedTypes).test(valueType)) ***REMOVED***
            throw new Error(componentName.toUpperCase() + ": " + ("Option \"" + property + "\" provided type \"" + valueType + "\" ") + ("but expected type \"" + expectedTypes + "\"."));
      ***REMOVED***
    ***REMOVED***
  ***REMOVED***
***REMOVED***
  ***REMOVED***;
  setTransitionEndSupport();
  return Util;
***REMOVED***($);

function _defineProperties(target, props) ***REMOVED***
  for (var i = 0; i < props.length; i++) ***REMOVED***
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  ***REMOVED***
***REMOVED***

function _createClass(Constructor, protoProps, staticProps) ***REMOVED***
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
***REMOVED***

var createClass = _createClass;

function _inheritsLoose(subClass, superClass) ***REMOVED***
  subClass.prototype = Object.create(superClass.prototype);
  subClass.prototype.constructor = subClass;
  subClass.__proto__ = superClass;
***REMOVED***

var inheritsLoose = _inheritsLoose;

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): alert.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Alert = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'alert';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.alert';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 150;
  var Selector = ***REMOVED***
    DISMISS: '[data-dismiss="alert"]'
  ***REMOVED***;
  var Event = ***REMOVED***
    CLOSE: "close" + EVENT_KEY,
    CLOSED: "closed" + EVENT_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    ALERT: 'alert',
    FADE: 'fade',
    SHOW: 'show'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Alert =
  /*#__PURE__*/
  function () ***REMOVED***
    function Alert(element) ***REMOVED***
      this._element = element;
***REMOVED*** // getters


    var _proto = Alert.prototype;

    // public
    _proto.close = function close(element) ***REMOVED***
      element = element || this._element;

      var rootElement = this._getRootElement(element);

      var customEvent = this._triggerCloseEvent(rootElement);

      if (customEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      this._removeElement(rootElement);
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      this._element = null;
***REMOVED***; // private


    _proto._getRootElement = function _getRootElement(element) ***REMOVED***
      var selector = Util.getSelectorFromElement(element);
      var parent = false;

      if (selector) ***REMOVED***
        parent = $(selector)[0];
  ***REMOVED***

      if (!parent) ***REMOVED***
        parent = $(element).closest("." + ClassName.ALERT)[0];
  ***REMOVED***

      return parent;
***REMOVED***;

    _proto._triggerCloseEvent = function _triggerCloseEvent(element) ***REMOVED***
      var closeEvent = $.Event(Event.CLOSE);
      $(element).trigger(closeEvent);
      return closeEvent;
***REMOVED***;

    _proto._removeElement = function _removeElement(element) ***REMOVED***
      var _this = this;

      $(element).removeClass(ClassName.SHOW);

      if (!Util.supportsTransitionEnd() || !$(element).hasClass(ClassName.FADE)) ***REMOVED***
        this._destroyElement(element);

        return;
  ***REMOVED***

      $(element).one(Util.TRANSITION_END, function (event) ***REMOVED***
        return _this._destroyElement(element, event);
  ***REMOVED***).emulateTransitionEnd(TRANSITION_DURATION);
***REMOVED***;

    _proto._destroyElement = function _destroyElement(element) ***REMOVED***
      $(element).detach().trigger(Event.CLOSED).remove();
***REMOVED***; // static


    Alert._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var $element = $(this);
        var data = $element.data(DATA_KEY);

        if (!data) ***REMOVED***
          data = new Alert(this);
          $element.data(DATA_KEY, data);
    ***REMOVED***

        if (config === 'close') ***REMOVED***
          data[config](this);
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    Alert._handleDismiss = function _handleDismiss(alertInstance) ***REMOVED***
      return function (event) ***REMOVED***
        if (event) ***REMOVED***
          event.preventDefault();
    ***REMOVED***

        alertInstance.close(this);
  ***REMOVED***;
***REMOVED***;

    createClass(Alert, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***]);
    return Alert;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DISMISS, Alert._handleDismiss(new Alert()));
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Alert._jQueryInterface;
  $.fn[NAME].Constructor = Alert;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Alert._jQueryInterface;
  ***REMOVED***;

  return Alert;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): button.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Button = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'button';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.button';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var ClassName = ***REMOVED***
    ACTIVE: 'active',
    BUTTON: 'btn',
    FOCUS: 'focus'
  ***REMOVED***;
  var Selector = ***REMOVED***
    DATA_TOGGLE_CARROT: '[data-toggle^="button"]',
    DATA_TOGGLE: '[data-toggle="buttons"]',
    INPUT: 'input',
    ACTIVE: '.active',
    BUTTON: '.btn'
  ***REMOVED***;
  var Event = ***REMOVED***
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY,
    FOCUS_BLUR_DATA_API: "focus" + EVENT_KEY + DATA_API_KEY + " " + ("blur" + EVENT_KEY + DATA_API_KEY)
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Button =
  /*#__PURE__*/
  function () ***REMOVED***
    function Button(element) ***REMOVED***
      this._element = element;
***REMOVED*** // getters


    var _proto = Button.prototype;

    // public
    _proto.toggle = function toggle() ***REMOVED***
      var triggerChangeEvent = true;
      var addAriaPressed = true;
      var rootElement = $(this._element).closest(Selector.DATA_TOGGLE)[0];

      if (rootElement) ***REMOVED***
        var input = $(this._element).find(Selector.INPUT)[0];

        if (input) ***REMOVED***
          if (input.type === 'radio') ***REMOVED***
            if (input.checked && $(this._element).hasClass(ClassName.ACTIVE)) ***REMOVED***
              triggerChangeEvent = false;
        ***REMOVED*** else ***REMOVED***
              var activeElement = $(rootElement).find(Selector.ACTIVE)[0];

              if (activeElement) ***REMOVED***
                $(activeElement).removeClass(ClassName.ACTIVE);
          ***REMOVED***
        ***REMOVED***
      ***REMOVED***

          if (triggerChangeEvent) ***REMOVED***
            if (input.hasAttribute('disabled') || rootElement.hasAttribute('disabled') || input.classList.contains('disabled') || rootElement.classList.contains('disabled')) ***REMOVED***
              return;
        ***REMOVED***

            input.checked = !$(this._element).hasClass(ClassName.ACTIVE);
            $(input).trigger('change');
      ***REMOVED***

          input.focus();
          addAriaPressed = false;
    ***REMOVED***
  ***REMOVED***

      if (addAriaPressed) ***REMOVED***
        this._element.setAttribute('aria-pressed', !$(this._element).hasClass(ClassName.ACTIVE));
  ***REMOVED***

      if (triggerChangeEvent) ***REMOVED***
        $(this._element).toggleClass(ClassName.ACTIVE);
  ***REMOVED***
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      this._element = null;
***REMOVED***; // static


    Button._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        if (!data) ***REMOVED***
          data = new Button(this);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (config === 'toggle') ***REMOVED***
          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Button, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***]);
    return Button;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) ***REMOVED***
    event.preventDefault();
    var button = event.target;

    if (!$(button).hasClass(ClassName.BUTTON)) ***REMOVED***
      button = $(button).closest(Selector.BUTTON);
***REMOVED***

    Button._jQueryInterface.call($(button), 'toggle');
  ***REMOVED***).on(Event.FOCUS_BLUR_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) ***REMOVED***
    var button = $(event.target).closest(Selector.BUTTON)[0];
    $(button).toggleClass(ClassName.FOCUS, /^focus(in)?$/.test(event.type));
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Button._jQueryInterface;
  $.fn[NAME].Constructor = Button;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Button._jQueryInterface;
  ***REMOVED***;

  return Button;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): carousel.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Carousel = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'carousel';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.carousel';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 600;
  var ARROW_LEFT_KEYCODE = 37; // KeyboardEvent.which value for left arrow key

  var ARROW_RIGHT_KEYCODE = 39; // KeyboardEvent.which value for right arrow key

  var TOUCHEVENT_COMPAT_WAIT = 500; // Time for mouse compat events to fire after touch

  var Default = ***REMOVED***
    interval: 5000,
    keyboard: true,
    slide: false,
    pause: 'hover',
    wrap: true
  ***REMOVED***;
  var DefaultType = ***REMOVED***
    interval: '(number|boolean)',
    keyboard: 'boolean',
    slide: '(boolean|string)',
    pause: '(string|boolean)',
    wrap: 'boolean'
  ***REMOVED***;
  var Direction = ***REMOVED***
    NEXT: 'next',
    PREV: 'prev',
    LEFT: 'left',
    RIGHT: 'right'
  ***REMOVED***;
  var Event = ***REMOVED***
    SLIDE: "slide" + EVENT_KEY,
    SLID: "slid" + EVENT_KEY,
    KEYDOWN: "keydown" + EVENT_KEY,
    MOUSEENTER: "mouseenter" + EVENT_KEY,
    MOUSELEAVE: "mouseleave" + EVENT_KEY,
    TOUCHEND: "touchend" + EVENT_KEY,
    LOAD_DATA_API: "load" + EVENT_KEY + DATA_API_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    CAROUSEL: 'carousel',
    ACTIVE: 'active',
    SLIDE: 'slide',
    RIGHT: 'carousel-item-right',
    LEFT: 'carousel-item-left',
    NEXT: 'carousel-item-next',
    PREV: 'carousel-item-prev',
    ITEM: 'carousel-item'
  ***REMOVED***;
  var Selector = ***REMOVED***
    ACTIVE: '.active',
    ACTIVE_ITEM: '.active.carousel-item',
    ITEM: '.carousel-item',
    NEXT_PREV: '.carousel-item-next, .carousel-item-prev',
    INDICATORS: '.carousel-indicators',
    DATA_SLIDE: '[data-slide], [data-slide-to]',
    DATA_RIDE: '[data-ride="carousel"]'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Carousel =
  /*#__PURE__*/
  function () ***REMOVED***
    function Carousel(element, config) ***REMOVED***
      this._items = null;
      this._interval = null;
      this._activeElement = null;
      this._isPaused = false;
      this._isSliding = false;
      this.touchTimeout = null;
      this._config = this._getConfig(config);
      this._element = $(element)[0];
      this._indicatorsElement = $(this._element).find(Selector.INDICATORS)[0];

      this._addEventListeners();
***REMOVED*** // getters


    var _proto = Carousel.prototype;

    // public
    _proto.next = function next() ***REMOVED***
      if (!this._isSliding) ***REMOVED***
        this._slide(Direction.NEXT);
  ***REMOVED***
***REMOVED***;

    _proto.nextWhenVisible = function nextWhenVisible() ***REMOVED***
      // Don't call next when the page isn't visible
      // or the carousel or its parent isn't visible
      if (!document.hidden && $(this._element).is(':visible') && $(this._element).css('visibility') !== 'hidden') ***REMOVED***
        this.next();
  ***REMOVED***
***REMOVED***;

    _proto.prev = function prev() ***REMOVED***
      if (!this._isSliding) ***REMOVED***
        this._slide(Direction.PREV);
  ***REMOVED***
***REMOVED***;

    _proto.pause = function pause(event) ***REMOVED***
      if (!event) ***REMOVED***
        this._isPaused = true;
  ***REMOVED***

      if ($(this._element).find(Selector.NEXT_PREV)[0] && Util.supportsTransitionEnd()) ***REMOVED***
        Util.triggerTransitionEnd(this._element);
        this.cycle(true);
  ***REMOVED***

      clearInterval(this._interval);
      this._interval = null;
***REMOVED***;

    _proto.cycle = function cycle(event) ***REMOVED***
      if (!event) ***REMOVED***
        this._isPaused = false;
  ***REMOVED***

      if (this._interval) ***REMOVED***
        clearInterval(this._interval);
        this._interval = null;
  ***REMOVED***

      if (this._config.interval && !this._isPaused) ***REMOVED***
        this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval);
  ***REMOVED***
***REMOVED***;

    _proto.to = function to(index) ***REMOVED***
      var _this = this;

      this._activeElement = $(this._element).find(Selector.ACTIVE_ITEM)[0];

      var activeIndex = this._getItemIndex(this._activeElement);

      if (index > this._items.length - 1 || index < 0) ***REMOVED***
        return;
  ***REMOVED***

      if (this._isSliding) ***REMOVED***
        $(this._element).one(Event.SLID, function () ***REMOVED***
          return _this.to(index);
    ***REMOVED***);
        return;
  ***REMOVED***

      if (activeIndex === index) ***REMOVED***
        this.pause();
        this.cycle();
        return;
  ***REMOVED***

      var direction = index > activeIndex ? Direction.NEXT : Direction.PREV;

      this._slide(direction, this._items[index]);
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $(this._element).off(EVENT_KEY);
      $.removeData(this._element, DATA_KEY);
      this._items = null;
      this._config = null;
      this._element = null;
      this._interval = null;
      this._isPaused = null;
      this._isSliding = null;
      this._activeElement = null;
      this._indicatorsElement = null;
***REMOVED***; // private


    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, Default, config);
      Util.typeCheckConfig(NAME, config, DefaultType);
      return config;
***REMOVED***;

    _proto._addEventListeners = function _addEventListeners() ***REMOVED***
      var _this2 = this;

      if (this._config.keyboard) ***REMOVED***
        $(this._element).on(Event.KEYDOWN, function (event) ***REMOVED***
          return _this2._keydown(event);
    ***REMOVED***);
  ***REMOVED***

      if (this._config.pause === 'hover') ***REMOVED***
        $(this._element).on(Event.MOUSEENTER, function (event) ***REMOVED***
          return _this2.pause(event);
    ***REMOVED***).on(Event.MOUSELEAVE, function (event) ***REMOVED***
          return _this2.cycle(event);
    ***REMOVED***);

        if ('ontouchstart' in document.documentElement) ***REMOVED***
          // if it's a touch-enabled device, mouseenter/leave are fired as
          // part of the mouse compatibility events on first tap - the carousel
          // would stop cycling until user tapped out of it;
          // here, we listen for touchend, explicitly pause the carousel
          // (as if it's the second time we tap on it, mouseenter compat event
          // is NOT fired) and after a timeout (to allow for mouse compatibility
          // events to fire) we explicitly restart cycling
          $(this._element).on(Event.TOUCHEND, function () ***REMOVED***
            _this2.pause();

            if (_this2.touchTimeout) ***REMOVED***
              clearTimeout(_this2.touchTimeout);
        ***REMOVED***

            _this2.touchTimeout = setTimeout(function (event) ***REMOVED***
              return _this2.cycle(event);
        ***REMOVED***, TOUCHEVENT_COMPAT_WAIT + _this2._config.interval);
      ***REMOVED***);
    ***REMOVED***
  ***REMOVED***
***REMOVED***;

    _proto._keydown = function _keydown(event) ***REMOVED***
      if (/input|textarea/i.test(event.target.tagName)) ***REMOVED***
        return;
  ***REMOVED***

      switch (event.which) ***REMOVED***
        case ARROW_LEFT_KEYCODE:
          event.preventDefault();
          this.prev();
          break;

        case ARROW_RIGHT_KEYCODE:
          event.preventDefault();
          this.next();
          break;

        default:
          return;
  ***REMOVED***
***REMOVED***;

    _proto._getItemIndex = function _getItemIndex(element) ***REMOVED***
      this._items = $.makeArray($(element).parent().find(Selector.ITEM));
      return this._items.indexOf(element);
***REMOVED***;

    _proto._getItemByDirection = function _getItemByDirection(direction, activeElement) ***REMOVED***
      var isNextDirection = direction === Direction.NEXT;
      var isPrevDirection = direction === Direction.PREV;

      var activeIndex = this._getItemIndex(activeElement);

      var lastItemIndex = this._items.length - 1;
      var isGoingToWrap = isPrevDirection && activeIndex === 0 || isNextDirection && activeIndex === lastItemIndex;

      if (isGoingToWrap && !this._config.wrap) ***REMOVED***
        return activeElement;
  ***REMOVED***

      var delta = direction === Direction.PREV ? -1 : 1;
      var itemIndex = (activeIndex + delta) % this._items.length;
      return itemIndex === -1 ? this._items[this._items.length - 1] : this._items[itemIndex];
***REMOVED***;

    _proto._triggerSlideEvent = function _triggerSlideEvent(relatedTarget, eventDirectionName) ***REMOVED***
      var targetIndex = this._getItemIndex(relatedTarget);

      var fromIndex = this._getItemIndex($(this._element).find(Selector.ACTIVE_ITEM)[0]);

      var slideEvent = $.Event(Event.SLIDE, ***REMOVED***
        relatedTarget: relatedTarget,
        direction: eventDirectionName,
        from: fromIndex,
        to: targetIndex
  ***REMOVED***);
      $(this._element).trigger(slideEvent);
      return slideEvent;
***REMOVED***;

    _proto._setActiveIndicatorElement = function _setActiveIndicatorElement(element) ***REMOVED***
      if (this._indicatorsElement) ***REMOVED***
        $(this._indicatorsElement).find(Selector.ACTIVE).removeClass(ClassName.ACTIVE);

        var nextIndicator = this._indicatorsElement.children[this._getItemIndex(element)];

        if (nextIndicator) ***REMOVED***
          $(nextIndicator).addClass(ClassName.ACTIVE);
    ***REMOVED***
  ***REMOVED***
***REMOVED***;

    _proto._slide = function _slide(direction, element) ***REMOVED***
      var _this3 = this;

      var activeElement = $(this._element).find(Selector.ACTIVE_ITEM)[0];

      var activeElementIndex = this._getItemIndex(activeElement);

      var nextElement = element || activeElement && this._getItemByDirection(direction, activeElement);

      var nextElementIndex = this._getItemIndex(nextElement);

      var isCycling = Boolean(this._interval);
      var directionalClassName;
      var orderClassName;
      var eventDirectionName;

      if (direction === Direction.NEXT) ***REMOVED***
        directionalClassName = ClassName.LEFT;
        orderClassName = ClassName.NEXT;
        eventDirectionName = Direction.LEFT;
  ***REMOVED*** else ***REMOVED***
        directionalClassName = ClassName.RIGHT;
        orderClassName = ClassName.PREV;
        eventDirectionName = Direction.RIGHT;
  ***REMOVED***

      if (nextElement && $(nextElement).hasClass(ClassName.ACTIVE)) ***REMOVED***
        this._isSliding = false;
        return;
  ***REMOVED***

      var slideEvent = this._triggerSlideEvent(nextElement, eventDirectionName);

      if (slideEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      if (!activeElement || !nextElement) ***REMOVED***
        // some weirdness is happening, so we bail
        return;
  ***REMOVED***

      this._isSliding = true;

      if (isCycling) ***REMOVED***
        this.pause();
  ***REMOVED***

      this._setActiveIndicatorElement(nextElement);

      var slidEvent = $.Event(Event.SLID, ***REMOVED***
        relatedTarget: nextElement,
        direction: eventDirectionName,
        from: activeElementIndex,
        to: nextElementIndex
  ***REMOVED***);

      if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.SLIDE)) ***REMOVED***
        $(nextElement).addClass(orderClassName);
        Util.reflow(nextElement);
        $(activeElement).addClass(directionalClassName);
        $(nextElement).addClass(directionalClassName);
        $(activeElement).one(Util.TRANSITION_END, function () ***REMOVED***
          $(nextElement).removeClass(directionalClassName + " " + orderClassName).addClass(ClassName.ACTIVE);
          $(activeElement).removeClass(ClassName.ACTIVE + " " + orderClassName + " " + directionalClassName);
          _this3._isSliding = false;
          setTimeout(function () ***REMOVED***
            return $(_this3._element).trigger(slidEvent);
      ***REMOVED***, 0);
    ***REMOVED***).emulateTransitionEnd(TRANSITION_DURATION);
  ***REMOVED*** else ***REMOVED***
        $(activeElement).removeClass(ClassName.ACTIVE);
        $(nextElement).addClass(ClassName.ACTIVE);
        this._isSliding = false;
        $(this._element).trigger(slidEvent);
  ***REMOVED***

      if (isCycling) ***REMOVED***
        this.cycle();
  ***REMOVED***
***REMOVED***; // static


    Carousel._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = $.extend(***REMOVED******REMOVED***, Default, $(this).data());

        if (typeof config === 'object') ***REMOVED***
          $.extend(_config, config);
    ***REMOVED***

        var action = typeof config === 'string' ? config : _config.slide;

        if (!data) ***REMOVED***
          data = new Carousel(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'number') ***REMOVED***
          data.to(config);
    ***REMOVED*** else if (typeof action === 'string') ***REMOVED***
          if (typeof data[action] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + action + "\"");
      ***REMOVED***

          data[action]();
    ***REMOVED*** else if (_config.interval) ***REMOVED***
          data.pause();
          data.cycle();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    Carousel._dataApiClickHandler = function _dataApiClickHandler(event) ***REMOVED***
      var selector = Util.getSelectorFromElement(this);

      if (!selector) ***REMOVED***
        return;
  ***REMOVED***

      var target = $(selector)[0];

      if (!target || !$(target).hasClass(ClassName.CAROUSEL)) ***REMOVED***
        return;
  ***REMOVED***

      var config = $.extend(***REMOVED******REMOVED***, $(target).data(), $(this).data());
      var slideIndex = this.getAttribute('data-slide-to');

      if (slideIndex) ***REMOVED***
        config.interval = false;
  ***REMOVED***

      Carousel._jQueryInterface.call($(target), config);

      if (slideIndex) ***REMOVED***
        $(target).data(DATA_KEY).to(slideIndex);
  ***REMOVED***

      event.preventDefault();
***REMOVED***;

    createClass(Carousel, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***]);
    return Carousel;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DATA_SLIDE, Carousel._dataApiClickHandler);
  $(window).on(Event.LOAD_DATA_API, function () ***REMOVED***
    $(Selector.DATA_RIDE).each(function () ***REMOVED***
      var $carousel = $(this);

      Carousel._jQueryInterface.call($carousel, $carousel.data());
***REMOVED***);
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Carousel._jQueryInterface;
  $.fn[NAME].Constructor = Carousel;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Carousel._jQueryInterface;
  ***REMOVED***;

  return Carousel;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): collapse.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Collapse = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'collapse';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.collapse';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 600;
  var Default = ***REMOVED***
    toggle: true,
    parent: ''
  ***REMOVED***;
  var DefaultType = ***REMOVED***
    toggle: 'boolean',
    parent: '(string|element)'
  ***REMOVED***;
  var Event = ***REMOVED***
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    SHOW: 'show',
    COLLAPSE: 'collapse',
    COLLAPSING: 'collapsing',
    COLLAPSED: 'collapsed'
  ***REMOVED***;
  var Dimension = ***REMOVED***
    WIDTH: 'width',
    HEIGHT: 'height'
  ***REMOVED***;
  var Selector = ***REMOVED***
    ACTIVES: '.show, .collapsing',
    DATA_TOGGLE: '[data-toggle="collapse"]'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Collapse =
  /*#__PURE__*/
  function () ***REMOVED***
    function Collapse(element, config) ***REMOVED***
      this._isTransitioning = false;
      this._element = element;
      this._config = this._getConfig(config);
      this._triggerArray = $.makeArray($("[data-toggle=\"collapse\"][href=\"#" + element.id + "\"]," + ("[data-toggle=\"collapse\"][data-target=\"#" + element.id + "\"]")));
      var tabToggles = $(Selector.DATA_TOGGLE);

      for (var i = 0; i < tabToggles.length; i++) ***REMOVED***
        var elem = tabToggles[i];
        var selector = Util.getSelectorFromElement(elem);

        if (selector !== null && $(selector).filter(element).length > 0) ***REMOVED***
          this._triggerArray.push(elem);
    ***REMOVED***
  ***REMOVED***

      this._parent = this._config.parent ? this._getParent() : null;

      if (!this._config.parent) ***REMOVED***
        this._addAriaAndCollapsedClass(this._element, this._triggerArray);
  ***REMOVED***

      if (this._config.toggle) ***REMOVED***
        this.toggle();
  ***REMOVED***
***REMOVED*** // getters


    var _proto = Collapse.prototype;

    // public
    _proto.toggle = function toggle() ***REMOVED***
      if ($(this._element).hasClass(ClassName.SHOW)) ***REMOVED***
        this.hide();
  ***REMOVED*** else ***REMOVED***
        this.show();
  ***REMOVED***
***REMOVED***;

    _proto.show = function show() ***REMOVED***
      var _this = this;

      if (this._isTransitioning || $(this._element).hasClass(ClassName.SHOW)) ***REMOVED***
        return;
  ***REMOVED***

      var actives;
      var activesData;

      if (this._parent) ***REMOVED***
        actives = $.makeArray($(this._parent).children().children(Selector.ACTIVES));

        if (!actives.length) ***REMOVED***
          actives = null;
    ***REMOVED***
  ***REMOVED***

      if (actives) ***REMOVED***
        activesData = $(actives).data(DATA_KEY);

        if (activesData && activesData._isTransitioning) ***REMOVED***
          return;
    ***REMOVED***
  ***REMOVED***

      var startEvent = $.Event(Event.SHOW);
      $(this._element).trigger(startEvent);

      if (startEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      if (actives) ***REMOVED***
        Collapse._jQueryInterface.call($(actives), 'hide');

        if (!activesData) ***REMOVED***
          $(actives).data(DATA_KEY, null);
    ***REMOVED***
  ***REMOVED***

      var dimension = this._getDimension();

      $(this._element).removeClass(ClassName.COLLAPSE).addClass(ClassName.COLLAPSING);
      this._element.style[dimension] = 0;

      if (this._triggerArray.length) ***REMOVED***
        $(this._triggerArray).removeClass(ClassName.COLLAPSED).attr('aria-expanded', true);
  ***REMOVED***

      this.setTransitioning(true);

      var complete = function complete() ***REMOVED***
        $(_this._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).addClass(ClassName.SHOW);
        _this._element.style[dimension] = '';

        _this.setTransitioning(false);

        $(_this._element).trigger(Event.SHOWN);
  ***REMOVED***;

      if (!Util.supportsTransitionEnd()) ***REMOVED***
        complete();
        return;
  ***REMOVED***

      var capitalizedDimension = dimension[0].toUpperCase() + dimension.slice(1);
      var scrollSize = "scroll" + capitalizedDimension;
      $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
      this._element.style[dimension] = this._element[scrollSize] + "px";
***REMOVED***;

    _proto.hide = function hide() ***REMOVED***
      var _this2 = this;

      if (this._isTransitioning || !$(this._element).hasClass(ClassName.SHOW)) ***REMOVED***
        return;
  ***REMOVED***

      var startEvent = $.Event(Event.HIDE);
      $(this._element).trigger(startEvent);

      if (startEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      var dimension = this._getDimension();

      this._element.style[dimension] = this._element.getBoundingClientRect()[dimension] + "px";
      Util.reflow(this._element);
      $(this._element).addClass(ClassName.COLLAPSING).removeClass(ClassName.COLLAPSE).removeClass(ClassName.SHOW);

      if (this._triggerArray.length) ***REMOVED***
        for (var i = 0; i < this._triggerArray.length; i++) ***REMOVED***
          var trigger = this._triggerArray[i];
          var selector = Util.getSelectorFromElement(trigger);

          if (selector !== null) ***REMOVED***
            var $elem = $(selector);

            if (!$elem.hasClass(ClassName.SHOW)) ***REMOVED***
              $(trigger).addClass(ClassName.COLLAPSED).attr('aria-expanded', false);
        ***REMOVED***
      ***REMOVED***
    ***REMOVED***
  ***REMOVED***

      this.setTransitioning(true);

      var complete = function complete() ***REMOVED***
        _this2.setTransitioning(false);

        $(_this2._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).trigger(Event.HIDDEN);
  ***REMOVED***;

      this._element.style[dimension] = '';

      if (!Util.supportsTransitionEnd()) ***REMOVED***
        complete();
        return;
  ***REMOVED***

      $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
***REMOVED***;

    _proto.setTransitioning = function setTransitioning(isTransitioning) ***REMOVED***
      this._isTransitioning = isTransitioning;
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      this._config = null;
      this._parent = null;
      this._element = null;
      this._triggerArray = null;
      this._isTransitioning = null;
***REMOVED***; // private


    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, Default, config);
      config.toggle = Boolean(config.toggle); // coerce string values

      Util.typeCheckConfig(NAME, config, DefaultType);
      return config;
***REMOVED***;

    _proto._getDimension = function _getDimension() ***REMOVED***
      var hasWidth = $(this._element).hasClass(Dimension.WIDTH);
      return hasWidth ? Dimension.WIDTH : Dimension.HEIGHT;
***REMOVED***;

    _proto._getParent = function _getParent() ***REMOVED***
      var _this3 = this;

      var parent = null;

      if (Util.isElement(this._config.parent)) ***REMOVED***
        parent = this._config.parent; // it's a jQuery object

        if (typeof this._config.parent.jquery !== 'undefined') ***REMOVED***
          parent = this._config.parent[0];
    ***REMOVED***
  ***REMOVED*** else ***REMOVED***
        parent = $(this._config.parent)[0];
  ***REMOVED***

      var selector = "[data-toggle=\"collapse\"][data-parent=\"" + this._config.parent + "\"]";
      $(parent).find(selector).each(function (i, element) ***REMOVED***
        _this3._addAriaAndCollapsedClass(Collapse._getTargetFromElement(element), [element]);
  ***REMOVED***);
      return parent;
***REMOVED***;

    _proto._addAriaAndCollapsedClass = function _addAriaAndCollapsedClass(element, triggerArray) ***REMOVED***
      if (element) ***REMOVED***
        var isOpen = $(element).hasClass(ClassName.SHOW);

        if (triggerArray.length) ***REMOVED***
          $(triggerArray).toggleClass(ClassName.COLLAPSED, !isOpen).attr('aria-expanded', isOpen);
    ***REMOVED***
  ***REMOVED***
***REMOVED***; // static


    Collapse._getTargetFromElement = function _getTargetFromElement(element) ***REMOVED***
      var selector = Util.getSelectorFromElement(element);
      return selector ? $(selector)[0] : null;
***REMOVED***;

    Collapse._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var $this = $(this);
        var data = $this.data(DATA_KEY);

        var _config = $.extend(***REMOVED******REMOVED***, Default, $this.data(), typeof config === 'object' && config);

        if (!data && _config.toggle && /show|hide/.test(config)) ***REMOVED***
          _config.toggle = false;
    ***REMOVED***

        if (!data) ***REMOVED***
          data = new Collapse(this, _config);
          $this.data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Collapse, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***]);
    return Collapse;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) ***REMOVED***
    // preventDefault only for <a> elements (which change the URL) not inside the collapsible element
    if (event.currentTarget.tagName === 'A') ***REMOVED***
      event.preventDefault();
***REMOVED***

    var $trigger = $(this);
    var selector = Util.getSelectorFromElement(this);
    $(selector).each(function () ***REMOVED***
      var $target = $(this);
      var data = $target.data(DATA_KEY);
      var config = data ? 'toggle' : $trigger.data();

      Collapse._jQueryInterface.call($target, config);
***REMOVED***);
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Collapse._jQueryInterface;
  $.fn[NAME].Constructor = Collapse;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Collapse._jQueryInterface;
  ***REMOVED***;

  return Collapse;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): dropdown.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Dropdown = function () ***REMOVED***
  /**
   * Check for Popper dependency
   * Popper - https://popper.js.org
   */
  if (typeof Popper === 'undefined') ***REMOVED***
    throw new Error('Bootstrap dropdown require Popper.js (https://popper.js.org)');
  ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */


  var NAME = 'dropdown';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.dropdown';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var ESCAPE_KEYCODE = 27; // KeyboardEvent.which value for Escape (Esc) key

  var SPACE_KEYCODE = 32; // KeyboardEvent.which value for space key

  var TAB_KEYCODE = 9; // KeyboardEvent.which value for tab key

  var ARROW_UP_KEYCODE = 38; // KeyboardEvent.which value for up arrow key

  var ARROW_DOWN_KEYCODE = 40; // KeyboardEvent.which value for down arrow key

  var RIGHT_MOUSE_BUTTON_WHICH = 3; // MouseEvent.which value for the right button (assuming a right-handed mouse)

  var REGEXP_KEYDOWN = new RegExp(ARROW_UP_KEYCODE + "|" + ARROW_DOWN_KEYCODE + "|" + ESCAPE_KEYCODE);
  var Event = ***REMOVED***
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    CLICK: "click" + EVENT_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY,
    KEYDOWN_DATA_API: "keydown" + EVENT_KEY + DATA_API_KEY,
    KEYUP_DATA_API: "keyup" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    DISABLED: 'disabled',
    SHOW: 'show',
    DROPUP: 'dropup',
    MENURIGHT: 'dropdown-menu-right',
    MENULEFT: 'dropdown-menu-left'
  ***REMOVED***;
  var Selector = ***REMOVED***
    DATA_TOGGLE: '[data-toggle="dropdown"]',
    FORM_CHILD: '.dropdown form',
    MENU: '.dropdown-menu',
    NAVBAR_NAV: '.navbar-nav',
    VISIBLE_ITEMS: '.dropdown-menu .dropdown-item:not(.disabled)'
  ***REMOVED***;
  var AttachmentMap = ***REMOVED***
    TOP: 'top-start',
    TOPEND: 'top-end',
    BOTTOM: 'bottom-start',
    BOTTOMEND: 'bottom-end'
  ***REMOVED***;
  var Default = ***REMOVED***
    offset: 0,
    flip: true
  ***REMOVED***;
  var DefaultType = ***REMOVED***
    offset: '(number|string|function)',
    flip: 'boolean'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Dropdown =
  /*#__PURE__*/
  function () ***REMOVED***
    function Dropdown(element, config) ***REMOVED***
      this._element = element;
      this._popper = null;
      this._config = this._getConfig(config);
      this._menu = this._getMenuElement();
      this._inNavbar = this._detectNavbar();

      this._addEventListeners();
***REMOVED*** // getters


    var _proto = Dropdown.prototype;

    // public
    _proto.toggle = function toggle() ***REMOVED***
      if (this._element.disabled || $(this._element).hasClass(ClassName.DISABLED)) ***REMOVED***
        return;
  ***REMOVED***

      var parent = Dropdown._getParentFromElement(this._element);

      var isActive = $(this._menu).hasClass(ClassName.SHOW);

      Dropdown._clearMenus();

      if (isActive) ***REMOVED***
        return;
  ***REMOVED***

      var relatedTarget = ***REMOVED***
        relatedTarget: this._element
  ***REMOVED***;
      var showEvent = $.Event(Event.SHOW, relatedTarget);
      $(parent).trigger(showEvent);

      if (showEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      var element = this._element; // for dropup with alignment we use the parent as popper container

      if ($(parent).hasClass(ClassName.DROPUP)) ***REMOVED***
        if ($(this._menu).hasClass(ClassName.MENULEFT) || $(this._menu).hasClass(ClassName.MENURIGHT)) ***REMOVED***
          element = parent;
    ***REMOVED***
  ***REMOVED***

      this._popper = new Popper(element, this._menu, this._getPopperConfig()); // if this is a touch-enabled device we add extra
      // empty mouseover listeners to the body's immediate children;
      // only needed because of broken event delegation on iOS
      // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html

      if ('ontouchstart' in document.documentElement && !$(parent).closest(Selector.NAVBAR_NAV).length) ***REMOVED***
        $('body').children().on('mouseover', null, $.noop);
  ***REMOVED***

      this._element.focus();

      this._element.setAttribute('aria-expanded', true);

      $(this._menu).toggleClass(ClassName.SHOW);
      $(parent).toggleClass(ClassName.SHOW).trigger($.Event(Event.SHOWN, relatedTarget));
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      $(this._element).off(EVENT_KEY);
      this._element = null;
      this._menu = null;

      if (this._popper !== null) ***REMOVED***
        this._popper.destroy();
  ***REMOVED***

      this._popper = null;
***REMOVED***;

    _proto.update = function update() ***REMOVED***
      this._inNavbar = this._detectNavbar();

      if (this._popper !== null) ***REMOVED***
        this._popper.scheduleUpdate();
  ***REMOVED***
***REMOVED***; // private


    _proto._addEventListeners = function _addEventListeners() ***REMOVED***
      var _this = this;

      $(this._element).on(Event.CLICK, function (event) ***REMOVED***
        event.preventDefault();
        event.stopPropagation();

        _this.toggle();
  ***REMOVED***);
***REMOVED***;

    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, this.constructor.Default, $(this._element).data(), config);
      Util.typeCheckConfig(NAME, config, this.constructor.DefaultType);
      return config;
***REMOVED***;

    _proto._getMenuElement = function _getMenuElement() ***REMOVED***
      if (!this._menu) ***REMOVED***
        var parent = Dropdown._getParentFromElement(this._element);

        this._menu = $(parent).find(Selector.MENU)[0];
  ***REMOVED***

      return this._menu;
***REMOVED***;

    _proto._getPlacement = function _getPlacement() ***REMOVED***
      var $parentDropdown = $(this._element).parent();
      var placement = AttachmentMap.BOTTOM; // Handle dropup

      if ($parentDropdown.hasClass(ClassName.DROPUP)) ***REMOVED***
        placement = AttachmentMap.TOP;

        if ($(this._menu).hasClass(ClassName.MENURIGHT)) ***REMOVED***
          placement = AttachmentMap.TOPEND;
    ***REMOVED***
  ***REMOVED*** else if ($(this._menu).hasClass(ClassName.MENURIGHT)) ***REMOVED***
        placement = AttachmentMap.BOTTOMEND;
  ***REMOVED***

      return placement;
***REMOVED***;

    _proto._detectNavbar = function _detectNavbar() ***REMOVED***
      return $(this._element).closest('.navbar').length > 0;
***REMOVED***;

    _proto._getPopperConfig = function _getPopperConfig() ***REMOVED***
      var _this2 = this;

      var offsetConf = ***REMOVED******REMOVED***;

      if (typeof this._config.offset === 'function') ***REMOVED***
        offsetConf.fn = function (data) ***REMOVED***
          data.offsets = $.extend(***REMOVED******REMOVED***, data.offsets, _this2._config.offset(data.offsets) || ***REMOVED******REMOVED***);
          return data;
    ***REMOVED***;
  ***REMOVED*** else ***REMOVED***
        offsetConf.offset = this._config.offset;
  ***REMOVED***

      var popperConfig = ***REMOVED***
        placement: this._getPlacement(),
        modifiers: ***REMOVED***
          offset: offsetConf,
          flip: ***REMOVED***
            enabled: this._config.flip
      ***REMOVED***
    ***REMOVED*** // Disable Popper.js for Dropdown in Navbar

  ***REMOVED***;

      if (this._inNavbar) ***REMOVED***
        popperConfig.modifiers.applyStyle = ***REMOVED***
          enabled: !this._inNavbar
    ***REMOVED***;
  ***REMOVED***

      return popperConfig;
***REMOVED***; // static


    Dropdown._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = typeof config === 'object' ? config : null;

        if (!data) ***REMOVED***
          data = new Dropdown(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    Dropdown._clearMenus = function _clearMenus(event) ***REMOVED***
      if (event && (event.which === RIGHT_MOUSE_BUTTON_WHICH || event.type === 'keyup' && event.which !== TAB_KEYCODE)) ***REMOVED***
        return;
  ***REMOVED***

      var toggles = $.makeArray($(Selector.DATA_TOGGLE));

      for (var i = 0; i < toggles.length; i++) ***REMOVED***
        var parent = Dropdown._getParentFromElement(toggles[i]);

        var context = $(toggles[i]).data(DATA_KEY);
        var relatedTarget = ***REMOVED***
          relatedTarget: toggles[i]
    ***REMOVED***;

        if (!context) ***REMOVED***
          continue;
    ***REMOVED***

        var dropdownMenu = context._menu;

        if (!$(parent).hasClass(ClassName.SHOW)) ***REMOVED***
          continue;
    ***REMOVED***

        if (event && (event.type === 'click' && /input|textarea/i.test(event.target.tagName) || event.type === 'keyup' && event.which === TAB_KEYCODE) && $.contains(parent, event.target)) ***REMOVED***
          continue;
    ***REMOVED***

        var hideEvent = $.Event(Event.HIDE, relatedTarget);
        $(parent).trigger(hideEvent);

        if (hideEvent.isDefaultPrevented()) ***REMOVED***
          continue;
    ***REMOVED*** // if this is a touch-enabled device we remove the extra
        // empty mouseover listeners we added for iOS support


        if ('ontouchstart' in document.documentElement) ***REMOVED***
          $('body').children().off('mouseover', null, $.noop);
    ***REMOVED***

        toggles[i].setAttribute('aria-expanded', 'false');
        $(dropdownMenu).removeClass(ClassName.SHOW);
        $(parent).removeClass(ClassName.SHOW).trigger($.Event(Event.HIDDEN, relatedTarget));
  ***REMOVED***
***REMOVED***;

    Dropdown._getParentFromElement = function _getParentFromElement(element) ***REMOVED***
      var parent;
      var selector = Util.getSelectorFromElement(element);

      if (selector) ***REMOVED***
        parent = $(selector)[0];
  ***REMOVED***

      return parent || element.parentNode;
***REMOVED***;

    Dropdown._dataApiKeydownHandler = function _dataApiKeydownHandler(event) ***REMOVED***
      if (!REGEXP_KEYDOWN.test(event.which) || /button/i.test(event.target.tagName) && event.which === SPACE_KEYCODE || /input|textarea/i.test(event.target.tagName)) ***REMOVED***
        return;
  ***REMOVED***

      event.preventDefault();
      event.stopPropagation();

      if (this.disabled || $(this).hasClass(ClassName.DISABLED)) ***REMOVED***
        return;
  ***REMOVED***

      var parent = Dropdown._getParentFromElement(this);

      var isActive = $(parent).hasClass(ClassName.SHOW);

      if (!isActive && (event.which !== ESCAPE_KEYCODE || event.which !== SPACE_KEYCODE) || isActive && (event.which === ESCAPE_KEYCODE || event.which === SPACE_KEYCODE)) ***REMOVED***
        if (event.which === ESCAPE_KEYCODE) ***REMOVED***
          var toggle = $(parent).find(Selector.DATA_TOGGLE)[0];
          $(toggle).trigger('focus');
    ***REMOVED***

        $(this).trigger('click');
        return;
  ***REMOVED***

      var items = $(parent).find(Selector.VISIBLE_ITEMS).get();

      if (!items.length) ***REMOVED***
        return;
  ***REMOVED***

      var index = items.indexOf(event.target);

      if (event.which === ARROW_UP_KEYCODE && index > 0) ***REMOVED***
        // up
        index--;
  ***REMOVED***

      if (event.which === ARROW_DOWN_KEYCODE && index < items.length - 1) ***REMOVED***
        // down
        index++;
  ***REMOVED***

      if (index < 0) ***REMOVED***
        index = 0;
  ***REMOVED***

      items[index].focus();
***REMOVED***;

    createClass(Dropdown, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "DefaultType",
      get: function get() ***REMOVED***
        return DefaultType;
  ***REMOVED***
***REMOVED***]);
    return Dropdown;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.KEYDOWN_DATA_API, Selector.DATA_TOGGLE, Dropdown._dataApiKeydownHandler).on(Event.KEYDOWN_DATA_API, Selector.MENU, Dropdown._dataApiKeydownHandler).on(Event.CLICK_DATA_API + " " + Event.KEYUP_DATA_API, Dropdown._clearMenus).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) ***REMOVED***
    event.preventDefault();
    event.stopPropagation();

    Dropdown._jQueryInterface.call($(this), 'toggle');
  ***REMOVED***).on(Event.CLICK_DATA_API, Selector.FORM_CHILD, function (e) ***REMOVED***
    e.stopPropagation();
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Dropdown._jQueryInterface;
  $.fn[NAME].Constructor = Dropdown;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Dropdown._jQueryInterface;
  ***REMOVED***;

  return Dropdown;
***REMOVED***($, Popper);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): modal.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Modal = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'modal';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.modal';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 300;
  var BACKDROP_TRANSITION_DURATION = 150;
  var ESCAPE_KEYCODE = 27; // KeyboardEvent.which value for Escape (Esc) key

  var Default = ***REMOVED***
    backdrop: true,
    keyboard: true,
    focus: true,
    show: true
  ***REMOVED***;
  var DefaultType = ***REMOVED***
    backdrop: '(boolean|string)',
    keyboard: 'boolean',
    focus: 'boolean',
    show: 'boolean'
  ***REMOVED***;
  var Event = ***REMOVED***
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    FOCUSIN: "focusin" + EVENT_KEY,
    RESIZE: "resize" + EVENT_KEY,
    CLICK_DISMISS: "click.dismiss" + EVENT_KEY,
    KEYDOWN_DISMISS: "keydown.dismiss" + EVENT_KEY,
    MOUSEUP_DISMISS: "mouseup.dismiss" + EVENT_KEY,
    MOUSEDOWN_DISMISS: "mousedown.dismiss" + EVENT_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    SCROLLBAR_MEASURER: 'modal-scrollbar-measure',
    BACKDROP: 'modal-backdrop',
    OPEN: 'modal-open',
    FADE: 'fade',
    SHOW: 'show'
  ***REMOVED***;
  var Selector = ***REMOVED***
    DIALOG: '.modal-dialog',
    DATA_TOGGLE: '[data-toggle="modal"]',
    DATA_DISMISS: '[data-dismiss="modal"]',
    FIXED_CONTENT: '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top',
    STICKY_CONTENT: '.sticky-top',
    NAVBAR_TOGGLER: '.navbar-toggler'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Modal =
  /*#__PURE__*/
  function () ***REMOVED***
    function Modal(element, config) ***REMOVED***
      this._config = this._getConfig(config);
      this._element = element;
      this._dialog = $(element).find(Selector.DIALOG)[0];
      this._backdrop = null;
      this._isShown = false;
      this._isBodyOverflowing = false;
      this._ignoreBackdropClick = false;
      this._originalBodyPadding = 0;
      this._scrollbarWidth = 0;
***REMOVED*** // getters


    var _proto = Modal.prototype;

    // public
    _proto.toggle = function toggle(relatedTarget) ***REMOVED***
      return this._isShown ? this.hide() : this.show(relatedTarget);
***REMOVED***;

    _proto.show = function show(relatedTarget) ***REMOVED***
      var _this = this;

      if (this._isTransitioning || this._isShown) ***REMOVED***
        return;
  ***REMOVED***

      if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE)) ***REMOVED***
        this._isTransitioning = true;
  ***REMOVED***

      var showEvent = $.Event(Event.SHOW, ***REMOVED***
        relatedTarget: relatedTarget
  ***REMOVED***);
      $(this._element).trigger(showEvent);

      if (this._isShown || showEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      this._isShown = true;

      this._checkScrollbar();

      this._setScrollbar();

      this._adjustDialog();

      $(document.body).addClass(ClassName.OPEN);

      this._setEscapeEvent();

      this._setResizeEvent();

      $(this._element).on(Event.CLICK_DISMISS, Selector.DATA_DISMISS, function (event) ***REMOVED***
        return _this.hide(event);
  ***REMOVED***);
      $(this._dialog).on(Event.MOUSEDOWN_DISMISS, function () ***REMOVED***
        $(_this._element).one(Event.MOUSEUP_DISMISS, function (event) ***REMOVED***
          if ($(event.target).is(_this._element)) ***REMOVED***
            _this._ignoreBackdropClick = true;
      ***REMOVED***
    ***REMOVED***);
  ***REMOVED***);

      this._showBackdrop(function () ***REMOVED***
        return _this._showElement(relatedTarget);
  ***REMOVED***);
***REMOVED***;

    _proto.hide = function hide(event) ***REMOVED***
      var _this2 = this;

      if (event) ***REMOVED***
        event.preventDefault();
  ***REMOVED***

      if (this._isTransitioning || !this._isShown) ***REMOVED***
        return;
  ***REMOVED***

      var hideEvent = $.Event(Event.HIDE);
      $(this._element).trigger(hideEvent);

      if (!this._isShown || hideEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      this._isShown = false;
      var transition = Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE);

      if (transition) ***REMOVED***
        this._isTransitioning = true;
  ***REMOVED***

      this._setEscapeEvent();

      this._setResizeEvent();

      $(document).off(Event.FOCUSIN);
      $(this._element).removeClass(ClassName.SHOW);
      $(this._element).off(Event.CLICK_DISMISS);
      $(this._dialog).off(Event.MOUSEDOWN_DISMISS);

      if (transition) ***REMOVED***
        $(this._element).one(Util.TRANSITION_END, function (event) ***REMOVED***
          return _this2._hideModal(event);
    ***REMOVED***).emulateTransitionEnd(TRANSITION_DURATION);
  ***REMOVED*** else ***REMOVED***
        this._hideModal();
  ***REMOVED***
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      $(window, document, this._element, this._backdrop).off(EVENT_KEY);
      this._config = null;
      this._element = null;
      this._dialog = null;
      this._backdrop = null;
      this._isShown = null;
      this._isBodyOverflowing = null;
      this._ignoreBackdropClick = null;
      this._scrollbarWidth = null;
***REMOVED***;

    _proto.handleUpdate = function handleUpdate() ***REMOVED***
      this._adjustDialog();
***REMOVED***; // private


    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, Default, config);
      Util.typeCheckConfig(NAME, config, DefaultType);
      return config;
***REMOVED***;

    _proto._showElement = function _showElement(relatedTarget) ***REMOVED***
      var _this3 = this;

      var transition = Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE);

      if (!this._element.parentNode || this._element.parentNode.nodeType !== Node.ELEMENT_NODE) ***REMOVED***
        // don't move modals dom position
        document.body.appendChild(this._element);
  ***REMOVED***

      this._element.style.display = 'block';

      this._element.removeAttribute('aria-hidden');

      this._element.scrollTop = 0;

      if (transition) ***REMOVED***
        Util.reflow(this._element);
  ***REMOVED***

      $(this._element).addClass(ClassName.SHOW);

      if (this._config.focus) ***REMOVED***
        this._enforceFocus();
  ***REMOVED***

      var shownEvent = $.Event(Event.SHOWN, ***REMOVED***
        relatedTarget: relatedTarget
  ***REMOVED***);

      var transitionComplete = function transitionComplete() ***REMOVED***
        if (_this3._config.focus) ***REMOVED***
          _this3._element.focus();
    ***REMOVED***

        _this3._isTransitioning = false;
        $(_this3._element).trigger(shownEvent);
  ***REMOVED***;

      if (transition) ***REMOVED***
        $(this._dialog).one(Util.TRANSITION_END, transitionComplete).emulateTransitionEnd(TRANSITION_DURATION);
  ***REMOVED*** else ***REMOVED***
        transitionComplete();
  ***REMOVED***
***REMOVED***;

    _proto._enforceFocus = function _enforceFocus() ***REMOVED***
      var _this4 = this;

      $(document).off(Event.FOCUSIN) // guard against infinite focus loop
      .on(Event.FOCUSIN, function (event) ***REMOVED***
        if (document !== event.target && _this4._element !== event.target && !$(_this4._element).has(event.target).length) ***REMOVED***
          _this4._element.focus();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    _proto._setEscapeEvent = function _setEscapeEvent() ***REMOVED***
      var _this5 = this;

      if (this._isShown && this._config.keyboard) ***REMOVED***
        $(this._element).on(Event.KEYDOWN_DISMISS, function (event) ***REMOVED***
          if (event.which === ESCAPE_KEYCODE) ***REMOVED***
            event.preventDefault();

            _this5.hide();
      ***REMOVED***
    ***REMOVED***);
  ***REMOVED*** else if (!this._isShown) ***REMOVED***
        $(this._element).off(Event.KEYDOWN_DISMISS);
  ***REMOVED***
***REMOVED***;

    _proto._setResizeEvent = function _setResizeEvent() ***REMOVED***
      var _this6 = this;

      if (this._isShown) ***REMOVED***
        $(window).on(Event.RESIZE, function (event) ***REMOVED***
          return _this6.handleUpdate(event);
    ***REMOVED***);
  ***REMOVED*** else ***REMOVED***
        $(window).off(Event.RESIZE);
  ***REMOVED***
***REMOVED***;

    _proto._hideModal = function _hideModal() ***REMOVED***
      var _this7 = this;

      this._element.style.display = 'none';

      this._element.setAttribute('aria-hidden', true);

      this._isTransitioning = false;

      this._showBackdrop(function () ***REMOVED***
        $(document.body).removeClass(ClassName.OPEN);

        _this7._resetAdjustments();

        _this7._resetScrollbar();

        $(_this7._element).trigger(Event.HIDDEN);
  ***REMOVED***);
***REMOVED***;

    _proto._removeBackdrop = function _removeBackdrop() ***REMOVED***
      if (this._backdrop) ***REMOVED***
        $(this._backdrop).remove();
        this._backdrop = null;
  ***REMOVED***
***REMOVED***;

    _proto._showBackdrop = function _showBackdrop(callback) ***REMOVED***
      var _this8 = this;

      var animate = $(this._element).hasClass(ClassName.FADE) ? ClassName.FADE : '';

      if (this._isShown && this._config.backdrop) ***REMOVED***
        var doAnimate = Util.supportsTransitionEnd() && animate;
        this._backdrop = document.createElement('div');
        this._backdrop.className = ClassName.BACKDROP;

        if (animate) ***REMOVED***
          $(this._backdrop).addClass(animate);
    ***REMOVED***

        $(this._backdrop).appendTo(document.body);
        $(this._element).on(Event.CLICK_DISMISS, function (event) ***REMOVED***
          if (_this8._ignoreBackdropClick) ***REMOVED***
            _this8._ignoreBackdropClick = false;
            return;
      ***REMOVED***

          if (event.target !== event.currentTarget) ***REMOVED***
            return;
      ***REMOVED***

          if (_this8._config.backdrop === 'static') ***REMOVED***
            _this8._element.focus();
      ***REMOVED*** else ***REMOVED***
            _this8.hide();
      ***REMOVED***
    ***REMOVED***);

        if (doAnimate) ***REMOVED***
          Util.reflow(this._backdrop);
    ***REMOVED***

        $(this._backdrop).addClass(ClassName.SHOW);

        if (!callback) ***REMOVED***
          return;
    ***REMOVED***

        if (!doAnimate) ***REMOVED***
          callback();
          return;
    ***REMOVED***

        $(this._backdrop).one(Util.TRANSITION_END, callback).emulateTransitionEnd(BACKDROP_TRANSITION_DURATION);
  ***REMOVED*** else if (!this._isShown && this._backdrop) ***REMOVED***
        $(this._backdrop).removeClass(ClassName.SHOW);

        var callbackRemove = function callbackRemove() ***REMOVED***
          _this8._removeBackdrop();

          if (callback) ***REMOVED***
            callback();
      ***REMOVED***
    ***REMOVED***;

        if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE)) ***REMOVED***
          $(this._backdrop).one(Util.TRANSITION_END, callbackRemove).emulateTransitionEnd(BACKDROP_TRANSITION_DURATION);
    ***REMOVED*** else ***REMOVED***
          callbackRemove();
    ***REMOVED***
  ***REMOVED*** else if (callback) ***REMOVED***
        callback();
  ***REMOVED***
***REMOVED***; // ----------------------------------------------------------------------
    // the following methods are used to handle overflowing modals
    // todo (fat): these should probably be refactored out of modal.js
    // ----------------------------------------------------------------------


    _proto._adjustDialog = function _adjustDialog() ***REMOVED***
      var isModalOverflowing = this._element.scrollHeight > document.documentElement.clientHeight;

      if (!this._isBodyOverflowing && isModalOverflowing) ***REMOVED***
        this._element.style.paddingLeft = this._scrollbarWidth + "px";
  ***REMOVED***

      if (this._isBodyOverflowing && !isModalOverflowing) ***REMOVED***
        this._element.style.paddingRight = this._scrollbarWidth + "px";
  ***REMOVED***
***REMOVED***;

    _proto._resetAdjustments = function _resetAdjustments() ***REMOVED***
      this._element.style.paddingLeft = '';
      this._element.style.paddingRight = '';
***REMOVED***;

    _proto._checkScrollbar = function _checkScrollbar() ***REMOVED***
      var rect = document.body.getBoundingClientRect();
      this._isBodyOverflowing = rect.left + rect.right < window.innerWidth;
      this._scrollbarWidth = this._getScrollbarWidth();
***REMOVED***;

    _proto._setScrollbar = function _setScrollbar() ***REMOVED***
      var _this9 = this;

      if (this._isBodyOverflowing) ***REMOVED***
        // Note: DOMNode.style.paddingRight returns the actual value or '' if not set
        //   while $(DOMNode).css('padding-right') returns the calculated value or 0 if not set
        // Adjust fixed content padding
        $(Selector.FIXED_CONTENT).each(function (index, element) ***REMOVED***
          var actualPadding = $(element)[0].style.paddingRight;
          var calculatedPadding = $(element).css('padding-right');
          $(element).data('padding-right', actualPadding).css('padding-right', parseFloat(calculatedPadding) + _this9._scrollbarWidth + "px");
    ***REMOVED***); // Adjust sticky content margin

        $(Selector.STICKY_CONTENT).each(function (index, element) ***REMOVED***
          var actualMargin = $(element)[0].style.marginRight;
          var calculatedMargin = $(element).css('margin-right');
          $(element).data('margin-right', actualMargin).css('margin-right', parseFloat(calculatedMargin) - _this9._scrollbarWidth + "px");
    ***REMOVED***); // Adjust navbar-toggler margin

        $(Selector.NAVBAR_TOGGLER).each(function (index, element) ***REMOVED***
          var actualMargin = $(element)[0].style.marginRight;
          var calculatedMargin = $(element).css('margin-right');
          $(element).data('margin-right', actualMargin).css('margin-right', parseFloat(calculatedMargin) + _this9._scrollbarWidth + "px");
    ***REMOVED***); // Adjust body padding

        var actualPadding = document.body.style.paddingRight;
        var calculatedPadding = $('body').css('padding-right');
        $('body').data('padding-right', actualPadding).css('padding-right', parseFloat(calculatedPadding) + this._scrollbarWidth + "px");
  ***REMOVED***
***REMOVED***;

    _proto._resetScrollbar = function _resetScrollbar() ***REMOVED***
      // Restore fixed content padding
      $(Selector.FIXED_CONTENT).each(function (index, element) ***REMOVED***
        var padding = $(element).data('padding-right');

        if (typeof padding !== 'undefined') ***REMOVED***
          $(element).css('padding-right', padding).removeData('padding-right');
    ***REMOVED***
  ***REMOVED***); // Restore sticky content and navbar-toggler margin

      $(Selector.STICKY_CONTENT + ", " + Selector.NAVBAR_TOGGLER).each(function (index, element) ***REMOVED***
        var margin = $(element).data('margin-right');

        if (typeof margin !== 'undefined') ***REMOVED***
          $(element).css('margin-right', margin).removeData('margin-right');
    ***REMOVED***
  ***REMOVED***); // Restore body padding

      var padding = $('body').data('padding-right');

      if (typeof padding !== 'undefined') ***REMOVED***
        $('body').css('padding-right', padding).removeData('padding-right');
  ***REMOVED***
***REMOVED***;

    _proto._getScrollbarWidth = function _getScrollbarWidth() ***REMOVED***
      // thx d.walsh
      var scrollDiv = document.createElement('div');
      scrollDiv.className = ClassName.SCROLLBAR_MEASURER;
      document.body.appendChild(scrollDiv);
      var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
      document.body.removeChild(scrollDiv);
      return scrollbarWidth;
***REMOVED***; // static


    Modal._jQueryInterface = function _jQueryInterface(config, relatedTarget) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = $.extend(***REMOVED******REMOVED***, Modal.Default, $(this).data(), typeof config === 'object' && config);

        if (!data) ***REMOVED***
          data = new Modal(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config](relatedTarget);
    ***REMOVED*** else if (_config.show) ***REMOVED***
          data.show(relatedTarget);
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Modal, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***]);
    return Modal;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) ***REMOVED***
    var _this10 = this;

    var target;
    var selector = Util.getSelectorFromElement(this);

    if (selector) ***REMOVED***
      target = $(selector)[0];
***REMOVED***

    var config = $(target).data(DATA_KEY) ? 'toggle' : $.extend(***REMOVED******REMOVED***, $(target).data(), $(this).data());

    if (this.tagName === 'A' || this.tagName === 'AREA') ***REMOVED***
      event.preventDefault();
***REMOVED***

    var $target = $(target).one(Event.SHOW, function (showEvent) ***REMOVED***
      if (showEvent.isDefaultPrevented()) ***REMOVED***
        // only register focus restorer if modal will actually get shown
        return;
  ***REMOVED***

      $target.one(Event.HIDDEN, function () ***REMOVED***
        if ($(_this10).is(':visible')) ***REMOVED***
          _this10.focus();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***);

    Modal._jQueryInterface.call($(target), config, this);
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Modal._jQueryInterface;
  $.fn[NAME].Constructor = Modal;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Modal._jQueryInterface;
  ***REMOVED***;

  return Modal;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): tooltip.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Tooltip = function () ***REMOVED***
  /**
   * Check for Popper dependency
   * Popper - https://popper.js.org
   */
  if (typeof Popper === 'undefined') ***REMOVED***
    throw new Error('Bootstrap tooltips require Popper.js (https://popper.js.org)');
  ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */


  var NAME = 'tooltip';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.tooltip';
  var EVENT_KEY = "." + DATA_KEY;
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 150;
  var CLASS_PREFIX = 'bs-tooltip';
  var BSCLS_PREFIX_REGEX = new RegExp("(^|\\s)" + CLASS_PREFIX + "\\S+", 'g');
  var DefaultType = ***REMOVED***
    animation: 'boolean',
    template: 'string',
    title: '(string|element|function)',
    trigger: 'string',
    delay: '(number|object)',
    html: 'boolean',
    selector: '(string|boolean)',
    placement: '(string|function)',
    offset: '(number|string)',
    container: '(string|element|boolean)',
    fallbackPlacement: '(string|array)'
  ***REMOVED***;
  var AttachmentMap = ***REMOVED***
    AUTO: 'auto',
    TOP: 'top',
    RIGHT: 'right',
    BOTTOM: 'bottom',
    LEFT: 'left'
  ***REMOVED***;
  var Default = ***REMOVED***
    animation: true,
    template: '<div class="tooltip" role="tooltip">' + '<div class="arrow"></div>' + '<div class="tooltip-inner"></div></div>',
    trigger: 'hover focus',
    title: '',
    delay: 0,
    html: false,
    selector: false,
    placement: 'top',
    offset: 0,
    container: false,
    fallbackPlacement: 'flip'
  ***REMOVED***;
  var HoverState = ***REMOVED***
    SHOW: 'show',
    OUT: 'out'
  ***REMOVED***;
  var Event = ***REMOVED***
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    INSERTED: "inserted" + EVENT_KEY,
    CLICK: "click" + EVENT_KEY,
    FOCUSIN: "focusin" + EVENT_KEY,
    FOCUSOUT: "focusout" + EVENT_KEY,
    MOUSEENTER: "mouseenter" + EVENT_KEY,
    MOUSELEAVE: "mouseleave" + EVENT_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    FADE: 'fade',
    SHOW: 'show'
  ***REMOVED***;
  var Selector = ***REMOVED***
    TOOLTIP: '.tooltip',
    TOOLTIP_INNER: '.tooltip-inner',
    ARROW: '.arrow'
  ***REMOVED***;
  var Trigger = ***REMOVED***
    HOVER: 'hover',
    FOCUS: 'focus',
    CLICK: 'click',
    MANUAL: 'manual'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Tooltip =
  /*#__PURE__*/
  function () ***REMOVED***
    function Tooltip(element, config) ***REMOVED***
      // private
      this._isEnabled = true;
      this._timeout = 0;
      this._hoverState = '';
      this._activeTrigger = ***REMOVED******REMOVED***;
      this._popper = null; // protected

      this.element = element;
      this.config = this._getConfig(config);
      this.tip = null;

      this._setListeners();
***REMOVED*** // getters


    var _proto = Tooltip.prototype;

    // public
    _proto.enable = function enable() ***REMOVED***
      this._isEnabled = true;
***REMOVED***;

    _proto.disable = function disable() ***REMOVED***
      this._isEnabled = false;
***REMOVED***;

    _proto.toggleEnabled = function toggleEnabled() ***REMOVED***
      this._isEnabled = !this._isEnabled;
***REMOVED***;

    _proto.toggle = function toggle(event) ***REMOVED***
      if (!this._isEnabled) ***REMOVED***
        return;
  ***REMOVED***

      if (event) ***REMOVED***
        var dataKey = this.constructor.DATA_KEY;
        var context = $(event.currentTarget).data(dataKey);

        if (!context) ***REMOVED***
          context = new this.constructor(event.currentTarget, this._getDelegateConfig());
          $(event.currentTarget).data(dataKey, context);
    ***REMOVED***

        context._activeTrigger.click = !context._activeTrigger.click;

        if (context._isWithActiveTrigger()) ***REMOVED***
          context._enter(null, context);
    ***REMOVED*** else ***REMOVED***
          context._leave(null, context);
    ***REMOVED***
  ***REMOVED*** else ***REMOVED***
        if ($(this.getTipElement()).hasClass(ClassName.SHOW)) ***REMOVED***
          this._leave(null, this);

          return;
    ***REMOVED***

        this._enter(null, this);
  ***REMOVED***
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      clearTimeout(this._timeout);
      $.removeData(this.element, this.constructor.DATA_KEY);
      $(this.element).off(this.constructor.EVENT_KEY);
      $(this.element).closest('.modal').off('hide.bs.modal');

      if (this.tip) ***REMOVED***
        $(this.tip).remove();
  ***REMOVED***

      this._isEnabled = null;
      this._timeout = null;
      this._hoverState = null;
      this._activeTrigger = null;

      if (this._popper !== null) ***REMOVED***
        this._popper.destroy();
  ***REMOVED***

      this._popper = null;
      this.element = null;
      this.config = null;
      this.tip = null;
***REMOVED***;

    _proto.show = function show() ***REMOVED***
      var _this = this;

      if ($(this.element).css('display') === 'none') ***REMOVED***
        throw new Error('Please use show on visible elements');
  ***REMOVED***

      var showEvent = $.Event(this.constructor.Event.SHOW);

      if (this.isWithContent() && this._isEnabled) ***REMOVED***
        $(this.element).trigger(showEvent);
        var isInTheDom = $.contains(this.element.ownerDocument.documentElement, this.element);

        if (showEvent.isDefaultPrevented() || !isInTheDom) ***REMOVED***
          return;
    ***REMOVED***

        var tip = this.getTipElement();
        var tipId = Util.getUID(this.constructor.NAME);
        tip.setAttribute('id', tipId);
        this.element.setAttribute('aria-describedby', tipId);
        this.setContent();

        if (this.config.animation) ***REMOVED***
          $(tip).addClass(ClassName.FADE);
    ***REMOVED***

        var placement = typeof this.config.placement === 'function' ? this.config.placement.call(this, tip, this.element) : this.config.placement;

        var attachment = this._getAttachment(placement);

        this.addAttachmentClass(attachment);
        var container = this.config.container === false ? document.body : $(this.config.container);
        $(tip).data(this.constructor.DATA_KEY, this);

        if (!$.contains(this.element.ownerDocument.documentElement, this.tip)) ***REMOVED***
          $(tip).appendTo(container);
    ***REMOVED***

        $(this.element).trigger(this.constructor.Event.INSERTED);
        this._popper = new Popper(this.element, tip, ***REMOVED***
          placement: attachment,
          modifiers: ***REMOVED***
            offset: ***REMOVED***
              offset: this.config.offset
        ***REMOVED***,
            flip: ***REMOVED***
              behavior: this.config.fallbackPlacement
        ***REMOVED***,
            arrow: ***REMOVED***
              element: Selector.ARROW
        ***REMOVED***
      ***REMOVED***,
          onCreate: function onCreate(data) ***REMOVED***
            if (data.originalPlacement !== data.placement) ***REMOVED***
              _this._handlePopperPlacementChange(data);
        ***REMOVED***
      ***REMOVED***,
          onUpdate: function onUpdate(data) ***REMOVED***
            _this._handlePopperPlacementChange(data);
      ***REMOVED***
    ***REMOVED***);
        $(tip).addClass(ClassName.SHOW); // if this is a touch-enabled device we add extra
        // empty mouseover listeners to the body's immediate children;
        // only needed because of broken event delegation on iOS
        // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html

        if ('ontouchstart' in document.documentElement) ***REMOVED***
          $('body').children().on('mouseover', null, $.noop);
    ***REMOVED***

        var complete = function complete() ***REMOVED***
          if (_this.config.animation) ***REMOVED***
            _this._fixTransition();
      ***REMOVED***

          var prevHoverState = _this._hoverState;
          _this._hoverState = null;
          $(_this.element).trigger(_this.constructor.Event.SHOWN);

          if (prevHoverState === HoverState.OUT) ***REMOVED***
            _this._leave(null, _this);
      ***REMOVED***
    ***REMOVED***;

        if (Util.supportsTransitionEnd() && $(this.tip).hasClass(ClassName.FADE)) ***REMOVED***
          $(this.tip).one(Util.TRANSITION_END, complete).emulateTransitionEnd(Tooltip._TRANSITION_DURATION);
    ***REMOVED*** else ***REMOVED***
          complete();
    ***REMOVED***
  ***REMOVED***
***REMOVED***;

    _proto.hide = function hide(callback) ***REMOVED***
      var _this2 = this;

      var tip = this.getTipElement();
      var hideEvent = $.Event(this.constructor.Event.HIDE);

      var complete = function complete() ***REMOVED***
        if (_this2._hoverState !== HoverState.SHOW && tip.parentNode) ***REMOVED***
          tip.parentNode.removeChild(tip);
    ***REMOVED***

        _this2._cleanTipClass();

        _this2.element.removeAttribute('aria-describedby');

        $(_this2.element).trigger(_this2.constructor.Event.HIDDEN);

        if (_this2._popper !== null) ***REMOVED***
          _this2._popper.destroy();
    ***REMOVED***

        if (callback) ***REMOVED***
          callback();
    ***REMOVED***
  ***REMOVED***;

      $(this.element).trigger(hideEvent);

      if (hideEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      $(tip).removeClass(ClassName.SHOW); // if this is a touch-enabled device we remove the extra
      // empty mouseover listeners we added for iOS support

      if ('ontouchstart' in document.documentElement) ***REMOVED***
        $('body').children().off('mouseover', null, $.noop);
  ***REMOVED***

      this._activeTrigger[Trigger.CLICK] = false;
      this._activeTrigger[Trigger.FOCUS] = false;
      this._activeTrigger[Trigger.HOVER] = false;

      if (Util.supportsTransitionEnd() && $(this.tip).hasClass(ClassName.FADE)) ***REMOVED***
        $(tip).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
  ***REMOVED*** else ***REMOVED***
        complete();
  ***REMOVED***

      this._hoverState = '';
***REMOVED***;

    _proto.update = function update() ***REMOVED***
      if (this._popper !== null) ***REMOVED***
        this._popper.scheduleUpdate();
  ***REMOVED***
***REMOVED***; // protected


    _proto.isWithContent = function isWithContent() ***REMOVED***
      return Boolean(this.getTitle());
***REMOVED***;

    _proto.addAttachmentClass = function addAttachmentClass(attachment) ***REMOVED***
      $(this.getTipElement()).addClass(CLASS_PREFIX + "-" + attachment);
***REMOVED***;

    _proto.getTipElement = function getTipElement() ***REMOVED***
      this.tip = this.tip || $(this.config.template)[0];
      return this.tip;
***REMOVED***;

    _proto.setContent = function setContent() ***REMOVED***
      var $tip = $(this.getTipElement());
      this.setElementContent($tip.find(Selector.TOOLTIP_INNER), this.getTitle());
      $tip.removeClass(ClassName.FADE + " " + ClassName.SHOW);
***REMOVED***;

    _proto.setElementContent = function setElementContent($element, content) ***REMOVED***
      var html = this.config.html;

      if (typeof content === 'object' && (content.nodeType || content.jquery)) ***REMOVED***
        // content is a DOM node or a jQuery
        if (html) ***REMOVED***
          if (!$(content).parent().is($element)) ***REMOVED***
            $element.empty().append(content);
      ***REMOVED***
    ***REMOVED*** else ***REMOVED***
          $element.text($(content).text());
    ***REMOVED***
  ***REMOVED*** else ***REMOVED***
        $element[html ? 'html' : 'text'](content);
  ***REMOVED***
***REMOVED***;

    _proto.getTitle = function getTitle() ***REMOVED***
      var title = this.element.getAttribute('data-original-title');

      if (!title) ***REMOVED***
        title = typeof this.config.title === 'function' ? this.config.title.call(this.element) : this.config.title;
  ***REMOVED***

      return title;
***REMOVED***; // private


    _proto._getAttachment = function _getAttachment(placement) ***REMOVED***
      return AttachmentMap[placement.toUpperCase()];
***REMOVED***;

    _proto._setListeners = function _setListeners() ***REMOVED***
      var _this3 = this;

      var triggers = this.config.trigger.split(' ');
      triggers.forEach(function (trigger) ***REMOVED***
        if (trigger === 'click') ***REMOVED***
          $(_this3.element).on(_this3.constructor.Event.CLICK, _this3.config.selector, function (event) ***REMOVED***
            return _this3.toggle(event);
      ***REMOVED***);
    ***REMOVED*** else if (trigger !== Trigger.MANUAL) ***REMOVED***
          var eventIn = trigger === Trigger.HOVER ? _this3.constructor.Event.MOUSEENTER : _this3.constructor.Event.FOCUSIN;
          var eventOut = trigger === Trigger.HOVER ? _this3.constructor.Event.MOUSELEAVE : _this3.constructor.Event.FOCUSOUT;
          $(_this3.element).on(eventIn, _this3.config.selector, function (event) ***REMOVED***
            return _this3._enter(event);
      ***REMOVED***).on(eventOut, _this3.config.selector, function (event) ***REMOVED***
            return _this3._leave(event);
      ***REMOVED***);
    ***REMOVED***

        $(_this3.element).closest('.modal').on('hide.bs.modal', function () ***REMOVED***
          return _this3.hide();
    ***REMOVED***);
  ***REMOVED***);

      if (this.config.selector) ***REMOVED***
        this.config = $.extend(***REMOVED******REMOVED***, this.config, ***REMOVED***
          trigger: 'manual',
          selector: ''
    ***REMOVED***);
  ***REMOVED*** else ***REMOVED***
        this._fixTitle();
  ***REMOVED***
***REMOVED***;

    _proto._fixTitle = function _fixTitle() ***REMOVED***
      var titleType = typeof this.element.getAttribute('data-original-title');

      if (this.element.getAttribute('title') || titleType !== 'string') ***REMOVED***
        this.element.setAttribute('data-original-title', this.element.getAttribute('title') || '');
        this.element.setAttribute('title', '');
  ***REMOVED***
***REMOVED***;

    _proto._enter = function _enter(event, context) ***REMOVED***
      var dataKey = this.constructor.DATA_KEY;
      context = context || $(event.currentTarget).data(dataKey);

      if (!context) ***REMOVED***
        context = new this.constructor(event.currentTarget, this._getDelegateConfig());
        $(event.currentTarget).data(dataKey, context);
  ***REMOVED***

      if (event) ***REMOVED***
        context._activeTrigger[event.type === 'focusin' ? Trigger.FOCUS : Trigger.HOVER] = true;
  ***REMOVED***

      if ($(context.getTipElement()).hasClass(ClassName.SHOW) || context._hoverState === HoverState.SHOW) ***REMOVED***
        context._hoverState = HoverState.SHOW;
        return;
  ***REMOVED***

      clearTimeout(context._timeout);
      context._hoverState = HoverState.SHOW;

      if (!context.config.delay || !context.config.delay.show) ***REMOVED***
        context.show();
        return;
  ***REMOVED***

      context._timeout = setTimeout(function () ***REMOVED***
        if (context._hoverState === HoverState.SHOW) ***REMOVED***
          context.show();
    ***REMOVED***
  ***REMOVED***, context.config.delay.show);
***REMOVED***;

    _proto._leave = function _leave(event, context) ***REMOVED***
      var dataKey = this.constructor.DATA_KEY;
      context = context || $(event.currentTarget).data(dataKey);

      if (!context) ***REMOVED***
        context = new this.constructor(event.currentTarget, this._getDelegateConfig());
        $(event.currentTarget).data(dataKey, context);
  ***REMOVED***

      if (event) ***REMOVED***
        context._activeTrigger[event.type === 'focusout' ? Trigger.FOCUS : Trigger.HOVER] = false;
  ***REMOVED***

      if (context._isWithActiveTrigger()) ***REMOVED***
        return;
  ***REMOVED***

      clearTimeout(context._timeout);
      context._hoverState = HoverState.OUT;

      if (!context.config.delay || !context.config.delay.hide) ***REMOVED***
        context.hide();
        return;
  ***REMOVED***

      context._timeout = setTimeout(function () ***REMOVED***
        if (context._hoverState === HoverState.OUT) ***REMOVED***
          context.hide();
    ***REMOVED***
  ***REMOVED***, context.config.delay.hide);
***REMOVED***;

    _proto._isWithActiveTrigger = function _isWithActiveTrigger() ***REMOVED***
      for (var trigger in this._activeTrigger) ***REMOVED***
        if (this._activeTrigger[trigger]) ***REMOVED***
          return true;
    ***REMOVED***
  ***REMOVED***

      return false;
***REMOVED***;

    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, this.constructor.Default, $(this.element).data(), config);

      if (typeof config.delay === 'number') ***REMOVED***
        config.delay = ***REMOVED***
          show: config.delay,
          hide: config.delay
    ***REMOVED***;
  ***REMOVED***

      if (typeof config.title === 'number') ***REMOVED***
        config.title = config.title.toString();
  ***REMOVED***

      if (typeof config.content === 'number') ***REMOVED***
        config.content = config.content.toString();
  ***REMOVED***

      Util.typeCheckConfig(NAME, config, this.constructor.DefaultType);
      return config;
***REMOVED***;

    _proto._getDelegateConfig = function _getDelegateConfig() ***REMOVED***
      var config = ***REMOVED******REMOVED***;

      if (this.config) ***REMOVED***
        for (var key in this.config) ***REMOVED***
          if (this.constructor.Default[key] !== this.config[key]) ***REMOVED***
            config[key] = this.config[key];
      ***REMOVED***
    ***REMOVED***
  ***REMOVED***

      return config;
***REMOVED***;

    _proto._cleanTipClass = function _cleanTipClass() ***REMOVED***
      var $tip = $(this.getTipElement());
      var tabClass = $tip.attr('class').match(BSCLS_PREFIX_REGEX);

      if (tabClass !== null && tabClass.length > 0) ***REMOVED***
        $tip.removeClass(tabClass.join(''));
  ***REMOVED***
***REMOVED***;

    _proto._handlePopperPlacementChange = function _handlePopperPlacementChange(data) ***REMOVED***
      this._cleanTipClass();

      this.addAttachmentClass(this._getAttachment(data.placement));
***REMOVED***;

    _proto._fixTransition = function _fixTransition() ***REMOVED***
      var tip = this.getTipElement();
      var initConfigAnimation = this.config.animation;

      if (tip.getAttribute('x-placement') !== null) ***REMOVED***
        return;
  ***REMOVED***

      $(tip).removeClass(ClassName.FADE);
      this.config.animation = false;
      this.hide();
      this.show();
      this.config.animation = initConfigAnimation;
***REMOVED***; // static


    Tooltip._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = typeof config === 'object' && config;

        if (!data && /dispose|hide/.test(config)) ***REMOVED***
          return;
    ***REMOVED***

        if (!data) ***REMOVED***
          data = new Tooltip(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Tooltip, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "NAME",
      get: function get() ***REMOVED***
        return NAME;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "DATA_KEY",
      get: function get() ***REMOVED***
        return DATA_KEY;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Event",
      get: function get() ***REMOVED***
        return Event;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "EVENT_KEY",
      get: function get() ***REMOVED***
        return EVENT_KEY;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "DefaultType",
      get: function get() ***REMOVED***
        return DefaultType;
  ***REMOVED***
***REMOVED***]);
    return Tooltip;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */


  $.fn[NAME] = Tooltip._jQueryInterface;
  $.fn[NAME].Constructor = Tooltip;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Tooltip._jQueryInterface;
  ***REMOVED***;

  return Tooltip;
***REMOVED***($, Popper);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): popover.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Popover = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'popover';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.popover';
  var EVENT_KEY = "." + DATA_KEY;
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var CLASS_PREFIX = 'bs-popover';
  var BSCLS_PREFIX_REGEX = new RegExp("(^|\\s)" + CLASS_PREFIX + "\\S+", 'g');
  var Default = $.extend(***REMOVED******REMOVED***, Tooltip.Default, ***REMOVED***
    placement: 'right',
    trigger: 'click',
    content: '',
    template: '<div class="popover" role="tooltip">' + '<div class="arrow"></div>' + '<h3 class="popover-header"></h3>' + '<div class="popover-body"></div></div>'
  ***REMOVED***);
  var DefaultType = $.extend(***REMOVED******REMOVED***, Tooltip.DefaultType, ***REMOVED***
    content: '(string|element|function)'
  ***REMOVED***);
  var ClassName = ***REMOVED***
    FADE: 'fade',
    SHOW: 'show'
  ***REMOVED***;
  var Selector = ***REMOVED***
    TITLE: '.popover-header',
    CONTENT: '.popover-body'
  ***REMOVED***;
  var Event = ***REMOVED***
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    INSERTED: "inserted" + EVENT_KEY,
    CLICK: "click" + EVENT_KEY,
    FOCUSIN: "focusin" + EVENT_KEY,
    FOCUSOUT: "focusout" + EVENT_KEY,
    MOUSEENTER: "mouseenter" + EVENT_KEY,
    MOUSELEAVE: "mouseleave" + EVENT_KEY
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Popover =
  /*#__PURE__*/
  function (_Tooltip) ***REMOVED***
    inheritsLoose(Popover, _Tooltip);

    function Popover() ***REMOVED***
      return _Tooltip.apply(this, arguments) || this;
***REMOVED***

    var _proto = Popover.prototype;

    // overrides
    _proto.isWithContent = function isWithContent() ***REMOVED***
      return this.getTitle() || this._getContent();
***REMOVED***;

    _proto.addAttachmentClass = function addAttachmentClass(attachment) ***REMOVED***
      $(this.getTipElement()).addClass(CLASS_PREFIX + "-" + attachment);
***REMOVED***;

    _proto.getTipElement = function getTipElement() ***REMOVED***
      this.tip = this.tip || $(this.config.template)[0];
      return this.tip;
***REMOVED***;

    _proto.setContent = function setContent() ***REMOVED***
      var $tip = $(this.getTipElement()); // we use append for html objects to maintain js events

      this.setElementContent($tip.find(Selector.TITLE), this.getTitle());
      this.setElementContent($tip.find(Selector.CONTENT), this._getContent());
      $tip.removeClass(ClassName.FADE + " " + ClassName.SHOW);
***REMOVED***; // private


    _proto._getContent = function _getContent() ***REMOVED***
      return this.element.getAttribute('data-content') || (typeof this.config.content === 'function' ? this.config.content.call(this.element) : this.config.content);
***REMOVED***;

    _proto._cleanTipClass = function _cleanTipClass() ***REMOVED***
      var $tip = $(this.getTipElement());
      var tabClass = $tip.attr('class').match(BSCLS_PREFIX_REGEX);

      if (tabClass !== null && tabClass.length > 0) ***REMOVED***
        $tip.removeClass(tabClass.join(''));
  ***REMOVED***
***REMOVED***; // static


    Popover._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = typeof config === 'object' ? config : null;

        if (!data && /destroy|hide/.test(config)) ***REMOVED***
          return;
    ***REMOVED***

        if (!data) ***REMOVED***
          data = new Popover(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Popover, null, [***REMOVED***
      key: "VERSION",
      // getters
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "NAME",
      get: function get() ***REMOVED***
        return NAME;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "DATA_KEY",
      get: function get() ***REMOVED***
        return DATA_KEY;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Event",
      get: function get() ***REMOVED***
        return Event;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "EVENT_KEY",
      get: function get() ***REMOVED***
        return EVENT_KEY;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "DefaultType",
      get: function get() ***REMOVED***
        return DefaultType;
  ***REMOVED***
***REMOVED***]);
    return Popover;
  ***REMOVED***(Tooltip);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */


  $.fn[NAME] = Popover._jQueryInterface;
  $.fn[NAME].Constructor = Popover;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Popover._jQueryInterface;
  ***REMOVED***;

  return Popover;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): scrollspy.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var ScrollSpy = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'scrollspy';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.scrollspy';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Default = ***REMOVED***
    offset: 10,
    method: 'auto',
    target: ''
  ***REMOVED***;
  var DefaultType = ***REMOVED***
    offset: 'number',
    method: 'string',
    target: '(string|element)'
  ***REMOVED***;
  var Event = ***REMOVED***
    ACTIVATE: "activate" + EVENT_KEY,
    SCROLL: "scroll" + EVENT_KEY,
    LOAD_DATA_API: "load" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    DROPDOWN_ITEM: 'dropdown-item',
    DROPDOWN_MENU: 'dropdown-menu',
    ACTIVE: 'active'
  ***REMOVED***;
  var Selector = ***REMOVED***
    DATA_SPY: '[data-spy="scroll"]',
    ACTIVE: '.active',
    NAV_LIST_GROUP: '.nav, .list-group',
    NAV_LINKS: '.nav-link',
    NAV_ITEMS: '.nav-item',
    LIST_ITEMS: '.list-group-item',
    DROPDOWN: '.dropdown',
    DROPDOWN_ITEMS: '.dropdown-item',
    DROPDOWN_TOGGLE: '.dropdown-toggle'
  ***REMOVED***;
  var OffsetMethod = ***REMOVED***
    OFFSET: 'offset',
    POSITION: 'position'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var ScrollSpy =
  /*#__PURE__*/
  function () ***REMOVED***
    function ScrollSpy(element, config) ***REMOVED***
      var _this = this;

      this._element = element;
      this._scrollElement = element.tagName === 'BODY' ? window : element;
      this._config = this._getConfig(config);
      this._selector = this._config.target + " " + Selector.NAV_LINKS + "," + (this._config.target + " " + Selector.LIST_ITEMS + ",") + (this._config.target + " " + Selector.DROPDOWN_ITEMS);
      this._offsets = [];
      this._targets = [];
      this._activeTarget = null;
      this._scrollHeight = 0;
      $(this._scrollElement).on(Event.SCROLL, function (event) ***REMOVED***
        return _this._process(event);
  ***REMOVED***);
      this.refresh();

      this._process();
***REMOVED*** // getters


    var _proto = ScrollSpy.prototype;

    // public
    _proto.refresh = function refresh() ***REMOVED***
      var _this2 = this;

      var autoMethod = this._scrollElement !== this._scrollElement.window ? OffsetMethod.POSITION : OffsetMethod.OFFSET;
      var offsetMethod = this._config.method === 'auto' ? autoMethod : this._config.method;
      var offsetBase = offsetMethod === OffsetMethod.POSITION ? this._getScrollTop() : 0;
      this._offsets = [];
      this._targets = [];
      this._scrollHeight = this._getScrollHeight();
      var targets = $.makeArray($(this._selector));
      targets.map(function (element) ***REMOVED***
        var target;
        var targetSelector = Util.getSelectorFromElement(element);

        if (targetSelector) ***REMOVED***
          target = $(targetSelector)[0];
    ***REMOVED***

        if (target) ***REMOVED***
          var targetBCR = target.getBoundingClientRect();

          if (targetBCR.width || targetBCR.height) ***REMOVED***
            // todo (fat): remove sketch reliance on jQuery position/offset
            return [$(target)[offsetMethod]().top + offsetBase, targetSelector];
      ***REMOVED***
    ***REMOVED***

        return null;
  ***REMOVED***).filter(function (item) ***REMOVED***
        return item;
  ***REMOVED***).sort(function (a, b) ***REMOVED***
        return a[0] - b[0];
  ***REMOVED***).forEach(function (item) ***REMOVED***
        _this2._offsets.push(item[0]);

        _this2._targets.push(item[1]);
  ***REMOVED***);
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      $(this._scrollElement).off(EVENT_KEY);
      this._element = null;
      this._scrollElement = null;
      this._config = null;
      this._selector = null;
      this._offsets = null;
      this._targets = null;
      this._activeTarget = null;
      this._scrollHeight = null;
***REMOVED***; // private


    _proto._getConfig = function _getConfig(config) ***REMOVED***
      config = $.extend(***REMOVED******REMOVED***, Default, config);

      if (typeof config.target !== 'string') ***REMOVED***
        var id = $(config.target).attr('id');

        if (!id) ***REMOVED***
          id = Util.getUID(NAME);
          $(config.target).attr('id', id);
    ***REMOVED***

        config.target = "#" + id;
  ***REMOVED***

      Util.typeCheckConfig(NAME, config, DefaultType);
      return config;
***REMOVED***;

    _proto._getScrollTop = function _getScrollTop() ***REMOVED***
      return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
***REMOVED***;

    _proto._getScrollHeight = function _getScrollHeight() ***REMOVED***
      return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
***REMOVED***;

    _proto._getOffsetHeight = function _getOffsetHeight() ***REMOVED***
      return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
***REMOVED***;

    _proto._process = function _process() ***REMOVED***
      var scrollTop = this._getScrollTop() + this._config.offset;

      var scrollHeight = this._getScrollHeight();

      var maxScroll = this._config.offset + scrollHeight - this._getOffsetHeight();

      if (this._scrollHeight !== scrollHeight) ***REMOVED***
        this.refresh();
  ***REMOVED***

      if (scrollTop >= maxScroll) ***REMOVED***
        var target = this._targets[this._targets.length - 1];

        if (this._activeTarget !== target) ***REMOVED***
          this._activate(target);
    ***REMOVED***

        return;
  ***REMOVED***

      if (this._activeTarget && scrollTop < this._offsets[0] && this._offsets[0] > 0) ***REMOVED***
        this._activeTarget = null;

        this._clear();

        return;
  ***REMOVED***

      for (var i = this._offsets.length; i--;) ***REMOVED***
        var isActiveTarget = this._activeTarget !== this._targets[i] && scrollTop >= this._offsets[i] && (typeof this._offsets[i + 1] === 'undefined' || scrollTop < this._offsets[i + 1]);

        if (isActiveTarget) ***REMOVED***
          this._activate(this._targets[i]);
    ***REMOVED***
  ***REMOVED***
***REMOVED***;

    _proto._activate = function _activate(target) ***REMOVED***
      this._activeTarget = target;

      this._clear();

      var queries = this._selector.split(','); // eslint-disable-next-line arrow-body-style


      queries = queries.map(function (selector) ***REMOVED***
        return selector + "[data-target=\"" + target + "\"]," + (selector + "[href=\"" + target + "\"]");
  ***REMOVED***);
      var $link = $(queries.join(','));

      if ($link.hasClass(ClassName.DROPDOWN_ITEM)) ***REMOVED***
        $link.closest(Selector.DROPDOWN).find(Selector.DROPDOWN_TOGGLE).addClass(ClassName.ACTIVE);
        $link.addClass(ClassName.ACTIVE);
  ***REMOVED*** else ***REMOVED***
        // Set triggered link as active
        $link.addClass(ClassName.ACTIVE); // Set triggered links parents as active
        // With both <ul> and <nav> markup a parent is the previous sibling of any nav ancestor

        $link.parents(Selector.NAV_LIST_GROUP).prev(Selector.NAV_LINKS + ", " + Selector.LIST_ITEMS).addClass(ClassName.ACTIVE); // Handle special case when .nav-link is inside .nav-item

        $link.parents(Selector.NAV_LIST_GROUP).prev(Selector.NAV_ITEMS).children(Selector.NAV_LINKS).addClass(ClassName.ACTIVE);
  ***REMOVED***

      $(this._scrollElement).trigger(Event.ACTIVATE, ***REMOVED***
        relatedTarget: target
  ***REMOVED***);
***REMOVED***;

    _proto._clear = function _clear() ***REMOVED***
      $(this._selector).filter(Selector.ACTIVE).removeClass(ClassName.ACTIVE);
***REMOVED***; // static


    ScrollSpy._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var data = $(this).data(DATA_KEY);

        var _config = typeof config === 'object' && config;

        if (!data) ***REMOVED***
          data = new ScrollSpy(this, _config);
          $(this).data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(ScrollSpy, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***, ***REMOVED***
      key: "Default",
      get: function get() ***REMOVED***
        return Default;
  ***REMOVED***
***REMOVED***]);
    return ScrollSpy;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(window).on(Event.LOAD_DATA_API, function () ***REMOVED***
    var scrollSpys = $.makeArray($(Selector.DATA_SPY));

    for (var i = scrollSpys.length; i--;) ***REMOVED***
      var $spy = $(scrollSpys[i]);

      ScrollSpy._jQueryInterface.call($spy, $spy.data());
***REMOVED***
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = ScrollSpy._jQueryInterface;
  $.fn[NAME].Constructor = ScrollSpy;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return ScrollSpy._jQueryInterface;
  ***REMOVED***;

  return ScrollSpy;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-beta.2): tab.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

var Tab = function () ***REMOVED***
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */
  var NAME = 'tab';
  var VERSION = '4.0.0-beta.2';
  var DATA_KEY = 'bs.tab';
  var EVENT_KEY = "." + DATA_KEY;
  var DATA_API_KEY = '.data-api';
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var TRANSITION_DURATION = 150;
  var Event = ***REMOVED***
    HIDE: "hide" + EVENT_KEY,
    HIDDEN: "hidden" + EVENT_KEY,
    SHOW: "show" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY,
    CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
  ***REMOVED***;
  var ClassName = ***REMOVED***
    DROPDOWN_MENU: 'dropdown-menu',
    ACTIVE: 'active',
    DISABLED: 'disabled',
    FADE: 'fade',
    SHOW: 'show'
  ***REMOVED***;
  var Selector = ***REMOVED***
    DROPDOWN: '.dropdown',
    NAV_LIST_GROUP: '.nav, .list-group',
    ACTIVE: '.active',
    ACTIVE_UL: '> li > .active',
    DATA_TOGGLE: '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
    DROPDOWN_TOGGLE: '.dropdown-toggle',
    DROPDOWN_ACTIVE_CHILD: '> .dropdown-menu .active'
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

  ***REMOVED***;

  var Tab =
  /*#__PURE__*/
  function () ***REMOVED***
    function Tab(element) ***REMOVED***
      this._element = element;
***REMOVED*** // getters


    var _proto = Tab.prototype;

    // public
    _proto.show = function show() ***REMOVED***
      var _this = this;

      if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && $(this._element).hasClass(ClassName.ACTIVE) || $(this._element).hasClass(ClassName.DISABLED)) ***REMOVED***
        return;
  ***REMOVED***

      var target;
      var previous;
      var listElement = $(this._element).closest(Selector.NAV_LIST_GROUP)[0];
      var selector = Util.getSelectorFromElement(this._element);

      if (listElement) ***REMOVED***
        var itemSelector = listElement.nodeName === 'UL' ? Selector.ACTIVE_UL : Selector.ACTIVE;
        previous = $.makeArray($(listElement).find(itemSelector));
        previous = previous[previous.length - 1];
  ***REMOVED***

      var hideEvent = $.Event(Event.HIDE, ***REMOVED***
        relatedTarget: this._element
  ***REMOVED***);
      var showEvent = $.Event(Event.SHOW, ***REMOVED***
        relatedTarget: previous
  ***REMOVED***);

      if (previous) ***REMOVED***
        $(previous).trigger(hideEvent);
  ***REMOVED***

      $(this._element).trigger(showEvent);

      if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) ***REMOVED***
        return;
  ***REMOVED***

      if (selector) ***REMOVED***
        target = $(selector)[0];
  ***REMOVED***

      this._activate(this._element, listElement);

      var complete = function complete() ***REMOVED***
        var hiddenEvent = $.Event(Event.HIDDEN, ***REMOVED***
          relatedTarget: _this._element
    ***REMOVED***);
        var shownEvent = $.Event(Event.SHOWN, ***REMOVED***
          relatedTarget: previous
    ***REMOVED***);
        $(previous).trigger(hiddenEvent);
        $(_this._element).trigger(shownEvent);
  ***REMOVED***;

      if (target) ***REMOVED***
        this._activate(target, target.parentNode, complete);
  ***REMOVED*** else ***REMOVED***
        complete();
  ***REMOVED***
***REMOVED***;

    _proto.dispose = function dispose() ***REMOVED***
      $.removeData(this._element, DATA_KEY);
      this._element = null;
***REMOVED***; // private


    _proto._activate = function _activate(element, container, callback) ***REMOVED***
      var _this2 = this;

      var activeElements;

      if (container.nodeName === 'UL') ***REMOVED***
        activeElements = $(container).find(Selector.ACTIVE_UL);
  ***REMOVED*** else ***REMOVED***
        activeElements = $(container).children(Selector.ACTIVE);
  ***REMOVED***

      var active = activeElements[0];
      var isTransitioning = callback && Util.supportsTransitionEnd() && active && $(active).hasClass(ClassName.FADE);

      var complete = function complete() ***REMOVED***
        return _this2._transitionComplete(element, active, isTransitioning, callback);
  ***REMOVED***;

      if (active && isTransitioning) ***REMOVED***
        $(active).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
  ***REMOVED*** else ***REMOVED***
        complete();
  ***REMOVED***

      if (active) ***REMOVED***
        $(active).removeClass(ClassName.SHOW);
  ***REMOVED***
***REMOVED***;

    _proto._transitionComplete = function _transitionComplete(element, active, isTransitioning, callback) ***REMOVED***
      if (active) ***REMOVED***
        $(active).removeClass(ClassName.ACTIVE);
        var dropdownChild = $(active.parentNode).find(Selector.DROPDOWN_ACTIVE_CHILD)[0];

        if (dropdownChild) ***REMOVED***
          $(dropdownChild).removeClass(ClassName.ACTIVE);
    ***REMOVED***

        if (active.getAttribute('role') === 'tab') ***REMOVED***
          active.setAttribute('aria-selected', false);
    ***REMOVED***
  ***REMOVED***

      $(element).addClass(ClassName.ACTIVE);

      if (element.getAttribute('role') === 'tab') ***REMOVED***
        element.setAttribute('aria-selected', true);
  ***REMOVED***

      if (isTransitioning) ***REMOVED***
        Util.reflow(element);
        $(element).addClass(ClassName.SHOW);
  ***REMOVED*** else ***REMOVED***
        $(element).removeClass(ClassName.FADE);
  ***REMOVED***

      if (element.parentNode && $(element.parentNode).hasClass(ClassName.DROPDOWN_MENU)) ***REMOVED***
        var dropdownElement = $(element).closest(Selector.DROPDOWN)[0];

        if (dropdownElement) ***REMOVED***
          $(dropdownElement).find(Selector.DROPDOWN_TOGGLE).addClass(ClassName.ACTIVE);
    ***REMOVED***

        element.setAttribute('aria-expanded', true);
  ***REMOVED***

      if (callback) ***REMOVED***
        callback();
  ***REMOVED***
***REMOVED***; // static


    Tab._jQueryInterface = function _jQueryInterface(config) ***REMOVED***
      return this.each(function () ***REMOVED***
        var $this = $(this);
        var data = $this.data(DATA_KEY);

        if (!data) ***REMOVED***
          data = new Tab(this);
          $this.data(DATA_KEY, data);
    ***REMOVED***

        if (typeof config === 'string') ***REMOVED***
          if (typeof data[config] === 'undefined') ***REMOVED***
            throw new Error("No method named \"" + config + "\"");
      ***REMOVED***

          data[config]();
    ***REMOVED***
  ***REMOVED***);
***REMOVED***;

    createClass(Tab, null, [***REMOVED***
      key: "VERSION",
      get: function get() ***REMOVED***
        return VERSION;
  ***REMOVED***
***REMOVED***]);
    return Tab;
  ***REMOVED***();
  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */


  $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) ***REMOVED***
    event.preventDefault();

    Tab._jQueryInterface.call($(this), 'show');
  ***REMOVED***);
  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Tab._jQueryInterface;
  $.fn[NAME].Constructor = Tab;

  $.fn[NAME].noConflict = function () ***REMOVED***
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Tab._jQueryInterface;
  ***REMOVED***;

  return Tab;
***REMOVED***($);

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0-alpha.6): index.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

(function () ***REMOVED***
  if (typeof $ === 'undefined') ***REMOVED***
    throw new Error('Bootstrap\'s JavaScript requires jQuery. jQuery must be included before Bootstrap\'s JavaScript.');
  ***REMOVED***

  var version = $.fn.jquery.split(' ')[0].split('.');
  var minMajor = 1;
  var ltMajor = 2;
  var minMinor = 9;
  var minPatch = 1;
  var maxMajor = 4;

  if (version[0] < ltMajor && version[1] < minMinor || version[0] === minMajor && version[1] === minMinor && version[2] < minPatch || version[0] >= maxMajor) ***REMOVED***
    throw new Error('Bootstrap\'s JavaScript requires at least jQuery v1.9.1 but less than v4.0.0');
  ***REMOVED***
***REMOVED***)($);

exports.Util = Util;
exports.Alert = Alert;
exports.Button = Button;
exports.Carousel = Carousel;
exports.Collapse = Collapse;
exports.Dropdown = Dropdown;
exports.Modal = Modal;
exports.Popover = Popover;
exports.Scrollspy = ScrollSpy;
exports.Tab = Tab;
exports.Tooltip = Tooltip;

return exports;

***REMOVED***(***REMOVED******REMOVED***,$,Popper));
//# sourceMappingURL=bootstrap.js.map
