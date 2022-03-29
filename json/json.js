// // object to JSON

// let mahasiswa = {
//   nama: "arief saifuddien",
//   nrp: 38131098130918,
//   email: "arief@mail.com"
// }

// console.log( JSON.stringify( mahasiswa ) );

// JSON to object

const xhr = new XMLHttpRequest();
xhr.onreadystatechange = () => {
  if ( xhr.readyState == 4 && xhr.status == 200 ) {
    let mahasiswa = JSON.parse( xhr.responseText );
    console.log( mahasiswa )
  }
}
xhr.open( 'GET', './try.json', true );
xhr.send();

// jQuery

$.getJSON( "./try.json", data => {
  console.log( data ); // otomatis di parsing
} );