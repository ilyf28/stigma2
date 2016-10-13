define(['angular'], function(angular) {
    function httpServiceImpl(http, method, params, url) {
        return http({
            method: method,
            url: url,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
            data: $.param(params)
        });
    };

    function httpDeleteServiceImpl(http, url) {
        return http.delete(url);
    };

    function httpGetServiceImpl(http, url) {
        return http.get(url)
            .then(function(result) {
                return result.data;
            });
    };

    function addParamsToURL(url, params) {
        if (angular.isObject(params)) {
            var delimiter = '?';
            for (var key in params) {
                url += delimiter + key + '=' + params[key];
                delimiter = '&';
            };
        }
        return url;
    };

    function replaceBlank(string) {
        return encodeURIComponent(string);
    };

    return {
        httpServiceImpl: httpServiceImpl,
        httpDeleteServiceImpl: httpDeleteServiceImpl,
        httpGetServiceImpl: httpGetServiceImpl,
        addParamsToURL: addParamsToURL,
        replaceBlank: replaceBlank
    };
});