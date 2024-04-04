var db = firebase.apps[0].firestore();
var container = firebase.apps[0].storage().ref();

const idC = document.querySelector('#id');
const name = document.querySelector('#name');
const desc = document.querySelector('#descrit');
const img = document.querySelector('#img');
const btnLoad  = document.querySelector('#btnLoad');

btnLoad.addEventListener('click', function(){
    const imagen = img.files[0];
    const nomImg = imagen.name;

    if(imagen == null){
        alert('Debe seleccionar una imagen.');
    }else{
        const metadata = {
            contentType : imagen.type
        }
        const subir = container.child('categories/' + nomImg).put(imagen, metadata);
        subir
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then( url =>{
                db.collection('categories').where('CategoryID', '==', idC).get()
                    .then( docRef => {
                        docRef.forEach( doc => {
                            doc.ref.update({Picture:url}).then(function(){
                                alert('Se ha modificado la categoría.');
                                document.location.href = 'categories.html';
                            });
                        });
                    })
            })
            .catch(FirebaseError => {
                alert(FirebaseError);
            });
    }
});