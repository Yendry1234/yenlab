var db = firebase.apps[0].firestore();

const categories = document.querySelector('#categories');
const products = document.querySelector('#products');
const btn = document.querySelector('#btnMod');

var url = new URL(window.location.href);
var id = url.searchParams.get("id");

db.collection('categories').where('CategoryID', '==', id).get().then(function(query){
    categories.innerHTML = '';
    var salida = '';
    var saldMod = '';

    query.forEach(data => {
        salida += '<tr><td>' + data.data().CategoryID + '</td>';
        salida += '<td>' + data.data().CategoryName + '</td>';
        salida += '<td>' + data.data().Description + '</td>';
        salida += '<td><img src="' + data.data().Picture + '" alt=""></td></tr>';
        saldMod = '<a href="modCategory.html?id=' + data.id + '"><input type="button" id="btnLoad" value="Modificar categoría"></a>';
    });

    btn.innerHTML = '';
    
    btn.innerHTML = saldMod;
    
    categories.innerHTML = salida;    
});

db.collection('products').orderBy('ProductID', 'asc').get().then(function(query){
    products.innerHTML = '';
    var salida = '';

    query.forEach(data => {
        if(data.data().CategoryID == id){
            salida += '<tr><td>' + data.data().ProductID + '</td>';
            salida += '<td>' + data.data().ProductName + '</td>';
            salida += '<td>' + data.data().SupplierID + '</td>';
            salida += '<td>' + data.data().QuantityPerUnit + '</td>';
            salida += '<td>' + data.data().UnitPrice + '</td>';
            salida += '<td>' + data.data().UnitsInStock + '</td>';
            salida += '<td>' + data.data().UnitsOnOrder + '</td>';
            salida += '<td>' + data.data().Discontinued + '</td></tr>';
        }
    });

    products.innerHTML = salida;
});