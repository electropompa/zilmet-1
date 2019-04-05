;'use strict';

var tanks = {
  cal : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/rasshiritelnye/cal-pro/' + attribute + '" target="_blank">CAL-PRO</a>';
    },
    volumes: [ 4, 8, 12, 18, 25, 35, 50, 80, 105, 200, 300, 400, 600, 700, 800, 900 ],
    water: false
  }, 
  ultra : {
    link : function (){
      return '<a href="/baki/gidroakkumulyatori-ultra-pro/" target="_blank">ULTRA-PRO</a>';
    },
    volumes : [ 19, 24, 50, 60, 80, 100, 150, 200, 300, 500, 750, 1000, 1500, 2000, 3000 ],
    water: true
  },
  oem   : {
    link : function (){
      return '<a href="/baki/oem-pro" target="_blank">OEM-PRO</a>';
    },
    volumes : [ 2, 3, 4, 6, 8, 10, 12, 14, 18 ],
    water: false
  },
  evo : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/gidroakkumulyatory-ultra-pro/tehnopren/' + attribute + '" target="_blank">ULTRA-PRO EVO</a>';
    },
    volumes : [ 8, 12, 24, 50, 80, 100 ],
    water: true
  },
  inox : {
    link : function (){
      return '<a href="/baki/inox-pro/" target="_blank">INOX-PRO</a>';
    },
    volumes : [ 0.16, 0.5, 1, 2, 8, 12, 18, 24, 60, 100 ],
    water: true
  },
  easy  : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/rasshiritelnye/easy-pro/' + attribute + '" target="_blank">EASY-PRO</a>';
    },
    volumes : [ 8, 12, 18, 24 ],
    water: true
  },
  hy    : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/gidroakkumulyatory/hy-pro/' + attribute + '" target="_blank">HY-PRO</a>';
    },
    volumes : [ 2, 8, 12, 19, 24 ],
    water: true
  },
  hydro : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/rasshiritelnye/hydro-pro/' + attribute + '" target="_blank">HYDRO-PRO</a>';
    },
    volumes : [ 2, 5, 18, 24, 35, 50, 105, 150, 200, 250, 300, 400, 500, 600 ],
    water: true
  },
  water : {
    link: function ( volume ) {
      var attribute = volume ? "?attribute_pa_volume=" + volume : '';
      return '<a href="/bak/rasshiritelnye/water-pro' + attribute + '" target="_blank">WATER-PRO</a>';
    },
    volumes : [ 5, 7, 7.5, 8, 12, 18, 24 ],
    water: true
  },
}

function validateInputValue(id, min, max){

  min = min || 0;
  max = max || Infinity;

  var element = document.getElementById(id);
  var value = element.value;

  if( value == "" || value < min || value > max){
    
    element.classList.add('is-invalid');

    element.nextElementSibling.innerHTML = ( value == "" ) ? "Введите значение" :
      (value < min) ? 'Слишком маленькое значение' :
      (value > max) ? 'Слишком большое значение': 'Неверное значение';
    return;

  } else {

    if(element.classList.contains("is-invalid")){
      element.classList.remove("is-invalid");
    }

    return parseFloat(value.replace( ",", "." ));
  }
}

function compareNumeric(a, b){
  if (a > b) return 1;
  if (a < b) return -1;
}

function calcVolumeHeat(maxTemp, pPred, pMax, vol){

  if ( maxTemp === undefined || pPred === undefined || pMax === undefined || vol === undefined) {
    return false;
  }

  var e         = 0,
      bak_vol   = 0;

  e = 4.31422 * Math.pow(10, -6) * maxTemp * maxTemp - 9.18129 * Math.pow(10, -6) * maxTemp + 0.00161292;
  bak_vol = vol * e;
  bak_vol /= 1 - ++pPred / ++pMax;
  bak_vol = Math.round(bak_vol * 100) / 100;

  return bak_vol;
}

function calcVolumeWater( waterVolume, pMax, pMin, pStart, pumpStartQuantity ){

  var volume                = 16.5,
      calcVolumeWater       = 0,
      recomendedVolumeWater = 0;

  volume *= waterVolume;
  volume *= ++pMax;
  volume *= ++pMin;
  volume /= pMax - pMin;
  volume /= ++pStart;
  volume /= pumpStartQuantity;

  return Math.round(volume * 100) / 100;
}

function calcRecomendedVolumeHeat(pMax, bak_vol){

  if ( !bak_vol ) {
    return false;
  }

  var volumesPMax25 = [ 100, 200, 300, 500 ];
  var volumesPMax17 = volumesPMax25.concat([ 24, 750, 1000, 2000, 3000 ]).sort(compareNumeric);
  var volumesPMax16 = volumesPMax17.concat([ 0.16 ]).sort(compareNumeric);
  var volumesPMax11 = volumesPMax16.concat([ 0.5, 1, 2, 3, 4, 5, 8, 12, 18, 19, 35, 50, 60, 80, 105, 150, 250, 400, 600, 1500 ]).sort(compareNumeric);
  var volumesPMax7  = volumesPMax11.concat([ 700, 800, 900 ]).sort(compareNumeric);
  var volumesPMax4  = volumesPMax7.concat([ 6, 7, 7.5, 10, 14 ]).sort(compareNumeric);

  var array = pMax <= 4  ? volumesPMax4  :
              pMax <= 7  ? volumesPMax7  :
              pMax <= 11 ? volumesPMax11 :
              pMax <= 16 ? volumesPMax16 :
              pMax <= 17 ? volumesPMax17 :
              pMax <= 25 ? volumesPMax25 : null;

  for ( var i = 0; i < array.length; i++ ) {
    if ( bak_vol < array[i] ) {
      return recomendedVolume = array[i];
    }
  }
}

function calcRecomendedVolumeWater(pMax, bak_vol){

  if ( !bak_vol ) {
    return false;
  }

  var volumesPMax25 = [ 100, 200, 300, 500 ],
      volumesPMax16 = volumesPMax25.concat([ 24, 750, 1000, 2000, 3000 ]).sort(compareNumeric),
      volumesPMax15 = volumesPMax17.concat([ 0.16 ]).sort(compareNumeric),
      volumesPMax10 = volumesPMax16.concat([ 0.5, 1, 2, 5, 8, 12, 18, 19, 35, 50, 60, 80, 105, 150, 250, 400, 600, 1500 ]).sort(compareNumeric);

  var array = pMax <= 10 ? volumesPMax10 :
              pMax <= 15 ? volumesPMax15 :
              pMax <= 16 ? volumesPMax16 :
              pMax <= 25 ? volumesPMax25 : null;


  for ( var i = 0; i < array.length; i++ ) {
    if ( bak_vol < array[i] ) {
      return recomendedVolume = array[i];
    }
  }
}

function getRecomendedSeriesHeat( recomendedVolume ) {
  var recomendedSeries = "Вам подойдут баки из серии:";
  for (key in tanks) {

    if ( tanks[key]['volumes'].indexOf( recomendedVolume ) != -1 ) {
      recomendedSeries += " " + tanks[key].link( recomendedVolume ) + ",";
    }

  }

  return recomendedSeries.substring(0, recomendedSeries.length - 1);
}

function getRecomendedSeriesWater( recomendedVolume ) {
  var recomendedSeries = "Вам подойдут баки из серии:";
  for (key in tanks) {

    if ( tanks[key]['volumes'].indexOf( recomendedVolume ) != -1 ) {
      if( tanks[key]['water'] ) recomendedSeries += " " + tanks[key].link( recomendedVolume ) + ",";
    }

  }

  return recomendedSeries.substring(0, recomendedSeries.length - 1);
}

function outputResult(place, string){
  document.getElementById( place ).innerHTML = string;
}

function calcHeat() {
  
  var maxTemp = validateInputValue("maxTemp"),
      pPred   = validateInputValue("pPred", 1),
      pMax    = validateInputValue("pMax", pPred, 25),
      vol     = validateInputValue("vol");

  var bak_vol = 0;
  var price_r = 0;

  bak_vol = calcVolumeHeat(maxTemp, pPred, pMax, vol);

  outputResult("calcVolume", bak_vol ? bak_vol + " л." : "Ошибка!");

  // Рекомендации

  if( bak_vol > 6000 ){

    outputResult("recomendedVolume", "Рекомендуется разбить на три бака");
    return;
  } else if ( bak_vol >= 3000 ){

    outputResult("recomendedVolume", "Рекомендуется разбить на два бака");
    return;
  }

  recomendedVolume = calcRecomendedVolumeHeat( pMax, bak_vol );

  if( recomendedVolume ) {
    outputResult("recomendedVolume", "<b>" + recomendedVolume  + " л.</b>");

    var recomendedSeries = getRecomendedSeriesHeat(recomendedVolume);
    outputResult("recomendedSeries", "<b>" + recomendedSeries + ".</b>");
  } else {
    outputResult("recomendedVolume", "Ошибка!");
  }

}

function calcRecomendedVolumeWater(pMax, bak_vol){

  if ( !bak_vol ) {
    return false;
  }

  var volumesPMax25 = [ 100, 200, 300, 500 ];
  var volumesPMax17 = volumesPMax25.concat([ 24, 750, 1000, 2000, 3000 ]).sort(compareNumeric);
  var volumesPMax16 = volumesPMax17.concat([ 0.16 ]).sort(compareNumeric);
  var volumesPMax11 = volumesPMax16.concat([ 0.5, 1, 2, 3, 4, 5, 8, 12, 18, 19, 35, 50, 60, 80, 105, 150, 250, 400, 600, 1500 ]).sort(compareNumeric);
  var volumesPMax7  = volumesPMax11.concat([ 700, 800, 900 ]).sort(compareNumeric);
  var volumesPMax4  = volumesPMax7.concat([ 6, 7, 7.5, 10, 14 ]).sort(compareNumeric);

  var array = pMax <= 4  ? volumesPMax4  :
              pMax <= 7  ? volumesPMax7  :
              pMax <= 11 ? volumesPMax11 :
              pMax <= 16 ? volumesPMax16 :
              pMax <= 17 ? volumesPMax17 :
              pMax <= 26 ? volumesPMax25 : null;

  var price_r;

  for ( var i = 0; i < array.length; i++ ) {
    if ( bak_vol < array[i] ) {
      return recomendedVolume = array[i];
    }
  }
}

function calcWater() {

  var waterVolume       = validateInputValue("v_water"),
      pMin              = validateInputValue("min_p"),
      pMax              = validateInputValue("max_p", pMin),
      pStart            = validateInputValue("p_nach"),
      pumpStartQuantity = validateInputValue("max_n"),
      VolumeWater       = 0,
      recomendedVolume  = 0;

  VolumeWater = calcVolumeWater( waterVolume, pMax, pMin, pStart, pumpStartQuantity );

  outputResult("calcVolume", VolumeWater);

  if( VolumeWater > 6000 ){

    outputResult("recomendedVolume", "Рекомендуется разбить на три бака");
    return;
  } else if ( VolumeWater >= 3000 ){

    outputResult("recomendedVolume", "Рекомендуется разбить на два бака");
    return;
  }

  recomendedVolume = calcRecomendedVolumeWater(pMax, VolumeWater);

  if( recomendedVolume ) {
    outputResult("recomendedVolume", "<b>" + recomendedVolume  + " л.</b>");

    var recomendedSeries = getRecomendedSeriesWater(recomendedVolume);
    
    outputResult("recomendedSeries", "<b>" + recomendedSeries + ".</b>");
  } else {
    outputResult("recomendedVolume", "Ошибка!");
  }

}