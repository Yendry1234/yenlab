// JavaScript Document
var db = firebase.apps[0].firestore();
var container = firebase.apps[0].storage().ref();

const txtFile = document.querySelector('#file');
const btn = document.querySelector('#btnLoad');

btn.addEventListener('click', function(){
    var archivo = txtFile.files[0];
    var nomarchi = archivo.name.slice(0, -4);
    var added = 0;
    var lost = 0;
    errorMess = "";
    
    Papa.parse(archivo, {
        complete: function(results) {
            var header = results.data[0];
            var cont = 0;
            var dataToAdd = {};

            results.data.forEach(record => {
                if(cont != 0){
                    for(i = 0; i < record.length; i++){
                        dataToAdd[header[i]] = record[i];
                    }

                    db.collection(nomarchi).add(dataToAdd)  
                        .then(function(){
                            added++;
                            console.log('added');
                        })
                        .catch(function(FirebaseError){
                            lost++;
                            alert(FirebaseError);
                        });

                    if((cont + 1) == results.data.length){
                        alert("Se han agregado los registros de " + nomarchi.charAt(0).toUpperCase() + nomarchi.slice(1) + " de forma satisfactoria.");
                    }
                }


                cont++;
            });

            console.log(results.data);
        }
    });    
});