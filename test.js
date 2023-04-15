var a = function(e) {
	if (m || !(0, f.
		default)()) {
		var t = e.loadingStyle,
			n = e.url,
			p = e.type,
			h = e.dataType,
			b = e.data,
			v = e.success,
			y = e.error,
			g = e.complete,
			_ = e.preventDefaultPrompts,
			w = e.hashStr;
		"backdrop" == (t = (t || "backdrop").toLowerCase()) && l.
		default.start();
		(new Date).getTime();
		if (void 0 !== w) {
			var x = window.Blockey.SecuritySalt,
				k = (0, c.
					default)(n + "?" + w + x);
			(b = b || {}).t = k.t, b.s = k.s
		}
		return $.ajax({
			url: (d ? "/static" : "") + n + (d ? ".json" : ""),
			type: p || (d ? "GET" : "POST"),
			dataType: h || "JSON",
			data: b,
			traditional: !0,
			success: function(e) {
				_ || (0, u.
					default)(e.prompts), i.
				default.debug("ajax(" + n + (b ? JSON.stringify(b) : "") + ")"), v && v(e)
			},
			error: function(e) {
				var t = "服务器或网络错误，请稍后重试";
				e.responseJSON && (t = e.responseJSON.message || t), 401 == e.status ? r.
				default.dispatch((0, o.openLogin)()) : 404 == e.status ? r.
				default.dispatch((0, a.setNotFound)(!0, e.responseJSON && e.responseJSON.message || null)) : (i.
					default.warn("ajax(" + n + (b ? JSON.stringify(b) : "") + "):" + t), s.
					default.info(t)), y && y(t)
			},
			complete: function(e) {
				"backdrop" == t && l.
				default.end(), g && g(e)
			}
		})
	}
}