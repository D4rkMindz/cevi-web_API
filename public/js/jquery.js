/*! jQuery v3.2.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function (a, b) ***REMOVED***
	"use strict";
	"object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? b(a, !0) : function (a) ***REMOVED***
		if (!a.document) throw new Error("jQuery requires a window with a document");
		return b(a)
	***REMOVED*** : b(a)
***REMOVED***("undefined" != typeof window ? window : this, function (a, b) ***REMOVED***
	"use strict";
	var c = [], d = a.document, e = Object.getPrototypeOf, f = c.slice, g = c.concat, h = c.push, i = c.indexOf, j = ***REMOVED******REMOVED***,
		k = j.toString, l = j.hasOwnProperty, m = l.toString, n = m.call(Object), o = ***REMOVED******REMOVED***;

	function p(a, b) ***REMOVED***
		b = b || d;
		var c = b.createElement("script");
		c.text = a, b.head.appendChild(c).parentNode.removeChild(c)
	***REMOVED***

	var q = "3.2.1", r = function (a, b) ***REMOVED***
		return new r.fn.init(a, b)
	***REMOVED***, s = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, t = /^-ms-/, u = /-([a-z])/g, v = function (a, b) ***REMOVED***
		return b.toUpperCase()
	***REMOVED***;
	r.fn = r.prototype = ***REMOVED***
		jquery: q, constructor: r, length: 0, toArray: function () ***REMOVED***
			return f.call(this)
		***REMOVED***, get: function (a) ***REMOVED***
			return null == a ? f.call(this) : a < 0 ? this[a + this.length] : this[a]
		***REMOVED***, pushStack: function (a) ***REMOVED***
			var b = r.merge(this.constructor(), a);
			return b.prevObject = this, b
		***REMOVED***, each: function (a) ***REMOVED***
			return r.each(this, a)
		***REMOVED***, map: function (a) ***REMOVED***
			return this.pushStack(r.map(this, function (b, c) ***REMOVED***
				return a.call(b, c, b)
			***REMOVED***))
		***REMOVED***, slice: function () ***REMOVED***
			return this.pushStack(f.apply(this, arguments))
		***REMOVED***, first: function () ***REMOVED***
			return this.eq(0)
		***REMOVED***, last: function () ***REMOVED***
			return this.eq(-1)
		***REMOVED***, eq: function (a) ***REMOVED***
			var b = this.length, c = +a + (a < 0 ? b : 0);
			return this.pushStack(c >= 0 && c < b ? [this[c]] : [])
		***REMOVED***, end: function () ***REMOVED***
			return this.prevObject || this.constructor()
		***REMOVED***, push: h, sort: c.sort, splice: c.splice
	***REMOVED***, r.extend = r.fn.extend = function () ***REMOVED***
		var a, b, c, d, e, f, g = arguments[0] || ***REMOVED******REMOVED***, h = 1, i = arguments.length, j = !1;
		for ("boolean" == typeof g && (j = g, g = arguments[h] || ***REMOVED******REMOVED***, h++), "object" == typeof g || r.isFunction(g) || (g = ***REMOVED******REMOVED***), h === i && (g = this, h--); h < i; h++) if (null != (a = arguments[h])) for (b in a) c = g[b], d = a[b], g !== d && (j && d && (r.isPlainObject(d) || (e = Array.isArray(d))) ? (e ? (e = !1, f = c && Array.isArray(c) ? c : []) : f = c && r.isPlainObject(c) ? c : ***REMOVED******REMOVED***, g[b] = r.extend(j, f, d)) : void 0 !== d && (g[b] = d));
		return g
	***REMOVED***, r.extend(***REMOVED***
		expando: "jQuery" + (q + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (a) ***REMOVED***
			throw new Error(a)
		***REMOVED***, noop: function () ***REMOVED***
		***REMOVED***, isFunction: function (a) ***REMOVED***
			return "function" === r.type(a)
		***REMOVED***, isWindow: function (a) ***REMOVED***
			return null != a && a === a.window
		***REMOVED***, isNumeric: function (a) ***REMOVED***
			var b = r.type(a);
			return ("number" === b || "string" === b) && !isNaN(a - parseFloat(a))
		***REMOVED***, isPlainObject: function (a) ***REMOVED***
			var b, c;
			return !(!a || "[object Object]" !== k.call(a)) && (!(b = e(a)) || (c = l.call(b, "constructor") && b.constructor, "function" == typeof c && m.call(c) === n))
		***REMOVED***, isEmptyObject: function (a) ***REMOVED***
			var b;
			for (b in a) return !1;
			return !0
		***REMOVED***, type: function (a) ***REMOVED***
			return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? j[k.call(a)] || "object" : typeof a
		***REMOVED***, globalEval: function (a) ***REMOVED***
			p(a)
		***REMOVED***, camelCase: function (a) ***REMOVED***
			return a.replace(t, "ms-").replace(u, v)
		***REMOVED***, each: function (a, b) ***REMOVED***
			var c, d = 0;
			if (w(a)) ***REMOVED***
				for (c = a.length; d < c; d++) if (b.call(a[d], d, a[d]) === !1) break
			***REMOVED*** else for (d in a) if (b.call(a[d], d, a[d]) === !1) break;
			return a
		***REMOVED***, trim: function (a) ***REMOVED***
			return null == a ? "" : (a + "").replace(s, "")
		***REMOVED***, makeArray: function (a, b) ***REMOVED***
			var c = b || [];
			return null != a && (w(Object(a)) ? r.merge(c, "string" == typeof a ? [a] : a) : h.call(c, a)), c
		***REMOVED***, inArray: function (a, b, c) ***REMOVED***
			return null == b ? -1 : i.call(b, a, c)
		***REMOVED***, merge: function (a, b) ***REMOVED***
			for (var c = +b.length, d = 0, e = a.length; d < c; d++) a[e++] = b[d];
			return a.length = e, a
		***REMOVED***, grep: function (a, b, c) ***REMOVED***
			for (var d, e = [], f = 0, g = a.length, h = !c; f < g; f++) d = !b(a[f], f), d !== h && e.push(a[f]);
			return e
		***REMOVED***, map: function (a, b, c) ***REMOVED***
			var d, e, f = 0, h = [];
			if (w(a)) for (d = a.length; f < d; f++) e = b(a[f], f, c), null != e && h.push(e); else for (f in a) e = b(a[f], f, c), null != e && h.push(e);
			return g.apply([], h)
		***REMOVED***, guid: 1, proxy: function (a, b) ***REMOVED***
			var c, d, e;
			if ("string" == typeof b && (c = a[b], b = a, a = c), r.isFunction(a)) return d = f.call(arguments, 2), e = function () ***REMOVED***
				return a.apply(b || this, d.concat(f.call(arguments)))
			***REMOVED***, e.guid = a.guid = a.guid || r.guid++, e
		***REMOVED***, now: Date.now, support: o
	***REMOVED***), "function" == typeof Symbol && (r.fn[Symbol.iterator] = c[Symbol.iterator]), r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (a, b) ***REMOVED***
		j["[object " + b + "]"] = b.toLowerCase()
	***REMOVED***);

	function w(a) ***REMOVED***
		var b = !!a && "length" in a && a.length, c = r.type(a);
		return "function" !== c && !r.isWindow(a) && ("array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a)
	***REMOVED***

	var x = function (a) ***REMOVED***
		var b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u = "sizzle" + 1 * new Date, v = a.document, w = 0,
			x = 0, y = ha(), z = ha(), A = ha(), B = function (a, b) ***REMOVED***
				return a === b && (l = !0), 0
			***REMOVED***, C = ***REMOVED******REMOVED***.hasOwnProperty, D = [], E = D.pop, F = D.push, G = D.push, H = D.slice, I = function (a, b) ***REMOVED***
				for (var c = 0, d = a.length; c < d; c++) if (a[c] === b) return c;
				return -1
			***REMOVED***,
			J = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
			K = "[\\x20\\t\\r\\n\\f]", L = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
			M = "\\[" + K + "*(" + L + ")(?:" + K + "*([*^$|!~]?=)" + K + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + L + "))|)" + K + "*\\]",
			N = ":(" + L + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + M + ")*)|.*)\\)|)",
			O = new RegExp(K + "+", "g"), P = new RegExp("^" + K + "+|((?:^|[^\\\\])(?:\\\\.)*)" + K + "+$", "g"),
			Q = new RegExp("^" + K + "*," + K + "*"), R = new RegExp("^" + K + "*([>+~]|" + K + ")" + K + "*"),
			S = new RegExp("=" + K + "*([^\\]'\"]*?)" + K + "*\\]", "g"), T = new RegExp(N),
			U = new RegExp("^" + L + "$"), V = ***REMOVED***
				ID: new RegExp("^#(" + L + ")"),
				CLASS: new RegExp("^\\.(" + L + ")"),
				TAG: new RegExp("^(" + L + "|[*])"),
				ATTR: new RegExp("^" + M),
				PSEUDO: new RegExp("^" + N),
				CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + K + "*(even|odd|(([+-]|)(\\d*)n|)" + K + "*(?:([+-]|)" + K + "*(\\d+)|))" + K + "*\\)|)", "i"),
				bool: new RegExp("^(?:" + J + ")$", "i"),
				needsContext: new RegExp("^" + K + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + K + "*((?:-\\d)?\\d*)" + K + "*\\)|)(?=[^-]|$)", "i")
			***REMOVED***, W = /^(?:input|select|textarea|button)$/i, X = /^h\d$/i, Y = /^[^***REMOVED***]+\***REMOVED***\s*\[native \w/,
			Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, $ = /[+~]/,
			_ = new RegExp("\\\\([\\da-f]***REMOVED***1,6***REMOVED***" + K + "?|(" + K + ")|.)", "ig"), aa = function (a, b, c) ***REMOVED***
				var d = "0x" + b - 65536;
				return d !== d || c ? b : d < 0 ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320)
			***REMOVED***, ba = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, ca = function (a, b) ***REMOVED***
				return b ? "\0" === a ? "\ufffd" : a.slice(0, -1) + "\\" + a.charCodeAt(a.length - 1).toString(16) + " " : "\\" + a
			***REMOVED***, da = function () ***REMOVED***
				m()
			***REMOVED***, ea = ta(function (a) ***REMOVED***
				return a.disabled === !0 && ("form" in a || "label" in a)
			***REMOVED***, ***REMOVED***dir: "parentNode", next: "legend"***REMOVED***);
		try ***REMOVED***
			G.apply(D = H.call(v.childNodes), v.childNodes), D[v.childNodes.length].nodeType
		***REMOVED*** catch (fa) ***REMOVED***
			G = ***REMOVED***
				apply: D.length ? function (a, b) ***REMOVED***
					F.apply(a, H.call(b))
				***REMOVED*** : function (a, b) ***REMOVED***
					var c = a.length, d = 0;
					while (a[c++] = b[d++]) ;
					a.length = c - 1
				***REMOVED***
			***REMOVED***
		***REMOVED***

		function ga(a, b, d, e) ***REMOVED***
			var f, h, j, k, l, o, r, s = b && b.ownerDocument, w = b ? b.nodeType : 9;
			if (d = d || [], "string" != typeof a || !a || 1 !== w && 9 !== w && 11 !== w) return d;
			if (!e && ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, p)) ***REMOVED***
				if (11 !== w && (l = Z.exec(a))) if (f = l[1]) ***REMOVED***
					if (9 === w) ***REMOVED***
						if (!(j = b.getElementById(f))) return d;
						if (j.id === f) return d.push(j), d
					***REMOVED*** else if (s && (j = s.getElementById(f)) && t(b, j) && j.id === f) return d.push(j), d
				***REMOVED*** else ***REMOVED***
					if (l[2]) return G.apply(d, b.getElementsByTagName(a)), d;
					if ((f = l[3]) && c.getElementsByClassName && b.getElementsByClassName) return G.apply(d, b.getElementsByClassName(f)), d
				***REMOVED***
				if (c.qsa && !A[a + " "] && (!q || !q.test(a))) ***REMOVED***
					if (1 !== w) s = b, r = a; else if ("object" !== b.nodeName.toLowerCase()) ***REMOVED***
						(k = b.getAttribute("id")) ? k = k.replace(ba, ca) : b.setAttribute("id", k = u), o = g(a), h = o.length;
						while (h--) o[h] = "#" + k + " " + sa(o[h]);
						r = o.join(","), s = $.test(a) && qa(b.parentNode) || b
					***REMOVED***
					if (r) try ***REMOVED***
						return G.apply(d, s.querySelectorAll(r)), d
					***REMOVED*** catch (x) ***REMOVED***
					***REMOVED*** finally ***REMOVED***
						k === u && b.removeAttribute("id")
					***REMOVED***
				***REMOVED***
			***REMOVED***
			return i(a.replace(P, "$1"), b, d, e)
		***REMOVED***

		function ha() ***REMOVED***
			var a = [];

			function b(c, e) ***REMOVED***
				return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e
			***REMOVED***

			return b
		***REMOVED***

		function ia(a) ***REMOVED***
			return a[u] = !0, a
		***REMOVED***

		function ja(a) ***REMOVED***
			var b = n.createElement("fieldset");
			try ***REMOVED***
				return !!a(b)
			***REMOVED*** catch (c) ***REMOVED***
				return !1
			***REMOVED*** finally ***REMOVED***
				b.parentNode && b.parentNode.removeChild(b), b = null
			***REMOVED***
		***REMOVED***

		function ka(a, b) ***REMOVED***
			var c = a.split("|"), e = c.length;
			while (e--) d.attrHandle[c[e]] = b
		***REMOVED***

		function la(a, b) ***REMOVED***
			var c = b && a, d = c && 1 === a.nodeType && 1 === b.nodeType && a.sourceIndex - b.sourceIndex;
			if (d) return d;
			if (c) while (c = c.nextSibling) if (c === b) return -1;
			return a ? 1 : -1
		***REMOVED***

		function ma(a) ***REMOVED***
			return function (b) ***REMOVED***
				var c = b.nodeName.toLowerCase();
				return "input" === c && b.type === a
			***REMOVED***
		***REMOVED***

		function na(a) ***REMOVED***
			return function (b) ***REMOVED***
				var c = b.nodeName.toLowerCase();
				return ("input" === c || "button" === c) && b.type === a
			***REMOVED***
		***REMOVED***

		function oa(a) ***REMOVED***
			return function (b) ***REMOVED***
				return "form" in b ? b.parentNode && b.disabled === !1 ? "label" in b ? "label" in b.parentNode ? b.parentNode.disabled === a : b.disabled === a : b.isDisabled === a || b.isDisabled !== !a && ea(b) === a : b.disabled === a : "label" in b && b.disabled === a
			***REMOVED***
		***REMOVED***

		function pa(a) ***REMOVED***
			return ia(function (b) ***REMOVED***
				return b = +b, ia(function (c, d) ***REMOVED***
					var e, f = a([], c.length, b), g = f.length;
					while (g--) c[e = f[g]] && (c[e] = !(d[e] = c[e]))
				***REMOVED***)
			***REMOVED***)
		***REMOVED***

		function qa(a) ***REMOVED***
			return a && "undefined" != typeof a.getElementsByTagName && a
		***REMOVED***

		c = ga.support = ***REMOVED******REMOVED***, f = ga.isXML = function (a) ***REMOVED***
			var b = a && (a.ownerDocument || a).documentElement;
			return !!b && "HTML" !== b.nodeName
		***REMOVED***, m = ga.setDocument = function (a) ***REMOVED***
			var b, e, g = a ? a.ownerDocument || a : v;
			return g !== n && 9 === g.nodeType && g.documentElement ? (n = g, o = n.documentElement, p = !f(n), v !== n && (e = n.defaultView) && e.top !== e && (e.addEventListener ? e.addEventListener("unload", da, !1) : e.attachEvent && e.attachEvent("onunload", da)), c.attributes = ja(function (a) ***REMOVED***
				return a.className = "i", !a.getAttribute("className")
			***REMOVED***), c.getElementsByTagName = ja(function (a) ***REMOVED***
				return a.appendChild(n.createComment("")), !a.getElementsByTagName("*").length
			***REMOVED***), c.getElementsByClassName = Y.test(n.getElementsByClassName), c.getById = ja(function (a) ***REMOVED***
				return o.appendChild(a).id = u, !n.getElementsByName || !n.getElementsByName(u).length
			***REMOVED***), c.getById ? (d.filter.ID = function (a) ***REMOVED***
				var b = a.replace(_, aa);
				return function (a) ***REMOVED***
					return a.getAttribute("id") === b
				***REMOVED***
			***REMOVED***, d.find.ID = function (a, b) ***REMOVED***
				if ("undefined" != typeof b.getElementById && p) ***REMOVED***
					var c = b.getElementById(a);
					return c ? [c] : []
				***REMOVED***
			***REMOVED***) : (d.filter.ID = function (a) ***REMOVED***
				var b = a.replace(_, aa);
				return function (a) ***REMOVED***
					var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");
					return c && c.value === b
				***REMOVED***
			***REMOVED***, d.find.ID = function (a, b) ***REMOVED***
				if ("undefined" != typeof b.getElementById && p) ***REMOVED***
					var c, d, e, f = b.getElementById(a);
					if (f) ***REMOVED***
						if (c = f.getAttributeNode("id"), c && c.value === a) return [f];
						e = b.getElementsByName(a), d = 0;
						while (f = e[d++]) if (c = f.getAttributeNode("id"), c && c.value === a) return [f]
					***REMOVED***
					return []
				***REMOVED***
			***REMOVED***), d.find.TAG = c.getElementsByTagName ? function (a, b) ***REMOVED***
				return "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName(a) : c.qsa ? b.querySelectorAll(a) : void 0
			***REMOVED*** : function (a, b) ***REMOVED***
				var c, d = [], e = 0, f = b.getElementsByTagName(a);
				if ("*" === a) ***REMOVED***
					while (c = f[e++]) 1 === c.nodeType && d.push(c);
					return d
				***REMOVED***
				return f
			***REMOVED***, d.find.CLASS = c.getElementsByClassName && function (a, b) ***REMOVED***
				if ("undefined" != typeof b.getElementsByClassName && p) return b.getElementsByClassName(a)
			***REMOVED***, r = [], q = [], (c.qsa = Y.test(n.querySelectorAll)) && (ja(function (a) ***REMOVED***
				o.appendChild(a).innerHTML = "<a id='" + u + "'></a><select id='" + u + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && q.push("[*^$]=" + K + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + K + "*(?:value|" + J + ")"), a.querySelectorAll("[id~=" + u + "-]").length || q.push("~="), a.querySelectorAll(":checked").length || q.push(":checked"), a.querySelectorAll("a#" + u + "+*").length || q.push(".#.+[+~]")
			***REMOVED***), ja(function (a) ***REMOVED***
				a.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
				var b = n.createElement("input");
				b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + K + "*[*^$|!~]?="), 2 !== a.querySelectorAll(":enabled").length && q.push(":enabled", ":disabled"), o.appendChild(a).disabled = !0, 2 !== a.querySelectorAll(":disabled").length && q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:")
			***REMOVED***)), (c.matchesSelector = Y.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ja(function (a) ***REMOVED***
				c.disconnectedMatch = s.call(a, "*"), s.call(a, "[s!='']:x"), r.push("!=", N)
			***REMOVED***), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = Y.test(o.compareDocumentPosition), t = b || Y.test(o.contains) ? function (a, b) ***REMOVED***
				var c = 9 === a.nodeType ? a.documentElement : a, d = b && b.parentNode;
				return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
			***REMOVED*** : function (a, b) ***REMOVED***
				if (b) while (b = b.parentNode) if (b === a) return !0;
				return !1
			***REMOVED***, B = b ? function (a, b) ***REMOVED***
				if (a === b) return l = !0, 0;
				var d = !a.compareDocumentPosition - !b.compareDocumentPosition;
				return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === n || a.ownerDocument === v && t(v, a) ? -1 : b === n || b.ownerDocument === v && t(v, b) ? 1 : k ? I(k, a) - I(k, b) : 0 : 4 & d ? -1 : 1)
			***REMOVED*** : function (a, b) ***REMOVED***
				if (a === b) return l = !0, 0;
				var c, d = 0, e = a.parentNode, f = b.parentNode, g = [a], h = [b];
				if (!e || !f) return a === n ? -1 : b === n ? 1 : e ? -1 : f ? 1 : k ? I(k, a) - I(k, b) : 0;
				if (e === f) return la(a, b);
				c = a;
				while (c = c.parentNode) g.unshift(c);
				c = b;
				while (c = c.parentNode) h.unshift(c);
				while (g[d] === h[d]) d++;
				return d ? la(g[d], h[d]) : g[d] === v ? -1 : h[d] === v ? 1 : 0
			***REMOVED***, n) : n
		***REMOVED***, ga.matches = function (a, b) ***REMOVED***
			return ga(a, null, null, b)
		***REMOVED***, ga.matchesSelector = function (a, b) ***REMOVED***
			if ((a.ownerDocument || a) !== n && m(a), b = b.replace(S, "='$1']"), c.matchesSelector && p && !A[b + " "] && (!r || !r.test(b)) && (!q || !q.test(b))) try ***REMOVED***
				var d = s.call(a, b);
				if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d
			***REMOVED*** catch (e) ***REMOVED***
			***REMOVED***
			return ga(b, n, null, [a]).length > 0
		***REMOVED***, ga.contains = function (a, b) ***REMOVED***
			return (a.ownerDocument || a) !== n && m(a), t(a, b)
		***REMOVED***, ga.attr = function (a, b) ***REMOVED***
			(a.ownerDocument || a) !== n && m(a);
			var e = d.attrHandle[b.toLowerCase()],
				f = e && C.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;
			return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null
		***REMOVED***, ga.escape = function (a) ***REMOVED***
			return (a + "").replace(ba, ca)
		***REMOVED***, ga.error = function (a) ***REMOVED***
			throw new Error("Syntax error, unrecognized expression: " + a)
		***REMOVED***, ga.uniqueSort = function (a) ***REMOVED***
			var b, d = [], e = 0, f = 0;
			if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) ***REMOVED***
				while (b = a[f++]) b === a[f] && (e = d.push(f));
				while (e--) a.splice(d[e], 1)
			***REMOVED***
			return k = null, a
		***REMOVED***, e = ga.getText = function (a) ***REMOVED***
			var b, c = "", d = 0, f = a.nodeType;
			if (f) ***REMOVED***
				if (1 === f || 9 === f || 11 === f) ***REMOVED***
					if ("string" == typeof a.textContent) return a.textContent;
					for (a = a.firstChild; a; a = a.nextSibling) c += e(a)
				***REMOVED*** else if (3 === f || 4 === f) return a.nodeValue
			***REMOVED*** else while (b = a[d++]) c += e(b);
			return c
		***REMOVED***, d = ga.selectors = ***REMOVED***
			cacheLength: 50,
			createPseudo: ia,
			match: V,
			attrHandle: ***REMOVED******REMOVED***,
			find: ***REMOVED******REMOVED***,
			relative: ***REMOVED***
				">": ***REMOVED***dir: "parentNode", first: !0***REMOVED***,
				" ": ***REMOVED***dir: "parentNode"***REMOVED***,
				"+": ***REMOVED***dir: "previousSibling", first: !0***REMOVED***,
				"~": ***REMOVED***dir: "previousSibling"***REMOVED***
			***REMOVED***,
			preFilter: ***REMOVED***
				ATTR: function (a) ***REMOVED***
					return a[1] = a[1].replace(_, aa), a[3] = (a[3] || a[4] || a[5] || "").replace(_, aa), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4)
				***REMOVED***, CHILD: function (a) ***REMOVED***
					return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || ga.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && ga.error(a[0]), a
				***REMOVED***, PSEUDO: function (a) ***REMOVED***
					var b, c = !a[6] && a[2];
					return V.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && T.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3))
				***REMOVED***
			***REMOVED***,
			filter: ***REMOVED***
				TAG: function (a) ***REMOVED***
					var b = a.replace(_, aa).toLowerCase();
					return "*" === a ? function () ***REMOVED***
						return !0
					***REMOVED*** : function (a) ***REMOVED***
						return a.nodeName && a.nodeName.toLowerCase() === b
					***REMOVED***
				***REMOVED***, CLASS: function (a) ***REMOVED***
					var b = y[a + " "];
					return b || (b = new RegExp("(^|" + K + ")" + a + "(" + K + "|$)")) && y(a, function (a) ***REMOVED***
						return b.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "")
					***REMOVED***)
				***REMOVED***, ATTR: function (a, b, c) ***REMOVED***
					return function (d) ***REMOVED***
						var e = ga.attr(d, a);
						return null == e ? "!=" === b : !b || (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e.replace(O, " ") + " ").indexOf(c) > -1 : "|=" === b && (e === c || e.slice(0, c.length + 1) === c + "-"))
					***REMOVED***
				***REMOVED***, CHILD: function (a, b, c, d, e) ***REMOVED***
					var f = "nth" !== a.slice(0, 3), g = "last" !== a.slice(-4), h = "of-type" === b;
					return 1 === d && 0 === e ? function (a) ***REMOVED***
						return !!a.parentNode
					***REMOVED*** : function (b, c, i) ***REMOVED***
						var j, k, l, m, n, o, p = f !== g ? "nextSibling" : "previousSibling", q = b.parentNode,
							r = h && b.nodeName.toLowerCase(), s = !i && !h, t = !1;
						if (q) ***REMOVED***
							if (f) ***REMOVED***
								while (p) ***REMOVED***
									m = b;
									while (m = m[p]) if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
									o = p = "only" === a && !o && "nextSibling"
								***REMOVED***
								return !0
							***REMOVED***
							if (o = [g ? q.firstChild : q.lastChild], g && s) ***REMOVED***
								m = q, l = m[u] || (m[u] = ***REMOVED******REMOVED***), k = l[m.uniqueID] || (l[m.uniqueID] = ***REMOVED******REMOVED***), j = k[a] || [], n = j[0] === w && j[1], t = n && j[2], m = n && q.childNodes[n];
								while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) if (1 === m.nodeType && ++t && m === b) ***REMOVED***
									k[a] = [w, n, t];
									break
								***REMOVED***
							***REMOVED*** else if (s && (m = b, l = m[u] || (m[u] = ***REMOVED******REMOVED***), k = l[m.uniqueID] || (l[m.uniqueID] = ***REMOVED******REMOVED***), j = k[a] || [], n = j[0] === w && j[1], t = n), t === !1) while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) if ((h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) && ++t && (s && (l = m[u] || (m[u] = ***REMOVED******REMOVED***), k = l[m.uniqueID] || (l[m.uniqueID] = ***REMOVED******REMOVED***), k[a] = [w, t]), m === b)) break;
							return t -= e, t === d || t % d === 0 && t / d >= 0
						***REMOVED***
					***REMOVED***
				***REMOVED***, PSEUDO: function (a, b) ***REMOVED***
					var c, e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || ga.error("unsupported pseudo: " + a);
					return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? ia(function (a, c) ***REMOVED***
						var d, f = e(a, b), g = f.length;
						while (g--) d = I(a, f[g]), a[d] = !(c[d] = f[g])
					***REMOVED***) : function (a) ***REMOVED***
						return e(a, 0, c)
					***REMOVED***) : e
				***REMOVED***
			***REMOVED***,
			pseudos: ***REMOVED***
				not: ia(function (a) ***REMOVED***
					var b = [], c = [], d = h(a.replace(P, "$1"));
					return d[u] ? ia(function (a, b, c, e) ***REMOVED***
						var f, g = d(a, null, e, []), h = a.length;
						while (h--) (f = g[h]) && (a[h] = !(b[h] = f))
					***REMOVED***) : function (a, e, f) ***REMOVED***
						return b[0] = a, d(b, null, f, c), b[0] = null, !c.pop()
					***REMOVED***
				***REMOVED***), has: ia(function (a) ***REMOVED***
					return function (b) ***REMOVED***
						return ga(a, b).length > 0
					***REMOVED***
				***REMOVED***), contains: ia(function (a) ***REMOVED***
					return a = a.replace(_, aa), function (b) ***REMOVED***
						return (b.textContent || b.innerText || e(b)).indexOf(a) > -1
					***REMOVED***
				***REMOVED***), lang: ia(function (a) ***REMOVED***
					return U.test(a || "") || ga.error("unsupported lang: " + a), a = a.replace(_, aa).toLowerCase(), function (b) ***REMOVED***
						var c;
						do if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-"); while ((b = b.parentNode) && 1 === b.nodeType);
						return !1
					***REMOVED***
				***REMOVED***), target: function (b) ***REMOVED***
					var c = a.location && a.location.hash;
					return c && c.slice(1) === b.id
				***REMOVED***, root: function (a) ***REMOVED***
					return a === o
				***REMOVED***, focus: function (a) ***REMOVED***
					return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex)
				***REMOVED***, enabled: oa(!1), disabled: oa(!0), checked: function (a) ***REMOVED***
					var b = a.nodeName.toLowerCase();
					return "input" === b && !!a.checked || "option" === b && !!a.selected
				***REMOVED***, selected: function (a) ***REMOVED***
					return a.parentNode && a.parentNode.selectedIndex, a.selected === !0
				***REMOVED***, empty: function (a) ***REMOVED***
					for (a = a.firstChild; a; a = a.nextSibling) if (a.nodeType < 6) return !1;
					return !0
				***REMOVED***, parent: function (a) ***REMOVED***
					return !d.pseudos.empty(a)
				***REMOVED***, header: function (a) ***REMOVED***
					return X.test(a.nodeName)
				***REMOVED***, input: function (a) ***REMOVED***
					return W.test(a.nodeName)
				***REMOVED***, button: function (a) ***REMOVED***
					var b = a.nodeName.toLowerCase();
					return "input" === b && "button" === a.type || "button" === b
				***REMOVED***, text: function (a) ***REMOVED***
					var b;
					return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase())
				***REMOVED***, first: pa(function () ***REMOVED***
					return [0]
				***REMOVED***), last: pa(function (a, b) ***REMOVED***
					return [b - 1]
				***REMOVED***), eq: pa(function (a, b, c) ***REMOVED***
					return [c < 0 ? c + b : c]
				***REMOVED***), even: pa(function (a, b) ***REMOVED***
					for (var c = 0; c < b; c += 2) a.push(c);
					return a
				***REMOVED***), odd: pa(function (a, b) ***REMOVED***
					for (var c = 1; c < b; c += 2) a.push(c);
					return a
				***REMOVED***), lt: pa(function (a, b, c) ***REMOVED***
					for (var d = c < 0 ? c + b : c; --d >= 0;) a.push(d);
					return a
				***REMOVED***), gt: pa(function (a, b, c) ***REMOVED***
					for (var d = c < 0 ? c + b : c; ++d < b;) a.push(d);
					return a
				***REMOVED***)
			***REMOVED***
		***REMOVED***, d.pseudos.nth = d.pseudos.eq;
		for (b in***REMOVED***radio: !0, checkbox: !0, file: !0, password: !0, image: !0***REMOVED***) d.pseudos[b] = ma(b);
		for (b in***REMOVED***submit: !0, reset: !0***REMOVED***) d.pseudos[b] = na(b);

		function ra() ***REMOVED***
		***REMOVED***

		ra.prototype = d.filters = d.pseudos, d.setFilters = new ra, g = ga.tokenize = function (a, b) ***REMOVED***
			var c, e, f, g, h, i, j, k = z[a + " "];
			if (k) return b ? 0 : k.slice(0);
			h = a, i = [], j = d.preFilter;
			while (h) ***REMOVED***
				c && !(e = Q.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = R.exec(h)) && (c = e.shift(), f.push(***REMOVED***
					value: c,
					type: e[0].replace(P, " ")
				***REMOVED***), h = h.slice(c.length));
				for (g in d.filter) !(e = V[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push(***REMOVED***
					value: c,
					type: g,
					matches: e
				***REMOVED***), h = h.slice(c.length));
				if (!c) break
			***REMOVED***
			return b ? h.length : h ? ga.error(a) : z(a, i).slice(0)
		***REMOVED***;

		function sa(a) ***REMOVED***
			for (var b = 0, c = a.length, d = ""; b < c; b++) d += a[b].value;
			return d
		***REMOVED***

		function ta(a, b, c) ***REMOVED***
			var d = b.dir, e = b.next, f = e || d, g = c && "parentNode" === f, h = x++;
			return b.first ? function (b, c, e) ***REMOVED***
				while (b = b[d]) if (1 === b.nodeType || g) return a(b, c, e);
				return !1
			***REMOVED*** : function (b, c, i) ***REMOVED***
				var j, k, l, m = [w, h];
				if (i) ***REMOVED***
					while (b = b[d]) if ((1 === b.nodeType || g) && a(b, c, i)) return !0
				***REMOVED*** else while (b = b[d]) if (1 === b.nodeType || g) if (l = b[u] || (b[u] = ***REMOVED******REMOVED***), k = l[b.uniqueID] || (l[b.uniqueID] = ***REMOVED******REMOVED***), e && e === b.nodeName.toLowerCase()) b = b[d] || b; else ***REMOVED***
					if ((j = k[f]) && j[0] === w && j[1] === h) return m[2] = j[2];
					if (k[f] = m, m[2] = a(b, c, i)) return !0
				***REMOVED***
				return !1
			***REMOVED***
		***REMOVED***

		function ua(a) ***REMOVED***
			return a.length > 1 ? function (b, c, d) ***REMOVED***
				var e = a.length;
				while (e--) if (!a[e](b, c, d)) return !1;
				return !0
			***REMOVED*** : a[0]
		***REMOVED***

		function va(a, b, c) ***REMOVED***
			for (var d = 0, e = b.length; d < e; d++) ga(a, b[d], c);
			return c
		***REMOVED***

		function wa(a, b, c, d, e) ***REMOVED***
			for (var f, g = [], h = 0, i = a.length, j = null != b; h < i; h++) (f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h)));
			return g
		***REMOVED***

		function xa(a, b, c, d, e, f) ***REMOVED***
			return d && !d[u] && (d = xa(d)), e && !e[u] && (e = xa(e, f)), ia(function (f, g, h, i) ***REMOVED***
				var j, k, l, m = [], n = [], o = g.length, p = f || va(b || "*", h.nodeType ? [h] : h, []),
					q = !a || !f && b ? p : wa(p, m, a, h, i), r = c ? e || (f ? a : o || d) ? [] : g : q;
				if (c && c(q, r, h, i), d) ***REMOVED***
					j = wa(r, n), d(j, [], h, i), k = j.length;
					while (k--) (l = j[k]) && (r[n[k]] = !(q[n[k]] = l))
				***REMOVED***
				if (f) ***REMOVED***
					if (e || a) ***REMOVED***
						if (e) ***REMOVED***
							j = [], k = r.length;
							while (k--) (l = r[k]) && j.push(q[k] = l);
							e(null, r = [], j, i)
						***REMOVED***
						k = r.length;
						while (k--) (l = r[k]) && (j = e ? I(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l))
					***REMOVED***
				***REMOVED*** else r = wa(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : G.apply(g, r)
			***REMOVED***)
		***REMOVED***

		function ya(a) ***REMOVED***
			for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = ta(function (a) ***REMOVED***
				return a === b
			***REMOVED***, h, !0), l = ta(function (a) ***REMOVED***
				return I(b, a) > -1
			***REMOVED***, h, !0), m = [function (a, c, d) ***REMOVED***
				var e = !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d));
				return b = null, e
			***REMOVED***]; i < f; i++) if (c = d.relative[a[i].type]) m = [ta(ua(m), c)]; else ***REMOVED***
				if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) ***REMOVED***
					for (e = ++i; e < f; e++) if (d.relative[a[e].type]) break;
					return xa(i > 1 && ua(m), i > 1 && sa(a.slice(0, i - 1).concat(***REMOVED***value: " " === a[i - 2].type ? "*" : ""***REMOVED***)).replace(P, "$1"), c, i < e && ya(a.slice(i, e)), e < f && ya(a = a.slice(e)), e < f && sa(a))
				***REMOVED***
				m.push(c)
			***REMOVED***
			return ua(m)
		***REMOVED***

		function za(a, b) ***REMOVED***
			var c = b.length > 0, e = a.length > 0, f = function (f, g, h, i, k) ***REMOVED***
				var l, o, q, r = 0, s = "0", t = f && [], u = [], v = j, x = f || e && d.find.TAG("*", k),
					y = w += null == v ? 1 : Math.random() || .1, z = x.length;
				for (k && (j = g === n || g || k); s !== z && null != (l = x[s]); s++) ***REMOVED***
					if (e && l) ***REMOVED***
						o = 0, g || l.ownerDocument === n || (m(l), h = !p);
						while (q = a[o++]) if (q(l, g || n, h)) ***REMOVED***
							i.push(l);
							break
						***REMOVED***
						k && (w = y)
					***REMOVED***
					c && ((l = !q && l) && r--, f && t.push(l))
				***REMOVED***
				if (r += s, c && s !== r) ***REMOVED***
					o = 0;
					while (q = b[o++]) q(t, u, g, h);
					if (f) ***REMOVED***
						if (r > 0) while (s--) t[s] || u[s] || (u[s] = E.call(i));
						u = wa(u)
					***REMOVED***
					G.apply(i, u), k && !f && u.length > 0 && r + b.length > 1 && ga.uniqueSort(i)
				***REMOVED***
				return k && (w = y, j = v), t
			***REMOVED***;
			return c ? ia(f) : f
		***REMOVED***

		return h = ga.compile = function (a, b) ***REMOVED***
			var c, d = [], e = [], f = A[a + " "];
			if (!f) ***REMOVED***
				b || (b = g(a)), c = b.length;
				while (c--) f = ya(b[c]), f[u] ? d.push(f) : e.push(f);
				f = A(a, za(e, d)), f.selector = a
			***REMOVED***
			return f
		***REMOVED***, i = ga.select = function (a, b, c, e) ***REMOVED***
			var f, i, j, k, l, m = "function" == typeof a && a, n = !e && g(a = m.selector || a);
			if (c = c || [], 1 === n.length) ***REMOVED***
				if (i = n[0] = n[0].slice(0), i.length > 2 && "ID" === (j = i[0]).type && 9 === b.nodeType && p && d.relative[i[1].type]) ***REMOVED***
					if (b = (d.find.ID(j.matches[0].replace(_, aa), b) || [])[0], !b) return c;
					m && (b = b.parentNode), a = a.slice(i.shift().value.length)
				***REMOVED***
				f = V.needsContext.test(a) ? 0 : i.length;
				while (f--) ***REMOVED***
					if (j = i[f], d.relative[k = j.type]) break;
					if ((l = d.find[k]) && (e = l(j.matches[0].replace(_, aa), $.test(i[0].type) && qa(b.parentNode) || b))) ***REMOVED***
						if (i.splice(f, 1), a = e.length && sa(i), !a) return G.apply(c, e), c;
						break
					***REMOVED***
				***REMOVED***
			***REMOVED***
			return (m || h(a, n))(e, b, !p, c, !b || $.test(a) && qa(b.parentNode) || b), c
		***REMOVED***, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ja(function (a) ***REMOVED***
			return 1 & a.compareDocumentPosition(n.createElement("fieldset"))
		***REMOVED***), ja(function (a) ***REMOVED***
			return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href")
		***REMOVED***) || ka("type|href|height|width", function (a, b, c) ***REMOVED***
			if (!c) return a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2)
		***REMOVED***), c.attributes && ja(function (a) ***REMOVED***
			return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value")
		***REMOVED***) || ka("value", function (a, b, c) ***REMOVED***
			if (!c && "input" === a.nodeName.toLowerCase()) return a.defaultValue
		***REMOVED***), ja(function (a) ***REMOVED***
			return null == a.getAttribute("disabled")
		***REMOVED***) || ka(J, function (a, b, c) ***REMOVED***
			var d;
			if (!c) return a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null
		***REMOVED***), ga
	***REMOVED***(a);
	r.find = x, r.expr = x.selectors, r.expr[":"] = r.expr.pseudos, r.uniqueSort = r.unique = x.uniqueSort, r.text = x.getText, r.isXMLDoc = x.isXML, r.contains = x.contains, r.escapeSelector = x.escape;
	var y = function (a, b, c) ***REMOVED***
		var d = [], e = void 0 !== c;
		while ((a = a[b]) && 9 !== a.nodeType) if (1 === a.nodeType) ***REMOVED***
			if (e && r(a).is(c)) break;
			d.push(a)
		***REMOVED***
		return d
	***REMOVED***, z = function (a, b) ***REMOVED***
		for (var c = []; a; a = a.nextSibling) 1 === a.nodeType && a !== b && c.push(a);
		return c
	***REMOVED***, A = r.expr.match.needsContext;

	function B(a, b) ***REMOVED***
		return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase()
	***REMOVED***

	var C = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i, D = /^.[^:#\[\.,]*$/;

	function E(a, b, c) ***REMOVED***
		return r.isFunction(b) ? r.grep(a, function (a, d) ***REMOVED***
			return !!b.call(a, d, a) !== c
		***REMOVED***) : b.nodeType ? r.grep(a, function (a) ***REMOVED***
			return a === b !== c
		***REMOVED***) : "string" != typeof b ? r.grep(a, function (a) ***REMOVED***
			return i.call(b, a) > -1 !== c
		***REMOVED***) : D.test(b) ? r.filter(b, a, c) : (b = r.filter(b, a), r.grep(a, function (a) ***REMOVED***
			return i.call(b, a) > -1 !== c && 1 === a.nodeType
		***REMOVED***))
	***REMOVED***

	r.filter = function (a, b, c) ***REMOVED***
		var d = b[0];
		return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? r.find.matchesSelector(d, a) ? [d] : [] : r.find.matches(a, r.grep(b, function (a) ***REMOVED***
			return 1 === a.nodeType
		***REMOVED***))
	***REMOVED***, r.fn.extend(***REMOVED***
		find: function (a) ***REMOVED***
			var b, c, d = this.length, e = this;
			if ("string" != typeof a) return this.pushStack(r(a).filter(function () ***REMOVED***
				for (b = 0; b < d; b++) if (r.contains(e[b], this)) return !0
			***REMOVED***));
			for (c = this.pushStack([]), b = 0; b < d; b++) r.find(a, e[b], c);
			return d > 1 ? r.uniqueSort(c) : c
		***REMOVED***, filter: function (a) ***REMOVED***
			return this.pushStack(E(this, a || [], !1))
		***REMOVED***, not: function (a) ***REMOVED***
			return this.pushStack(E(this, a || [], !0))
		***REMOVED***, is: function (a) ***REMOVED***
			return !!E(this, "string" == typeof a && A.test(a) ? r(a) : a || [], !1).length
		***REMOVED***
	***REMOVED***);
	var F, G = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/, H = r.fn.init = function (a, b, c) ***REMOVED***
		var e, f;
		if (!a) return this;
		if (c = c || F, "string" == typeof a) ***REMOVED***
			if (e = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : G.exec(a), !e || !e[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);
			if (e[1]) ***REMOVED***
				if (b = b instanceof r ? b[0] : b, r.merge(this, r.parseHTML(e[1], b && b.nodeType ? b.ownerDocument || b : d, !0)), C.test(e[1]) && r.isPlainObject(b)) for (e in b) r.isFunction(this[e]) ? this[e](b[e]) : this.attr(e, b[e]);
				return this
			***REMOVED***
			return f = d.getElementById(e[2]), f && (this[0] = f, this.length = 1), this
		***REMOVED***
		return a.nodeType ? (this[0] = a, this.length = 1, this) : r.isFunction(a) ? void 0 !== c.ready ? c.ready(a) : a(r) : r.makeArray(a, this)
	***REMOVED***;
	H.prototype = r.fn, F = r(d);
	var I = /^(?:parents|prev(?:Until|All))/, J = ***REMOVED***children: !0, contents: !0, next: !0, prev: !0***REMOVED***;
	r.fn.extend(***REMOVED***
		has: function (a) ***REMOVED***
			var b = r(a, this), c = b.length;
			return this.filter(function () ***REMOVED***
				for (var a = 0; a < c; a++) if (r.contains(this, b[a])) return !0
			***REMOVED***)
		***REMOVED***, closest: function (a, b) ***REMOVED***
			var c, d = 0, e = this.length, f = [], g = "string" != typeof a && r(a);
			if (!A.test(a)) for (; d < e; d++) for (c = this[d]; c && c !== b; c = c.parentNode) if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && r.find.matchesSelector(c, a))) ***REMOVED***
				f.push(c);
				break
			***REMOVED***
			return this.pushStack(f.length > 1 ? r.uniqueSort(f) : f)
		***REMOVED***, index: function (a) ***REMOVED***
			return a ? "string" == typeof a ? i.call(r(a), this[0]) : i.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
		***REMOVED***, add: function (a, b) ***REMOVED***
			return this.pushStack(r.uniqueSort(r.merge(this.get(), r(a, b))))
		***REMOVED***, addBack: function (a) ***REMOVED***
			return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
		***REMOVED***
	***REMOVED***);

	function K(a, b) ***REMOVED***
		while ((a = a[b]) && 1 !== a.nodeType) ;
		return a
	***REMOVED***

	r.each(***REMOVED***
		parent: function (a) ***REMOVED***
			var b = a.parentNode;
			return b && 11 !== b.nodeType ? b : null
		***REMOVED***, parents: function (a) ***REMOVED***
			return y(a, "parentNode")
		***REMOVED***, parentsUntil: function (a, b, c) ***REMOVED***
			return y(a, "parentNode", c)
		***REMOVED***, next: function (a) ***REMOVED***
			return K(a, "nextSibling")
		***REMOVED***, prev: function (a) ***REMOVED***
			return K(a, "previousSibling")
		***REMOVED***, nextAll: function (a) ***REMOVED***
			return y(a, "nextSibling")
		***REMOVED***, prevAll: function (a) ***REMOVED***
			return y(a, "previousSibling")
		***REMOVED***, nextUntil: function (a, b, c) ***REMOVED***
			return y(a, "nextSibling", c)
		***REMOVED***, prevUntil: function (a, b, c) ***REMOVED***
			return y(a, "previousSibling", c)
		***REMOVED***, siblings: function (a) ***REMOVED***
			return z((a.parentNode || ***REMOVED******REMOVED***).firstChild, a)
		***REMOVED***, children: function (a) ***REMOVED***
			return z(a.firstChild)
		***REMOVED***, contents: function (a) ***REMOVED***
			return B(a, "iframe") ? a.contentDocument : (B(a, "template") && (a = a.content || a), r.merge([], a.childNodes))
		***REMOVED***
	***REMOVED***, function (a, b) ***REMOVED***
		r.fn[a] = function (c, d) ***REMOVED***
			var e = r.map(this, b, c);
			return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = r.filter(d, e)), this.length > 1 && (J[a] || r.uniqueSort(e), I.test(a) && e.reverse()), this.pushStack(e)
		***REMOVED***
	***REMOVED***);
	var L = /[^\x20\t\r\n\f]+/g;

	function M(a) ***REMOVED***
		var b = ***REMOVED******REMOVED***;
		return r.each(a.match(L) || [], function (a, c) ***REMOVED***
			b[c] = !0
		***REMOVED***), b
	***REMOVED***

	r.Callbacks = function (a) ***REMOVED***
		a = "string" == typeof a ? M(a) : r.extend(***REMOVED******REMOVED***, a);
		var b, c, d, e, f = [], g = [], h = -1, i = function () ***REMOVED***
			for (e = e || a.once, d = b = !0; g.length; h = -1) ***REMOVED***
				c = g.shift();
				while (++h < f.length) f[h].apply(c[0], c[1]) === !1 && a.stopOnFalse && (h = f.length, c = !1)
			***REMOVED***
			a.memory || (c = !1), b = !1, e && (f = c ? [] : "")
		***REMOVED***, j = ***REMOVED***
			add: function () ***REMOVED***
				return f && (c && !b && (h = f.length - 1, g.push(c)), function d(b) ***REMOVED***
					r.each(b, function (b, c) ***REMOVED***
						r.isFunction(c) ? a.unique && j.has(c) || f.push(c) : c && c.length && "string" !== r.type(c) && d(c)
					***REMOVED***)
				***REMOVED***(arguments), c && !b && i()), this
			***REMOVED***, remove: function () ***REMOVED***
				return r.each(arguments, function (a, b) ***REMOVED***
					var c;
					while ((c = r.inArray(b, f, c)) > -1) f.splice(c, 1), c <= h && h--
				***REMOVED***), this
			***REMOVED***, has: function (a) ***REMOVED***
				return a ? r.inArray(a, f) > -1 : f.length > 0
			***REMOVED***, empty: function () ***REMOVED***
				return f && (f = []), this
			***REMOVED***, disable: function () ***REMOVED***
				return e = g = [], f = c = "", this
			***REMOVED***, disabled: function () ***REMOVED***
				return !f
			***REMOVED***, lock: function () ***REMOVED***
				return e = g = [], c || b || (f = c = ""), this
			***REMOVED***, locked: function () ***REMOVED***
				return !!e
			***REMOVED***, fireWith: function (a, c) ***REMOVED***
				return e || (c = c || [], c = [a, c.slice ? c.slice() : c], g.push(c), b || i()), this
			***REMOVED***, fire: function () ***REMOVED***
				return j.fireWith(this, arguments), this
			***REMOVED***, fired: function () ***REMOVED***
				return !!d
			***REMOVED***
		***REMOVED***;
		return j
	***REMOVED***;

	function N(a) ***REMOVED***
		return a
	***REMOVED***

	function O(a) ***REMOVED***
		throw a
	***REMOVED***

	function P(a, b, c, d) ***REMOVED***
		var e;
		try ***REMOVED***
			a && r.isFunction(e = a.promise) ? e.call(a).done(b).fail(c) : a && r.isFunction(e = a.then) ? e.call(a, b, c) : b.apply(void 0, [a].slice(d))
		***REMOVED*** catch (a) ***REMOVED***
			c.apply(void 0, [a])
		***REMOVED***
	***REMOVED***

	r.extend(***REMOVED***
		Deferred: function (b) ***REMOVED***
			var c = [["notify", "progress", r.Callbacks("memory"), r.Callbacks("memory"), 2], ["resolve", "done", r.Callbacks("once memory"), r.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", r.Callbacks("once memory"), r.Callbacks("once memory"), 1, "rejected"]],
				d = "pending", e = ***REMOVED***
					state: function () ***REMOVED***
						return d
					***REMOVED***, always: function () ***REMOVED***
						return f.done(arguments).fail(arguments), this
					***REMOVED***, "catch": function (a) ***REMOVED***
						return e.then(null, a)
					***REMOVED***, pipe: function () ***REMOVED***
						var a = arguments;
						return r.Deferred(function (b) ***REMOVED***
							r.each(c, function (c, d) ***REMOVED***
								var e = r.isFunction(a[d[4]]) && a[d[4]];
								f[d[1]](function () ***REMOVED***
									var a = e && e.apply(this, arguments);
									a && r.isFunction(a.promise) ? a.promise().progress(b.notify).done(b.resolve).fail(b.reject) : b[d[0] + "With"](this, e ? [a] : arguments)
								***REMOVED***)
							***REMOVED***), a = null
						***REMOVED***).promise()
					***REMOVED***, then: function (b, d, e) ***REMOVED***
						var f = 0;

						function g(b, c, d, e) ***REMOVED***
							return function () ***REMOVED***
								var h = this, i = arguments, j = function () ***REMOVED***
									var a, j;
									if (!(b < f)) ***REMOVED***
										if (a = d.apply(h, i), a === c.promise()) throw new TypeError("Thenable self-resolution");
										j = a && ("object" == typeof a || "function" == typeof a) && a.then, r.isFunction(j) ? e ? j.call(a, g(f, c, N, e), g(f, c, O, e)) : (f++, j.call(a, g(f, c, N, e), g(f, c, O, e), g(f, c, N, c.notifyWith))) : (d !== N && (h = void 0, i = [a]), (e || c.resolveWith)(h, i))
									***REMOVED***
								***REMOVED***, k = e ? j : function () ***REMOVED***
									try ***REMOVED***
										j()
									***REMOVED*** catch (a) ***REMOVED***
										r.Deferred.exceptionHook && r.Deferred.exceptionHook(a, k.stackTrace), b + 1 >= f && (d !== O && (h = void 0, i = [a]), c.rejectWith(h, i))
									***REMOVED***
								***REMOVED***;
								b ? k() : (r.Deferred.getStackHook && (k.stackTrace = r.Deferred.getStackHook()), a.setTimeout(k))
							***REMOVED***
						***REMOVED***

						return r.Deferred(function (a) ***REMOVED***
							c[0][3].add(g(0, a, r.isFunction(e) ? e : N, a.notifyWith)), c[1][3].add(g(0, a, r.isFunction(b) ? b : N)), c[2][3].add(g(0, a, r.isFunction(d) ? d : O))
						***REMOVED***).promise()
					***REMOVED***, promise: function (a) ***REMOVED***
						return null != a ? r.extend(a, e) : e
					***REMOVED***
				***REMOVED***, f = ***REMOVED******REMOVED***;
			return r.each(c, function (a, b) ***REMOVED***
				var g = b[2], h = b[5];
				e[b[1]] = g.add, h && g.add(function () ***REMOVED***
					d = h
				***REMOVED***, c[3 - a][2].disable, c[0][2].lock), g.add(b[3].fire), f[b[0]] = function () ***REMOVED***
					return f[b[0] + "With"](this === f ? void 0 : this, arguments), this
				***REMOVED***, f[b[0] + "With"] = g.fireWith
			***REMOVED***), e.promise(f), b && b.call(f, f), f
		***REMOVED***, when: function (a) ***REMOVED***
			var b = arguments.length, c = b, d = Array(c), e = f.call(arguments), g = r.Deferred(), h = function (a) ***REMOVED***
				return function (c) ***REMOVED***
					d[a] = this, e[a] = arguments.length > 1 ? f.call(arguments) : c, --b || g.resolveWith(d, e)
				***REMOVED***
			***REMOVED***;
			if (b <= 1 && (P(a, g.done(h(c)).resolve, g.reject, !b), "pending" === g.state() || r.isFunction(e[c] && e[c].then))) return g.then();
			while (c--) P(e[c], h(c), g.reject);
			return g.promise()
		***REMOVED***
	***REMOVED***);
	var Q = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
	r.Deferred.exceptionHook = function (b, c) ***REMOVED***
		a.console && a.console.warn && b && Q.test(b.name) && a.console.warn("jQuery.Deferred exception: " + b.message, b.stack, c)
	***REMOVED***, r.readyException = function (b) ***REMOVED***
		a.setTimeout(function () ***REMOVED***
			throw b
		***REMOVED***)
	***REMOVED***;
	var R = r.Deferred();
	r.fn.ready = function (a) ***REMOVED***
		return R.then(a)["catch"](function (a) ***REMOVED***
			r.readyException(a)
		***REMOVED***), this
	***REMOVED***, r.extend(***REMOVED***
		isReady: !1, readyWait: 1, ready: function (a) ***REMOVED***
			(a === !0 ? --r.readyWait : r.isReady) || (r.isReady = !0, a !== !0 && --r.readyWait > 0 || R.resolveWith(d, [r]))
		***REMOVED***
	***REMOVED***), r.ready.then = R.then;

	function S() ***REMOVED***
		d.removeEventListener("DOMContentLoaded", S),
			a.removeEventListener("load", S), r.ready()
	***REMOVED***

	"complete" === d.readyState || "loading" !== d.readyState && !d.documentElement.doScroll ? a.setTimeout(r.ready) : (d.addEventListener("DOMContentLoaded", S), a.addEventListener("load", S));
	var T = function (a, b, c, d, e, f, g) ***REMOVED***
		var h = 0, i = a.length, j = null == c;
		if ("object" === r.type(c)) ***REMOVED***
			e = !0;
			for (h in c) T(a, b, h, c[h], !0, f, g)
		***REMOVED*** else if (void 0 !== d && (e = !0, r.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function (a, b, c) ***REMOVED***
				return j.call(r(a), c)
			***REMOVED***)), b)) for (; h < i; h++) b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
		return e ? a : j ? b.call(a) : i ? b(a[0], c) : f
	***REMOVED***, U = function (a) ***REMOVED***
		return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType
	***REMOVED***;

	function V() ***REMOVED***
		this.expando = r.expando + V.uid++
	***REMOVED***

	V.uid = 1, V.prototype = ***REMOVED***
		cache: function (a) ***REMOVED***
			var b = a[this.expando];
			return b || (b = ***REMOVED******REMOVED***, U(a) && (a.nodeType ? a[this.expando] = b : Object.defineProperty(a, this.expando, ***REMOVED***
				value: b,
				configurable: !0
			***REMOVED***))), b
		***REMOVED***, set: function (a, b, c) ***REMOVED***
			var d, e = this.cache(a);
			if ("string" == typeof b) e[r.camelCase(b)] = c; else for (d in b) e[r.camelCase(d)] = b[d];
			return e
		***REMOVED***, get: function (a, b) ***REMOVED***
			return void 0 === b ? this.cache(a) : a[this.expando] && a[this.expando][r.camelCase(b)]
		***REMOVED***, access: function (a, b, c) ***REMOVED***
			return void 0 === b || b && "string" == typeof b && void 0 === c ? this.get(a, b) : (this.set(a, b, c), void 0 !== c ? c : b)
		***REMOVED***, remove: function (a, b) ***REMOVED***
			var c, d = a[this.expando];
			if (void 0 !== d) ***REMOVED***
				if (void 0 !== b) ***REMOVED***
					Array.isArray(b) ? b = b.map(r.camelCase) : (b = r.camelCase(b), b = b in d ? [b] : b.match(L) || []), c = b.length;
					while (c--) delete d[b[c]]
				***REMOVED***
				(void 0 === b || r.isEmptyObject(d)) && (a.nodeType ? a[this.expando] = void 0 : delete a[this.expando])
			***REMOVED***
		***REMOVED***, hasData: function (a) ***REMOVED***
			var b = a[this.expando];
			return void 0 !== b && !r.isEmptyObject(b)
		***REMOVED***
	***REMOVED***;
	var W = new V, X = new V, Y = /^(?:\***REMOVED***[\w\W]*\***REMOVED***|\[[\w\W]*\])$/, Z = /[A-Z]/g;

	function $(a) ***REMOVED***
		return "true" === a || "false" !== a && ("null" === a ? null : a === +a + "" ? +a : Y.test(a) ? JSON.parse(a) : a)
	***REMOVED***

	function _(a, b, c) ***REMOVED***
		var d;
		if (void 0 === c && 1 === a.nodeType) if (d = "data-" + b.replace(Z, "-$&").toLowerCase(), c = a.getAttribute(d), "string" == typeof c) ***REMOVED***
			try ***REMOVED***
				c = $(c)
			***REMOVED*** catch (e) ***REMOVED***
			***REMOVED***
			X.set(a, b, c)
		***REMOVED*** else c = void 0;
		return c
	***REMOVED***

	r.extend(***REMOVED***
		hasData: function (a) ***REMOVED***
			return X.hasData(a) || W.hasData(a)
		***REMOVED***, data: function (a, b, c) ***REMOVED***
			return X.access(a, b, c)
		***REMOVED***, removeData: function (a, b) ***REMOVED***
			X.remove(a, b)
		***REMOVED***, _data: function (a, b, c) ***REMOVED***
			return W.access(a, b, c)
		***REMOVED***, _removeData: function (a, b) ***REMOVED***
			W.remove(a, b)
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		data: function (a, b) ***REMOVED***
			var c, d, e, f = this[0], g = f && f.attributes;
			if (void 0 === a) ***REMOVED***
				if (this.length && (e = X.get(f), 1 === f.nodeType && !W.get(f, "hasDataAttrs"))) ***REMOVED***
					c = g.length;
					while (c--) g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = r.camelCase(d.slice(5)), _(f, d, e[d])));
					W.set(f, "hasDataAttrs", !0)
				***REMOVED***
				return e
			***REMOVED***
			return "object" == typeof a ? this.each(function () ***REMOVED***
				X.set(this, a)
			***REMOVED***) : T(this, function (b) ***REMOVED***
				var c;
				if (f && void 0 === b) ***REMOVED***
					if (c = X.get(f, a), void 0 !== c) return c;
					if (c = _(f, a), void 0 !== c) return c
				***REMOVED*** else this.each(function () ***REMOVED***
					X.set(this, a, b)
				***REMOVED***)
			***REMOVED***, null, b, arguments.length > 1, null, !0)
		***REMOVED***, removeData: function (a) ***REMOVED***
			return this.each(function () ***REMOVED***
				X.remove(this, a)
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.extend(***REMOVED***
		queue: function (a, b, c) ***REMOVED***
			var d;
			if (a) return b = (b || "fx") + "queue", d = W.get(a, b), c && (!d || Array.isArray(c) ? d = W.access(a, b, r.makeArray(c)) : d.push(c)), d || []
		***REMOVED***, dequeue: function (a, b) ***REMOVED***
			b = b || "fx";
			var c = r.queue(a, b), d = c.length, e = c.shift(), f = r._queueHooks(a, b), g = function () ***REMOVED***
				r.dequeue(a, b)
			***REMOVED***;
			"inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire()
		***REMOVED***, _queueHooks: function (a, b) ***REMOVED***
			var c = b + "queueHooks";
			return W.get(a, c) || W.access(a, c, ***REMOVED***
				empty: r.Callbacks("once memory").add(function () ***REMOVED***
					W.remove(a, [b + "queue", c])
				***REMOVED***)
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		queue: function (a, b) ***REMOVED***
			var c = 2;
			return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? r.queue(this[0], a) : void 0 === b ? this : this.each(function () ***REMOVED***
				var c = r.queue(this, a, b);
				r._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && r.dequeue(this, a)
			***REMOVED***)
		***REMOVED***, dequeue: function (a) ***REMOVED***
			return this.each(function () ***REMOVED***
				r.dequeue(this, a)
			***REMOVED***)
		***REMOVED***, clearQueue: function (a) ***REMOVED***
			return this.queue(a || "fx", [])
		***REMOVED***, promise: function (a, b) ***REMOVED***
			var c, d = 1, e = r.Deferred(), f = this, g = this.length, h = function () ***REMOVED***
				--d || e.resolveWith(f, [f])
			***REMOVED***;
			"string" != typeof a && (b = a, a = void 0), a = a || "fx";
			while (g--) c = W.get(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h));
			return h(), e.promise(b)
		***REMOVED***
	***REMOVED***);
	var aa = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, ba = new RegExp("^(?:([+-])=|)(" + aa + ")([a-z%]*)$", "i"),
		ca = ["Top", "Right", "Bottom", "Left"], da = function (a, b) ***REMOVED***
			return a = b || a, "none" === a.style.display || "" === a.style.display && r.contains(a.ownerDocument, a) && "none" === r.css(a, "display")
		***REMOVED***, ea = function (a, b, c, d) ***REMOVED***
			var e, f, g = ***REMOVED******REMOVED***;
			for (f in b) g[f] = a.style[f], a.style[f] = b[f];
			e = c.apply(a, d || []);
			for (f in b) a.style[f] = g[f];
			return e
		***REMOVED***;

	function fa(a, b, c, d) ***REMOVED***
		var e, f = 1, g = 20, h = d ? function () ***REMOVED***
				return d.cur()
			***REMOVED*** : function () ***REMOVED***
				return r.css(a, b, "")
			***REMOVED***, i = h(), j = c && c[3] || (r.cssNumber[b] ? "" : "px"),
			k = (r.cssNumber[b] || "px" !== j && +i) && ba.exec(r.css(a, b));
		if (k && k[3] !== j) ***REMOVED***
			j = j || k[3], c = c || [], k = +i || 1;
			do f = f || ".5", k /= f, r.style(a, b, k + j); while (f !== (f = h() / i) && 1 !== f && --g)
		***REMOVED***
		return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e
	***REMOVED***

	var ga = ***REMOVED******REMOVED***;

	function ha(a) ***REMOVED***
		var b, c = a.ownerDocument, d = a.nodeName, e = ga[d];
		return e ? e : (b = c.body.appendChild(c.createElement(d)), e = r.css(b, "display"), b.parentNode.removeChild(b), "none" === e && (e = "block"), ga[d] = e, e)
	***REMOVED***

	function ia(a, b) ***REMOVED***
		for (var c, d, e = [], f = 0, g = a.length; f < g; f++) d = a[f], d.style && (c = d.style.display, b ? ("none" === c && (e[f] = W.get(d, "display") || null, e[f] || (d.style.display = "")), "" === d.style.display && da(d) && (e[f] = ha(d))) : "none" !== c && (e[f] = "none", W.set(d, "display", c)));
		for (f = 0; f < g; f++) null != e[f] && (a[f].style.display = e[f]);
		return a
	***REMOVED***

	r.fn.extend(***REMOVED***
		show: function () ***REMOVED***
			return ia(this, !0)
		***REMOVED***, hide: function () ***REMOVED***
			return ia(this)
		***REMOVED***, toggle: function (a) ***REMOVED***
			return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () ***REMOVED***
				da(this) ? r(this).show() : r(this).hide()
			***REMOVED***)
		***REMOVED***
	***REMOVED***);
	var ja = /^(?:checkbox|radio)$/i, ka = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i, la = /^$|\/(?:java|ecma)script/i, ma = ***REMOVED***
		option: [1, "<select multiple='multiple'>", "</select>"],
		thead: [1, "<table>", "</table>"],
		col: [2, "<table><colgroup>", "</colgroup></table>"],
		tr: [2, "<table><tbody>", "</tbody></table>"],
		td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
		_default: [0, "", ""]
	***REMOVED***;
	ma.optgroup = ma.option, ma.tbody = ma.tfoot = ma.colgroup = ma.caption = ma.thead, ma.th = ma.td;

	function na(a, b) ***REMOVED***
		var c;
		return c = "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName(b || "*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll(b || "*") : [], void 0 === b || b && B(a, b) ? r.merge([a], c) : c
	***REMOVED***

	function oa(a, b) ***REMOVED***
		for (var c = 0, d = a.length; c < d; c++) W.set(a[c], "globalEval", !b || W.get(b[c], "globalEval"))
	***REMOVED***

	var pa = /<|&#?\w+;/;

	function qa(a, b, c, d, e) ***REMOVED***
		for (var f, g, h, i, j, k, l = b.createDocumentFragment(), m = [], n = 0, o = a.length; n < o; n++) if (f = a[n], f || 0 === f) if ("object" === r.type(f)) r.merge(m, f.nodeType ? [f] : f); else if (pa.test(f)) ***REMOVED***
			g = g || l.appendChild(b.createElement("div")), h = (ka.exec(f) || ["", ""])[1].toLowerCase(), i = ma[h] || ma._default, g.innerHTML = i[1] + r.htmlPrefilter(f) + i[2], k = i[0];
			while (k--) g = g.lastChild;
			r.merge(m, g.childNodes), g = l.firstChild, g.textContent = ""
		***REMOVED*** else m.push(b.createTextNode(f));
		l.textContent = "", n = 0;
		while (f = m[n++]) if (d && r.inArray(f, d) > -1) e && e.push(f); else if (j = r.contains(f.ownerDocument, f), g = na(l.appendChild(f), "script"), j && oa(g), c) ***REMOVED***
			k = 0;
			while (f = g[k++]) la.test(f.type || "") && c.push(f)
		***REMOVED***
		return l
	***REMOVED***

	!function () ***REMOVED***
		var a = d.createDocumentFragment(), b = a.appendChild(d.createElement("div")), c = d.createElement("input");
		c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), o.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", o.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue
	***REMOVED***();
	var ra = d.documentElement, sa = /^key/, ta = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
		ua = /^([^.]*)(?:\.(.+)|)/;

	function va() ***REMOVED***
		return !0
	***REMOVED***

	function wa() ***REMOVED***
		return !1
	***REMOVED***

	function xa() ***REMOVED***
		try ***REMOVED***
			return d.activeElement
		***REMOVED*** catch (a) ***REMOVED***
		***REMOVED***
	***REMOVED***

	function ya(a, b, c, d, e, f) ***REMOVED***
		var g, h;
		if ("object" == typeof b) ***REMOVED***
			"string" != typeof c && (d = d || c, c = void 0);
			for (h in b) ya(a, h, c, d, b[h], f);
			return a
		***REMOVED***
		if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), e === !1) e = wa; else if (!e) return a;
		return 1 === f && (g = e, e = function (a) ***REMOVED***
			return r().off(a), g.apply(this, arguments)
		***REMOVED***, e.guid = g.guid || (g.guid = r.guid++)), a.each(function () ***REMOVED***
			r.event.add(this, b, e, d, c)
		***REMOVED***)
	***REMOVED***

	r.event = ***REMOVED***
		global: ***REMOVED******REMOVED***, add: function (a, b, c, d, e) ***REMOVED***
			var f, g, h, i, j, k, l, m, n, o, p, q = W.get(a);
			if (q) ***REMOVED***
				c.handler && (f = c, c = f.handler, e = f.selector), e && r.find.matchesSelector(ra, e), c.guid || (c.guid = r.guid++), (i = q.events) || (i = q.events = ***REMOVED******REMOVED***), (g = q.handle) || (g = q.handle = function (b) ***REMOVED***
					return "undefined" != typeof r && r.event.triggered !== b.type ? r.event.dispatch.apply(a, arguments) : void 0
				***REMOVED***), b = (b || "").match(L) || [""], j = b.length;
				while (j--) h = ua.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n && (l = r.event.special[n] || ***REMOVED******REMOVED***, n = (e ? l.delegateType : l.bindType) || n, l = r.event.special[n] || ***REMOVED******REMOVED***, k = r.extend(***REMOVED***
					type: n,
					origType: p,
					data: d,
					handler: c,
					guid: c.guid,
					selector: e,
					needsContext: e && r.expr.match.needsContext.test(e),
					namespace: o.join(".")
				***REMOVED***, f), (m = i[n]) || (m = i[n] = [], m.delegateCount = 0, l.setup && l.setup.call(a, d, o, g) !== !1 || a.addEventListener && a.addEventListener(n, g)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), r.event.global[n] = !0)
			***REMOVED***
		***REMOVED***, remove: function (a, b, c, d, e) ***REMOVED***
			var f, g, h, i, j, k, l, m, n, o, p, q = W.hasData(a) && W.get(a);
			if (q && (i = q.events)) ***REMOVED***
				b = (b || "").match(L) || [""], j = b.length;
				while (j--) if (h = ua.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n) ***REMOVED***
					l = r.event.special[n] || ***REMOVED******REMOVED***, n = (d ? l.delegateType : l.bindType) || n, m = i[n] || [], h = h[2] && new RegExp("(^|\\.)" + o.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length;
					while (f--) k = m[f], !e && p !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k));
					g && !m.length && (l.teardown && l.teardown.call(a, o, q.handle) !== !1 || r.removeEvent(a, n, q.handle), delete i[n])
				***REMOVED*** else for (n in i) r.event.remove(a, n + b[j], c, d, !0);
				r.isEmptyObject(i) && W.remove(a, "handle events")
			***REMOVED***
		***REMOVED***, dispatch: function (a) ***REMOVED***
			var b = r.event.fix(a), c, d, e, f, g, h, i = new Array(arguments.length),
				j = (W.get(this, "events") || ***REMOVED******REMOVED***)[b.type] || [], k = r.event.special[b.type] || ***REMOVED******REMOVED***;
			for (i[0] = b, c = 1; c < arguments.length; c++) i[c] = arguments[c];
			if (b.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, b) !== !1) ***REMOVED***
				h = r.event.handlers.call(this, b, j), c = 0;
				while ((f = h[c++]) && !b.isPropagationStopped()) ***REMOVED***
					b.currentTarget = f.elem, d = 0;
					while ((g = f.handlers[d++]) && !b.isImmediatePropagationStopped()) b.rnamespace && !b.rnamespace.test(g.namespace) || (b.handleObj = g, b.data = g.data, e = ((r.event.special[g.origType] || ***REMOVED******REMOVED***).handle || g.handler).apply(f.elem, i), void 0 !== e && (b.result = e) === !1 && (b.preventDefault(), b.stopPropagation()))
				***REMOVED***
				return k.postDispatch && k.postDispatch.call(this, b), b.result
			***REMOVED***
		***REMOVED***, handlers: function (a, b) ***REMOVED***
			var c, d, e, f, g, h = [], i = b.delegateCount, j = a.target;
			if (i && j.nodeType && !("click" === a.type && a.button >= 1)) for (; j !== this; j = j.parentNode || this) if (1 === j.nodeType && ("click" !== a.type || j.disabled !== !0)) ***REMOVED***
				for (f = [], g = ***REMOVED******REMOVED***, c = 0; c < i; c++) d = b[c], e = d.selector + " ", void 0 === g[e] && (g[e] = d.needsContext ? r(e, this).index(j) > -1 : r.find(e, this, null, [j]).length), g[e] && f.push(d);
				f.length && h.push(***REMOVED***elem: j, handlers: f***REMOVED***)
			***REMOVED***
			return j = this, i < b.length && h.push(***REMOVED***elem: j, handlers: b.slice(i)***REMOVED***), h
		***REMOVED***, addProp: function (a, b) ***REMOVED***
			Object.defineProperty(r.Event.prototype, a, ***REMOVED***
				enumerable: !0,
				configurable: !0,
				get: r.isFunction(b) ? function () ***REMOVED***
					if (this.originalEvent) return b(this.originalEvent)
				***REMOVED*** : function () ***REMOVED***
					if (this.originalEvent) return this.originalEvent[a]
				***REMOVED***,
				set: function (b) ***REMOVED***
					Object.defineProperty(this, a, ***REMOVED***enumerable: !0, configurable: !0, writable: !0, value: b***REMOVED***)
				***REMOVED***
			***REMOVED***)
		***REMOVED***, fix: function (a) ***REMOVED***
			return a[r.expando] ? a : new r.Event(a)
		***REMOVED***, special: ***REMOVED***
			load: ***REMOVED***noBubble: !0***REMOVED***, focus: ***REMOVED***
				trigger: function () ***REMOVED***
					if (this !== xa() && this.focus) return this.focus(), !1
				***REMOVED***, delegateType: "focusin"
			***REMOVED***, blur: ***REMOVED***
				trigger: function () ***REMOVED***
					if (this === xa() && this.blur) return this.blur(), !1
				***REMOVED***, delegateType: "focusout"
			***REMOVED***, click: ***REMOVED***
				trigger: function () ***REMOVED***
					if ("checkbox" === this.type && this.click && B(this, "input")) return this.click(), !1
				***REMOVED***, _default: function (a) ***REMOVED***
					return B(a.target, "a")
				***REMOVED***
			***REMOVED***, beforeunload: ***REMOVED***
				postDispatch: function (a) ***REMOVED***
					void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result)
				***REMOVED***
			***REMOVED***
		***REMOVED***
	***REMOVED***, r.removeEvent = function (a, b, c) ***REMOVED***
		a.removeEventListener && a.removeEventListener(b, c)
	***REMOVED***, r.Event = function (a, b) ***REMOVED***
		return this instanceof r.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? va : wa, this.target = a.target && 3 === a.target.nodeType ? a.target.parentNode : a.target, this.currentTarget = a.currentTarget, this.relatedTarget = a.relatedTarget) : this.type = a, b && r.extend(this, b), this.timeStamp = a && a.timeStamp || r.now(), void(this[r.expando] = !0)) : new r.Event(a, b)
	***REMOVED***, r.Event.prototype = ***REMOVED***
		constructor: r.Event,
		isDefaultPrevented: wa,
		isPropagationStopped: wa,
		isImmediatePropagationStopped: wa,
		isSimulated: !1,
		preventDefault: function () ***REMOVED***
			var a = this.originalEvent;
			this.isDefaultPrevented = va, a && !this.isSimulated && a.preventDefault()
		***REMOVED***,
		stopPropagation: function () ***REMOVED***
			var a = this.originalEvent;
			this.isPropagationStopped = va, a && !this.isSimulated && a.stopPropagation()
		***REMOVED***,
		stopImmediatePropagation: function () ***REMOVED***
			var a = this.originalEvent;
			this.isImmediatePropagationStopped = va, a && !this.isSimulated && a.stopImmediatePropagation(), this.stopPropagation()
		***REMOVED***
	***REMOVED***, r.each(***REMOVED***
		altKey: !0,
		bubbles: !0,
		cancelable: !0,
		changedTouches: !0,
		ctrlKey: !0,
		detail: !0,
		eventPhase: !0,
		metaKey: !0,
		pageX: !0,
		pageY: !0,
		shiftKey: !0,
		view: !0,
		"char": !0,
		charCode: !0,
		key: !0,
		keyCode: !0,
		button: !0,
		buttons: !0,
		clientX: !0,
		clientY: !0,
		offsetX: !0,
		offsetY: !0,
		pointerId: !0,
		pointerType: !0,
		screenX: !0,
		screenY: !0,
		targetTouches: !0,
		toElement: !0,
		touches: !0,
		which: function (a) ***REMOVED***
			var b = a.button;
			return null == a.which && sa.test(a.type) ? null != a.charCode ? a.charCode : a.keyCode : !a.which && void 0 !== b && ta.test(a.type) ? 1 & b ? 1 : 2 & b ? 3 : 4 & b ? 2 : 0 : a.which
		***REMOVED***
	***REMOVED***, r.event.addProp), r.each(***REMOVED***
		mouseenter: "mouseover",
		mouseleave: "mouseout",
		pointerenter: "pointerover",
		pointerleave: "pointerout"
	***REMOVED***, function (a, b) ***REMOVED***
		r.event.special[a] = ***REMOVED***
			delegateType: b, bindType: b, handle: function (a) ***REMOVED***
				var c, d = this, e = a.relatedTarget, f = a.handleObj;
				return e && (e === d || r.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		on: function (a, b, c, d) ***REMOVED***
			return ya(this, a, b, c, d)
		***REMOVED***, one: function (a, b, c, d) ***REMOVED***
			return ya(this, a, b, c, d, 1)
		***REMOVED***, off: function (a, b, c) ***REMOVED***
			var d, e;
			if (a && a.preventDefault && a.handleObj) return d = a.handleObj, r(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this;
			if ("object" == typeof a) ***REMOVED***
				for (e in a) this.off(e, b, a[e]);
				return this
			***REMOVED***
			return b !== !1 && "function" != typeof b || (c = b, b = void 0), c === !1 && (c = wa), this.each(function () ***REMOVED***
				r.event.remove(this, a, c, b)
			***REMOVED***)
		***REMOVED***
	***REMOVED***);
	var za = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
		Aa = /<script|<style|<link/i, Ba = /checked\s*(?:[^=]|=\s*.checked.)/i, Ca = /^true\/(.*)/,
		Da = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

	function Ea(a, b) ***REMOVED***
		return B(a, "table") && B(11 !== b.nodeType ? b : b.firstChild, "tr") ? r(">tbody", a)[0] || a : a
	***REMOVED***

	function Fa(a) ***REMOVED***
		return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a
	***REMOVED***

	function Ga(a) ***REMOVED***
		var b = Ca.exec(a.type);
		return b ? a.type = b[1] : a.removeAttribute("type"), a
	***REMOVED***

	function Ha(a, b) ***REMOVED***
		var c, d, e, f, g, h, i, j;
		if (1 === b.nodeType) ***REMOVED***
			if (W.hasData(a) && (f = W.access(a), g = W.set(b, f), j = f.events)) ***REMOVED***
				delete g.handle, g.events = ***REMOVED******REMOVED***;
				for (e in j) for (c = 0, d = j[e].length; c < d; c++) r.event.add(b, e, j[e][c])
			***REMOVED***
			X.hasData(a) && (h = X.access(a), i = r.extend(***REMOVED******REMOVED***, h), X.set(b, i))
		***REMOVED***
	***REMOVED***

	function Ia(a, b) ***REMOVED***
		var c = b.nodeName.toLowerCase();
		"input" === c && ja.test(a.type) ? b.checked = a.checked : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue)
	***REMOVED***

	function Ja(a, b, c, d) ***REMOVED***
		b = g.apply([], b);
		var e, f, h, i, j, k, l = 0, m = a.length, n = m - 1, q = b[0], s = r.isFunction(q);
		if (s || m > 1 && "string" == typeof q && !o.checkClone && Ba.test(q)) return a.each(function (e) ***REMOVED***
			var f = a.eq(e);
			s && (b[0] = q.call(this, e, f.html())), Ja(f, b, c, d)
		***REMOVED***);
		if (m && (e = qa(b, a[0].ownerDocument, !1, a, d), f = e.firstChild, 1 === e.childNodes.length && (e = f), f || d)) ***REMOVED***
			for (h = r.map(na(e, "script"), Fa), i = h.length; l < m; l++) j = e, l !== n && (j = r.clone(j, !0, !0), i && r.merge(h, na(j, "script"))), c.call(a[l], j, l);
			if (i) for (k = h[h.length - 1].ownerDocument, r.map(h, Ga), l = 0; l < i; l++) j = h[l], la.test(j.type || "") && !W.access(j, "globalEval") && r.contains(k, j) && (j.src ? r._evalUrl && r._evalUrl(j.src) : p(j.textContent.replace(Da, ""), k))
		***REMOVED***
		return a
	***REMOVED***

	function Ka(a, b, c) ***REMOVED***
		for (var d, e = b ? r.filter(b, a) : a, f = 0; null != (d = e[f]); f++) c || 1 !== d.nodeType || r.cleanData(na(d)), d.parentNode && (c && r.contains(d.ownerDocument, d) && oa(na(d, "script")), d.parentNode.removeChild(d));
		return a
	***REMOVED***

	r.extend(***REMOVED***
		htmlPrefilter: function (a) ***REMOVED***
			return a.replace(za, "<$1></$2>")
		***REMOVED***, clone: function (a, b, c) ***REMOVED***
			var d, e, f, g, h = a.cloneNode(!0), i = r.contains(a.ownerDocument, a);
			if (!(o.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || r.isXMLDoc(a))) for (g = na(h), f = na(a), d = 0, e = f.length; d < e; d++) Ia(f[d], g[d]);
			if (b) if (c) for (f = f || na(a), g = g || na(h), d = 0, e = f.length; d < e; d++) Ha(f[d], g[d]); else Ha(a, h);
			return g = na(h, "script"), g.length > 0 && oa(g, !i && na(a, "script")), h
		***REMOVED***, cleanData: function (a) ***REMOVED***
			for (var b, c, d, e = r.event.special, f = 0; void 0 !== (c = a[f]); f++) if (U(c)) ***REMOVED***
				if (b = c[W.expando]) ***REMOVED***
					if (b.events) for (d in b.events) e[d] ? r.event.remove(c, d) : r.removeEvent(c, d, b.handle);
					c[W.expando] = void 0
				***REMOVED***
				c[X.expando] && (c[X.expando] = void 0)
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		detach: function (a) ***REMOVED***
			return Ka(this, a, !0)
		***REMOVED***, remove: function (a) ***REMOVED***
			return Ka(this, a)
		***REMOVED***, text: function (a) ***REMOVED***
			return T(this, function (a) ***REMOVED***
				return void 0 === a ? r.text(this) : this.empty().each(function () ***REMOVED***
					1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = a)
				***REMOVED***)
			***REMOVED***, null, a, arguments.length)
		***REMOVED***, append: function () ***REMOVED***
			return Ja(this, arguments, function (a) ***REMOVED***
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) ***REMOVED***
					var b = Ea(this, a);
					b.appendChild(a)
				***REMOVED***
			***REMOVED***)
		***REMOVED***, prepend: function () ***REMOVED***
			return Ja(this, arguments, function (a) ***REMOVED***
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) ***REMOVED***
					var b = Ea(this, a);
					b.insertBefore(a, b.firstChild)
				***REMOVED***
			***REMOVED***)
		***REMOVED***, before: function () ***REMOVED***
			return Ja(this, arguments, function (a) ***REMOVED***
				this.parentNode && this.parentNode.insertBefore(a, this)
			***REMOVED***)
		***REMOVED***, after: function () ***REMOVED***
			return Ja(this, arguments, function (a) ***REMOVED***
				this.parentNode && this.parentNode.insertBefore(a, this.nextSibling)
			***REMOVED***)
		***REMOVED***, empty: function () ***REMOVED***
			for (var a, b = 0; null != (a = this[b]); b++) 1 === a.nodeType && (r.cleanData(na(a, !1)), a.textContent = "");
			return this
		***REMOVED***, clone: function (a, b) ***REMOVED***
			return a = null != a && a, b = null == b ? a : b, this.map(function () ***REMOVED***
				return r.clone(this, a, b)
			***REMOVED***)
		***REMOVED***, html: function (a) ***REMOVED***
			return T(this, function (a) ***REMOVED***
				var b = this[0] || ***REMOVED******REMOVED***, c = 0, d = this.length;
				if (void 0 === a && 1 === b.nodeType) return b.innerHTML;
				if ("string" == typeof a && !Aa.test(a) && !ma[(ka.exec(a) || ["", ""])[1].toLowerCase()]) ***REMOVED***
					a = r.htmlPrefilter(a);
					try ***REMOVED***
						for (; c < d; c++) b = this[c] || ***REMOVED******REMOVED***, 1 === b.nodeType && (r.cleanData(na(b, !1)), b.innerHTML = a);
						b = 0
					***REMOVED*** catch (e) ***REMOVED***
					***REMOVED***
				***REMOVED***
				b && this.empty().append(a)
			***REMOVED***, null, a, arguments.length)
		***REMOVED***, replaceWith: function () ***REMOVED***
			var a = [];
			return Ja(this, arguments, function (b) ***REMOVED***
				var c = this.parentNode;
				r.inArray(this, a) < 0 && (r.cleanData(na(this)), c && c.replaceChild(b, this))
			***REMOVED***, a)
		***REMOVED***
	***REMOVED***), r.each(***REMOVED***
		appendTo: "append",
		prependTo: "prepend",
		insertBefore: "before",
		insertAfter: "after",
		replaceAll: "replaceWith"
	***REMOVED***, function (a, b) ***REMOVED***
		r.fn[a] = function (a) ***REMOVED***
			for (var c, d = [], e = r(a), f = e.length - 1, g = 0; g <= f; g++) c = g === f ? this : this.clone(!0), r(e[g])[b](c), h.apply(d, c.get());
			return this.pushStack(d)
		***REMOVED***
	***REMOVED***);
	var La = /^margin/, Ma = new RegExp("^(" + aa + ")(?!px)[a-z%]+$", "i"), Na = function (b) ***REMOVED***
		var c = b.ownerDocument.defaultView;
		return c && c.opener || (c = a), c.getComputedStyle(b)
	***REMOVED***;
	!function () ***REMOVED***
		function b() ***REMOVED***
			if (i) ***REMOVED***
				i.style.cssText = "box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", i.innerHTML = "", ra.appendChild(h);
				var b = a.getComputedStyle(i);
				c = "1%" !== b.top, g = "2px" === b.marginLeft, e = "4px" === b.width, i.style.marginRight = "50%", f = "4px" === b.marginRight, ra.removeChild(h), i = null
			***REMOVED***
		***REMOVED***

		var c, e, f, g, h = d.createElement("div"), i = d.createElement("div");
		i.style && (i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", o.clearCloneStyle = "content-box" === i.style.backgroundClip, h.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", h.appendChild(i), r.extend(o, ***REMOVED***
			pixelPosition: function () ***REMOVED***
				return b(), c
			***REMOVED***, boxSizingReliable: function () ***REMOVED***
				return b(), e
			***REMOVED***, pixelMarginRight: function () ***REMOVED***
				return b(), f
			***REMOVED***, reliableMarginLeft: function () ***REMOVED***
				return b(), g
			***REMOVED***
		***REMOVED***))
	***REMOVED***();

	function Oa(a, b, c) ***REMOVED***
		var d, e, f, g, h = a.style;
		return c = c || Na(a), c && (g = c.getPropertyValue(b) || c[b], "" !== g || r.contains(a.ownerDocument, a) || (g = r.style(a, b)), !o.pixelMarginRight() && Ma.test(g) && La.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f)), void 0 !== g ? g + "" : g
	***REMOVED***

	function Pa(a, b) ***REMOVED***
		return ***REMOVED***
			get: function () ***REMOVED***
				return a() ? void delete this.get : (this.get = b).apply(this, arguments)
			***REMOVED***
		***REMOVED***
	***REMOVED***

	var Qa = /^(none|table(?!-c[ea]).+)/, Ra = /^--/,
		Sa = ***REMOVED***position: "absolute", visibility: "hidden", display: "block"***REMOVED***,
		Ta = ***REMOVED***letterSpacing: "0", fontWeight: "400"***REMOVED***, Ua = ["Webkit", "Moz", "ms"], Va = d.createElement("div").style;

	function Wa(a) ***REMOVED***
		if (a in Va) return a;
		var b = a[0].toUpperCase() + a.slice(1), c = Ua.length;
		while (c--) if (a = Ua[c] + b, a in Va) return a
	***REMOVED***

	function Xa(a) ***REMOVED***
		var b = r.cssProps[a];
		return b || (b = r.cssProps[a] = Wa(a) || a), b
	***REMOVED***

	function Ya(a, b, c) ***REMOVED***
		var d = ba.exec(b);
		return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b
	***REMOVED***

	function Za(a, b, c, d, e) ***REMOVED***
		var f, g = 0;
		for (f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0; f < 4; f += 2) "margin" === c && (g += r.css(a, c + ca[f], !0, e)), d ? ("content" === c && (g -= r.css(a, "padding" + ca[f], !0, e)), "margin" !== c && (g -= r.css(a, "border" + ca[f] + "Width", !0, e))) : (g += r.css(a, "padding" + ca[f], !0, e), "padding" !== c && (g += r.css(a, "border" + ca[f] + "Width", !0, e)));
		return g
	***REMOVED***

	function $a(a, b, c) ***REMOVED***
		var d, e = Na(a), f = Oa(a, b, e), g = "border-box" === r.css(a, "boxSizing", !1, e);
		return Ma.test(f) ? f : (d = g && (o.boxSizingReliable() || f === a.style[b]), "auto" === f && (f = a["offset" + b[0].toUpperCase() + b.slice(1)]), f = parseFloat(f) || 0, f + Za(a, b, c || (g ? "border" : "content"), d, e) + "px")
	***REMOVED***

	r.extend(***REMOVED***
		cssHooks: ***REMOVED***
			opacity: ***REMOVED***
				get: function (a, b) ***REMOVED***
					if (b) ***REMOVED***
						var c = Oa(a, "opacity");
						return "" === c ? "1" : c
					***REMOVED***
				***REMOVED***
			***REMOVED***
		***REMOVED***,
		cssNumber: ***REMOVED***
			animationIterationCount: !0,
			columnCount: !0,
			fillOpacity: !0,
			flexGrow: !0,
			flexShrink: !0,
			fontWeight: !0,
			lineHeight: !0,
			opacity: !0,
			order: !0,
			orphans: !0,
			widows: !0,
			zIndex: !0,
			zoom: !0
		***REMOVED***,
		cssProps: ***REMOVED***"float": "cssFloat"***REMOVED***,
		style: function (a, b, c, d) ***REMOVED***
			if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) ***REMOVED***
				var e, f, g, h = r.camelCase(b), i = Ra.test(b), j = a.style;
				return i || (b = Xa(h)), g = r.cssHooks[b] || r.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : j[b] : (f = typeof c, "string" === f && (e = ba.exec(c)) && e[1] && (c = fa(a, b, e), f = "number"), null != c && c === c && ("number" === f && (c += e && e[3] || (r.cssNumber[h] ? "" : "px")), o.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (j[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i ? j.setProperty(b, c) : j[b] = c)), void 0)
			***REMOVED***
		***REMOVED***,
		css: function (a, b, c, d) ***REMOVED***
			var e, f, g, h = r.camelCase(b), i = Ra.test(b);
			return i || (b = Xa(h)), g = r.cssHooks[b] || r.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = Oa(a, b, d)), "normal" === e && b in Ta && (e = Ta[b]), "" === c || c ? (f = parseFloat(e), c === !0 || isFinite(f) ? f || 0 : e) : e
		***REMOVED***
	***REMOVED***), r.each(["height", "width"], function (a, b) ***REMOVED***
		r.cssHooks[b] = ***REMOVED***
			get: function (a, c, d) ***REMOVED***
				if (c) return !Qa.test(r.css(a, "display")) || a.getClientRects().length && a.getBoundingClientRect().width ? $a(a, b, d) : ea(a, Sa, function () ***REMOVED***
					return $a(a, b, d)
				***REMOVED***)
			***REMOVED***, set: function (a, c, d) ***REMOVED***
				var e, f = d && Na(a), g = d && Za(a, b, d, "border-box" === r.css(a, "boxSizing", !1, f), f);
				return g && (e = ba.exec(c)) && "px" !== (e[3] || "px") && (a.style[b] = c, c = r.css(a, b)), Ya(a, c, g)
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.cssHooks.marginLeft = Pa(o.reliableMarginLeft, function (a, b) ***REMOVED***
		if (b) return (parseFloat(Oa(a, "marginLeft")) || a.getBoundingClientRect().left - ea(a, ***REMOVED***marginLeft: 0***REMOVED***, function () ***REMOVED***
			return a.getBoundingClientRect().left
		***REMOVED***)) + "px"
	***REMOVED***), r.each(***REMOVED***margin: "", padding: "", border: "Width"***REMOVED***, function (a, b) ***REMOVED***
		r.cssHooks[a + b] = ***REMOVED***
			expand: function (c) ***REMOVED***
				for (var d = 0, e = ***REMOVED******REMOVED***, f = "string" == typeof c ? c.split(" ") : [c]; d < 4; d++) e[a + ca[d] + b] = f[d] || f[d - 2] || f[0];
				return e
			***REMOVED***
		***REMOVED***, La.test(a) || (r.cssHooks[a + b].set = Ya)
	***REMOVED***), r.fn.extend(***REMOVED***
		css: function (a, b) ***REMOVED***
			return T(this, function (a, b, c) ***REMOVED***
				var d, e, f = ***REMOVED******REMOVED***, g = 0;
				if (Array.isArray(b)) ***REMOVED***
					for (d = Na(a), e = b.length; g < e; g++) f[b[g]] = r.css(a, b[g], !1, d);
					return f
				***REMOVED***
				return void 0 !== c ? r.style(a, b, c) : r.css(a, b)
			***REMOVED***, a, b, arguments.length > 1)
		***REMOVED***
	***REMOVED***);

	function _a(a, b, c, d, e) ***REMOVED***
		return new _a.prototype.init(a, b, c, d, e)
	***REMOVED***

	r.Tween = _a, _a.prototype = ***REMOVED***
		constructor: _a, init: function (a, b, c, d, e, f) ***REMOVED***
			this.elem = a, this.prop = c, this.easing = e || r.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (r.cssNumber[c] ? "" : "px")
		***REMOVED***, cur: function () ***REMOVED***
			var a = _a.propHooks[this.prop];
			return a && a.get ? a.get(this) : _a.propHooks._default.get(this)
		***REMOVED***, run: function (a) ***REMOVED***
			var b, c = _a.propHooks[this.prop];
			return this.options.duration ? this.pos = b = r.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : _a.propHooks._default.set(this), this
		***REMOVED***
	***REMOVED***, _a.prototype.init.prototype = _a.prototype, _a.propHooks = ***REMOVED***
		_default: ***REMOVED***
			get: function (a) ***REMOVED***
				var b;
				return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = r.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0)
			***REMOVED***, set: function (a) ***REMOVED***
				r.fx.step[a.prop] ? r.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[r.cssProps[a.prop]] && !r.cssHooks[a.prop] ? a.elem[a.prop] = a.now : r.style(a.elem, a.prop, a.now + a.unit)
			***REMOVED***
		***REMOVED***
	***REMOVED***, _a.propHooks.scrollTop = _a.propHooks.scrollLeft = ***REMOVED***
		set: function (a) ***REMOVED***
			a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now)
		***REMOVED***
	***REMOVED***, r.easing = ***REMOVED***
		linear: function (a) ***REMOVED***
			return a
		***REMOVED***, swing: function (a) ***REMOVED***
			return .5 - Math.cos(a * Math.PI) / 2
		***REMOVED***, _default: "swing"
	***REMOVED***, r.fx = _a.prototype.init, r.fx.step = ***REMOVED******REMOVED***;
	var ab, bb, cb = /^(?:toggle|show|hide)$/, db = /queueHooks$/;

	function eb() ***REMOVED***
		bb && (d.hidden === !1 && a.requestAnimationFrame ? a.requestAnimationFrame(eb) : a.setTimeout(eb, r.fx.interval), r.fx.tick())
	***REMOVED***

	function fb() ***REMOVED***
		return a.setTimeout(function () ***REMOVED***
			ab = void 0
		***REMOVED***), ab = r.now()
	***REMOVED***

	function gb(a, b) ***REMOVED***
		var c, d = 0, e = ***REMOVED***height: a***REMOVED***;
		for (b = b ? 1 : 0; d < 4; d += 2 - b) c = ca[d], e["margin" + c] = e["padding" + c] = a;
		return b && (e.opacity = e.width = a), e
	***REMOVED***

	function hb(a, b, c) ***REMOVED***
		for (var d, e = (kb.tweeners[b] || []).concat(kb.tweeners["*"]), f = 0, g = e.length; f < g; f++) if (d = e[f].call(c, b, a)) return d
	***REMOVED***

	function ib(a, b, c) ***REMOVED***
		var d, e, f, g, h, i, j, k, l = "width" in b || "height" in b, m = this, n = ***REMOVED******REMOVED***, o = a.style,
			p = a.nodeType && da(a), q = W.get(a, "fxshow");
		c.queue || (g = r._queueHooks(a, "fx"), null == g.unqueued && (g.unqueued = 0, h = g.empty.fire, g.empty.fire = function () ***REMOVED***
			g.unqueued || h()
		***REMOVED***), g.unqueued++, m.always(function () ***REMOVED***
			m.always(function () ***REMOVED***
				g.unqueued--, r.queue(a, "fx").length || g.empty.fire()
			***REMOVED***)
		***REMOVED***));
		for (d in b) if (e = b[d], cb.test(e)) ***REMOVED***
			if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) ***REMOVED***
				if ("show" !== e || !q || void 0 === q[d]) continue;
				p = !0
			***REMOVED***
			n[d] = q && q[d] || r.style(a, d)
		***REMOVED***
		if (i = !r.isEmptyObject(b), i || !r.isEmptyObject(n)) ***REMOVED***
			l && 1 === a.nodeType && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = q && q.display, null == j && (j = W.get(a, "display")), k = r.css(a, "display"), "none" === k && (j ? k = j : (ia([a], !0), j = a.style.display || j, k = r.css(a, "display"), ia([a]))), ("inline" === k || "inline-block" === k && null != j) && "none" === r.css(a, "float") && (i || (m.done(function () ***REMOVED***
				o.display = j
			***REMOVED***), null == j && (k = o.display, j = "none" === k ? "" : k)), o.display = "inline-block")), c.overflow && (o.overflow = "hidden", m.always(function () ***REMOVED***
				o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2]
			***REMOVED***)), i = !1;
			for (d in n) i || (q ? "hidden" in q && (p = q.hidden) : q = W.access(a, "fxshow", ***REMOVED***display: j***REMOVED***), f && (q.hidden = !p), p && ia([a], !0), m.done(function () ***REMOVED***
				p || ia([a]), W.remove(a, "fxshow");
				for (d in n) r.style(a, d, n[d])
			***REMOVED***)), i = hb(p ? q[d] : 0, d, m), d in q || (q[d] = i.start, p && (i.end = i.start, i.start = 0))
		***REMOVED***
	***REMOVED***

	function jb(a, b) ***REMOVED***
		var c, d, e, f, g;
		for (c in a) if (d = r.camelCase(c), e = b[d], f = a[c], Array.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = r.cssHooks[d], g && "expand" in g) ***REMOVED***
			f = g.expand(f), delete a[d];
			for (c in f) c in a || (a[c] = f[c], b[c] = e)
		***REMOVED*** else b[d] = e
	***REMOVED***

	function kb(a, b, c) ***REMOVED***
		var d, e, f = 0, g = kb.prefilters.length, h = r.Deferred().always(function () ***REMOVED***
			delete i.elem
		***REMOVED***), i = function () ***REMOVED***
			if (e) return !1;
			for (var b = ab || fb(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; g < i; g++) j.tweens[g].run(f);
			return h.notifyWith(a, [j, f, c]), f < 1 && i ? c : (i || h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j]), !1)
		***REMOVED***, j = h.promise(***REMOVED***
			elem: a,
			props: r.extend(***REMOVED******REMOVED***, b),
			opts: r.extend(!0, ***REMOVED***specialEasing: ***REMOVED******REMOVED***, easing: r.easing._default***REMOVED***, c),
			originalProperties: b,
			originalOptions: c,
			startTime: ab || fb(),
			duration: c.duration,
			tweens: [],
			createTween: function (b, c) ***REMOVED***
				var d = r.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);
				return j.tweens.push(d), d
			***REMOVED***,
			stop: function (b) ***REMOVED***
				var c = 0, d = b ? j.tweens.length : 0;
				if (e) return this;
				for (e = !0; c < d; c++) j.tweens[c].run(1);
				return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this
			***REMOVED***
		***REMOVED***), k = j.props;
		for (jb(k, j.opts.specialEasing); f < g; f++) if (d = kb.prefilters[f].call(j, a, k, j.opts)) return r.isFunction(d.stop) && (r._queueHooks(j.elem, j.opts.queue).stop = r.proxy(d.stop, d)), d;
		return r.map(k, hb, j), r.isFunction(j.opts.start) && j.opts.start.call(a, j), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always), r.fx.timer(r.extend(i, ***REMOVED***
			elem: a,
			anim: j,
			queue: j.opts.queue
		***REMOVED***)), j
	***REMOVED***

	r.Animation = r.extend(kb, ***REMOVED***
		tweeners: ***REMOVED***
			"*": [function (a, b) ***REMOVED***
				var c = this.createTween(a, b);
				return fa(c.elem, a, ba.exec(b), c), c
			***REMOVED***]
		***REMOVED***, tweener: function (a, b) ***REMOVED***
			r.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(L);
			for (var c, d = 0, e = a.length; d < e; d++) c = a[d], kb.tweeners[c] = kb.tweeners[c] || [], kb.tweeners[c].unshift(b)
		***REMOVED***, prefilters: [ib], prefilter: function (a, b) ***REMOVED***
			b ? kb.prefilters.unshift(a) : kb.prefilters.push(a)
		***REMOVED***
	***REMOVED***), r.speed = function (a, b, c) ***REMOVED***
		var d = a && "object" == typeof a ? r.extend(***REMOVED******REMOVED***, a) : ***REMOVED***
			complete: c || !c && b || r.isFunction(a) && a,
			duration: a,
			easing: c && b || b && !r.isFunction(b) && b
		***REMOVED***;
		return r.fx.off ? d.duration = 0 : "number" != typeof d.duration && (d.duration in r.fx.speeds ? d.duration = r.fx.speeds[d.duration] : d.duration = r.fx.speeds._default), null != d.queue && d.queue !== !0 || (d.queue = "fx"), d.old = d.complete, d.complete = function () ***REMOVED***
			r.isFunction(d.old) && d.old.call(this), d.queue && r.dequeue(this, d.queue)
		***REMOVED***, d
	***REMOVED***, r.fn.extend(***REMOVED***
		fadeTo: function (a, b, c, d) ***REMOVED***
			return this.filter(da).css("opacity", 0).show().end().animate(***REMOVED***opacity: b***REMOVED***, a, c, d)
		***REMOVED***, animate: function (a, b, c, d) ***REMOVED***
			var e = r.isEmptyObject(a), f = r.speed(b, c, d), g = function () ***REMOVED***
				var b = kb(this, r.extend(***REMOVED******REMOVED***, a), f);
				(e || W.get(this, "finish")) && b.stop(!0)
			***REMOVED***;
			return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g)
		***REMOVED***, stop: function (a, b, c) ***REMOVED***
			var d = function (a) ***REMOVED***
				var b = a.stop;
				delete a.stop, b(c)
			***REMOVED***;
			return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function () ***REMOVED***
				var b = !0, e = null != a && a + "queueHooks", f = r.timers, g = W.get(this);
				if (e) g[e] && g[e].stop && d(g[e]); else for (e in g) g[e] && g[e].stop && db.test(e) && d(g[e]);
				for (e = f.length; e--;) f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
				!b && c || r.dequeue(this, a)
			***REMOVED***)
		***REMOVED***, finish: function (a) ***REMOVED***
			return a !== !1 && (a = a || "fx"), this.each(function () ***REMOVED***
				var b, c = W.get(this), d = c[a + "queue"], e = c[a + "queueHooks"], f = r.timers, g = d ? d.length : 0;
				for (c.finish = !0, r.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
				for (b = 0; b < g; b++) d[b] && d[b].finish && d[b].finish.call(this);
				delete c.finish
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.each(["toggle", "show", "hide"], function (a, b) ***REMOVED***
		var c = r.fn[b];
		r.fn[b] = function (a, d, e) ***REMOVED***
			return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(gb(b, !0), a, d, e)
		***REMOVED***
	***REMOVED***), r.each(***REMOVED***
		slideDown: gb("show"),
		slideUp: gb("hide"),
		slideToggle: gb("toggle"),
		fadeIn: ***REMOVED***opacity: "show"***REMOVED***,
		fadeOut: ***REMOVED***opacity: "hide"***REMOVED***,
		fadeToggle: ***REMOVED***opacity: "toggle"***REMOVED***
	***REMOVED***, function (a, b) ***REMOVED***
		r.fn[a] = function (a, c, d) ***REMOVED***
			return this.animate(b, a, c, d)
		***REMOVED***
	***REMOVED***), r.timers = [], r.fx.tick = function () ***REMOVED***
		var a, b = 0, c = r.timers;
		for (ab = r.now(); b < c.length; b++) a = c[b], a() || c[b] !== a || c.splice(b--, 1);
		c.length || r.fx.stop(), ab = void 0
	***REMOVED***, r.fx.timer = function (a) ***REMOVED***
		r.timers.push(a), r.fx.start()
	***REMOVED***, r.fx.interval = 13, r.fx.start = function () ***REMOVED***
		bb || (bb = !0, eb())
	***REMOVED***, r.fx.stop = function () ***REMOVED***
		bb = null
	***REMOVED***, r.fx.speeds = ***REMOVED***slow: 600, fast: 200, _default: 400***REMOVED***, r.fn.delay = function (b, c) ***REMOVED***
		return b = r.fx ? r.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function (c, d) ***REMOVED***
			var e = a.setTimeout(c, b);
			d.stop = function () ***REMOVED***
				a.clearTimeout(e)
			***REMOVED***
		***REMOVED***)
	***REMOVED***, function () ***REMOVED***
		var a = d.createElement("input"), b = d.createElement("select"), c = b.appendChild(d.createElement("option"));
		a.type = "checkbox", o.checkOn = "" !== a.value, o.optSelected = c.selected, a = d.createElement("input"), a.value = "t", a.type = "radio", o.radioValue = "t" === a.value
	***REMOVED***();
	var lb, mb = r.expr.attrHandle;
	r.fn.extend(***REMOVED***
		attr: function (a, b) ***REMOVED***
			return T(this, r.attr, a, b, arguments.length > 1)
		***REMOVED***, removeAttr: function (a) ***REMOVED***
			return this.each(function () ***REMOVED***
				r.removeAttr(this, a)
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.extend(***REMOVED***
		attr: function (a, b, c) ***REMOVED***
			var d, e, f = a.nodeType;
			if (3 !== f && 8 !== f && 2 !== f) return "undefined" == typeof a.getAttribute ? r.prop(a, b, c) : (1 === f && r.isXMLDoc(a) || (e = r.attrHooks[b.toLowerCase()] || (r.expr.match.bool.test(b) ? lb : void 0)), void 0 !== c ? null === c ? void r.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = r.find.attr(a, b),
				null == d ? void 0 : d))
		***REMOVED***, attrHooks: ***REMOVED***
			type: ***REMOVED***
				set: function (a, b) ***REMOVED***
					if (!o.radioValue && "radio" === b && B(a, "input")) ***REMOVED***
						var c = a.value;
						return a.setAttribute("type", b), c && (a.value = c), b
					***REMOVED***
				***REMOVED***
			***REMOVED***
		***REMOVED***, removeAttr: function (a, b) ***REMOVED***
			var c, d = 0, e = b && b.match(L);
			if (e && 1 === a.nodeType) while (c = e[d++]) a.removeAttribute(c)
		***REMOVED***
	***REMOVED***), lb = ***REMOVED***
		set: function (a, b, c) ***REMOVED***
			return b === !1 ? r.removeAttr(a, c) : a.setAttribute(c, c), c
		***REMOVED***
	***REMOVED***, r.each(r.expr.match.bool.source.match(/\w+/g), function (a, b) ***REMOVED***
		var c = mb[b] || r.find.attr;
		mb[b] = function (a, b, d) ***REMOVED***
			var e, f, g = b.toLowerCase();
			return d || (f = mb[g], mb[g] = e, e = null != c(a, b, d) ? g : null, mb[g] = f), e
		***REMOVED***
	***REMOVED***);
	var nb = /^(?:input|select|textarea|button)$/i, ob = /^(?:a|area)$/i;
	r.fn.extend(***REMOVED***
		prop: function (a, b) ***REMOVED***
			return T(this, r.prop, a, b, arguments.length > 1)
		***REMOVED***, removeProp: function (a) ***REMOVED***
			return this.each(function () ***REMOVED***
				delete this[r.propFix[a] || a]
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.extend(***REMOVED***
		prop: function (a, b, c) ***REMOVED***
			var d, e, f = a.nodeType;
			if (3 !== f && 8 !== f && 2 !== f) return 1 === f && r.isXMLDoc(a) || (b = r.propFix[b] || b, e = r.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b]
		***REMOVED***, propHooks: ***REMOVED***
			tabIndex: ***REMOVED***
				get: function (a) ***REMOVED***
					var b = r.find.attr(a, "tabindex");
					return b ? parseInt(b, 10) : nb.test(a.nodeName) || ob.test(a.nodeName) && a.href ? 0 : -1
				***REMOVED***
			***REMOVED***
		***REMOVED***, propFix: ***REMOVED***"for": "htmlFor", "class": "className"***REMOVED***
	***REMOVED***), o.optSelected || (r.propHooks.selected = ***REMOVED***
		get: function (a) ***REMOVED***
			var b = a.parentNode;
			return b && b.parentNode && b.parentNode.selectedIndex, null
		***REMOVED***, set: function (a) ***REMOVED***
			var b = a.parentNode;
			b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex)
		***REMOVED***
	***REMOVED***), r.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () ***REMOVED***
		r.propFix[this.toLowerCase()] = this
	***REMOVED***);

	function pb(a) ***REMOVED***
		var b = a.match(L) || [];
		return b.join(" ")
	***REMOVED***

	function qb(a) ***REMOVED***
		return a.getAttribute && a.getAttribute("class") || ""
	***REMOVED***

	r.fn.extend(***REMOVED***
		addClass: function (a) ***REMOVED***
			var b, c, d, e, f, g, h, i = 0;
			if (r.isFunction(a)) return this.each(function (b) ***REMOVED***
				r(this).addClass(a.call(this, b, qb(this)))
			***REMOVED***);
			if ("string" == typeof a && a) ***REMOVED***
				b = a.match(L) || [];
				while (c = this[i++]) if (e = qb(c), d = 1 === c.nodeType && " " + pb(e) + " ") ***REMOVED***
					g = 0;
					while (f = b[g++]) d.indexOf(" " + f + " ") < 0 && (d += f + " ");
					h = pb(d), e !== h && c.setAttribute("class", h)
				***REMOVED***
			***REMOVED***
			return this
		***REMOVED***, removeClass: function (a) ***REMOVED***
			var b, c, d, e, f, g, h, i = 0;
			if (r.isFunction(a)) return this.each(function (b) ***REMOVED***
				r(this).removeClass(a.call(this, b, qb(this)))
			***REMOVED***);
			if (!arguments.length) return this.attr("class", "");
			if ("string" == typeof a && a) ***REMOVED***
				b = a.match(L) || [];
				while (c = this[i++]) if (e = qb(c), d = 1 === c.nodeType && " " + pb(e) + " ") ***REMOVED***
					g = 0;
					while (f = b[g++]) while (d.indexOf(" " + f + " ") > -1) d = d.replace(" " + f + " ", " ");
					h = pb(d), e !== h && c.setAttribute("class", h)
				***REMOVED***
			***REMOVED***
			return this
		***REMOVED***, toggleClass: function (a, b) ***REMOVED***
			var c = typeof a;
			return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : r.isFunction(a) ? this.each(function (c) ***REMOVED***
				r(this).toggleClass(a.call(this, c, qb(this), b), b)
			***REMOVED***) : this.each(function () ***REMOVED***
				var b, d, e, f;
				if ("string" === c) ***REMOVED***
					d = 0, e = r(this), f = a.match(L) || [];
					while (b = f[d++]) e.hasClass(b) ? e.removeClass(b) : e.addClass(b)
				***REMOVED*** else void 0 !== a && "boolean" !== c || (b = qb(this), b && W.set(this, "__className__", b), this.setAttribute && this.setAttribute("class", b || a === !1 ? "" : W.get(this, "__className__") || ""))
			***REMOVED***)
		***REMOVED***, hasClass: function (a) ***REMOVED***
			var b, c, d = 0;
			b = " " + a + " ";
			while (c = this[d++]) if (1 === c.nodeType && (" " + pb(qb(c)) + " ").indexOf(b) > -1) return !0;
			return !1
		***REMOVED***
	***REMOVED***);
	var rb = /\r/g;
	r.fn.extend(***REMOVED***
		val: function (a) ***REMOVED***
			var b, c, d, e = this[0];
			***REMOVED***
				if (arguments.length) return d = r.isFunction(a), this.each(function (c) ***REMOVED***
					var e;
					1 === this.nodeType && (e = d ? a.call(this, c, r(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : Array.isArray(e) && (e = r.map(e, function (a) ***REMOVED***
						return null == a ? "" : a + ""
					***REMOVED***)), b = r.valHooks[this.type] || r.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e))
				***REMOVED***);
				if (e) return b = r.valHooks[e.type] || r.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(rb, "") : null == c ? "" : c)
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.extend(***REMOVED***
		valHooks: ***REMOVED***
			option: ***REMOVED***
				get: function (a) ***REMOVED***
					var b = r.find.attr(a, "value");
					return null != b ? b : pb(r.text(a))
				***REMOVED***
			***REMOVED***, select: ***REMOVED***
				get: function (a) ***REMOVED***
					var b, c, d, e = a.options, f = a.selectedIndex, g = "select-one" === a.type, h = g ? null : [],
						i = g ? f + 1 : e.length;
					for (d = f < 0 ? i : g ? f : 0; d < i; d++) if (c = e[d], (c.selected || d === f) && !c.disabled && (!c.parentNode.disabled || !B(c.parentNode, "optgroup"))) ***REMOVED***
						if (b = r(c).val(), g) return b;
						h.push(b)
					***REMOVED***
					return h
				***REMOVED***, set: function (a, b) ***REMOVED***
					var c, d, e = a.options, f = r.makeArray(b), g = e.length;
					while (g--) d = e[g], (d.selected = r.inArray(r.valHooks.option.get(d), f) > -1) && (c = !0);
					return c || (a.selectedIndex = -1), f
				***REMOVED***
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.each(["radio", "checkbox"], function () ***REMOVED***
		r.valHooks[this] = ***REMOVED***
			set: function (a, b) ***REMOVED***
				if (Array.isArray(b)) return a.checked = r.inArray(r(a).val(), b) > -1
			***REMOVED***
		***REMOVED***, o.checkOn || (r.valHooks[this].get = function (a) ***REMOVED***
			return null === a.getAttribute("value") ? "on" : a.value
		***REMOVED***)
	***REMOVED***);
	var sb = /^(?:focusinfocus|focusoutblur)$/;
	r.extend(r.event, ***REMOVED***
		trigger: function (b, c, e, f) ***REMOVED***
			var g, h, i, j, k, m, n, o = [e || d], p = l.call(b, "type") ? b.type : b,
				q = l.call(b, "namespace") ? b.namespace.split(".") : [];
			if (h = i = e = e || d, 3 !== e.nodeType && 8 !== e.nodeType && !sb.test(p + r.event.triggered) && (p.indexOf(".") > -1 && (q = p.split("."), p = q.shift(), q.sort()), k = p.indexOf(":") < 0 && "on" + p, b = b[r.expando] ? b : new r.Event(p, "object" == typeof b && b), b.isTrigger = f ? 2 : 3, b.namespace = q.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + q.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = e), c = null == c ? [b] : r.makeArray(c, [b]), n = r.event.special[p] || ***REMOVED******REMOVED***, f || !n.trigger || n.trigger.apply(e, c) !== !1)) ***REMOVED***
				if (!f && !n.noBubble && !r.isWindow(e)) ***REMOVED***
					for (j = n.delegateType || p, sb.test(j + p) || (h = h.parentNode); h; h = h.parentNode) o.push(h), i = h;
					i === (e.ownerDocument || d) && o.push(i.defaultView || i.parentWindow || a)
				***REMOVED***
				g = 0;
				while ((h = o[g++]) && !b.isPropagationStopped()) b.type = g > 1 ? j : n.bindType || p, m = (W.get(h, "events") || ***REMOVED******REMOVED***)[b.type] && W.get(h, "handle"), m && m.apply(h, c), m = k && h[k], m && m.apply && U(h) && (b.result = m.apply(h, c), b.result === !1 && b.preventDefault());
				return b.type = p, f || b.isDefaultPrevented() || n._default && n._default.apply(o.pop(), c) !== !1 || !U(e) || k && r.isFunction(e[p]) && !r.isWindow(e) && (i = e[k], i && (e[k] = null), r.event.triggered = p, e[p](), r.event.triggered = void 0, i && (e[k] = i)), b.result
			***REMOVED***
		***REMOVED***, simulate: function (a, b, c) ***REMOVED***
			var d = r.extend(new r.Event, c, ***REMOVED***type: a, isSimulated: !0***REMOVED***);
			r.event.trigger(d, null, b)
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		trigger: function (a, b) ***REMOVED***
			return this.each(function () ***REMOVED***
				r.event.trigger(a, b, this)
			***REMOVED***)
		***REMOVED***, triggerHandler: function (a, b) ***REMOVED***
			var c = this[0];
			if (c) return r.event.trigger(a, b, c, !0)
		***REMOVED***
	***REMOVED***), r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (a, b) ***REMOVED***
		r.fn[b] = function (a, c) ***REMOVED***
			return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b)
		***REMOVED***
	***REMOVED***), r.fn.extend(***REMOVED***
		hover: function (a, b) ***REMOVED***
			return this.mouseenter(a).mouseleave(b || a)
		***REMOVED***
	***REMOVED***), o.focusin = "onfocusin" in a, o.focusin || r.each(***REMOVED***focus: "focusin", blur: "focusout"***REMOVED***, function (a, b) ***REMOVED***
		var c = function (a) ***REMOVED***
			r.event.simulate(b, a.target, r.event.fix(a))
		***REMOVED***;
		r.event.special[b] = ***REMOVED***
			setup: function () ***REMOVED***
				var d = this.ownerDocument || this, e = W.access(d, b);
				e || d.addEventListener(a, c, !0), W.access(d, b, (e || 0) + 1)
			***REMOVED***, teardown: function () ***REMOVED***
				var d = this.ownerDocument || this, e = W.access(d, b) - 1;
				e ? W.access(d, b, e) : (d.removeEventListener(a, c, !0), W.remove(d, b))
			***REMOVED***
		***REMOVED***
	***REMOVED***);
	var tb = a.location, ub = r.now(), vb = /\?/;
	r.parseXML = function (b) ***REMOVED***
		var c;
		if (!b || "string" != typeof b) return null;
		try ***REMOVED***
			c = (new a.DOMParser).parseFromString(b, "text/xml")
		***REMOVED*** catch (d) ***REMOVED***
			c = void 0
		***REMOVED***
		return c && !c.getElementsByTagName("parsererror").length || r.error("Invalid XML: " + b), c
	***REMOVED***;
	var wb = /\[\]$/, xb = /\r?\n/g, yb = /^(?:submit|button|image|reset|file)$/i,
		zb = /^(?:input|select|textarea|keygen)/i;

	function Ab(a, b, c, d) ***REMOVED***
		var e;
		if (Array.isArray(b)) r.each(b, function (b, e) ***REMOVED***
			c || wb.test(a) ? d(a, e) : Ab(a + "[" + ("object" == typeof e && null != e ? b : "") + "]", e, c, d)
		***REMOVED***); else if (c || "object" !== r.type(b)) d(a, b); else for (e in b) Ab(a + "[" + e + "]", b[e], c, d)
	***REMOVED***

	r.param = function (a, b) ***REMOVED***
		var c, d = [], e = function (a, b) ***REMOVED***
			var c = r.isFunction(b) ? b() : b;
			d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(null == c ? "" : c)
		***REMOVED***;
		if (Array.isArray(a) || a.jquery && !r.isPlainObject(a)) r.each(a, function () ***REMOVED***
			e(this.name, this.value)
		***REMOVED***); else for (c in a) Ab(c, a[c], b, e);
		return d.join("&")
	***REMOVED***, r.fn.extend(***REMOVED***
		serialize: function () ***REMOVED***
			return r.param(this.serializeArray())
		***REMOVED***, serializeArray: function () ***REMOVED***
			return this.map(function () ***REMOVED***
				var a = r.prop(this, "elements");
				return a ? r.makeArray(a) : this
			***REMOVED***).filter(function () ***REMOVED***
				var a = this.type;
				return this.name && !r(this).is(":disabled") && zb.test(this.nodeName) && !yb.test(a) && (this.checked || !ja.test(a))
			***REMOVED***).map(function (a, b) ***REMOVED***
				var c = r(this).val();
				return null == c ? null : Array.isArray(c) ? r.map(c, function (a) ***REMOVED***
					return ***REMOVED***name: b.name, value: a.replace(xb, "\r\n")***REMOVED***
				***REMOVED***) : ***REMOVED***name: b.name, value: c.replace(xb, "\r\n")***REMOVED***
			***REMOVED***).get()
		***REMOVED***
	***REMOVED***);
	var Bb = /%20/g, Cb = /#.*$/, Db = /([?&])_=[^&]*/, Eb = /^(.*?):[ \t]*([^\r\n]*)$/gm,
		Fb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, Gb = /^(?:GET|HEAD)$/, Hb = /^\/\//, Ib = ***REMOVED******REMOVED***,
		Jb = ***REMOVED******REMOVED***, Kb = "*/".concat("*"), Lb = d.createElement("a");
	Lb.href = tb.href;

	function Mb(a) ***REMOVED***
		return function (b, c) ***REMOVED***
			"string" != typeof b && (c = b, b = "*");
			var d, e = 0, f = b.toLowerCase().match(L) || [];
			if (r.isFunction(c)) while (d = f[e++]) "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c)
		***REMOVED***
	***REMOVED***

	function Nb(a, b, c, d) ***REMOVED***
		var e = ***REMOVED******REMOVED***, f = a === Jb;

		function g(h) ***REMOVED***
			var i;
			return e[h] = !0, r.each(a[h] || [], function (a, h) ***REMOVED***
				var j = h(b, c, d);
				return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1)
			***REMOVED***), i
		***REMOVED***

		return g(b.dataTypes[0]) || !e["*"] && g("*")
	***REMOVED***

	function Ob(a, b) ***REMOVED***
		var c, d, e = r.ajaxSettings.flatOptions || ***REMOVED******REMOVED***;
		for (c in b) void 0 !== b[c] && ((e[c] ? a : d || (d = ***REMOVED******REMOVED***))[c] = b[c]);
		return d && r.extend(!0, a, d), a
	***REMOVED***

	function Pb(a, b, c) ***REMOVED***
		var d, e, f, g, h = a.contents, i = a.dataTypes;
		while ("*" === i[0]) i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"));
		if (d) for (e in h) if (h[e] && h[e].test(d)) ***REMOVED***
			i.unshift(e);
			break
		***REMOVED***
		if (i[0] in c) f = i[0]; else ***REMOVED***
			for (e in c) ***REMOVED***
				if (!i[0] || a.converters[e + " " + i[0]]) ***REMOVED***
					f = e;
					break
				***REMOVED***
				g || (g = e)
			***REMOVED***
			f = f || g
		***REMOVED***
		if (f) return f !== i[0] && i.unshift(f), c[f]
	***REMOVED***

	function Qb(a, b, c, d) ***REMOVED***
		var e, f, g, h, i, j = ***REMOVED******REMOVED***, k = a.dataTypes.slice();
		if (k[1]) for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
		f = k.shift();
		while (f) if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift()) if ("*" === f) f = i; else if ("*" !== i && i !== f) ***REMOVED***
			if (g = j[i + " " + f] || j["* " + f], !g) for (e in j) if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) ***REMOVED***
				g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1]));
				break
			***REMOVED***
			if (g !== !0) if (g && a["throws"]) b = g(b); else try ***REMOVED***
				b = g(b)
			***REMOVED*** catch (l) ***REMOVED***
				return ***REMOVED***state: "parsererror", error: g ? l : "No conversion from " + i + " to " + f***REMOVED***
			***REMOVED***
		***REMOVED***
		return ***REMOVED***state: "success", data: b***REMOVED***
	***REMOVED***

	r.extend(***REMOVED***
		active: 0,
		lastModified: ***REMOVED******REMOVED***,
		etag: ***REMOVED******REMOVED***,
		ajaxSettings: ***REMOVED***
			url: tb.href,
			type: "GET",
			isLocal: Fb.test(tb.protocol),
			global: !0,
			processData: !0,
			async: !0,
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			accepts: ***REMOVED***
				"*": Kb,
				text: "text/plain",
				html: "text/html",
				xml: "application/xml, text/xml",
				json: "application/json, text/javascript"
			***REMOVED***,
			contents: ***REMOVED***xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/***REMOVED***,
			responseFields: ***REMOVED***xml: "responseXML", text: "responseText", json: "responseJSON"***REMOVED***,
			converters: ***REMOVED***"* text": String, "text html": !0, "text json": JSON.parse, "text xml": r.parseXML***REMOVED***,
			flatOptions: ***REMOVED***url: !0, context: !0***REMOVED***
		***REMOVED***,
		ajaxSetup: function (a, b) ***REMOVED***
			return b ? Ob(Ob(a, r.ajaxSettings), b) : Ob(r.ajaxSettings, a)
		***REMOVED***,
		ajaxPrefilter: Mb(Ib),
		ajaxTransport: Mb(Jb),
		ajax: function (b, c) ***REMOVED***
			"object" == typeof b && (c = b, b = void 0), c = c || ***REMOVED******REMOVED***;
			var e, f, g, h, i, j, k, l, m, n, o = r.ajaxSetup(***REMOVED******REMOVED***, c), p = o.context || o,
				q = o.context && (p.nodeType || p.jquery) ? r(p) : r.event, s = r.Deferred(),
				t = r.Callbacks("once memory"), u = o.statusCode || ***REMOVED******REMOVED***, v = ***REMOVED******REMOVED***, w = ***REMOVED******REMOVED***, x = "canceled", y = ***REMOVED***
					readyState: 0, getResponseHeader: function (a) ***REMOVED***
						var b;
						if (k) ***REMOVED***
							if (!h) ***REMOVED***
								h = ***REMOVED******REMOVED***;
								while (b = Eb.exec(g)) h[b[1].toLowerCase()] = b[2]
							***REMOVED***
							b = h[a.toLowerCase()]
						***REMOVED***
						return null == b ? null : b
					***REMOVED***, getAllResponseHeaders: function () ***REMOVED***
						return k ? g : null
					***REMOVED***, setRequestHeader: function (a, b) ***REMOVED***
						return null == k && (a = w[a.toLowerCase()] = w[a.toLowerCase()] || a, v[a] = b), this
					***REMOVED***, overrideMimeType: function (a) ***REMOVED***
						return null == k && (o.mimeType = a), this
					***REMOVED***, statusCode: function (a) ***REMOVED***
						var b;
						if (a) if (k) y.always(a[y.status]); else for (b in a) u[b] = [u[b], a[b]];
						return this
					***REMOVED***, abort: function (a) ***REMOVED***
						var b = a || x;
						return e && e.abort(b), A(0, b), this
					***REMOVED***
				***REMOVED***;
			if (s.promise(y), o.url = ((b || o.url || tb.href) + "").replace(Hb, tb.protocol + "//"), o.type = c.method || c.type || o.method || o.type, o.dataTypes = (o.dataType || "*").toLowerCase().match(L) || [""], null == o.crossDomain) ***REMOVED***
				j = d.createElement("a");
				try ***REMOVED***
					j.href = o.url, j.href = j.href, o.crossDomain = Lb.protocol + "//" + Lb.host != j.protocol + "//" + j.host
				***REMOVED*** catch (z) ***REMOVED***
					o.crossDomain = !0
				***REMOVED***
			***REMOVED***
			if (o.data && o.processData && "string" != typeof o.data && (o.data = r.param(o.data, o.traditional)), Nb(Ib, o, c, y), k) return y;
			l = r.event && o.global, l && 0 === r.active++ && r.event.trigger("ajaxStart"), o.type = o.type.toUpperCase(), o.hasContent = !Gb.test(o.type), f = o.url.replace(Cb, ""), o.hasContent ? o.data && o.processData && 0 === (o.contentType || "").indexOf("application/x-www-form-urlencoded") && (o.data = o.data.replace(Bb, "+")) : (n = o.url.slice(f.length), o.data && (f += (vb.test(f) ? "&" : "?") + o.data, delete o.data), o.cache === !1 && (f = f.replace(Db, "$1"), n = (vb.test(f) ? "&" : "?") + "_=" + ub++ + n), o.url = f + n), o.ifModified && (r.lastModified[f] && y.setRequestHeader("If-Modified-Since", r.lastModified[f]), r.etag[f] && y.setRequestHeader("If-None-Match", r.etag[f])), (o.data && o.hasContent && o.contentType !== !1 || c.contentType) && y.setRequestHeader("Content-Type", o.contentType), y.setRequestHeader("Accept", o.dataTypes[0] && o.accepts[o.dataTypes[0]] ? o.accepts[o.dataTypes[0]] + ("*" !== o.dataTypes[0] ? ", " + Kb + "; q=0.01" : "") : o.accepts["*"]);
			for (m in o.headers) y.setRequestHeader(m, o.headers[m]);
			if (o.beforeSend && (o.beforeSend.call(p, y, o) === !1 || k)) return y.abort();
			if (x = "abort", t.add(o.complete), y.done(o.success), y.fail(o.error), e = Nb(Jb, o, c, y)) ***REMOVED***
				if (y.readyState = 1, l && q.trigger("ajaxSend", [y, o]), k) return y;
				o.async && o.timeout > 0 && (i = a.setTimeout(function () ***REMOVED***
					y.abort("timeout")
				***REMOVED***, o.timeout));
				try ***REMOVED***
					k = !1, e.send(v, A)
				***REMOVED*** catch (z) ***REMOVED***
					if (k) throw z;
					A(-1, z)
				***REMOVED***
			***REMOVED*** else A(-1, "No Transport");

			function A(b, c, d, h) ***REMOVED***
				var j, m, n, v, w, x = c;
				k || (k = !0, i && a.clearTimeout(i), e = void 0, g = h || "", y.readyState = b > 0 ? 4 : 0, j = b >= 200 && b < 300 || 304 === b, d && (v = Pb(o, y, d)), v = Qb(o, v, y, j), j ? (o.ifModified && (w = y.getResponseHeader("Last-Modified"), w && (r.lastModified[f] = w), w = y.getResponseHeader("etag"), w && (r.etag[f] = w)), 204 === b || "HEAD" === o.type ? x = "nocontent" : 304 === b ? x = "notmodified" : (x = v.state, m = v.data, n = v.error, j = !n)) : (n = x, !b && x || (x = "error", b < 0 && (b = 0))), y.status = b, y.statusText = (c || x) + "", j ? s.resolveWith(p, [m, x, y]) : s.rejectWith(p, [y, x, n]), y.statusCode(u), u = void 0, l && q.trigger(j ? "ajaxSuccess" : "ajaxError", [y, o, j ? m : n]), t.fireWith(p, [y, x]), l && (q.trigger("ajaxComplete", [y, o]), --r.active || r.event.trigger("ajaxStop")))
			***REMOVED***

			return y
		***REMOVED***,
		getJSON: function (a, b, c) ***REMOVED***
			return r.get(a, b, c, "json")
		***REMOVED***,
		getScript: function (a, b) ***REMOVED***
			return r.get(a, void 0, b, "script")
		***REMOVED***
	***REMOVED***), r.each(["get", "post"], function (a, b) ***REMOVED***
		r[b] = function (a, c, d, e) ***REMOVED***
			return r.isFunction(c) && (e = e || d, d = c, c = void 0), r.ajax(r.extend(***REMOVED***
				url: a,
				type: b,
				dataType: e,
				data: c,
				success: d
			***REMOVED***, r.isPlainObject(a) && a))
		***REMOVED***
	***REMOVED***), r._evalUrl = function (a) ***REMOVED***
		return r.ajax(***REMOVED***url: a, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, "throws": !0***REMOVED***)
	***REMOVED***, r.fn.extend(***REMOVED***
		wrapAll: function (a) ***REMOVED***
			var b;
			return this[0] && (r.isFunction(a) && (a = a.call(this[0])), b = r(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function () ***REMOVED***
				var a = this;
				while (a.firstElementChild) a = a.firstElementChild;
				return a
			***REMOVED***).append(this)), this
		***REMOVED***, wrapInner: function (a) ***REMOVED***
			return r.isFunction(a) ? this.each(function (b) ***REMOVED***
				r(this).wrapInner(a.call(this, b))
			***REMOVED***) : this.each(function () ***REMOVED***
				var b = r(this), c = b.contents();
				c.length ? c.wrapAll(a) : b.append(a)
			***REMOVED***)
		***REMOVED***, wrap: function (a) ***REMOVED***
			var b = r.isFunction(a);
			return this.each(function (c) ***REMOVED***
				r(this).wrapAll(b ? a.call(this, c) : a)
			***REMOVED***)
		***REMOVED***, unwrap: function (a) ***REMOVED***
			return this.parent(a).not("body").each(function () ***REMOVED***
				r(this).replaceWith(this.childNodes)
			***REMOVED***), this
		***REMOVED***
	***REMOVED***), r.expr.pseudos.hidden = function (a) ***REMOVED***
		return !r.expr.pseudos.visible(a)
	***REMOVED***, r.expr.pseudos.visible = function (a) ***REMOVED***
		return !!(a.offsetWidth || a.offsetHeight || a.getClientRects().length)
	***REMOVED***, r.ajaxSettings.xhr = function () ***REMOVED***
		try ***REMOVED***
			return new a.XMLHttpRequest
		***REMOVED*** catch (b) ***REMOVED***
		***REMOVED***
	***REMOVED***;
	var Rb = ***REMOVED***0: 200, 1223: 204***REMOVED***, Sb = r.ajaxSettings.xhr();
	o.cors = !!Sb && "withCredentials" in Sb, o.ajax = Sb = !!Sb, r.ajaxTransport(function (b) ***REMOVED***
		var c, d;
		if (o.cors || Sb && !b.crossDomain) return ***REMOVED***
			send: function (e, f) ***REMOVED***
				var g, h = b.xhr();
				if (h.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields) for (g in b.xhrFields) h[g] = b.xhrFields[g];
				b.mimeType && h.overrideMimeType && h.overrideMimeType(b.mimeType), b.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");
				for (g in e) h.setRequestHeader(g, e[g]);
				c = function (a) ***REMOVED***
					return function () ***REMOVED***
						c && (c = d = h.onload = h.onerror = h.onabort = h.onreadystatechange = null, "abort" === a ? h.abort() : "error" === a ? "number" != typeof h.status ? f(0, "error") : f(h.status, h.statusText) : f(Rb[h.status] || h.status, h.statusText, "text" !== (h.responseType || "text") || "string" != typeof h.responseText ? ***REMOVED***binary: h.response***REMOVED*** : ***REMOVED***text: h.responseText***REMOVED***, h.getAllResponseHeaders()))
					***REMOVED***
				***REMOVED***, h.onload = c(), d = h.onerror = c("error"), void 0 !== h.onabort ? h.onabort = d : h.onreadystatechange = function () ***REMOVED***
					4 === h.readyState && a.setTimeout(function () ***REMOVED***
						c && d()
					***REMOVED***)
				***REMOVED***, c = c("abort");
				try ***REMOVED***
					h.send(b.hasContent && b.data || null)
				***REMOVED*** catch (i) ***REMOVED***
					if (c) throw i
				***REMOVED***
			***REMOVED***, abort: function () ***REMOVED***
				c && c()
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.ajaxPrefilter(function (a) ***REMOVED***
		a.crossDomain && (a.contents.script = !1)
	***REMOVED***), r.ajaxSetup(***REMOVED***
		accepts: ***REMOVED***script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"***REMOVED***,
		contents: ***REMOVED***script: /\b(?:java|ecma)script\b/***REMOVED***,
		converters: ***REMOVED***
			"text script": function (a) ***REMOVED***
				return r.globalEval(a), a
			***REMOVED***
		***REMOVED***
	***REMOVED***), r.ajaxPrefilter("script", function (a) ***REMOVED***
		void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET")
	***REMOVED***), r.ajaxTransport("script", function (a) ***REMOVED***
		if (a.crossDomain) ***REMOVED***
			var b, c;
			return ***REMOVED***
				send: function (e, f) ***REMOVED***
					b = r("<script>").prop(***REMOVED***charset: a.scriptCharset, src: a.url***REMOVED***).on("load error", c = function (a) ***REMOVED***
						b.remove(), c = null, a && f("error" === a.type ? 404 : 200, a.type)
					***REMOVED***), d.head.appendChild(b[0])
				***REMOVED***, abort: function () ***REMOVED***
					c && c()
				***REMOVED***
			***REMOVED***
		***REMOVED***
	***REMOVED***);
	var Tb = [], Ub = /(=)\?(?=&|$)|\?\?/;
	r.ajaxSetup(***REMOVED***
		jsonp: "callback", jsonpCallback: function () ***REMOVED***
			var a = Tb.pop() || r.expando + "_" + ub++;
			return this[a] = !0, a
		***REMOVED***
	***REMOVED***), r.ajaxPrefilter("json jsonp", function (b, c, d) ***REMOVED***
		var e, f, g,
			h = b.jsonp !== !1 && (Ub.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && Ub.test(b.data) && "data");
		if (h || "jsonp" === b.dataTypes[0]) return e = b.jsonpCallback = r.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Ub, "$1" + e) : b.jsonp !== !1 && (b.url += (vb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function () ***REMOVED***
			return g || r.error(e + " was not called"), g[0]
		***REMOVED***, b.dataTypes[0] = "json", f = a[e], a[e] = function () ***REMOVED***
			g = arguments
		***REMOVED***, d.always(function () ***REMOVED***
			void 0 === f ? r(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Tb.push(e)), g && r.isFunction(f) && f(g[0]), g = f = void 0
		***REMOVED***), "script"
	***REMOVED***), o.createHTMLDocument = function () ***REMOVED***
		var a = d.implementation.createHTMLDocument("").body;
		return a.innerHTML = "<form></form><form></form>", 2 === a.childNodes.length
	***REMOVED***(), r.parseHTML = function (a, b, c) ***REMOVED***
		if ("string" != typeof a) return [];
		"boolean" == typeof b && (c = b, b = !1);
		var e, f, g;
		return b || (o.createHTMLDocument ? (b = d.implementation.createHTMLDocument(""), e = b.createElement("base"), e.href = d.location.href, b.head.appendChild(e)) : b = d), f = C.exec(a), g = !c && [], f ? [b.createElement(f[1])] : (f = qa([a], b, g), g && g.length && r(g).remove(), r.merge([], f.childNodes))
	***REMOVED***, r.fn.load = function (a, b, c) ***REMOVED***
		var d, e, f, g = this, h = a.indexOf(" ");
		return h > -1 && (d = pb(a.slice(h)), a = a.slice(0, h)), r.isFunction(b) ? (c = b, b = void 0) : b && "object" == typeof b && (e = "POST"), g.length > 0 && r.ajax(***REMOVED***
			url: a,
			type: e || "GET",
			dataType: "html",
			data: b
		***REMOVED***).done(function (a) ***REMOVED***
			f = arguments, g.html(d ? r("<div>").append(r.parseHTML(a)).find(d) : a)
		***REMOVED***).always(c && function (a, b) ***REMOVED***
			g.each(function () ***REMOVED***
				c.apply(this, f || [a.responseText, b, a])
			***REMOVED***)
		***REMOVED***), this
	***REMOVED***, r.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (a, b) ***REMOVED***
		r.fn[b] = function (a) ***REMOVED***
			return this.on(b, a)
		***REMOVED***
	***REMOVED***), r.expr.pseudos.animated = function (a) ***REMOVED***
		return r.grep(r.timers, function (b) ***REMOVED***
			return a === b.elem
		***REMOVED***).length
	***REMOVED***, r.offset = ***REMOVED***
		setOffset: function (a, b, c) ***REMOVED***
			var d, e, f, g, h, i, j, k = r.css(a, "position"), l = r(a), m = ***REMOVED******REMOVED***;
			"static" === k && (a.style.position = "relative"), h = l.offset(), f = r.css(a, "top"), i = r.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), r.isFunction(b) && (b = b.call(a, c, r.extend(***REMOVED******REMOVED***, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m)
		***REMOVED***
	***REMOVED***, r.fn.extend(***REMOVED***
		offset: function (a) ***REMOVED***
			if (arguments.length) return void 0 === a ? this : this.each(function (b) ***REMOVED***
				r.offset.setOffset(this, a, b)
			***REMOVED***);
			var b, c, d, e, f = this[0];
			if (f) return f.getClientRects().length ? (d = f.getBoundingClientRect(), b = f.ownerDocument, c = b.documentElement, e = b.defaultView, ***REMOVED***
				top: d.top + e.pageYOffset - c.clientTop,
				left: d.left + e.pageXOffset - c.clientLeft
			***REMOVED***) : ***REMOVED***top: 0, left: 0***REMOVED***
		***REMOVED***, position: function () ***REMOVED***
			if (this[0]) ***REMOVED***
				var a, b, c = this[0], d = ***REMOVED***top: 0, left: 0***REMOVED***;
				return "fixed" === r.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), B(a[0], "html") || (d = a.offset()), d = ***REMOVED***
					top: d.top + r.css(a[0], "borderTopWidth", !0),
					left: d.left + r.css(a[0], "borderLeftWidth", !0)
				***REMOVED***), ***REMOVED***top: b.top - d.top - r.css(c, "marginTop", !0), left: b.left - d.left - r.css(c, "marginLeft", !0)***REMOVED***
			***REMOVED***
		***REMOVED***, offsetParent: function () ***REMOVED***
			return this.map(function () ***REMOVED***
				var a = this.offsetParent;
				while (a && "static" === r.css(a, "position")) a = a.offsetParent;
				return a || ra
			***REMOVED***)
		***REMOVED***
	***REMOVED***), r.each(***REMOVED***scrollLeft: "pageXOffset", scrollTop: "pageYOffset"***REMOVED***, function (a, b) ***REMOVED***
		var c = "pageYOffset" === b;
		r.fn[a] = function (d) ***REMOVED***
			return T(this, function (a, d, e) ***REMOVED***
				var f;
				return r.isWindow(a) ? f = a : 9 === a.nodeType && (f = a.defaultView), void 0 === e ? f ? f[b] : a[d] : void(f ? f.scrollTo(c ? f.pageXOffset : e, c ? e : f.pageYOffset) : a[d] = e)
			***REMOVED***, a, d, arguments.length)
		***REMOVED***
	***REMOVED***), r.each(["top", "left"], function (a, b) ***REMOVED***
		r.cssHooks[b] = Pa(o.pixelPosition, function (a, c) ***REMOVED***
			if (c) return c = Oa(a, b), Ma.test(c) ? r(a).position()[b] + "px" : c
		***REMOVED***)
	***REMOVED***), r.each(***REMOVED***Height: "height", Width: "width"***REMOVED***, function (a, b) ***REMOVED***
		r.each(***REMOVED***padding: "inner" + a, content: b, "": "outer" + a***REMOVED***, function (c, d) ***REMOVED***
			r.fn[d] = function (e, f) ***REMOVED***
				var g = arguments.length && (c || "boolean" != typeof e),
					h = c || (e === !0 || f === !0 ? "margin" : "border");
				return T(this, function (b, c, e) ***REMOVED***
					var f;
					return r.isWindow(b) ? 0 === d.indexOf("outer") ? b["inner" + a] : b.document.documentElement["client" + a] : 9 === b.nodeType ? (f = b.documentElement, Math.max(b.body["scroll" + a], f["scroll" + a], b.body["offset" + a], f["offset" + a], f["client" + a])) : void 0 === e ? r.css(b, c, h) : r.style(b, c, e, h)
				***REMOVED***, b, g ? e : void 0, g)
			***REMOVED***
		***REMOVED***)
	***REMOVED***), r.fn.extend(***REMOVED***
		bind: function (a, b, c) ***REMOVED***
			return this.on(a, null, b, c)
		***REMOVED***, unbind: function (a, b) ***REMOVED***
			return this.off(a, null, b)
		***REMOVED***, delegate: function (a, b, c, d) ***REMOVED***
			return this.on(b, a, c, d)
		***REMOVED***, undelegate: function (a, b, c) ***REMOVED***
			return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c)
		***REMOVED***
	***REMOVED***), r.holdReady = function (a) ***REMOVED***
		a ? r.readyWait++ : r.ready(!0)
	***REMOVED***, r.isArray = Array.isArray, r.parseJSON = JSON.parse, r.nodeName = B, "function" == typeof define && define.amd && define("jquery", [], function () ***REMOVED***
		return r
	***REMOVED***);
	var Vb = a.jQuery, Wb = a.$;
	return r.noConflict = function (b) ***REMOVED***
		return a.$ === r && (a.$ = Wb), b && a.jQuery === r && (a.jQuery = Vb), r
	***REMOVED***, b || (a.jQuery = a.$ = r), r
***REMOVED***);
