var db = firebase.apps[0].firestore();

const categories = document.querySelector('#categories');

db.collection('categories').orderBy('CategoryID', 'asc').get().then(function(query){
    categories.innerHTML = '';
    var salida = '';
    cont = 0;

    query.forEach(data => {
        salida += '<tr>';
        salida += '<td>' + data.data().CategoryID + '</td>';
        salida += '<td><a href="showCateg.html?id=' + data.data().CategoryID + '">' + data.data().CategoryName + '</a></td>';
        salida += '<td>' + data.data().Description + '</td></tr>';
    })
    
    categories.innerHTML = salida;    
})