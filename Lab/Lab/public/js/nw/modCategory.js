var db = firebase.apps[0].firestore();

//const descri = document.querySelector('#desc');

var url = new URL(window.location.href);
var id = url.searchParams.get('id');

db.collection('categories').doc(id).get().then(function(query){

    document.getElementById("id").value = query.data().CategoryID;
    document.getElementById("name").value = query.data().CategoryName;
    document.getElementById('descrit').value = query.data().Description;

    if(query.data().Picture == null){
        alert('No se encuentra ninguna imagen de categoría.');
    }

}).catch(function(FirebaseError){
    alert(FirebaseError);
});