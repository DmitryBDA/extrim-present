$('.carousel').carousel({
  interval: 2000

})
// $('.carousel').carousel({
//   wrap: true
 
// })


//функция показать подробно об акции, срабатывает при наведении мыши
function detali(e){
	 var www = "#modal" + e.dataset.idp 
	 $(www).css({'display':'block'});
	 $(www).css({'right':'14px'});
}

//функция убрать подробности об акции, срабатывает когда курсор покидает область дива с акциями
function detalihidden(e){
	 var www = "#modal" + e.dataset.idp  
	 $(www).css({'display':'block'});
	 $(www).css({'right':'-452px'});
}

//удалить продукт из корзины
function deleteProductBasket(obj, id){
	
	var ajax = new XMLHttpRequest();
		ajax.open("POST", "modules/basket/delete.php", false );
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + id);
	obj.parentNode.parentNode.remove();

	//изменить количество товаров в корзине
	
	$('#basketColl span').text(ajax.response);
}

//изменить количество продукта в корзине, срабатывает при изменении значения
function changeCount(obj, id){

		var ajax = new XMLHttpRequest();
			ajax.open("POST", "modules/basket/change-basket.php", false );
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("id=" + id + "&countProducts=" + obj.value);

		$('#incr' + id).attr('data-value', obj.value);
		$('#red' + id).attr('data-value1', obj.value);

		//декодировать json строку, для получений json код
		var response = JSON.parse(ajax.response);
		
	 	var countProducts = 0;
	 	
	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	countProducts = parseInt(countProducts) + parseInt(response.basket[i]['count']);
	 	}

	 	var costsProduct = 0;

	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	if(response.basket[i]['product_id'] == id){
	 	 	
	 	 		costsProduct = response.basket[i]['costs'];
	 	 	}
			
	 	}


		//изменить количество товаров в корзине
	 	var btnGoBasket = document.querySelector("#basketColl span");
	 	btnGoBasket.innerText = countProducts;

	 	var costs = document.querySelector("#product" + id);
	 	costs.innerText = costsProduct * obj.value; 
}
//увеличить количество продукта в корзине на 1
function increaseCount(obj, id){

		var newCount = Number(obj.dataset.value) + 1;
		console.log(newCount);
		var ajax = new XMLHttpRequest();
			ajax.open("POST", "modules/basket/change-basket.php", false );
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("id=" + id + "&countProducts=" + newCount );


		//декодировать json строку, для получений json код
	
		var response = JSON.parse(ajax.response);
		
	 	var countProducts = 0;
	 	
	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	countProducts = parseInt(countProducts) + parseInt(response.basket[i]['count']);
	 	}

	 	var costsProduct = 0;

	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	if(response.basket[i]['product_id'] == id){
	 	 	
	 	 		costsProduct = response.basket[i]['costs'];
	 	 	}
			
	 	}

	 	var inptucoast = document.querySelector(".countTek" + id);
	 	console.dir(inptucoast);
	 	inptucoast.value = newCount;
	 	$('#incr' + id).attr('data-value', newCount);
	 	$('#red' + id).attr('data-value1', newCount);

		//изменить количество товаров в корзине
	 	var btnGoBasket = document.querySelector("#basketColl span");
	 	btnGoBasket.innerText = countProducts;

	 	var costs = document.querySelector("#product" + id);
	 	costs.innerText = costsProduct * newCount; 
}

//уменьшть количество продукта в корзине на 1
function reduceCount(obj, id){

		var newCount = Number(obj.dataset.value1) - 1;
		
		var ajax = new XMLHttpRequest();
			ajax.open("POST", "modules/basket/change-basket.php", false );
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("id=" + id + "&countProducts=" + newCount );


		//декодировать json строку, для получений json код
	
		var response = JSON.parse(ajax.response);
		
	 	var countProducts = 0;
	 	
	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	countProducts = parseInt(countProducts) + parseInt(response.basket[i]['count']);
	 	}

	 	var costsProduct = 0;

	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	if(response.basket[i]['product_id'] == id){
	 	 	
	 	 		costsProduct = response.basket[i]['costs'];
	 	 	}
			
	 	}

	 	var inptucoast = document.querySelector(".countTek" + id);
	 	console.dir(inptucoast);
	 	inptucoast.value = newCount;
	 	$('#red' + id).attr('data-value1', newCount);
	 	$('#incr' + id).attr('data-value', newCount);

		//изменить количество товаров в корзине
	 	var btnGoBasket = document.querySelector("#basketColl span");
	 	btnGoBasket.innerText = countProducts;

	 	var costs = document.querySelector("#product" + id);
	 	costs.innerText = costsProduct * newCount; 
}


// Редактирование данных в личном кабинете
function editDataUser(){

	var ajax = new XMLHttpRequest();
		ajax.open("POST", "modules/personalArea/editDataPersonalArea.php", false );
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send();
		
	 $('.editPersonaldata').html(ajax.response);
}



// Добавляем товары на страницу с помощью кнопки 'Показать ещё' - OLEG
var btnShowMore = document.querySelector('#get-more');
var siteUrl = 'http://extreme-present.local';
if (btnShowMore) {
  btnShowMore.onclick = function () {
    // Выбираем в переменую скрытый инпут
    var currentPageInput = document.querySelector("#current-page");

    var btnShowMore = document.querySelector('#get-more');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', siteUrl + '/modules/products/get-more.php?page=' + currentPageInput.value, false);
    ajax.send();

    // Меняем его значение которое по умолчанию 1 прибавляем 1
    currentPageInput.value = +currentPageInput.value + 1;
    // Проверяем если запрос пустой удаляем кнопку со страницы
    if (ajax.response == "") {
      btnShowMore.style.display = "none";
    }
    var productsBlock = document.querySelector("#products");

    productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;

  };
}

//Функция добавления через ajax запрос товара в корзину - OLEG
function addToBasket(btn) {

  var ajax = new XMLHttpRequest();

  ajax.open("POST", siteUrl + '/modules/basket/add-basket.php', false);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send('id=' + btn.dataset.id);
  // alert('Click');

  // Преабразовываем запрос в JSON обьект
  var response = JSON.parse(ajax.response);

  var countProducts = 0;
	 	
	 	for (var i = 0; i < response.basket.length; i++) {
	 	 	countProducts = parseInt(countProducts) + parseInt(response.basket[i]['count']);
	 	}

  var btnGoBusket = document.querySelector("#basketColl span");

  // Подставляем число полученое с обьекта json сверху в корзину span
  btnGoBusket.innerText = countProducts;

}