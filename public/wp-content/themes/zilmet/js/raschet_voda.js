function calc_v() {
	
	var type_nasosa = document.getElementById("type_nasosa");
	var v_water = document.getElementById("v_water");
	var min_p = document.getElementById("min_p");
	var max_p = document.getElementById("max_p");
	var p_nach = document.getElementById("p_nach")
	var result_v = document.getElementById("result_v");
	var result_r = document.getElementById("result_r");
	var max_n = document.getElementById("max_n");

	v_water = parseInt(v_water.value);
	max_p = parseFloat(max_p.value.replace(/[,]+/g, '.'));
	min_p = parseFloat(min_p.value.replace(/[,]+/g, '.'));
	p_nach = parseFloat(p_nach.value.replace(/[,]+/g, '.'));
	max_n = parseInt(max_n.value);

	var price_v = 0;

	price_v = 16.5;
	price_v *= v_water;
	price_v *= max_p + 1;
	price_v *= min_p + 1;
	price_v /= max_p - min_p;
	price_v /= p_nach + 1;
	price_v /= max_n;

	price_v = Math.round(price_v * 100) / 100;

	result_v.innerHTML = price_v;

	var price_r = 0;

	if (max_p < 10) {
		if (price_v < 0.16) {price_r = 0.16 + " л. INOX-PRO"};
		if (price_v >= 0.16 && price_v < 0.5) {price_r = 0.5 + " л. INOX-PRO"};
		if (price_v >= 0.5 && price_v < 1) {price_r = 1 + " л. INOX-PRO"};
		if (price_v >= 1 && price_v < 2) {price_r = 2 + " л. INOX-PRO, HY-PRO, HYDRO-PRO"};
		if (price_v >= 2 && price_v < 5) {price_r = 5 + " л. WATER-PRO, HYDRO-PRO"};
		if (price_v >= 5 && price_v < 8) {price_r = 8 + " л. INOX-PRO, ULTRA-PRO EVO, EASY-PRO, WATER-PRO,HY-PRO"};
		if (price_v >= 8 && price_v < 12) {price_r = 12 + " л. INOX-PRO, ULTRA-PRO EVO,EASY-PRO, WATER-PRO, HY-PRO"};
		if (price_v >= 12 && price_v < 18) {price_r = 18 + " л. INOX-PRO, EASY-PRO, WATER-PRO, HYDRO-PRO"};
		if (price_v >= 18 && price_v < 19) {price_r = 19 + " л. ULTRA-PRO, HY-PRO"};
		if (price_v >= 19 && price_v < 24) {price_r = 24 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO, EASY-PRO, WATER-PRO, HY-PRO, HYDRO-PRO"};
		if (price_v >= 24 && price_v < 35) {price_r = 35 + " л. HYDRO-PRO"};
		if (price_v >= 35 && price_v < 50) {price_r = 50 + " л. ULTRA-PRO EVO, ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 50 && price_v < 60) {price_r = 60 + " л. INOX-PRO, ULTRA-PRO"};
		if (price_v >= 60 && price_v < 80) {price_r = 80 + " л. ULTRA-PRO EVO, ULTRA-PRO"};
		if (price_v >= 80 && price_v < 100) {price_r = 100 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO"};
		if (price_v >= 100 && price_v < 105) {price_r = 105 + " л. HYDRO-PRO"};
		if (price_v >= 105 && price_v < 150) {price_r = 150 + " л. HYDRO-PRO"};
		if (price_v >= 150 && price_v < 200) {price_r = 200 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 200 && price_v < 250) {price_r = 250 + " л. HYDRO-PRO"};
		if (price_v >= 250 && price_v < 300) {price_r = 300 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 300 && price_v < 400) {price_r = 400 + " л. HYDRO-PRO"};
		if (price_v >= 400 && price_v < 500) {price_r = 500 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 500 && price_v < 600) {price_r = 600 + " л. HYDRO-PRO"};
		if (price_v >= 600 && price_v < 750) {price_r = 750 + " л. ULTRA-PRO"};
		if (price_v >= 750 && price_v < 1000) {price_r = 1000 + " л. ULTRA-PRO"};
		if (price_v >= 1000 && price_v < 1500) {price_r = 1500 + " л. ULTRA-PRO"};
		if (price_v >= 1500 && price_v < 2000) {price_r = 2000 + " л. ULTRA-PRO"};
		if (price_v >= 2000 && price_v < 3000) {price_r = 3000 + " л. ULTRA-PRO"};
		if (price_v >= 3000) {price_r = Math.round(price_v / 100)*100 + " л. Рекоммендуется разбить на два бака."};
		if (price_v >= 6000) {price_r = Math.round(price_v / 100)*100 + " л. Рекоммендуется разбить на три бака."}
	};

	if (max_p > 10 && max_p < 15) {
		if (price_v < 0.16) {price_r = 0.16 + " л. INOX-PRO"};
		if (price_v >= 0.16 && price_v < 24) {price_r = 24 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO, EASY-PRO, WATER-PRO, HY-PRO, HYDRO-PRO"};
		if (price_v >= 24 && price_v < 100) {price_r = 100 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO"};
		if (price_v >= 100 && price_v < 200) {price_r = 200 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 200 && price_v < 300) {price_r = 300 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 300 && price_v < 500) {price_r = 500 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 500 && price_v < 750) {price_r = 750 + " л. ULTRA-PRO"};
		if (price_v >= 750 && price_v < 1000) {price_r = 1000 + " л. ULTRA-PRO"};
		if (price_v >= 1000 && price_v < 2000) {price_r = 2000 + " л. ULTRA-PRO"};
		if (price_v >= 2000 && price_v < 3000) {price_r = 3000 + " л. ULTRA-PRO"};
		if (price_v >= 3000) {price_r = Math.round(price_v / 100)*100 + " л. Рекоммендуется разбить на два бака."};
	};

	if (max_p > 15 && max_p < 16) {
		if (price_v < 24) {price_r = 24 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO, EASY-PRO, WATER-PRO, HY-PRO, HYDRO-PRO"};
		if (price_v >= 24 && price_v < 100) {price_r = 100 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO"};
		if (price_v >= 100 && price_v < 200) {price_r = 200 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 200 && price_v < 300) {price_r = 300 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 300 && price_v < 500) {price_r = 500 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 500 && price_v < 750) {price_r = 750 + " л. ULTRA-PRO"};
		if (price_v >= 750 && price_v < 1000) {price_r = 1000 + " л. ULTRA-PRO"};
		if (price_v >= 1000 && price_v < 2000) {price_r = 2000 + " л. ULTRA-PRO"};
		if (price_v >= 2000 && price_v < 3000) {price_r = 3000 + " л. ULTRA-PRO"};
		if (price_v >= 3000) {price_r = Math.round(price_v / 100)*100 + " л. Рекоммендуется разбить на два бака."};
	};

	if (max_p > 16 && max_p < 25) {
		if (price_v < 100) {price_r = 100 + " л. INOX-PRO, ULTRA-PRO EVO, ULTRA-PRO"};
		if (price_v >= 100 && price_v < 200) {price_r = 200 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 200 && price_v < 300) {price_r = 300 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v >= 300 && price_v < 500) {price_r = 500 + " л. ULTRA-PRO, HYDRO-PRO"};
		if (price_v > 500) {price_r = Math.round(price_v / 100)*100 + " л. Рекоммендуется разбить на два бака."};
	};

	if (max_p > 25) {
		price_r = "Необходимо уменьшить максимальное давление";
	};

	result_r.innerHTML = price_r;

}