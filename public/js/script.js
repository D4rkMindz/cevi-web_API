/**
 * Base url
 *
 @returns ***REMOVED***|jQuery***REMOVED***
 */
function baseurl() ***REMOVED***
	return $('head base').attr('href');
***REMOVED***

/**
 * Send GET AJAX request.
 *
 * @param url ***REMOVED***string***REMOVED*** - url
 * @param data
 * @return Promise
 */
function sendGetAjax(url, data) ***REMOVED***
	return new Promise((resolve,
						reject = function (xhr) ***REMOVED***
							hideLoader();
							notify(***REMOVED***
								type: 'error',
								msg: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Server error. Please try it again later'
							***REMOVED***);
						***REMOVED***) => ***REMOVED***
		var token = window.localStorage.getItem('token');

		$.ajax(***REMOVED***
			method: 'GET',
			contentType: 'application/json',
			cache: false,
			processData: true,
			headers: ***REMOVED***"Authorization": token***REMOVED***,
			url: url
		***REMOVED***).done(function (response) ***REMOVED***
			resolve(response);
		***REMOVED***).fail((xhr) => ***REMOVED***
			ajaxFail(xhr, resolve, reject, 'GET', url, ***REMOVED******REMOVED***);
		***REMOVED***);
	***REMOVED***);
***REMOVED***

/**
 * Send POST AJAX request.
 *
 * @param url
 * @param data
 * @returns ***REMOVED***Promise***REMOVED***
 */
function sendPostAjax(url, data) ***REMOVED***
	return new Promise((resolve, reject) => ***REMOVED***
		let token = window.localStorage.getItem('token');
		$.ajax(***REMOVED***
			method: 'POST',
			contentType: 'application/json',
			processData: true,
			dataType: 'json',
			headers: ***REMOVED***"Authorization": token***REMOVED***,
			url: url,
			data: data
		***REMOVED***).done(function (response) ***REMOVED***
			resolve(response);
		***REMOVED***).fail(function (xhr) ***REMOVED***
			ajaxFail(xhr, resolve, reject, 'POST', url, data);
		***REMOVED***);
	***REMOVED***);
***REMOVED***