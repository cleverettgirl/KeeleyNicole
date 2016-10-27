

function httpGet() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", 'https://www.blogger.com/', false ); // false for synchronous request
    xmlHttp.send();
    return xmlHttp.responseText;
}

console.log(httpGet.status);
console.log(httpGet.statusText);

GET https://www.googleapis.com/blogger/v3/blogs/80633973406556418572399953?key=AIzaSyD6ccugqxZC3L-CZ-GVQb5JIEmEbfH34TE