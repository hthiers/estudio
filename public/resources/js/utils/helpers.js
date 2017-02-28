define(function(){

  function getSectionName() {
    var BARRA = '/',
        cantBarras,
        firstBarIndex,
        section,
        url = window.location.pathname.substr(1).toLowerCase();
    url = url[url.length -1] === BARRA ? url.slice(0, -2) : url;
    firstBarIndex = url.indexOf(BARRA) !== -1 ? url.indexOf(BARRA) : url.length;
    section = url.substr(0, firstBarIndex);
    for (var i = cantBarras = 0; i < url.length; cantBarras += +(BARRA === url[i++]));
    return cantBarras === 0 ? section : section + '-detail';
  }

  return {
    getSectionName: getSectionName,
  }

})
